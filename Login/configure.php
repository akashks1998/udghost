  <?php
  session_start();
  	require 'dbconfig/config.php';
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>Registration Page</title>
  <link rel="stylesheet" href="css/style.css">
  </head>
  <body style="background-color:#bdc3c7">
  		<div id="main-wrapper">
  <?php
    $key=rand();
    echo $_SESSION['email'];
    mail($_SESSION['email'],'Conformation key udghosh',$key,"From:Udghosh'17<info@udghosh.org>");
  ?>
  <center>
    <h2>Conformation key</h2>
    <h3>Conformation key has been sent to your email</h3>
    <img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
  </center>
  <form class="myform" action="register.php"method="post" >
    Key<br>
    <input name="key" type="text" class="inputvalues" placeholder="Type conformation key" required/><br>
    <input name="key_submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
  </form>
  <?php
    if(isset($_POST['key_submit_btn'])){
      if($key==(int)$_POST['key']){
        $query= "insert into fileuploadtable values('$username','$password','$fullname','$email','$state','$college','$mobile','')";
        $query_run = mysqli_query($con,$query);
        if($query_run){
          header('location:homepage.php');
        }
        else{
          echo "Error";
        }
      }else{
        echo "Wrong key";
      }
    }
  ?>
</body>
</html>
