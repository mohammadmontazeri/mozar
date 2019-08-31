<?php
include_once "model/category.php";
include_once "model/product.php";
include_once "functions.php";
$class = new Category();
$obj = new Product();
$tags = $obj->tagIndexShow();
$categories =$class->ShowCatForProAdd();
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">ویرایش محصول </h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="index.php?c=product&a=update&id=<? echo $product['id']?>" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1"> ویرایش عنوان</label>
                <input type="text" class="form-control" name="title"   value="<?php echo $product['title']  ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> ویرایش قیمت</label>
                <input type="text" class="form-control" name="price" value="<?php echo $product['price']?>"  required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ویرایش جزییات</label>
                <textarea class="form-control" id="editor1" name="detail" required><?php echo $product['detail']?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ویرایش تگ ها</label>
                <input type="text" class="form-control" name="tags"   value="<? echo $product['tags']?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ویرایش دسته بندی</label>
                <select name="cat_id" required>
                    <?
                    foreach ($categories as $category) {
                        ?>
                        <option value="<? echo $category['id']?>" <? if ($category['id'] == $product['cat_id']) echo "selected";?> > <? echo $category['name']?> </option>
                        <?
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="exampleInputPassword1">وضعیت</label>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="defaultUnchecked" name="status" value="0"  <? if ($product['status'] == "0") echo "checked"?>>
                    <label class="custom-control-label" for="defaultUnchecked">غیر فعال</label>
                </div>

                <!-- Default checked -->
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="defaultChecked" name="status" value="1"  <? if ($product['status'] == "1") echo "checked"?>>
                    <label class="custom-control-label" for="defaultChecked">فعال</label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="exampleInputFile">ویرایش تصویر</label>
                <input type="file" id="exampleInputFile" name="image" >
                <img src="<?php echo upload_img_url($product['image']) ?>" alt="ندارد" style="width: 75px">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">ویرایش</button>
        </div>
    </form>
</div>
