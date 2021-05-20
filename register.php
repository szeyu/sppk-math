<?php 
    require_once 'addNewUser.php';
?>

<html>
    <head>
        <title> Daftar Akaun </title>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>

    <body class="register">
        <div class = "containerRegister">
            <br>
            <a href="login.php" style="color: white;"><button type="button" style="float: left; margin-left: 40px;"> Balik </button></a>  <!--back to login button-->
            <p style="color: white;"> . </p>       <!--to make it space down-->
            <p style="color: white;"> . </p>       <!--to make it space down-->

            <h2> Sila isikan borang pendaftaran tersebut </h2>       <!--Instruction-->
            <br><br>

            <form action="register.php" method="POST">

                <?php if (isset($_GET['error'])){ ?>
                    <p class="errorRegister"><?php echo $_GET['error'];?></p>
                <?php } ?>

                <label for="NoIC"> Nombor IC: </label> <br>         <!--ask user to input NoIC-->
                <input type="text" placeholder="04041714****" id = "newNoIC" name="newNoIC" value="" required><br>
                <br>

                <label for="nama"> Nama: </label> <br>     <!--ask user to input Nama-->
                <input type="text" placeholder="Masukkan nama anda" id = "nama" name="nama" value="" required><br>
                <br>

                <label for="NoTel"> Nombor Telefon: </label> <br>     <!--ask user to input NoTel-->
                <input type="text" placeholder="Masukkan nombor telefon anda" id = "NoTel" name="NoTel" value="" required><br>
                <br>

                <label for="KataLaluan"> Kata Laluan: </label> <br>     <!--ask user to input password-->
                <input type="password" placeholder="Masukkan kata lauan anda" id = "KataLaluan" name="KataLaluan" required><br>
                <!-- An element to toggle between password visibility -->
                <input type="checkbox" onclick="showKataLaluan()">Show Password
                <br><br>

                <label for="KataLaluanKesah"> Kesahkan Kata Laluan: </label> <br>     <!--ask user to input password-->
                <input type="password" placeholder="Kesahkan kata lauan anda" id = "KataLaluanKesah" name="KataLaluanKesah" required><br>
                <!-- An element to toggle between password visibility -->
                <input type="checkbox" onclick="showKataLaluanKesah()">Show Password
                <br><br>

                <button type="submit" name="register-button"> Daftar </button>    <!--register button-->
                <button type="reset" value="reset"> semula </button>     <!--reset the value if type wrong -->
                
            
            </form>
            <p style="color: white;"> . </p>   <!--to make it space down-->
        </div>
    </body>

    <script>
        function showKataLaluan() {
            var x = document.getElementById("KataLaluan");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showKataLaluanKesah() {
            var x = document.getElementById("KataLaluanKesah");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</html>