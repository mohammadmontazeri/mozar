</div>
<!-- Main Footer -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../ghaleb/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php
                    include_once "model/user.php";
                    $obj = new User();
                    $name = $obj->showLoginUserPanel($_SESSION['login']['email']);
                    echo $name['name'];
                    ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="index.php?c=user&a=index"><i class="fa fa-edit"></i> <span>کاربران</span></a></li>
            <li><a href="#"><i class="fa fa-circle"></i> <span>دسته بندی ها</span></a>
                <ul class="treeview-menu">
                    <li><a href="index.php?c=category&a=index">نمایش دسته بندی ها</a></li>
                </ul>
            </li>
            <li><a href="index.php?c=product&a=index"><i class="fa fa-square"></i> <span>بخش محصولات</span></a></li>
            <li class="treeview">
                <a href="index.php?c=comment&a=index"><i class="fa fa-comment"></i> <span>کامنت ها</span> <i class="fa fa-angle-left"></i></a>
            </li>
            <li class="treeview">
                <a href="index.php?c=order&a=index"><i class="fa fa-circle"></i> <span>سفارشات</span> <i class="fa fa-angle-left"></i></a>
            </li>
            <li class="treeview">
                <a href="index.php?c=order&a=payments"><i class="fa fa-circle"></i> <span>پرداخت ها</span> <i class="fa fa-angle-left"></i></a>
            </li>
            <li><a href="index.php?c=user&a=logout"><i class="fa fa-square"></i> <span>خروج</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>