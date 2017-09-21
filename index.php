<?php 
include('header.php');

    if(isset( $_POST['login'])){
        function validateFormData($formData){
            $formData = trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
        } 
    

    $formUser = validateFormData($_POST['id']);
    $formPass = validateFormData($_POST['password']);

    include('base.php');
    
    $query = "SELECT id, password FROM user WHERE id = '$formUser'";
        
    $result = mysqli_query($conn, $query);    

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $user = $row['id'];
            $password = $row['password'];
        }
    
    
    if(strcmp($formPass, $password)==0){
        session_start();
        
        $_SESSION['loggedInUser'] = $user;
        
        header("Location: profile.php"); 
    }else{
        $loginError = "<div class='alert alert-danger'>Wrong ID/Password combination. Try again.</div>";
    }
    
    }else{
        $loginError = "<div class='alert alert-danger'>This ID is not registered.</div>";
    }
    mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        
        <h1>Login</h1>
        <br>
        <?php echo $loginError ; ?>
        <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="form-group">
                <label for="login-id">Username</label>
                <input type="text" class="form-control" id="login-id" placeholder="Your BITS E-mail ID" name="id">
            </div>
            <div class="form-group">
                <label for="login-pwd">Password</label>
                <input type="password" class="form-control" id="login-pwd" placeholder="Password" name="password">
                <button type="submit" class="btn btn-default" name="login">Login</button>
            </div>
        </form>
    
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>