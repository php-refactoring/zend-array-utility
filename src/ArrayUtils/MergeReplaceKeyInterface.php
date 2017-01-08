<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zend-array-utility for the canonical source repository
 * @copyright Copyright (c) 2005-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\ArrayUtils\ArrayUtils;

/**
 * Marker interface: can be used to replace keys completely in {@see ArrayUtils::merge()} operations
 */
interface MergeReplaceKeyInterface
{
    /**
     * @return mixed
     */
    public function getData();
}
