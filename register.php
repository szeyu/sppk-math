<html>
    <head>
        <title> Daftar Akaun </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    </head>

    <body class="register">
        <div style="background-color: rgba(154, 209, 191, 0.863);">
        <br>
        <a href="login.php" style="color: white;"><button type="button" style="float: left;"> Balik </button></a>  <!--back to login button-->
        <p style="color: rgba(154, 209, 191, 0.863);"> . </p>       <!--to make it space down-->
        <p style="color: rgba(154, 209, 191, 0.863);"> . </p>       <!--to make it space down-->

        <h2> Sila isikan borang pendaftaran tersebut </h2>       <!--Instruction-->
        <br>
        <br>
        
        <div class="container">
            <?php foreach($errors as $error):?>
                <li class="alert-tag"><?php echo $error; ?></li>
            <?php endforeach;?>
        </div>

        <form action="register.php" method="POST">
            
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
            <br>
            <label for="KataLaluanKesah"> Kesahkan Kata Laluan: </label> <br>     <!--ask user to input password-->
            <input type="password" placeholder="Kesahkan kata lauan anda" id = "KataLaluanKesah" name="KataLaluanKesah" required><br>
            <br>
            <button type="submit" name="register-button"> Daftar </button>    <!--register button-->
            <button type="reset" value="reset"> semula </button>     <!--reset the value if type wrong -->
            
        
        </form>
        <p style="color: rgba(154, 209, 191, 0.863);"> . </p>   <!--to make it space down-->
        </div>
    </body>
</html>