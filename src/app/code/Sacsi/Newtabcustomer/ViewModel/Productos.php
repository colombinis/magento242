<?php

namespace Sacsi\Newtabcustomer\ViewModel;

class Productos implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    public function __construct()
    {
    }

    public function getProductos(string $var = "")
    {

        return $var !="" ? "modificado " . $var : "FALTA VALOR";
    }
}
