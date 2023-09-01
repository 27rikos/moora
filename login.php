<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="../img/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/log_in.css">
</head>

<body>
    <div class="card shadow">
        <div class="form ms-3 mt-4 mb-3 me-3">
            <h4 class="text-center fw-bold">LOGIN</h4>
            <form action="" method="post">
                <div class="row">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user fa-lg"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="addon-wrapping" name="user">
                    </div>
                </div>
                <div class=" mt-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-key fa-lg"></i></span>
                        <input type="text" class="form-control" placeholder="Password" aria-label="Password" name="pass"
                            aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class=" text-center fw-bold d-grid gap-2">
                    <button class="btn btn-success mt-3 " type="submit" name="log">LOG IN</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    session_start();
    include("koneksi.php");
    if(isset($_POST['log'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];

        $sql=mysqli_query($conn,"select * from admin where username='$user' and password='$pass'");
        $data=mysqli_num_rows($sql);
        if($data==1){
            $_SESSION['username']=$user;
            header("location:index.php");
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Username/Password Salah")';  
            echo '</script>';  
        }
    } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>