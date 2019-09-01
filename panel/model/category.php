<?php
class Category {
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
    public function showIndex()
    {
        $res = $this->pdo->query("SELECT * FROM categories");
        return $res;
    }
    public function ShowCatForProAdd()
    {
        $res = $this->pdo->query("SELECT * FROM categories WHERE is_parent ='0'");
        return $res;
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
    public function zeroIsParent($id)
    {
        $this->pdo->query("UPDATE categories SET is_parent = '0' WHERE id = '$id'");
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
    public function newproduct()
    {
        $res = $this->pdo->query("SELECT * FROM products ORDER BY id DESC ");
        return $res ;
    }
    public function getNumberOfProInBasket($user)
    {
        $res = $this->pdo->query("SELECT * FROM orders WHERE user_id='$user' AND basket='1' ");
        return $res ;
    }
    public function getUserIdForNumberOfBasket($email)
    {
        $result = $this->pdo->query("SELECT * FROM users WHERE email='$email'");
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }


}

?>
