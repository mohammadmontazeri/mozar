<?php
include_once "panel/model/product.php";
$class = new Product();

switch ($action){

    case 'index':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $class->ShowDetailPro($id);
            $cat = $product['cat_id'];
            $comments = $class->showCommentsForPro($product['id']);
            $tags = $product['tags'];
            $array = explode("-",$tags);
            $count = count($array);
            $t=0;
                for ($i=0;$i<=$count-1;$i++){
                    if ($array[$i]!=""){
                        $relatedpro =$class->relatedpro($id,$array[$i],$cat);
                      // if (!empty($relatedpro)){
                           foreach ($relatedpro as $value){
                               $rel_pro[$t] = $value['id'];
                               $t++;
                           }
                       //}
                    }
                }
                if (!empty($rel_pro)){
                    $ar = array_unique($rel_pro);
                }

        }
        break;
    case 'listpro':

        break;

}

include_once "view/product/$action.php";