<?php

namespace App\Lib;

interface CrawlerInterface
{
    public function get(string $url): string;
}
