# sppk-math
Sistem Pengurusan Penilaian Kuiz, Ilmu Di Hujung Jari, Matematik Tingkatan 4 (DLP)



pls refer to szeyu branch



for the removal step of soalan pls follow these steps
1) delete pilihan
2) delete soalan
3) delete topik


in the updateTopik":

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

there is a BIG issue, i cannot remove the existed soalan 2,3...
so i need to do an if statement to add DIV element so that i can remove it
