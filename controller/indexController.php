<?php
include_once "panel/model/product.php";
$class = new Product();

switch ($action){
    case 'search':
        $products = $class->searchPost($_POST['body']);
        break;
    case 'index':
        $newProducts = $class->newproduct();
        $randproducts = $class->randpro();
        $maxviewd = $class->maxview();
        break;
}







require_once "view/index/$action.php";