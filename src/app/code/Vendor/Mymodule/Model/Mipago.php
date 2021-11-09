<?php

namespace Vendor\Mymodule\Model;

/**
 * Pay In Store payment method model
 */
class Mipago extends \Magento\Payment\Model\Method\AbstractMethod
{
    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = 'mipago';
}
