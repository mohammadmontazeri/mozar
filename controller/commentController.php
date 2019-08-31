<?php
include_once 'panel/model/comment.php';
$obj = new Comment();
//var_dump($_GET['id']);die;
   switch ($action){
       case 'add':
           $pro_id = $_GET['id'];
           $user = $obj->registerAuth($_SESSION['user']);
           $user_id = $user['id'];
           $obj->commentAddFromUser($_POST['body'],$user_id,$pro_id);
           header("location:index.php?c=product&id=$pro_id");
           break;
       case 'reply':

           break;

       case 'addreply':
            $pro_id = $_GET['pro_id'];
            $parent = $_GET['parent'];
            $user = $obj->registerAuth($_SESSION['user']);
            $user_id = $user['id'];
            $obj->commentAddReplyFromUser($_POST['body'],$user_id,$pro_id,$parent);
            $obj->CommentAddIsParent($parent);
           header("location:index.php?c=product&id=$pro_id&insertCmntOk");
           break;

   }
require_once "view/comment/$action.php";
