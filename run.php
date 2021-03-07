<?php

require 'vendor/autoload.php';

use App\Lib\ChtToChs;
use App\Lib\CrawlerInterface;
use App\Lib\HttpException;
use App\Lib\SimpleCurl;

try {
    ChtToChs::init();
    $scurl = new SimpleCurl();

    for ($result = true, $page = 1; $result === true; ++$page) {
        printf("Curl page: %d\n", $page);

        $result = getItems($scurl, $page);

        sleep(rand(3, 6));
    }
} catch (HttpException $e) {
    var_dump('exception: ' . $e->getMessage());
    exit;
}

/**
 * @param \App\Lib\CrawlerInterface $url
 * @param integer $page
 * @return bool
 *
 * @throws \App\Lib\HttpException
 */
function getItems(CrawlerInterface $url, int $page): bool
{
    $newest = ($page - 1) * 60;
    $response = $url->get("https://shopee.tw/api/v4/search/search_items?by=relevancy&fe_categoryids=11041645&limit=60&newest=$newest&order=desc&page_type=search&scenario=PAGE_OTHERS&version=2");

    $data = json_decode($response, true);
    $jsonError = json_last_error_msg();

    if ($jsonError !== 'No error') {
        var_dump('json_decode error: ' . $jsonError);
    } elseif (isset($data['error'])) {
        printf('Api Error: %d', $data['error']);
    } elseif (isset($data['items'])) {
        foreach ($data['items'] as $item) {
            if (
                isset($item['item_basic']['name'], $item['item_basic']['price_max'], $item['item_basic']['price_min'])
                && is_string($item['item_basic']['name'])
                && is_int($item['item_basic']['price_max'])
                && is_int($item['item_basic']['price_min'])
            ) {
                if ($item['item_basic']['price_min'] === $item['item_basic']['price_max']) {
                    printf(
                        "%s: $%d\n",
                        ChtToChs::transNew($item['item_basic']['name']),
                        $item['item_basic']['price_min'] / 100000
                    );
                } else {
                    printf(
                        "%s: $%d - $%d\n",
                        ChtToChs::transNew($item['item_basic']['name']),
                        $item['item_basic']['price_min'] / 100000,
                        $item['item_basic']['price_max'] / 100000
                    );
                }
            }
        }

        return true;
    }

    return false;
}
