<?php
session_start();
if (isset($_POST['btn'])){
    if(($_POST['email']=="")||($_POST['name']=="")||($_POST['password']=="")){
        $error = "<label style='color: #f0004c;'>همه موارد  را پر کنید</label>";
    }else{
        $_SESSION['data'] = $_POST;
        header("location:index.php?c=user&a=store");
    }
}

?>
  <section class="reg_part" >

      <div class="top">
          <span>
              ثبت نام در چی گپ
          </span>
      </div>
      <div class="middle">
          <span>
              با ثبت نام در <span class="logo">چی گپ</span> میتونید وبلاگ نویسی حرفه ای  در عین حال ساده رو تجربه کنید
          </span>
      </div>
      <div class="bottom">
          <?
          if (isset($error)){
              echo $error;
          }
          if (isset($_GET['q'])){
              if ($_GET['q'] == "errorRegister"){
                  echo "<label style='color: #f0004c;'> **کاربر با این ایمیل قبلا ثبت نام کرده است</label>";
              }
          }
          ?>
          <form action="" method="post" enctype="multipart/form-data">
              <span class="top_title">
                  مشخصات کاربر
              </span>
              <div class="member_char_box">
                  <div class="user_char">
                      <span>
                          آدرس ایمیل 
                      </span>
                      <input type="email" name="email">
                  </div>
                  <div class="user_char">
                      <span>
                          نام کاربری 
                      </span>
                      <input type="text" name="name">
                  </div>
                  <div class="user_char">
                      <span> 
                          رمز عبور 
                      </span>
                      <input type="password" name="password">
                  </div>

                  <button class="btn_register" name="btn">
                      ثبت نام
                  </button>
                  <span class="login_link">
                      قبلا عضو شده اید؟ <a href="index.php?c=user&a=login">ورود</a>
                  </span>
              
          </div>
          </form>
      </div>
  </section>
