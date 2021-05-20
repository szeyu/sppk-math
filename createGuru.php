<?php
    session_start();

    if ($_SESSION['NoIC'] == ""){
        header('Location: ./login.php');       // why you break inside
    } 
?>

<script>
    // declare local variable
    var noSoalanCounter = 1;
</script>

<!DOCTYPE html>
    <head>
        <title> Create Quiz </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="32x32" href="Image/favicon.ico">
    </head>

    <!--Banner-->
    <div class="banner">
        <div style="background-color:  #dadede;">
            <p style="color: #dadede;">.</p>
            <h1 style="background-color:  #dadede;"> Ilmu Di Hujung Jari </h1>
            <h2 style="background-color:  #dadede;"> Matematik Tingkatan 4 (DLP) </h2>
            <p style="color: #dadede;">.</p>
        </div>
    </div>

    <!--Top navigation bar-->
    <div id="topnav" class="topnav">
        <a class="active-button" onclick="homeGuru()">Laman Utama</a>
        <a class="active" onclick="createGuru()">Sedia Kuiz</a>     
        <a class="active-button" onclick="collectionGuru()">Koleksi Kuiz</a>
        <a class="active-button" onclick="checkGuru()">Pantau Prestasi Murid</a>
        <!--log out button-->
        <div class="logOut">
            <a href="login.php" onclick="return confirm('Log Keluar?')"> Log Keluar </a>   
        </div> 
        <!-- font size button -->
        <button id="increase-btn" class="increase-btn" onclick="increaseFontSize();"> + </button>
        <button id="decrease-btn" class="decrease-btn" onclick="decreaseFontSize();"> - </button>
    </div>

    <script src="functionGuru.js"></script>
    
    <!-- dark mode js library -->
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
    <script>
        function addDarkmodeWidget() {
            new Darkmode().showWidget();
        }
        window.addEventListener('load', addDarkmodeWidget);
    </script>

    <body onload="reloadToCurrentZoom()">
        <h1 style="margin-left: 5.5%;"> Sediakan Kuiz </h1>
        <div class="createGuru">
            <hr>
            <br>
            <div class="createGuruContainer">
                <form id="soalanForm" action="registerKuiz.php" method ="POST" onsubmit="return confirm('Adakah anda pasti hendak muat naik kuiz yang anda buat?');">
                    <br>
                    <div class="tajukBox">
                        <label for="subTopik"> Sub Topik :</label>
                        <input type="text" placeholder="sub topik" name="subTopik" id="subTopik" list="subTopiks" spellcheck="false" required>
                        <datalist id="subTopiks">
                            <option value="1.1"></option>
                            <option value="2.1"></option>
                            <option value="3.1"></option>
                            <option value="3.2"></option>
                            <option value="4.1"></option>
                            <option value="4.2"></option>
                            <option value="4.3"></option>
                            <option value="5.1"></option>
                            <option value="6.1"></option>
                            <option value="7.1"></option>
                            <option value="7.2"></option>
                            <option value="8.1"></option>
                            <option value="8.2"></option>
                            <option value="9.1"></option>
                            <option value="9.2"></option>
                            <option value="9.3"></option>
                            <option value="9.4"></option>
                            <option value="10.1"></option>
                            <option value="revision"></option>
                        </datalist>
                        <br>
                        <label for="tajuk"> Tajuk :</label>
                        <input type="text" placeholder="Tajuk" name="tajuk" id="tajuk" list="tajuks" spellcheck="false" required>
                        <datalist id="tajuks">
                            <option value="Quadratic Function and Equations"></option>
                            <option value="Number Base"></option>
                            <option value="Statements"></option>
                            <option value="Arguments"></option>
                            <option value="Intersection of Sets"></option>
                            <option value="Union of Sets"></option>
                            <option value="Combined Operation on Sets"></option>
                            <option value="Network"></option>
                            <option value="Linear Inequalities in Two Variables"></option>
                            <option value="Systems of Linear Inequalities in Two Variables"></option>
                            <option value="Distance-Time Graphs"></option>
                            <option value="Dispersion"></option>
                            <option value="Measure of Dispersion"></option>
                            <option value="Combined Event"></option>
                            <option value="Dependent Events and Independent Events"></option>
                            <option value="Mutually Exclusive Events and Non-Mutually Exclusive Events"></option>
                            <option value="Application of Probability of Combined Events"></option>
                            <option value="Financial Planning of combined Events"></option>
                        </datalist>  
                    </div>
                    <br><br>
                    <hr>
                    <br>
                    <label for="soalan"> Soalan 1 :</label>
                    <input type="text" placeholder="Soalan 1" id="soalan1" name="soalan1" spellcheck="false" required autocomplete="off"><br>
                    <br>
                    <div class="jawapanBox">
                        <label for="jawapan"> Jawapan :</label>
                        <!-- <input type="text" placeholder="Jawapan Soalan 1" id="jawapan" name="jawapan"><br>-->
                        <select name="jawapan1" id="jawapan1">
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                            <option value="D"> D </option>
                        </select> 
                    </div>
                    <br><br><br><br><br>
                    <div class="pilihanBox">
                        <div>
                        <label for="pilihanA" style="float: left;"> pilihan A :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan A Soalan 1" id="pilihanA1" name="pilihanA1" spellcheck="false" required autocomplete="off">
                        </div>
                        <div>
                        <label for="pilihanB" style="float: left;"> pilihan B :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan B Soalan 1" id="pilihanB1" name="pilihanB1" spellcheck="false" required autocomplete="off">
                        </div>
                        <div>
                        <label for="pilihanC" style="float: left;"> pilihan C :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan C Soalan 1" id="pilihanC1" name="pilihanC1" spellcheck="false" required autocomplete="off">
                        </div>
                        <div>
                        <label for="pilihanD" style="float: left;"> pilihan D :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan D Soalan 1" id="pilihanD1" name="pilihanD1" spellcheck="false" required autocomplete="off">
                        </div>
                        <br>
                    </div>
                    <br>
                    
                    <!-- add new soalan here -->
                    <div id="soalanDitambah"></div>
                    <br>

                    <!-- when clicked then add create quiz form below -->
                    <a name="add-question-button" onclick="tambahSoalan()"> Tambah (+) </a><br>
                    <br><br><br>
                    <a name="delete-question-button" onclick="deleteSoalan()"> Hapus (-) </a><br>
                    <br><br><br>
                    <button type="submit" name="register-quiz-button"> Muat Naik </button>
                </form>
                
                <script>
                    var noSoalan = "soalan" + noSoalanCounter;
                    var down = document.getElementById("soalanDitambah");

                    // create <br> element
                    var br =document.createElement("br");

                    function tambahSoalan(){
                        noSoalanCounter++;

                        var divForm = document.createElement('div');
                        divForm.innerHTML += "<div id= 'soalanForm" + noSoalanCounter +"'><br><br><br><hr><br><label for='soalan'> Soalan " +noSoalanCounter+" :</label><input type='text' placeholder='Soalan " +noSoalanCounter+"' id='soalan" +noSoalanCounter+"' name='soalan" +noSoalanCounter+"' spellcheck='false' required autocomplete='off'><br><br><div class='jawapanBox'><label for='jawapan'> Jawapan :</label><select name='jawapan" +noSoalanCounter+"' id='jawapan" +noSoalanCounter+"'><option value='A'> A </option><option value='B'> B </option><option value='C'> C </option><option value='D'> D </option></select> </div><br><br><br><br><br><div class='pilihanBox'><div><label for='pilihanA' style=float: left;> pilihan A :</label></div><div><input type='text' placeholder='Pilihan A Soalan " +noSoalanCounter+"' id='pilihanA" +noSoalanCounter+"' name='pilihanA" +noSoalanCounter+"' spellcheck='false' required autocomplete='off'></div><div><label for='pilihanB' style=float: left;> pilihan B :</label></div><div><input type='text' placeholder='Pilihan B Soalan " +noSoalanCounter+"' id='pilihanB" +noSoalanCounter+"' name='pilihanB" +noSoalanCounter+"' spellcheck='false' required autocomplete='off'></div><div><label for='pilihanC' style=float: left;> pilihan C :</label></div><div><input type='text' placeholder='Pilihan C Soalan " +noSoalanCounter+"' id='pilihanC" +noSoalanCounter+"' name='pilihanC" +noSoalanCounter+"' spellcheck='false' required autocomplete='off'></div><div><label for='pilihanD' style=float: left;> pilihan D :</label></div><div><input type='text' placeholder='Pilihan D Soalan " +noSoalanCounter+"' id='pilihanD" +noSoalanCounter+"' name='pilihanD" +noSoalanCounter+"' spellcheck='false' required autocomplete='off'></div><br></div>";
                        document.getElementById('soalanDitambah').appendChild(divForm);

                        return false;
                    }

                    function deleteSoalan(){

                        //last step is to subtract noSoalanCounter by 1
                        if (noSoalanCounter > 1){
                            var deleteElement = document.getElementById("soalanForm" + noSoalanCounter);
                            deleteElement.parentNode.removeChild(deleteElement);
                            noSoalanCounter--; 
                        }
                        return false;
                    }
                </script>

                <p style="color: white;">.</P>
                <br><br>
            </div>
            <br>
        </div>
    </body>
</html>