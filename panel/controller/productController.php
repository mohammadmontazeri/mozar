<?php
require_once 'model/product.php';
include_once "upload.php";
$class=new Product();
    switch($action)
        {

        case 'tagindex':
            $tags = $class->tagIndexShow();
            break;
        case 'updatetag':
            if (isset($_GET['id'])){
                $class->updatetag   ($_POST['name'],$_GET['id']);
            }
            header("location:index.php?c=product&a=tagindex");
            break;

        case 'deletetag':
            $class->deletetag($_GET['id']);
            header("location:index.php?c=product&a=tagindex");
            break;

        case 'addtag':
            break;
        case 'storetag':
            $class->storetag($_POST);
            header("location:index.php?c=product&a=tagindex");
            break;
// END TAG PART CONTROLLER
        case 'index':
            //$products = $class->showIndex();
            break;
    case 'add':
        if (isset($_GET['q'])){
            $query = $_GET['q'];
        }
        break;
    case 'store':
        $upload= new Upload();
        $imgurl = $upload->uploadImage($_FILES['image']);
        $class->insertPro($_POST,$imgurl);
        header("location:index.php?c=product&a=index");
        break;
    case 'productDetail':
        $product =  $class->ShowDetailPro($_GET['q']);
        break;

        case 'delete':
               $class->deletePro($_GET['id']);
               header("location:index.php?c=product&a=index");
            break;
            case 'edit':
            $query = $_GET['q'];
            $product = $class->ShowDetailPro($query);
            break;

        case 'update':
            $id = $_GET['id'];
            $data = $_POST;
            $upload= new Upload();
            $imgcheck = $class->ShowDetailPro($id);
            if (empty($_FILES)){
                $imgurl = $upload->uploadImage($_FILES['image']);
            }else{
                $imgurl = $imgcheck['image'];
            }

            //var_dump($imgurl);die;
            $class->updatePro($data,$id,$imgurl);
            header("location:index.php?c=product&a=index");
            break;
        }

        require_once "view/product/$action.php";