<?php
?>

<form method="post" action="index.php?c=order&a=update&id=<?php echo $id; ?>">
    <?php
        if (isset($_GET['q'])){
            if ($_GET['q']=="error"){
                echo "<label style='color: #f0004c;'>تعداد را وارد کنید</label>";
            }
        }
    ?>
    <div class="form-group">
        <label for="exampleInputEmail1">ویرایش تعداد</label>
        <input type="text" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $order['number'];?>">
    </div>
    <button type="submit" class="btn btn-primary" name="btn">ویرایش</button>
</form>
