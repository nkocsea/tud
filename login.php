<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preload" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></noscript>
    <!-- Bootstrap CSS -->
    <link rel="preload" href="/bootstrap_4/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/bootstrap_4/css/bootstrap.min.css"></noscript>
    
    <link rel="icon" href="/image/logo/favicon.ico" type="image/ico">

    <title>Login</title>
    <meta name="keywords" content="pphim,Thiên đường phim,movie paradise,phim mới,phim nhanh,phim hay,paradise phim">
    <link rel="preload" href="/css/login.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="css/login.css"></noscript>
    <script  src="/js/jquery-1.11.1.min.js"></script>
    <script  src="/ajax/login.js"></script>    
  </head>

  <body>
    <?php
      include('include.php');
      
    ?>

    <div class="container-fluid login">
        <div class="col-md-4 offset-md-4 body_login">
            <center><h2>Tool Update Login</h2></center>
            <form id = "formlogin" method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control" id="femail" name="femail" aria-describedby="emailHelp" placeholder="Username" autofocus="true">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="fpass" name="fpass" placeholder="Password">
                </div>
                <div class="form-group">
                    <center><button type="submit" class="btn btn-sm btn-outline-light btn-lg btn-block">Đăng Nhập</button></center>
                </div>
                <!-- <div class="form-group">
                    <center><a href="/" role="button" class="btn btn-sm btn-outline-light btn-lg btn-block">Trang Chủ</a></center>
                </div> -->
                <div class="form-group">
                    <center><a <?php echo 'href="'.$domain.':90/control.php"'; ?> role="button" class="btn btn-sm btn-outline-light btn-lg btn-block">Control</a></center>
                </div>                
            </form>
            <center><i id="status" class="status"></i></center>
        </div>
    </div>
   

    <script async src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script async src="/bootstrap_4/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
  </body>
</html>