<?php

declare(strict_types=1);

namespace Vendor\Mymodule\Plugin\Catalog\Block\Product\ProductList;


class Toolbar
{

    /**
     * Set collection to pager
     *
     * @param \Magento\Framework\Data\Collection $collection
     * @return \Magento\Catalog\Block\Product\ProductList\Toolbar
     */
    public function afterSetCollection($subject,  $result)
    {

        $_subject = $subject;
        $_result = $result;

        $curOrder = $result->getCurrentOrder() ?? '';

        if ($curOrder == 'position') {
            $result->getCollection()->setOrder('price', $result->getCurrentDirection());
            $result->getCollection()->addAttributeToSort( 'seba_color',$result->getCurrentDirection());
            // $result->getCollection()->setOrder('stock_sucursal', 'ASC');
            // $result->getCollection()->setOrder('name_category', $result->getCurrentDirection());

        }

        if ($curOrder == 'price') {
            $result->getCollection()->setOrder('seba_size', $result->getCurrentDirection());
            //$result->getCollection()->setOrder('stock_sucursal', 'ASC');

        }

        return $result;
    }
}
