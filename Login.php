<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>


<?php 
    if(isset($_POST['Submit'])){
    $Username=$_POST["Username"];
    $Password=$_POST["Password"];

    
    if(empty($Username)||empty($Password)){
       $_SESSION["ErrorMessage"]= "All Fields must be filled out";
       Redirect_To("Login.php");
    }
    
    else{
        $Found_Account=Login_Attempt($Username,$Password);
        $_SESSION["User_Id"]=$Found_Account["id"];
        $_SESSION["Username"]=$Found_Account["username"];
        if($Found_Account){
            
             $_SESSION["SuccessMessage"]= "Welcome {$_SESSION["Username"]}";
            Redirect_To("dashboard.php");
        }else{
            
            $_SESSION["ErrorMessage"]= "Invalid Username / Password";
            Redirect_To("Login.php");
        }
        
    }
}

?>

<!DOCTYPE>
<html>

    <head>
        <title>Manage Admins</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"> </script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/adminstyles.css">
        
        <style>
            .FieldInfo{
                color: rgb(251,174,44);
                font-family:Bitter,Georgia,"Times New Roman",Times,derif;
                font-size:1.2em;
            }
        
            body{
                background-color: #ffffff;
            }
        
        </style>
        

    </head>
    
<body>
    <div style="height:10px; background-color: #27aae1"></div>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse"> 
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand" href="Blog.php"><img src="images/praveensuthar.png" width="200"; height=45;></a>
                </div>
            <div class="collapse navbar-collapse" id="collapse">
               
                
               
            </div>
            </div>
        
        </nav>
        <div class="Line" style="height:10px; background-color: #27aae1"></div>
    <div class="container-fluid">
        <div class="row">
        
           
            <div class=" col-sm-offset-4 col-sm-4">
               
                <br><br><br><br>
                 <div><?php echo Message();
                           echo SuccessMessage();
                    ?></div>
                <h2>Welcome back!</h2>
                
                <div>
                    <form action="Login.php" method="post" >
                        <fieldset>
                        <div class="form-group">    
                            
                        <label for="Username"><span class="FieldInfo">UserName:</span></label>
                        <div class="input-group input-group-lg ">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope text-primary"></span>
                            </span>
                            <input class="form-control" type="text" id="Username" placeholder="Username" name="Username" >
                        </div>
                        </div>
                            
                        <div class="form-group">    
                        <label for="Password"><span class="FieldInfo">Password:</span></label>
                        <div class="input-group input-group-lg">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock text-primary"></span>
                        </span>
                        <input class="form-control" type="Password" id="Password" placeholder="Password" name="Password" >
                        </div>
                        </div>
                            
                       
                        <br>
                       
                        <input class="btn btn-info btn-block" type="Submit" name="Submit" value="Login">
                        </fieldset>
                        <br>
                    </form>    
                
                </div>
                
              
            </div>
        
        </div>
    
    
    
    
    
    </div>


    
</body>

</html>