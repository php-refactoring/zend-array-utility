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

final class ArrayValidatorBench
{
    public function benchStringKeyValidation()
    {
        $test = [
            [[
                'foo' => 'bar',
            ]],
            [[
                'bar',
                'foo' => 'bar',
                'baz',
            ]],
        ];

        ArrayUtils::hasStringKeys($test);
    }

    public function benchIntegerKeyValidation()
    {
        return [
            [[
                'foo',
                'bar,'
            ]],
            [[
                100 => 'foo',
                200 => 'bar'
            ]],
            [[
                -100 => 'foo',
                0    => 'bar',
                100  => 'baz'
            ]],
            [[
                'foo',
                'bar',
                1000 => 'baz'
            ]],
        ];

        ArrayUtils::hasIntegerKeys($test);
    }

    public function benchValidArraysWithNumericKeys()
    {
        $test = [
            [[
                'foo',
                'bar'
            ]],
            [[
                '0' => 'foo',
                '1' => 'bar',
            ]],
            [[
                'bar',
                '1' => 'bar',
                 3  => 'baz'
            ]],
            [[
                -10000   => null,
                '-10000' => null,
            ]],
            [[
                '-00000.00009' => 'foo'
            ]],
            [[
                1 => 0
            ]],
        ];

        ArrayUtils::hasNumericKeys($test);
    }

    public function benchArrayList()
    {
        $test = [
            [[null]],
            [[true]],
            [[false]],
            [[0]],
            [[-0.9999]],
            [['string']],
            [[new \stdClass()]],
            [[
                0 => 'foo',
                1 => 'bar',
                2 => false,
                3 => null,
                4 => [],
                5 => new \stdClass()
            ]]
        ];

        ArrayUtils::isList($test);
    }

    public function benchHashKeyValidation()
    {
        $test = [
            [[
                'foo' => 'bar'
            ]],
            [[
                '15',
                'foo' => 'bar',
                'baz' => ['baz']
            ]],
            [[
                0 => false,
                2 => null
            ]],
            [[
                -100 => 'foo',
                100  => 'bar'
            ]],
            [[
                1 => 0
            ]],
        ];

        ArrayUtils::isHashTable($test);
    }
}
