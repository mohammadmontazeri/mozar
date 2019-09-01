<?php
class Product {
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
        $res = $this->pdo->query("SELECT * FROM products");
        return $res;
    }
    public function numOfRecListPro($cat_id)
    {
        $res = $this->pdo->query("SELECT * FROM products WHERE cat_id=$cat_id");
        return $res;
    }
    public function showIndex($first,$secend)
    {
        $result = $this->pdo->query("SELECT * FROM products ORDER BY id DESC LIMIT $first,$secend");
        return $result;
    }
    public function tagIndexShow()
    {
        $result = $this->pdo->query("SELECT * FROM tags");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showTagForEdit($id)
    {
        $result = $this->pdo->query("SELECT * FROM tags WHERE id='$id'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function updatetag($name,$id)
    {
        $this->pdo->query("UPDATE tags SET name = '$name' WHERE id = '$id'");
    }
    public function deletetag($id)
    {
        $this->pdo->query("DELETE FROM tags WHERE id = '$id'");
    }

    public function storetag($data)
    {
        $time = time();
        $this->pdo->query("INSERT INTO tags (name,created_at) VALUES ('$data[name]','$time')");
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
        //$result = $res->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function showproforcat($first,$secend,$cat_id)
    {
        $result = $this->pdo->query("SELECT * FROM products WHERE cat_id = '$cat_id' ORDER BY id DESC LIMIT $first,$secend  ");
        return $result;
    }
    public function relatedpro($id,$tag,$cat)
    {
        //$tags = "موبایل";
        $result = $this->pdo->query("SELECT * FROM products WHERE  id !='$id' AND cat_id = '$cat' AND tags LIKE '%$tag%' ");
        //$res = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateorder($number,$id)
    {
        $this->pdo->query("UPDATE orders SET number = '$number' WHERE id = '$id'");
    }
    public function updateViewProduct($viewed,$id)
    {
        $this->pdo->query("UPDATE products SET viewed = '$viewed' WHERE id = '$id'");
    }

    public function searchPost($data)
    {
        $result = $this->pdo->query("SELECT * FROM products WHERE title LIKE '%$data%'");
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
    public function showProInBasket($id)
    {
        $res = $this->pdo->query("SELECT * FROM products WHERE id = '$id' ");
        $result = $res->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>
