
<!DOCTYPE html>
    
    <head>
        <title> Koleksi Soalan </title>
        <link rel="stylesheet" href="mystyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!--to fit the content base on what device user use-->
    
    </head>

    <!--add some js library-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous" ></script>

    <script> $("#contentCollection").load("collectionGuruContent.php"); </script>
    
    <body>
        <h1 style="margin-left: 4.5%;"> Koleksi Soalan</h1>
        <br>
        <div id="contentCollection">

        </div>
        
    </body>
    
</html>