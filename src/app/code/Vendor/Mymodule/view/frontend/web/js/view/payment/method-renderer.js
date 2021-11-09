define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'mipago',
                component: 'Vendor_Mymodule/js/view/payment/method-renderer/mipago'
            }
        );
        return Component.extend({});
    }
);
