<?php

namespace Sacsi\Newtabcustomer\Controller\Newtab;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;

class Produtos implements HttpGetActionInterface
{

    /**
     * @var \Magento\Framework\View\Result\JsonFactory
     */
    protected $resultJsonFactory;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultJsonFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        $resultJson->setData([
            'status'  => "ok",
            'message' => "form submitted correctly"
        ]);
        return $resultJson;
    }
}
