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

//Cargar la orden especifica
function loadOrderById($orderId = 1){
    global $objectManager;

    $order = $objectManager->create('\Magento\Sales\Model\Order')->load($orderId);

    // echo var_dump($order->getData());
    return $order;
}

//Cargar la orden desde repositorio
function loadOrderRepositoryById($orderId = 1){
    global $objectManager;

    $orderRepository = $objectManager->create('\Magento\Sales\Api\OrderRepositoryInterface');
    $order = $orderRepository->get($orderId);

    // echo var_dump($order->getData());
    return $order;
}

function debugObject($obj){
    echo "class: " . get_class($obj);
    echo "<hr>";
    // echo "methods: " . print_r(get_class_methods(get_class($obj)),true);
}

$orderModel = loadOrderById();
debugObject($orderModel);
$orderRepository = loadOrderRepositoryById();
debugObject($orderRepository);
// $m1 = get_class_methods(get_class($orderModel));
// $m2 = get_class_methods(get_class($orderRepository));
//print_r(array_diff($m1,$m2),true);
