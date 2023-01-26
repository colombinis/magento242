<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '5G');
error_reporting(E_ALL);

use Magento\Framework\App\Bootstrap;
require dirname(__FILE__).'/../../app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
//$objectManager = $bootstrap->getObjectManager();
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');


//Cargar la orden desde repositorio
function loadOrderRepositoryById($orderId = 1){
    global $objectManager;

    $orderRepository = $objectManager->create('\Magento\Sales\Api\OrderRepositoryInterface');
    $order = $orderRepository->get($orderId);

    // echo var_dump($order->getData());
    return $order;
}

function saveAddress(){
    global $objectManager;

    $addressDataFactory = $objectManager->create('\Magento\Customer\Api\Data\AddressInterfaceFactory');
    $dataObjectHelper = $objectManager->create('\Magento\Framework\Api\DataObjectHelper');
    $addressRepository = $objectManager->create('\Magento\Customer\Api\AddressRepositoryInterface');

    $customerId = 2;
    $addressId = 2;

    $addressData = [
        "custom_seba_2" => "666 custom",
        "custom_seba" => "6667770CUSTOM",
        "vat_id" => "",
        "fax" => "",
        "telephone" => "12345789",
        "postcode" => "2001",
        "city" => "rosario",
        "region" => [
            "region" => "sta fe",
            "region_id" => "",
        ],
        "region_id" => "",
        "country_id" => "AR",
        "street" => [ "casamia"],
        "company" => "",
        "suffix" => "",
        "lastname" => "colo",
        "middlename" => "",
        "firstname" => "seba",
        "prefix" => "predeterminada"
    ];
    $addressToSave = $addressDataFactory->create();
    $dataObjectHelper->populateWithArray(
        $addressToSave,
        $addressData,
        \Magento\Customer\Api\Data\AddressInterface::class
    );
    $addressToSave->setCustomerId($customerId);

    $addressToSave->setIsDefaultBilling(false);
    $addressToSave->setIsDefaultShipping(false);

    if ($addressId) {
        $addressToSave->setId($addressId);
    } else {
        $addressToSave->setId(null);
    }

    $savedAddress = $addressRepository->save($addressToSave);
    $addressId = $savedAddress->getId();

}

function showAddress(){
    global $objectManager;

    $addressDataFactory = $objectManager->create('\\Magento\Customer\Api\Data\AddressInterfaceFactory');
    $dataObjectHelper = $objectManager->create('\Magento\Framework\Api\DataObjectHelper');
    $addressRepository = $objectManager->create('\Magento\Customer\Api\AddressRepositoryInterface');

    $customerId = 2;
    $addressId = 2;

    //$address = $addressDataFactory->create();
    $address = $addressRepository->getById($addressId);
    echo var_dump( $address->__toArray() );

}



//saveAddress();
showAddress();

