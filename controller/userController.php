<?php
include_once "panel/model/user.php";
$class = new User();

switch ($action){

    case 'register':
        break;

    case 'login':
        break;
    case 'store':
        $data = $_SESSION['data'];
        $result = $class->registerAuth($data['email']);
        if (empty($result)){
            $class->register($data);
            header("location:index.php?q=registerOk");
        }else{
            header("location:index.php?c=user&a=register&q=errorRegister");
        }
        unset($_SESSION['data']);
        break;
    case 'checklogin':

        if ((empty($_POST['password']))||(empty($_POST['email']))){
            header("location:index.php?c=user&a=login&q=loginError");
        }else{
                $res = $class->registerAuth($_POST['email']);
            if (empty($res)){
                header("location:index.php?c=user&a=login&q=errorNoReg");
            }else{
                if ($res['password'] == sha1($_POST['password'])){
                    $_SESSION['user'] = $_POST['email'];
                    header("location:index.php?q=loginOk");
                }else{
                    header("location:index.php?c=user&a=login&q=errorinf");
                }
            }
        }
        break;
    case 'logout':
        unset($_SESSION['user']);
        /*$products = $class->showProductInfForDestroySession();
        foreach ($products as $product){
            unset($_SESSION["$product[title]"]);
        }*/
        header("location:index.php?q=logoutOk");
        break;


    case 'panel':

        break;
    case 'updateuser':
        $user = $class->registerAuth($_SESSION['user']);
        if (($_POST['name'] == $user['name'])&&($_POST['password'] == "")){
            header("location:index.php?c=user&a=panel&q=errornochange");
        }
        if ($_POST['name'] == ""){
            header("location:index.php?c=user&a=panel&q=errorname");
        }else{
            $class->editUserFromUserSide($_GET['id'],$_POST);
        }
        header("location:index.php?c=user&a=panel&q=editok");
        break;
}


include_once "view/user/$action.php";