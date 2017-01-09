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
use ZendTest\ArrayUtils\TestAsset\Parameters;

final class IteratorToArrayBench
{
    public function benchConvertingArray()
    {
        $array = [
            'foo' => [
                'bar' => [
                    'baz' => [
                        'baz' => 'bat',
                    ],
                ],
            ],
        ];
        ArrayUtils::iteratorToArray($array);
    }

    public function benchConvertingTraversable()
    {
        $array = [
            'foo' => [
                'bar' => [
                    'baz' => [
                        'baz' => 'bat',
                    ],
                ],
            ],
        ];
        $traversable = new \ArrayObject($array); // uses PHP ArrayObject
        ArrayUtils::iteratorToArray($traversable);
    }

    public function benchConvertingTraversableToArray()
    {
        $array = [
            'foo' => [
                'bar' => [
                    'baz' => [
                        'baz' => 'bat',
                    ],
                ],
            ],
        ];

        $traversable = new Parameters($array);
        ArrayUtils::iteratorToArray($traversable);
    }
}
