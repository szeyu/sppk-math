
<?php 
    
?>

<script>
    //set up global variable
    var noSoalanCounter = 1;
</script>

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
                <form id="soalanForm" action="registerKuiz.php" method ="POST">
                    <br>
                    <div class="tajukBox">
                        <label for="subTopik"> Sub Topik :</label>
                        <input type="text" placeholder="sub topik" name="subTopik" id="subTopik" list="subTopiks" required>
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
                        <input type="text" placeholder="Tajuk" name="tajuk" id="tajuk" list="tajuks" required>
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
                    <br>
                    <br>
                    <hr>
                    <br>
                    <label for="soalan"> Soalan 1 :</label>
                    <input type="text" placeholder="Soalan 1" id="soalan1" name="soalan1" required><br>
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
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="pilihanBox">
                        <div>
                        <label for="pilihanA" style="float: left;"> pilihan A :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan A Soalan 1" id="pilihanA1" name="pilihanA1" required>
                        </div>
                        <div>
                        <label for="pilihanB" style="float: left;"> pilihan B :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan B Soalan 1" id="pilihanB1" name="pilihanB1" required>
                        </div>
                        <div>
                        <label for="pilihanC" style="float: left;"> pilihan C :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan C Soalan 1" id="pilihanC1" name="pilihanC1" required>
                        </div>
                        <div>
                        <label for="pilihanD" style="float: left;"> pilihan D :</label>
                        </div>
                        <div>
                        <input type="text" placeholder="Pilihan D Soalan 1" id="pilihanD1" name="pilihanD1" required>
                        </div>
                        <br>
                    </div>
                    <br>
                    
                    <!-- add new soalan here -->
                    <div id="soalanDitambah"></div>
                    <br>

                    <!-- when clicked then add create quiz form below -->
                    <a name="add-question-button" onclick="tambahSoalan()"> Tambah (+) </a><br>
                    <br>
                    <br>
                    <br>
                    <a name="delete-question-button" onclick="deleteSoalan()"> Hapus (-) </a><br>
                    <br>
                    <br>
                    <br>
                    <button type="submit" name="register-quiz-button" onclick="alertBox()"> Muat Naik </button>

                </form>
                
                <script>
                    
                    var noSoalan = "soalan" + noSoalanCounter;
                    var down = document.getElementById("soalanDitambah");

                    // create <br> element
                    var br =document.createElement("br");

                    function tambahSoalan(){
                        noSoalanCounter++;

                        var divForm = document.createElement('div');
                        divForm.innerHTML += "<div id= 'soalanForm" + noSoalanCounter +"'><br><br><br><hr><br><label for='soalan'> Soalan " +noSoalanCounter+" :</label><input type='text' placeholder='Soalan " +noSoalanCounter+"' id='soalan" +noSoalanCounter+"' name='soalan" +noSoalanCounter+"' required><br><br><div class='jawapanBox'><label for='jawapan'> Jawapan :</label><select name='jawapan" +noSoalanCounter+"' id='jawapan" +noSoalanCounter+"'><option value='A'> A </option><option value='B'> B </option><option value='C'> C </option><option value='D'> D </option></select> </div><br><br><br><br><br><div class='pilihanBox'><div><label for='pilihanA' style=float: left;> pilihan A :</label></div><div><input type='text' placeholder='Pilihan A Soalan " +noSoalanCounter+"' id='pilihanA" +noSoalanCounter+"' name='pilihanA" +noSoalanCounter+"' required></div><div><label for='pilihanB' style=float: left;> pilihan B :</label></div><div><input type='text' placeholder='Pilihan B Soalan " +noSoalanCounter+"' id='pilihanB" +noSoalanCounter+"' name='pilihanB" +noSoalanCounter+"' required></div><div><label for='pilihanC' style=float: left;> pilihan C :</label></div><div><input type='text' placeholder='Pilihan C Soalan " +noSoalanCounter+"' id='pilihanC" +noSoalanCounter+"' name='pilihanC" +noSoalanCounter+"' required></div><div><label for='pilihanD' style=float: left;> pilihan D :</label></div><div><input type='text' placeholder='Pilihan D Soalan " +noSoalanCounter+"' id='pilihanD" +noSoalanCounter+"' name='pilihanD" +noSoalanCounter+"' required></div><br></div>";
                        document.getElementById('soalanDitambah').appendChild(divForm);

    
                        return false;
                    }


                    function deleteSoalan(){

                        var deleteElement = document.getElementById("soalanForm" + noSoalanCounter);
                        deleteElement.parentNode.removeChild(deleteElement);

                        //last step is to subtract noSoalanCounter by 1
                        if (noSoalanCounter > 1){
                            noSoalanCounter--; 
                        }

                        return false;
                        
                    }

                    ////////////////////////////////////////////
                    //          have a problem here
                    ///////////////////////////////////////////
                    function alertBox(){

                        alert("Soalan berjaya dimuat naik!");
                        return false;

                    }
                </script>

                
                <p style="color: white;">.</P>
                <br>
            </div>
        </div>
    </body>
</html>