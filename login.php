<?php 
    require_once 'checkPassword.php';

    // set the session variable to ""
    $_SESSION['NoIC'] = "";
    $_SESSION['peranan'] = "";
    $_SESSION['NoTel'] = "";
    $_SESSION['nama'] = "";

?>

<!DOCTYPE html>
    
    <head>
        <title> Login Screen </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>
    <?php 
        if (isset($_GET['error'])){
            // do nothing
        }else{
            echo"
            <style>
                .containerLogin {
                    animation-name:fadeIn;
                    animation-duration:4s;
                    
                }
            </style>
            ";
        }
    
    ?>




    <body class="login">

        <div class = "containerLogin">
            <p style="color: white;"> . </p>
            <!--
            <h2 style="background-color: rgba(154, 209, 191, 0.863);"> Selamat Datang Ke </h2>                        
            <h2 style="background-color: rgba(154, 209, 191, 0.863);"> Sistem Pengurusan Penilaian Kuiz </h2>
            -->

            <h2> Ilmu Di Hujung Jari </h2>  <!--some welcome messages-->                  
            <h2> Matematik Tingkatan 4(DLP) </h2>

            <!--
            <div class="containerError">
                <?php //foreach($errors as $error):?>
                    <li class="alert-tag"><?php //echo $error; ?></li>
                <?php //endforeach;?>
            </div>
            -->
            

            <form action="login.php" method="POST">
                <div>
                    <img src="Image/user icon.png">        <!--user icon-->
                </div>
                <br>
                 
                <?php if (isset($_GET['error'])){ ?>
                    <p class="errorLogin"><?php echo $_GET['error'];?></p>
                <?php } ?>
                
                <div>
                <label for="NoIC"> Nombor IC: </label> <br>         <!--ask user to input NoIC-->
                <input type="text" placeholder="04041714****" id = "NoIC" name="NoIC" value=""><br>
                <br>
                <label for="KataLaluan"> Kata Laluan: </label> <br>     <!--ask user to input password-->
                <input type="password" placeholder="Masukkan kata lauan anda" id = "KataLaluan" name="KataLaluan"><br>
                <!-- An element to toggle between password visibility -->
                <input type="checkbox" onclick="showPassword()">Show Password
                <br>
                <br>
                <button type="submit" name="login-button"> Log Masuk </button>    <!--login button-->
                <button type="reset" value="reset"> semula </button>     <!--reset the value if type wrong -->
                </div>
                
                <div>
                    <p> Pengguna Baharu? <a href="register.php">Daftar di sini</a> </p>   <!--if new user, use the link to register-->
                </div>
                <p style="color: rgba(154, 209, 191, 0.863);"> . </p>
            </form>
        </div>

        <script>
            function showPassword() {
                var x = document.getElementById("KataLaluan");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

        
    </body>

</html>