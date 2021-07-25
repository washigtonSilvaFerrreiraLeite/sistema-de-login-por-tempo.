<?php
session_start();
include_once('config.php');

if(isset($_SESSION['NAME'])){
	header("Location: dashboard.php");
	exit();
}

if(isset($_POST['submit'])){	
	$errorMsg = "";
	$email = $con->real_escape_string($_POST['email']);
	$password = $con->real_escape_string($_POST['password']);

	if(!empty($email) && !empty($password)){
		
		$query = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
		
		$result = $con->query($query);
		
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$_SESSION['NAME'] = $row['name'];
			$_SESSION['LAST_ACTIVE_TIME'] = time();
			header("Location: dashboard.php");
			exit();
		}else{
			$errorMsg = "Username or Password is Invalid";
		}
	}else{
		$errorMsg = "Username and Password is required";
	}
	
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Contato</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>Formulario de contato.</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
            <?php
			if(isset($errorMsg)){ ?>
            <div class="alert">
           <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
         <?php echo $errorMsg ?>
           </div>
            <?php } ?>
              <span class="padding-bottom--15">Faça login com sua conta.</span>
              <form id="stripe-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="post">
                <div class="field padding-bottom--24">
                  <label for="email">Seu Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                    
                  </div>
                  <input type="password" name="password">
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                </div>
                <div class="reset-pass">
                      <a href="#">Esqueceu sua senha?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>