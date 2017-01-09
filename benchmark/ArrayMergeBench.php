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

final class ArrayMergeBench
{
    public function benchMergingIntegerAndStringKeys()
    {
        $a = [
            'foo',
            3     => 'bar',
            'baz' => 'baz',
            4     => [
                'a',
                1 => 'b',
                'c',
            ],
        ];

        $b = [
            'baz',
            4 => [
                'd' => 'd',
            ],
        ];

        ArrayUtils::merge($a, $b);
    }

    public function benchMergingIntegerAndStringWithPreservedNumericKeys()
    {
        $a = [
            'foo',
            3     => 'bar',
            'baz' => 'baz',
            4     => [
                'a',
                1 => 'b',
                'c',
            ],
        ];

        $b = [
            'baz',
            4 => [
                'd' => 'd',
            ],
        ];

        ArrayUtils::merge($a, $b, true);
    }

    public function benchRecursiveMerge()
    {
        $a = [
            'foo' => [
                'baz'
            ]
        ];
        $b = [
            'foo' => [
                'baz'
            ]
        ];

        ArrayUtils::merge($a, $b);
    }

    public function benchReplaceStringKeys()
    {
        $a = [
            'foo' => 'bar',
            'bar' => []
        ];
        $b = [
            'foo' => 'baz',
            'bar' => 'bat'
        ];

        ArrayUtils::merge($a, $b);
    }

    public function benchMergeWithNullArray()
    {
        $a = [
            'foo' => null,
            null  => 'rod',
            'cat' => 'bar',
            'god' => 'rad'
        ];
        $b = [
            'foo' => 'baz',
            null  => 'zad',
            'god' => null
        ];

        ArrayUtils::merge($a, $b);
    }

    public function benchMergeReplaceKeys()
    {
        $a = [
            'car' => [
                'boo' => 'foo',
                'doo' => 'moo',
            ],
        ];
        $b = [
            'car' => new \Zend\ArrayUtils\ArrayUtils\MergeReplaceKey([
                'met' => 'bet',
            ]),
            'new' => new \Zend\ArrayUtils\ArrayUtils\MergeReplaceKey([
                'foo' => 'get',
            ]),
        ];

        ArrayUtils::merge($a, $b);
    }

    public function benchRemovingKeys()
    {
        $a = [
            'foo' => 'bar',
            'bar' => 'bat'
        ];
        $b = [
            'foo' => new \Zend\ArrayUtils\ArrayUtils\MergeRemoveKey(),
            'baz' => new \Zend\ArrayUtils\ArrayUtils\MergeRemoveKey(),
        ];

        ArrayUtils::merge($a, $b);
    }
}
