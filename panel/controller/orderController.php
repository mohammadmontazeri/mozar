<?php
require_once 'model/order.php';
$class=new Order();
    switch($action)
        {
        case 'index':

            break;
        case 'delete':
            $class->deleteorder($_GET['id']);
            header("location:index.php?c=order&a=index");
            break;

        case 'edit':
            $order = $class->showOrderForEdit($_GET['id']);
            $id = $_GET['id'];
            break;

        case 'update':
            if ($_POST['number'] == ""){
                header("location:index.php?c=order&a=edit&q=error");
            }else{
                $id = $_GET['id'];
                $number = $_POST['number'];
                $class->updateorder($number,$id);
                header("location:index.php?c=order&a=index");
            }
            break;

        case 'payments':
            break;






        }


require_once "view/order/$action.php";