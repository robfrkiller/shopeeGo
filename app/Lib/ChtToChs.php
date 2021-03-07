<?php

namespace App\Lib;

use App\Lib\ZhConversion;

class ChtToChs
{
    /**
     * @var \App\Lib\ZhConversion
     */
    private static $instance;

    /**
     * @var array
     */
    private static $Map = [
        'single' => [],
        'multi' => [],
        'simpleMulti' => [],
    ];

    /**
     * @return void
     */
    public static function init(): void
    {
        self::$instance = new ZhConversion();

        self::toMap(self::$instance::$zh2Hans);
        self::toMap(self::$instance::$zh2CN);
    }

    /**
     * @param string $text
     * @return string
     */
    public static function trans(string $text): string
    {
        $text = str_replace(array_keys(self::$Map['simpleMulti']), array_values(self::$Map['simpleMulti']), $text);
        $text = str_replace(array_keys(self::$Map['single']), array_values(self::$Map['single']), $text);

        return $text;
    }

    /**
     * @param string $text
     * @return string
     */
    public static function transNew(string $text): string
    {
        $result = '';
        $textLength = mb_strlen($text);

        for ($i = 0; $i < $textLength; ++$i) {
            $indexKey = mb_substr($text, $i, 2);

            if (isset(self::$Map['multi'][$indexKey])) {
                $subLength = ($textLength - $i) < self::$Map['multi'][$indexKey]['max'] ? null : self::$Map['multi'][$indexKey]['max'];

                $hasKey = false;
                $subtext = mb_substr($text, $i, $subLength);
                foreach (self::$Map['multi'][$indexKey]['keys'] as $tc => $sc) {
                    if (strpos($subtext, $tc) === 0) {
                        $hasKey = true;
                        $i += mb_strlen($tc) - 1;

                        $result .= $sc;
                        break;
                    }
                }

                if (!$hasKey) {
                    $char = mb_substr($text, $i, 1);
                    $result .= self::$Map['single'][$char] ?? $char;
                }
            } else {
                $char = mb_substr($text, $i, 1);
                $result .= self::$Map['single'][$char] ?? $char;
            }
        }

        return $result;
    }

    /**
     * @param string $text
     * @return string
     */
    public static function transTW(string $text): string
    {
        $result = '';
        $textLength = mb_strlen($text);

        for ($i = 0; $i < $textLength; ++$i) {
            $indexKey = mb_substr($text, $i, 2);

            if (isset(self::$Map['multi'][$indexKey])) {
                $subLength = ($textLength - $i) < self::$Map['multi'][$indexKey]['max'] ? null : self::$Map['multi'][$indexKey]['max'];

                $hasKey = false;
                for (; $subLength >= self::$Map['multi'][$indexKey]['min']; --$subLength) {
                    $subtext = mb_substr($text, $i, $subLength);

                    if (isset(self::$Map['multi'][$indexKey]['keys'][$subtext])) {
                        $hasKey = true;
                        $i += $subLength - 1;

                        $result .= self::$Map['multi'][$indexKey]['keys'][$subtext];
                        break;
                    }
                }

                if (!$hasKey) {
                    $char = mb_substr($text, $i, 1);
                    $result .= self::$Map['single'][$char] ?? $char;
                }
            } else {
                $char = mb_substr($text, $i, 1);
                $result .= self::$Map['single'][$char] ?? $char;
            }
        }

        return $result;
    }

    /**
     * @param array $list
     * @return void
     */
    private static function toMap(array $list)
    {
        foreach ($list as $key => $value) {
            if ($key === $value) {
                continue;
            }

            $keyLength = mb_strlen($key);

            if ($keyLength > 1) {
                $indexKey = mb_substr($key, 0, 2);
                if (!isset(self::$Map['multi'][$indexKey])) {
                    self::$Map['multi'][$indexKey] = [
                        'max' => 0,
                        'min' => 9999,
                        'keys' => [],
                    ];
                }

                if (self::$Map['multi'][$indexKey]['max'] < $keyLength) {
                    self::$Map['multi'][$indexKey]['max'] = $keyLength;
                }

                if (self::$Map['multi'][$indexKey]['min'] > $keyLength) {
                    self::$Map['multi'][$indexKey]['min'] = $keyLength;
                }

                self::$Map['multi'][$indexKey]['keys'][$key] = $value;
                self::$Map['simpleMulti'][$key] = $value;
            } elseif ($keyLength === 1) {
                self::$Map['single'][$key] = $value;
            }
        }
    }
}
