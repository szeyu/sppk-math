<html>

    Select a file: <input type="file" id="myFile">
    <button onclick='processFile()'>Process</button>
    <table id="myTable"></table>

    <div id="text">  </div>

    <br><br>
    <label for="subTopik"> Sub Topik :</label>
    <input type="text" placeholder="sub topik" name="subTopik" id="subTopik" list="subTopiks" spellcheck="false" required>
    <br>

    <label for="tajuk"> Tajuk :</label>
    <input type="text" placeholder="Tajuk" name="tajuk" id="tajuk" list="tajuks" spellcheck="false" required>
    <br>

    <label for="soalan"> Soalan 1 :</label>
    <input type="text" placeholder="Soalan 1" id="soalan1" name="soalan1" spellcheck="false" required autocomplete="off">
    <br><br>

    <div class="jawapanBox">
        <label for="jawapan"> Jawapan :</label>
        <select name="jawapan1" id="jawapan1">
            <option value="A"> A </option>
            <option value="B"> B </option>
            <option value="C"> C </option>
            <option value="D"> D </option>
        </select> 
    </div>
    <br><br>
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





    <script>
        // for the first form soalan 1 use back the original id
        // for example id = soalan1

        // next need to tambah the new question base on the NoSoalan
        // for example id = soalan + "NoSoalan"

        function processFile() {
            var fileSize = 0;
            //get file
            var theFile = document.getElementById("myFile");
            
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
            //check if file is CSV
            if (regex.test(theFile.value.toLowerCase())) {
            //check if browser support FileReader
                if (typeof (FileReader) != "undefined") {
            //get table element
                var table = document.getElementById("myTable");
                var headerLine = "";
                //create html5 file reader object
                var myReader = new FileReader();
                // call filereader. onload function
                myReader.onload = function(e) {
                    var content = myReader.result;
                    //split csv file using "\n" for new line ( each row)
                    var lines = content.split("\r");
                    //document.getElementById("text").textContent += content;
                    document.getElementById("text").textContent += "number of lines = " + lines.length + " _";

                    //get the subTopik and tajuk
                    var rowContent = lines[1].split(",");
                    var subTopik = document.getElementById("subTopik").value += rowContent[0];
                    var tajuk = document.getElementById("tajuk").value += rowContent[1];


                    // getting NoSoalan, soalan, pilihanA, pilihanB, pilihanC, pilihanD, jawapan
                    // for id soalan 1 first
                    var rowContent = lines[4].split(",");
                    
                    var NoSoalan = document.getElementById("text").textContent += "NoSoalan = " + rowContent[0] + " _";
                    var soalan = document.getElementById("soalan1").value += rowContent[1];
                    var pilihanA = document.getElementById("pilihanA1").value += rowContent[2];
                    var pilihanB = document.getElementById("pilihanB1").value += rowContent[3];
                    var pilihanC = document.getElementById("pilihanC1").value += rowContent[4];
                    var pilihanD = document.getElementById("pilihanD1").value += rowContent[5];
                    var jawapan = document.getElementById("jawapan1").value = rowContent[6];
                    


                    // for other soalan
                    for (var count = 5; count < lines.length; count++) {
                        var rowContent = lines[count].split(",");

                        for (var each = 0; each < 7; each++){
                            if (typeof rowContent[each] === "undefined"){
                                continue;
                            }

                            //document.getElementById("text").textContent += rowContent[each] + " ";
                            // create a new soalan space for them
                            
                        }
                    }
                }
                //call file reader onload
                myReader.readAsText(theFile.files[0]);
                }
                else {
                        alert("This browser does not support HTML5.");
                    }
            }
            else {
                        alert("Please upload a valid CSV file.");
            }
            return false;
        }
    </script>

</html>