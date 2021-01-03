<?php 
session_start();

require "connectPHP.php";


// get all IdTopik and its details for calculating purata in an ascending order
// need its IdRekod to calculate each IdRekod Purata
// return T3
//        T4
$selectIdTopikFromRekodTemp = "SELECT IdTopik FROM PEREKODAN WHERE NoIC = '".$_SESSION['NoIC']."' ORDER BY LENGTH(IdTopik), IdTopik ";
$resultIdTopikTemp = mysqli_query($con,$selectIdTopikFromRekodTemp);         // query

while($rowTemp = mysqli_fetch_array($resultIdTopikTemp)){
    $IdTopikTemp = $rowTemp['IdTopik'];
    $selectMarkahFromRekodPurata = "SELECT AVG(markah) FROM PEREKODAN WHERE IdTopik='".$IdTopikTemp."'";
    $averageValue = mysqli_query($con,$selectMarkahFromRekodPurata);         // query
    $purataRow = mysqli_fetch_array($averageValue);
    $purata = $purataRow[0];
    // echo $IdTopikTemp." ".$purata;
    echo "{ label: $IdTopikTemp  , y: $purata},";
}







// $purata;
// $jumlah = 0;
// $ct = 0;

// $rowPurata = mysqli_fetch_array($resultMarkahPurata);
// $temp = $rowPurata['IdTopik'];
// $jumlah += $rowPurata['markah'];
// $ct += 1;

// while($rowPurata = mysqli_fetch_array($resultMarkahPurata)){
//     if ($temp == $rowPurata['IdTopik']){
//         $jumlah += $rowPurata['markah'];
//         $ct += 1;
//     }
//     else{
//         // add data to array and refresh
//         $purata = $jumlah/$ct;
//         // $everyRekodPurata[] = $purata;
//         $jumlah = 0;
//         $ct = 0;

//         //output
//         $purataOUT = $rowPurata['IdTopik'];
//         echo "{ label: $purataOUT  , y: $purata},";

//         $temp = $rowPurata['IdTopik'];
//         $jumlah += $rowPurata['markah'];
//         $ct += 1;

//     }
// }    

?>