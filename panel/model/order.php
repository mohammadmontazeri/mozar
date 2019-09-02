<?php
class Order {
    protected $pdo;
    public function __construct()
    {
        $this->db();
    }

    public function db()
    {
        $this->pdo=new PDO("mysql:host=localhost;dbname=alphashop","root","root");
        $this->pdo->query('SET CHARACTER SET utf8');
    }
    public function numOfRec()
    {
        $res = $this->pdo->query("SELECT * FROM orders");
        return $res;
    }
    public function showIndex($first,$secend)
    {
        $result = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC LIMIT $first,$secend ");
        return $result;
    }
    public function showpronamefororder($id)
    {
        $result = $this->pdo->query("SELECT * FROM products WHERE id='$id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function showusernamefororder($id)
    {
        $result = $this->pdo->query("SELECT * FROM users WHERE id='$id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function deleteorder($id)
    {
        $this->pdo->query("UPDATE orders SET basket = '0',status = '2' WHERE id = '$id'");
    }
    public function updateorder($number,$id)
    {
        $this->pdo->query("UPDATE orders SET number = '$number' WHERE id = '$id'");
    }
     public function showOrderForEdit($id)
     {
         $result = $this->pdo->query("SELECT * FROM orders WHERE id='$id'");
         $res = $result->fetch(PDO::FETCH_ASSOC);
         return $res;
     }
    public function getUserIdForAddOrder($data)
    {
        $result = $this->pdo->query("SELECT * FROM users WHERE email='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function checkProInOrder($user_id,$pro_id)
    {
        $result = $this->pdo->query("SELECT * FROM orders WHERE user_id='$user_id' AND pro_id='$pro_id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function storeOrder($user_id,$pro_id)
    {
        $time = time();
        $this->pdo->query("INSERT INTO orders (user_id,basket,pro_id,created_at) VALUES ('$user_id','1','$pro_id','$time')");
    }

    public function showOrdersInBasket($data)
    {
        $result = $this->pdo->query("SELECT * FROM orders WHERE user_id='$data' AND basket ='1'");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateOrderAfterBuy($id)
    {
        $this->pdo->query("UPDATE orders SET  basket = '0', status = '1' WHERE basket ='1' AND user_id = '$id' ");
    }
    public function insertPayment($user_id,$price,$order_id)
    {
        $time = time();
        $this->pdo->query("INSERT INTO payments (user_id,price,order_id,created_at) VALUES ('$user_id','$price','$order_id','$time')");
    }
    public function numOfRecPayment()
    {
        $res = $this->pdo->query("SELECT * FROM payments");
        return $res;
    }
    public function showIndexPaments($first,$secend)
    {
        $result = $this->pdo->query("SELECT * FROM payments ORDER BY id DESC LIMIT $first,$secend ");
        return $result;
    }
    public function getOrderFromOrderId($id)
    {
        $result = $this->pdo->query("SELECT * FROM orders WHERE id=$id");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getProductFromProId($pro_id)
    {
        $result = $this->pdo->query("SELECT * FROM products WHERE id=$pro_id");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function insertPro($data , $imgurl)
    {
       // echo $data['price']."/".$imgurl;die;
        $time = time();
        $this->pdo->query("INSERT INTO products (title,image,cat_id,tags,detail,price,created_at) VALUES ('$data[title]','$imgurl','$data[cat_id]','$data[tags]','$data[detail]','$data[price]','$time') ");
    }
    public function ShowDetailPro($id)
    {
        $result = $this->pdo->query("SELECT * FROM products WHERE id = '$id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function deletePro($id)
    {
        $this->pdo->query("DELETE FROM products WHERE id='$id' ");
    }

    public function updatePro($data , $id ,$imgurl)
    {
        $this->pdo->query("UPDATE products SET title='$data[title]',cat_id='$data[cat_id]',detail='$data[detail]',price='$data[price]',tags='$data[tags]',status='$data[status]',image='$imgurl' WHERE id='$id' ");
    }
// User Model

    public function deleteOrderPanel($id)
    {
        $this->pdo->query("DELETE FROM orders WHERE id='$id' ");
    }
    public function newproduct()
    {
        $res = $this->pdo->query("SELECT * FROM products ORDER BY id DESC ");
        return $res ;
    }
    public function maxview()
    {
        $res = $this->pdo->query("SELECT * FROM products ORDER BY viewed DESC  LIMIT 4");
        return $res ;
    }

    public function randpro()
    {
        $res = $this->pdo->query("SELECT * FROM products ORDER BY RAND() LIMIT 4 ");
        return $res ;
    }
    public function showCommentsForPro($id)
    {
        $res = $this->pdo->query("SELECT * FROM comments WHERE pro_id = '$id' ");
        return $res;
    }

    public function showproforcat($first,$secend,$cat_id)
    {
        $result = $this->pdo->query("SELECT * FROM products WHERE cat_id = '$cat_id' ORDER BY id DESC LIMIT $first,$secend  ");
        return $result;
    }
    public function relatedpro($tags , $id)
    {
        //$tags = "موبایل";
        $result = $this->pdo->query("SELECT * FROM products WHERE tags LIKE '%$tags%' AND id !='$id' ");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }




    public function parentId($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE parent='$data'");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function isParentOne($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE name='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function allIsParent($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE parent='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;

    }

    public function deleteIsParentOne($data)
    {
        $this->pdo->query("DELETE FROM categories WHERE id='$data' ");
    }

    public function allIsParentOneadd($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE name='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;

    }

    public function updateIsParent($data)
    {
        $this->pdo->query("UPDATE categories SET is_parent = '1' WHERE id = '$data'");
    }

    public function insert($data,$parent)
    {
         $time = time();
         $this->pdo->query("INSERT INTO categories (name,parent,is_parent,created_at) VALUES ('$data[name]','$parent','0','$time')");
    }

    public function mainCat($data)
    {
        $time = time();
        $this->pdo->query("INSERT INTO categories (name,created_at) VALUES ('$data[name]','$time')");
    }


    public function showEdit($data)
    {
        $result = $this->pdo->query("SELECT * FROM categories WHERE id='$data'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;

    }
    public function updateCat($name,$id)
    {
        $this->pdo->query("UPDATE categories SET name = '$name' WHERE id = '$id'");
    }
    /// End AdminPanel Queries

}

?>
