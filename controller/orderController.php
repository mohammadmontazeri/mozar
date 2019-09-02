<?php
include_once "panel/model/order.php";
$class = new Order();

switch ($action){

    case 'basket':
        $user = $class->getUserIdForAddOrder($_SESSION['user']);
        $user_id = $user['id'];
        $orders = $class->showOrdersInBasket($user_id);
        break;

    case 'add':

        if (!isset($_SESSION['user'])){
            $pro_id = $_GET['id'];
            header("location:index.php?c=product&id=$pro_id&q=errorLogin");
        }else{
            $pro_id = $_GET['id'];
            $user = $class->getUserIdForAddOrder($_SESSION['user']);
            $check = $class->checkProInOrder($user['id'],$pro_id);
            if (!empty($check)){
                if ($check['status'] == 0){
                    header("location:index.php?c=product&id=$pro_id&q=errorExist");
                }else{
                    $class->storeOrder($user['id'],$pro_id);
                    header("location:index.php?c=product&id=$pro_id");
                }
            }else{
                $class->storeOrder($user['id'],$pro_id);
                header("location:index.php?c=product&id=$pro_id");
            }
        }

        break;

    case 'delete':
        $order_id = $_GET['id'];
        $class->deleteorder($order_id);
        header("location:index.php?c=order&a=basket");
        break;
    case 'endbuy':
        $user = $class->getUserIdForAddOrder($_SESSION['user']);
        $user_id = $user['id'];
        $orders = $class->showOrdersInBasket($user_id);
        $t = "";
        foreach ($orders as $key=>$value){
            $array[$key] = $value['id'];
            $t = $t .$array[$key]."-";
        }
        $orders = $class->showOrdersInBasket($user_id);
        // Same Code?!
        $class->updateOrderAfterBuy($user_id);
        $class->insertPayment($user_id,$_SESSION['price'],$t);
        unset($_SESSION['price']);
        break;

}


include_once "view/order/$action.php";