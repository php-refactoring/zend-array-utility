<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zend-array-utility for the canonical source repository
 * @copyright Copyright (c) 2005-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ZendBench\ArrayUtils;

use Zend\ArrayUtils\ArrayUtils;

final class ArrayFilterBench
{
    public function benchNoFilter()
    {
        $array = ['foo' => 'bar', 'fiz' => 'buz'];
        $callback = function ($value) {
            if ($value == 'bar') {
                return false;
            }
            return true;
        };

        ArrayUtils::filter($array, $callback);
    }

    public function benchUseKeyFiltering()
    {
        $array = ['foo' => 'bar', 'fiz' => 'buz'];
        $callback = function ($key) {
            if ($key == 'foo') {
                return false;
            }
            return true;
        };
        $flag = ArrayUtils::ARRAY_FILTER_USE_KEY;

        ArrayUtils::filter($array, $callback, $flag);
    }

    public function benchFilterBoth()
    {
        $array = ['foo' => 'bar', 'fiz' => 'buz'];
        $callback = function ($value, $key) {
            if ($value == 'buz') {
                return false;
            }

            if ($key == 'foo') {
                return false;
            }

            return true;
        };
        $flag = ArrayUtils::ARRAY_FILTER_USE_BOTH;

        ArrayUtils::filter($array, $callback, $flag);
    }
}
