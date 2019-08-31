<?php
include_once "model/product.php";
$obj = new Product();
if (isset($_GET['q'])) {
    $action = $_GET['q'];
    $res = $obj->showTagForEdit($action);
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="index.php?c=product&a=updatetag&id=<?php echo $action?>">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ویرایش تگ</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="<?php echo $res['name']?>" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="btn">
                                    ویرایش
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>