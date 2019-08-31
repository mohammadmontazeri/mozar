<?php
require_once 'model/comment.php';
$obj = new Comment();
    switch($action)
    {
        case 'index':
            $comments = $obj->showIndex();
            break;

        case 'add':
            $query = $_GET['q'];
            header("comment/add.php?q=$query");
            break;
        case 'store':
            if ($_GET['q'] != "main"){
                $obj->CommentAddIsParent($_GET['q']);
                $pro_id = $obj->getPostId($_GET['q']);
                $result = $obj->CommentAdd($_POST,$pro_id['pro_id'],$_GET['q']);
                header("location:index.php?c=comment&a=index");
            }else{
                $obj->mainCommentadd($_POST);
                header("location:index.php?c=comment&a=index");
            }
            break;
        case 'delete':
            $result = $obj->isParentDeleteOne($_GET['q']);
            if ($result['is_parent'] == 1){
                $res = $obj->subParentIsParent($result['id']);
                foreach ($res as $re){
                    $obj->deleteSubParent($re['id']);
                }
            }
            $obj->deleteSubParent($_GET['q']);
            header("location:index.php?c=comment&a=index");
            break;

        case 'edit':
            $body = $obj->isParentDeleteOne($_GET['q']);
            break;

        case 'update':
            $obj->updateComment($_POST,$_GET['q']);
            header("location:index.php?c=comment&a=index");
            break;
        case 'status':
            $comment = $obj->isParentDeleteOne($_GET['id']);
            if ($comment['status'] == "0"){
                 $obj->UpdateStatusToOne($_GET['id']);
            }else{
                $obj->UpdateStatusToZero($_GET['id']);
            }
            header("location:index.php?c=comment&a=index");
            break;

    }
require_once "view/comment/$action.php";