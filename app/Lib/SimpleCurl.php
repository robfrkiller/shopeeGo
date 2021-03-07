<?php

namespace App\Lib;

use App\Lib\HttpException;

class SimpleCurl implements CrawlerInterface
{
    /**
     * @param string $url
     * @return string
     *
     * @throws \App\Lib\HttpException
     */
    public function get(string $url): string
    {
        if (!$this->isURL($url)) {
            throw new HttpException('Invalid URL.');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_12) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4582.198 Safari/537.36');
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'referer: https://shopee.tw/%E5%A8%9B%E6%A8%82%E3%80%81%E6%94%B6%E8%97%8F-cat.11041645',
        ]);

        $body = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new HttpException(curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if (!$this->isOK($httpCode)) {
            throw new HttpException('Bad Response.');
        }

        return $body;
    }

    /**
     * @param integer $code
     * @return bool
     */
    private function isOK(int $code): bool
    {
        return $code === 200;
    }

    /**
     * @param string $url
     * @return bool
     */
    private function isURL(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
