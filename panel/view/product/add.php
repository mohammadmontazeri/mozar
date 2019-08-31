<?php
include_once "model/category.php";
include_once "model/product.php";
$class = new Category();
$obj = new Product();
$tags = $obj->tagIndexShow();
$categories =$class->ShowCatForProAdd();
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن محصول جدید</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="index.php?c=product&a=store" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">عنوان محصول</label>
                <input type="text" class="form-control" name="title"   placeholder="عنوان محصول خود را وارد کنید" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">قیمت</label>
                <input type="text" class="form-control" name="price" placeholder="قیمت را وارد کنید" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">جزییات محصول</label>
                <textarea class="form-control" id="editor1" name="detail" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">تگ ها</label>
                <input type="text" class="form-control" name="tags"   placeholder="تگ های مورد نظرتان را به شکل مقابل وارد کنید -->  تگ ۱ - تگ ۲ - ..." required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">دسته بندی مربوطه</label>
                <select name="cat_id" required>
                    <?
                    foreach ($categories as $category) {
                        ?>
                        <option value="<? echo $category['id']?>"> <? echo $category['name']?> </option>
                        <?
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="exampleInputFile">تصویر شاخص</label>
                <input type="file" id="exampleInputFile" name="image" required>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">افزودن</button>
        </div>
    </form>
</div>
