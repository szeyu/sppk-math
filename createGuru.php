<!--remember include php file here-->
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
                <form action="createGuru.php" method ="POST">
                    <br>
                    <div class="tajukBox">
                        <label for="subTopik"> Sub Topik :</label>
                        <input type="text" placeholder="sub topik" name="subTopik" list="subTopik">
                        <datalist id="subTopik">
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
                        <label for="tajuk"> Tajuk :</label>
                        <input type="text" placeholder="Tajuk" name="tajuk" list="tajuk">
                        <datalist id="tajuk">
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
                            <option value="Mutually EXclusive Events and Non-Mutually Exclusive Events"></option>
                            <option value="Aplication of Probability of Combined Events"></option>
                            <option value="Financial Planning of combined Events"></option>
                        </datalist>
                       
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <label for="soalan"> Soalan 1 :</label>
                    <input type="text" placeholder="Soalan 1" id="soalan1" name="soalan1"><br>
                    <br>
                    <div class="jawapanBox">
                        <label for="jawapan" name="jawapan1" id="jawapan1"> Jawapan :</label>
                        <!-- <input type="text" placeholder="Jawapan Soalan 1" id="jawapan" name="jawapan"><br>-->
                        <select>
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                            <option value="D"> D </option>
                        </select> 
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="pilihanBox">
                        <label for="pilihanA"> pilihan A :</label>
                        <input type="text" placeholder="Pilihan A Soalan 1" id="pilihanA1" name="pilihanA1">
                        <label for="pilihanB"> pilihan B :</label>
                        <input type="text" placeholder="Pilihan B Soalan 1" id="pilihanB1" name="pilihanB1">
                        <label for="pilihanC"> pilihan C :</label>
                        <input type="text" placeholder="Pilihan C Soalan 1" id="pilihanC1" name="pilihanC1">
                        <label for="pilihanD"> pilihan D :</label>
                        <input type="text" placeholder="Pilihan D Soalan 1" id="pilihanD1" name="pilihanD1">
                        <br>
                    </div>
                    <br>
                    <br>
                    
                </form>
                <!-- add new soalan here -->
                <p id="soalanDitambah"></p>
                <script>
                    noSoalanCounter++;
                    var noSoalan = "soalan" + noSoalanCounter;
                    var down = document.getElementById("soalanDitambah");

                    // create <br> element
                    var br =document.createElement("br");

                    function tambahSoalan(){

                        // create form element
                        var form = document.createElement("form");
                        form.setAttribute("method","POST");
                        form.setAttribute("action","createGuru.php");

                        // Create input element
                        var soalan = document.createElement("input");
                        soalan.setAttribute("type","text");
                        soalan.setAttribute("placeholder","Soalan " + noSoalan);
                        soalan.setAttribute("id",noSoalan);
                        soalan.setAttribute("name",noSoalan);

                        var jawapan = document.createElement("select");
                        var jawapanABCD = document.createElement("option");
                        // add A
                        jawapanABCD.text = "A";
                        jawapan.add(pilihanABCD);
                        // add B
                        jawapanABCD.text = "B";
                        jawapan.add(pilihanABCD);
                        // add C
                        jawapanABCD.text = "C";
                        jawapan.add(pilihanABCD);
                        // add D
                        jawapanABCD.text = "D";
                        jawapan.add(pilihanABCD);

                        //input for pilihan A
                        var pilihanA = document.createElement("input");
                        pilihanA.setAttribute("type","text");
                        pilihanA.setAttribute("placeholder","Pilihan A Soalan " + noSoalan);
                        pilihanA.setAttribute("id","pilihanA" + noSoalan);
                        pilihanA.setAttribute("name","pilihanA" + noSoalan);
                        
                        //input for pilihan B
                        var pilihanB = document.createElement("input");
                        pilihanB.setAttribute("type","text");
                        pilihanB.setAttribute("placeholder","Pilihan B Soalan " + noSoalan);
                        pilihanB.setAttribute("id","pilihanA" + noSoalan);
                        pilihanB.setAttribute("name","pilihanA" + noSoalan);
                        
                        //input for pilihan C
                        var pilihanC = document.createElement("input");
                        pilihanC.setAttribute("type","text");
                        pilihanC.setAttribute("placeholder","Pilihan C Soalan " + noSoalan);
                        pilihanC.setAttribute("id","pilihanA" + noSoalan);
                        pilihanC.setAttribute("name","pilihanA" + noSoalan);
                        
                        //input for pilihan D
                        var pilihanD = document.createElement("input");
                        pilihanD.setAttribute("type","text");
                        pilihanD.setAttribute("placeholder","Pilihan D Soalan " + noSoalan);
                        pilihanD.setAttribute("id","pilihanA" + noSoalan);
                        pilihanD.setAttribute("name","pilihanA" + noSoalan);

                        
                        
                    }
                </script>

                <!-- when clicked then add create quiz form below -->
                <a name="add-question-button" onclick="tambahSoalan()"> Tambah (+) </a><br>
                <br>
                <br>
                <br>
                <a type="submit" name="register-quiz-button"> Muat Naik </a>
                <p style="color: white;">.</P>
                <br>
            </div>
        </div>
    </body>
</html>