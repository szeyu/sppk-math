# sppk-math
Sistem Pengurusan Penilaian Kuiz, Ilmu Di Hujung Jari, Matematik Tingkatan 4 (DLP)

pls refer to szeyu branch

-----------------------------------------------------------

## for the removal step of soalan pls follow these steps
1) delete pilihan
2) delete soalan
3) delete topik

-----------------------------------------------------------------

## in the updateTopik":

first store idTopik \
then store tajuk     > these are constant
then store subTopik /


i suppose do a for loop
first check how many soalan are there
total S / 4 is the total number of soalan because S got 4 same data just different Id

--> add loop here
but the S id is important to get the id of P

so store four of the soalan id in the first loop
then store the soalan once because 4 same 
then find the id pilihan

then store this four id pilihan
then store four jawapan (0, 1)
then find which one [position] got jawapan = 1
then determine the A,B,C,D
then store four  pilihan

then output then loop again

[0,0,0,1] then answer is D
[102,34,23,105] for the each pilihan then output from array no need to make variable


ok for output part leh a bit hard
need to know got any question added or deleted and need to get the lateszt id to add
if got deleted then need to remove the id

first thing to do is we must output the subtopik and tajuk first

then we must add echo in loop 

after output when user press ubah then need to identify wheter soalan got increase or decrease.

------------------------------------------------------------------------
///////////////////////////////////////
/////////          SOLVED
///////////////////////////////////////

there is a BIG issue, i cannot remove the existed soalan 2,3...
so i need to do an if statement to add DIV element so that i can remove it

updateTopik.php?IdTopik=T6:229 Uncaught TypeError: Cannot read property 'parentNode' of null
    at deleteSoalan (updateTopik.php?IdTopik=T6:229)
    at HTMLAnchorElement.onclick (updateTopik.php?IdTopik=T6:197)


--------------------------------------------------------------------------------------------------
//////////////////////////////////////////////
///////         SOLVED
/////////////////////////////////////////////

why the hell it remove question 1.  [  SOLVED ]

and why there is a line that interupt the structure of the interface   [ SOLVED  ]


--------------------------------------------------------------------------------------------------
////////////////////////////////////////////////
////            SOLVED
////////////////////////////////////////////////

i want to transfer the Id Topik to ubahSoalanDB.php
there is a few solution one is it is use session global variable.
and i dun want to use session

--------------------------------------------------------------------------------------------------
## ubah soalan DB

for the ubahSoalanDB.php hor is combination of many function
1) delete 
2) change
3) add

need to check if there is any extra question added or not,
if yes then use the register quiz method to do

need to check if there is any deleted question,
if yes then use the delete topik method to do

do the check extra and check deleted first then execute them
then only do the update just replace whatever user type with that only 


i can use echo output at that place because after header(...)
then my all echo will gone
plus echo can let me see the process


        OR


i can just delete old one then add the ubah soalan as new soalan
and this need to MANTAIN IdTopik kunci primer

then id soalan dan id pilihan just create a new one using the same method in registerQuiz.php

--------------------------------------------------------------------------------------------

the add data to data base php will renew my IdTopik so not good
cause the IdTopik must still the same

so need to create seperate file then include them 

remove the get latest id in addDataToDB.php
then the get id function only be included if need it

cheh just now forgot to use sql code

--------------------------------------------------------------------------------------------
# Student part
## algorithm

### koleksi murid
check if there is any IdTopik that have been done in perekodan
if no than display the IdTopik table in haven't done table
    there is button beside the table, "buat dan hantar"
    then if click the display all the data and the objective in radio button

    after done can click button to submit then it will back to the page
    then display result in perekodan 


if yes than display perekodan in done table    [ I think put in prestasi murid better ]

### prestasi murid

display graph first  [ can put standard deviation or statistics ]

put search bar
then display the latest perekodan at top  [HINT : can use date time to elavuate]


--------------------------------------------------------------------------------------------

# IMPORTANT NOTICE
I can replace the delete function with showing how many student haven't done then display some perekodan table

after done do quiz page only can continue the check murid page bacause perekodan haven't got sample