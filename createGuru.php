<!--remember include php file here-->
<?php 
    
?>

<!DOCTYPE html>
    <head>
        <title> Create Quiz </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1 style="margin-left: 5.5%;"> Sediakan Kuiz </h1>
        <div class="createGuru">
            
            <hr>
            <br>
            <div class="createGuruContainer">
                <form action="createGuru.php" method ="POST">
                    <br>
                    <div class="tajukBox">
                        <label for="tajuk"> Tajuk :</label>
                        <input type="text" placeholder="Tajuk" id="tajuk" name="tajuk">
                    <div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <label for="soalan"> Soalan 1 :</label>
                    <input type="text" placeholder="Soalan 1" id="s0001" name="s0001"><br>
                    <br>
                    <label for="jawapan"> Jawapan :</label>
                    <input type="text" placeholder="Jawapan Soalan 1" id="jawapan" name="jawapan"><br>
                    <br>
                    <label for="tahap"> Tahap :</label>
                    <input type="text" placeholder="Tahap Soalan 1" id="tahap" name="tahap"><br>
                    <br>
                    <div class="pilihanBox">
                        <label for="pilihanA"> pilihan A :</label>
                        <input type="text" placeholder="pilihan A Soalan1" id="pilihanASoalan1" name="pilihanASoalan1">
                        <label for="pilihanB"> pilihan B :</label>
                        <input type="text" placeholder="pilihan B Soalan1" id="pilihanBSoalan1" name="pilihanBSoalan1">
                        <label for="pilihanC"> pilihan C :</label>
                        <input type="text" placeholder="pilihan C Soalan1" id="pilihanCSoalan1" name="pilihanCSoalan1">
                        <label for="pilihanD"> pilihan D :</label>
                        <input type="text" placeholder="pilihan D Soalan1" id="pilihanDSoalan1" name="pilihanDSoalan1"><br>
                    </div>
                    <br>
                    <button name="add-question-button"> Tambah (+) </button><br>
                    <br>
                    <br>
                    <br>
                    <button type="submit" name="register-quiz-button"> Muat Naik </button>
                    <p style="color: white;">.</P>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>