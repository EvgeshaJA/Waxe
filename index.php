<?php
    include('db22.php');
    ob_start();
    session_start();
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
	
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $stmt=$pdo->prepare('SELECT acc0unts.id, acc0unts.pa55w0rd, acc0unts.company_id, acc0unts.contact_name, acc0unts.status, us3rs.module1 FROM acc0unts INNER JOIN us3rs ON us3rs.ID=acc0unts.company_id WHERE acc0unts.us3rname = :username');
		            $stmt->bindValue(':username',$_POST['username']);
                $stmt->execute();
                $tst=$stmt->fetch();
                $passw=$tst['pa55w0rd'];
                
                    
                    if(md5($_POST['password'])==$passw && $tst['status']=="Active") {
                        //$_SESSION['us3rname']=$_POST['username'];
                        $_SESSION['company_id']=$tst['company_id'];
                        $_SESSION['contact_name']=$tst['contact_name'];
                        $_SESSION['account_id']=$tst['id'];
                        
                        $_SESSION['isLogged']=true;
                        if($tst['module1'])
				                  $_SESSION['module1']=true;
                        header('Location: panel.php');
                    } else {
                        $err=true;
                    }
                
            } else {
              //$err=true;
            }
?>


<!DOCTYPE html>
<html lang="et-ee">

<head>
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/libs/fullPage.js-master/dist/fullpage.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title></title>
</head>

<body>

  <div id="fullpage">
    <div class="section">

      <div class="main">

          <h1 class="main__title">welding<br>management<br>software</h1>
          <div class="main-navigation">
            <div class="main-navigation__form">
              <a href="#" class="main-navigation__form-link">Logi sisse</a>
              <div class="navigation-form">
                <form id="loginForm" role="form" action="" method = "post">
                  <p class="errorLogin">Viga! Palun kontrollige e-posti või salasõna</p>
                  <label>E-post</label>
                  <input type="text" name="username" id="username">
                  <label>Salasõna</label>
                  <input type="password" name="password" id="password">
                  <a id="loginButton" href="#">Logi sisse</a>
                </form>
              </div>
            </div>
            <a class="main-navigation__languige" href="index_ru.php">
              <img src="assets/img/ru_flag.png" alt="image">
            </a>
          </div>
    
          <div class="main__logo">
            <img class="main__logo-img" src="assets/img/logo.png" alt="logo">
            <img class="main__logo-img main__logo-img--mobile" src="assets/img/logo-mob.png" alt="logo">
          </div>
      </div>
    </div>
    <div class="section">
      <div class="section-video">
        <div class="video">
          <video controls id="fon" poster="assets/img/waxe_video.png" preload="none">
            <source src="assets/img/waxe_720.mp4" type="video/mp4">
          </video>
          <div class="btn__play">
            <img src="assets/img/play.svg" alt="icon">
          </div>
        </div>
        <div class="word word__1"><img src="assets/img/words/01.svg" alt="image"></div>
        <div class="word word__2"><img src="assets/img/words/02.svg" alt="image"></div>
        <div class="word word__3"><img src="assets/img/words/03.svg" alt="image"></div>
        <div class="word word__4"><img src="assets/img/words/04.svg" alt="image"></div>
        <div class="word word__5"><img src="assets/img/words/05.svg" alt="image"></div>
        <div class="word word__6"><img src="assets/img/words/06.svg" alt="image"></div>
        <div class="word word__7"><img src="assets/img/words/07.svg" alt="image"></div>
        <div class="word word__8"><img src="assets/img/words/08.svg" alt="image"></div>
        <div class="word word__8--2"><img src="assets/img/words/8_2.svg" alt="image"></div>
        <div class="word word__9"><img src="assets/img/words/09.svg" alt="image"></div>
        <div class="word word__10"><img src="assets/img/words/10.svg" alt="image"></div>
        <div class="word word__11"><img src="assets/img/words/11.svg" alt="image"></div>
      </div>
    </div>
    <div class="section">
      <div class="section-footer">
        <div class="section-footer__button">
          <div class="section-footer__btn">
            <a class="section-footer__btn-link" href="https://wkk.ee/waxe" target="_blank">Online koolitus</a>
          </div>
        </div>
        <footer class="footer">
          <div class="footer__contacts">
            <a class="footer__contacts-link" id="mailFooter" href="mailto:info@weldman.ee">info@weldman.ee</a>
            <a class="footer__contacts-link" href="tel:+37256249577">+372 5624 9577</a>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="assets/libs/fullPage.js-master/dist/fullpage.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function(){
      $('#loginButton').on('click',function(){
          $('#loginForm').submit();
      });
    });
  </script>
</body>

</html>