<?php
require_once 'model/user.php';
$class=new User();
    switch($action)
        {

            case 'register':
             $res=$class->registerAuth($_SESSION['data']['email']);
             if (!empty($res)){
                 session_destroy();
                 header("location:register.php?q=error");
             }else{
                 $result = $class->register($_SESSION['data']);
                 session_destroy();
                 header("location:register.php?m=okInformation");
             }
            break;

        case 'login':
                $res = $class->login($_SESSION['login']);
                if ($res == "OK"){
                    header("location:index.php");
                }elseif ($res == "incorrect pass"){
                    header("location:login.php?error=incorrectpass");
                }elseif ($res == "no register"){
                    header("location:login.php?error=noregister");
                }elseif ($res == "No permission"){
                    header("location:login.php?error=permissionError");
                }
            break;

        case 'logout':
            unset($_SESSION['login']);
            unset($_SESSION['userpanel']);
            header("location:index.php");
            break;

        case 'index':
            $users = $class->showUserIndex();
            break;

        case 'delete':
                $class->deleteUser($_GET['id']);
                header("location:index.php?c=user&a=index");
            break;

        case 'showedit':
            if (isset($_GET['id'])){
                $user = $class->show_user_inf_for_edit($_GET['id']);
            }
            break;
        case 'edit':
                if ($_POST['name']!=""){
                    $class->editUser($_GET['id'],$_POST);
                    header("location:index.php?c=user&a=index");
                }else{
                    header("location:index.php?c=user&a=showedit&id=$_GET[id]&q=errorname");
                }
            break;


        }

        require_once "view/user/$action.php";