<?php
if (isset($_GET))
$post_id = $_GET['pId'];
$parent = $_GET['pnt'];
?>
<div class="type_cmnt" style="width: 50%">
    <form method="post" action="index.php?c=comment&a=addreply&pro_id=<?php echo $post_id ?>&parent=<?php echo $parent ?>" enctype="multipart/form-data">
                <div class="typing_part">
                    <input type="text" placeholder="در مورد این پست دیدگاهی داری..." name="body">
                    <button class="btn_comment" name="btn">
                             ارسال دیدگاه
                     </button>
                </div>
    </form>
</div>

