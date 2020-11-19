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
                <form id="soalanForm" action="createGuru.php" method ="POST">
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
                        <br>
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
                    
                    <!-- add new soalan here -->
                    <p id="soalanDitambah"></p>

                </form>
                
                <script>
                    
                    var noSoalan = "soalan" + noSoalanCounter;
                    var down = document.getElementById("soalanDitambah");

                    // create <br> element
                    var br =document.createElement("br");

                    function tambahSoalan(){
                        noSoalanCounter++;

                        // get form element id
                        var formSoalan = document.getElementById("soalanForm");
                        var formPilihan = document.getElementById("soalanForm");
                        var formJawapan = document.getElementById("soalanForm");

                        // create label element
                        //label for "Soalan 2,3,4,5..."
                        var labelSoalan = document.createElement("label");         
                        labelSoalan.setAttribute("for","soalan");
                        var textSoalan = document.createTextNode("Soalan " + noSoalanCounter +":");
                        labelSoalan.appendChild(textSoalan);
                        

                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        // label for "Jawapan :"
                        var labelJawapan = document.createElement("label");
                        labelJawapan.setAttribute("for","jawapan" + noSoalanCounter);
                        labelJawapan.setAttribute("name","jawapan" + noSoalanCounter);        
                        labelJawapan.setAttribute("id","jawapan" + noSoalanCounter);
                        labelJawapan.setAttribute("class","jawapanBox");
                        var textJawapan = document.createTextNode("Jawapan :");
                        labelJawapan.appendChild(textJawapan);

                        // label for "Pilihan A"
                        var labelPilihanA = document.createElement("label");        
                        labelPilihanA.setAttribute("for","pilihanA");
                        labelPilihanA.setAttribute("class","pilihanBox");
                        var textPilihanA = document.createTextNode("pilihan A :");
                        labelPilihanA.appendChild(textPilihanA);
                        
                        //label for "Pilihan B"
                        var labelPilihanB = document.createElement("label");           
                        labelPilihanB.setAttribute("for","pilihanB");
                        labelPilihanB.setAttribute("class","pilihanBox");
                        var textPilihanB = document.createTextNode("pilihan B :");
                        labelPilihanB.appendChild(textPilihanB);

                        //label for "Pilihan C"
                        var labelPilihanC = document.createElement("label");        
                        labelPilihanC.setAttribute("for","pilihanC");
                        labelPilihanC.setAttribute("class","pilihanBox");
                        var textPilihanC = document.createTextNode("pilihan C :");
                        labelPilihanC.appendChild(textPilihanC);

                        //label fot "Pilihan D"
                        var labelPilihanD = document.createElement("label");        
                        labelPilihanD.setAttribute("for","pilhanD");
                        labelPilihanD.setAttribute("class","pilihanBox");
                        var textPilihanD = document.createTextNode("pilihan D :");
                        labelPilihanD.appendChild(textPilihanD);


                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        // Create input element
                        // soalan input
                        var soalan = document.createElement("input");
                        soalan.setAttribute("type","text");
                        soalan.setAttribute("placeholder","Soalan " + noSoalanCounter);
                        soalan.setAttribute("id",noSoalan);
                        soalan.setAttribute("name",noSoalan);


                        /*float: left;
                        padding: 5px;
                        margin-top: auto;
                        margin-bottom: auto;
                        margin-left: auto;
                        width: 15.7%;
                        display: inline-block;
                        box-sizing: border-box;
                        margin-right: auto;*/ 

                        // jawapan dropdown menu input
                        var jawapan = document.createElement("select");
                        jawapan.setAttribute("class","jawapanBox");
                        jawapan.style.float = "left";
                        jawapan.style.padding = "5px";
                        jawapan.style.margin = "auto";
                        jawapan.width = "15.7%";
                        //jawapan.style.box-sizing = "border-box";
                        //jawapan.style.display = "inline-block";
                        jawapan.setAttribute("name","jawapan"+noSoalanCounter);
                        jawapan.setAttribute("id","jawapan"+noSoalanCounter);
                        
                        var jawapanA = document.createElement("option"); 
                        jawapanA.setAttribute("value", "A"); 
						var nodJawapanA = document.createTextNode("A"); 
						jawapanA.appendChild(nodJawapanA); 
						jawapan.appendChild(jawapanA); 
                        
                        var jawapanB = document.createElement("option"); 
                        jawapanB.setAttribute("value", "B"); 
						var nodJawapanB = document.createTextNode("B"); 
						jawapanB.appendChild(nodJawapanB); 
						jawapan.appendChild(jawapanB); 
                        
                        var jawapanC = document.createElement("option"); 
                        jawapanC.setAttribute("value", "C"); 
						var nodJawapanC = document.createTextNode("C"); 
						jawapanC.appendChild(nodJawapanC); 
						jawapan.appendChild(jawapanC); 
                        
                        var jawapanD = document.createElement("option"); 
                        jawapanA.setAttribute("value", "D"); 
						var nodJawapanD = document.createTextNode("D"); 
						jawapanD.appendChild(nodJawapanD); 
						jawapan.appendChild(jawapanD); 


                        /////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //input for pilihan A
                        var pilihanA = document.createElement("input");
                        pilihanA.setAttribute("class","pilihanBox");
                        pilihanA.style.width = "30%";
                        //pilihanA.style.margin-right = "auto";
                        pilihanA.setAttribute("type","text");
                        pilihanA.setAttribute("placeholder","Pilihan A Soalan " + noSoalanCounter);
                        pilihanA.setAttribute("id","pilihanA" + noSoalan);
                        pilihanA.setAttribute("name","pilihanA" + noSoalan);                       
                        
                        //input for pilihan B
                        var pilihanB = document.createElement("input");
                        pilihanB.setAttribute("class","pilihanBox");
                        pilihanB.style.width = "30%";
                        pilihanB.setAttribute("type","text");
                        pilihanB.setAttribute("placeholder","Pilihan B Soalan " + noSoalanCounter);
                        pilihanB.setAttribute("id","pilihanA" + noSoalan);
                        pilihanB.setAttribute("name","pilihanA" + noSoalan);
                                               
                        //input for pilihan C
                        var pilihanC = document.createElement("input");
                        pilihanC.setAttribute("class","pilihanBox");
                        pilihanC.style.width = "30%";
                        pilihanC.setAttribute("type","text");
                        pilihanC.setAttribute("placeholder","Pilihan C Soalan " + noSoalanCounter);
                        pilihanC.setAttribute("id","pilihanA" + noSoalan);
                        pilihanC.setAttribute("name","pilihanA" + noSoalan);                        
                        
                        //input for pilihan D
                        var pilihanD = document.createElement("input");
                        pilihanD.setAttribute("class","pilihanBox");
                        pilihanD.style.width = "30%";
                        pilihanD.setAttribute("type","text");
                        pilihanD.setAttribute("placeholder","Pilihan D Soalan " + noSoalanCounter);
                        pilihanD.setAttribute("id","pilihanA" + noSoalan);
                        pilihanD.setAttribute("name","pilihanA" + noSoalan);
                        
                        ////////////////////////////////////////////////////////////////////////////////////////////////////////
                        // put Soalan 2,3,4...  : __________
                        formSoalan.appendChild(labelSoalan);
                        formSoalan.appendChild(soalan);
                        formSoalan.appendChild(br.cloneNode());  
                        formSoalan.appendChild(br.cloneNode());  

                        //////////////////////////////////////////
                        formJawapan.appendChild(labelJawapan);
                        formJawapan.appendChild(jawapan);
                        formJawapan.appendChild(br.cloneNode()); 
                        formJawapan.appendChild(br.cloneNode()); 
                        formJawapan.appendChild(br.cloneNode()); 
                        formJawapan.appendChild(br.cloneNode()); 
                        formJawapan.appendChild(br.cloneNode()); 


                        ////////////////////////////////////////

                        formPilihan.appendChild(labelPilihanA);
                        formPilihan.appendChild(pilihanA);
                        //formPilihan.appendChild(br.cloneNode());  
                        //formPilihan.appendChild(br.cloneNode());

                        formPilihan.appendChild(labelPilihanB);
                        formPilihan.appendChild(pilihanB);
                        //formPilihan.appendChild(br.cloneNode());  
                        //formPilihan.appendChild(br.cloneNode());

                        formPilihan.appendChild(labelPilihanC);
                        formPilihan.appendChild(pilihanC);
                        //formPilihan.appendChild(br.cloneNode());  
                        //formPilihan.appendChild(br.cloneNode());

                        formPilihan.appendChild(labelPilihanD);
                        formPilihan.appendChild(pilihanD);
                        formPilihan.appendChild(br.cloneNode());  
                        formPilihan.appendChild(br.cloneNode());

                        
                        /////////////////////////////////////////////////////////////////////////////////////////////
                        // adding form

                        //soalan form
                        document.getElementById("soalanDitambah").appendChild(formSoalan);  
                        document.getElementById("soalanDitambah").appendChild(br.cloneNode());

                        // put dropdown ABCD for jawapan
                        document.getElementById("soalanDitambah").appendChild(formJawapan);
                        document.getElementById("soalanDitambah").appendChild(br.cloneNode());

                        // pilihan form
                        document.getElementById("soalanDitambah").appendChild(formPilihan);
                        document.getElementById("soalanDitambah").appendChild(br.cloneNode());


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