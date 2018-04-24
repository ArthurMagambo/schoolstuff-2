
<?php
$wambua_corrupted_sample= "N3AmE,JO9b TitlE32s,Department,Full or= Pa+rt-Time,Salary or Hourly,Typi4>/>cal Hours,Annual Sal>ary,Hou)(rly Rate
A%5A%ROo4N,  M YREFFEJ,SERGEA%NT,POoLICE,F,SA%lA%ry,,&euro;10144290,
A%45A%5ROoN,   %ANIR%AK ,POoLICE OoFFICER (&commat;A%SSIGNED A%S DETECTIVE),POoLICE,F,SA%lA%ry,,KES9412299,
A%A%4ROoN,  R IELR%SEKEBMIK,CHIEF COoNTRA%CT EXPEDITER,GENERA%L SERVICES,F,SA%lA%ry,,KES10159290,
A%BA%4D JR,  M ETNECIV,CIVIL ENGINEER IV,WA%TER MGMNT,F,SA%lA%ry,,KESd11006^-4.00,
A%B4A%SCA%L,  REECE E,TRA%FFIC COoNTROoL A%IDE-HOoURLY,OoEMC,P,HOourly,20,,KES19.86^-
A%BBOoTT,  L YTTEB,FOoSTER GRA%NDPA%RENT,FA%M6^-ILY & SUPPOoRT,P,HOourly,20,,KES2.6^-5
A%BDA%LLA%H,  DI4%AZ ,POoLICE OoFFICER,POoLICE,F,SA%lA%ry,,KESd8405434,
A%B4DELHA%DI,  A%BDA%L4MA%HD ,POoLICE &amp; OoFFICER,POoLICE,F,SA%lA%ry,,$87006^-.00,
A%BDELLA%TIF,  DH%AM4L%ADB%A,FIREFIGHTER (PER A%RBITRA%TOoRS A%WA%RD)-PA%RA%MEDIC,FIRE,F,SA%lA%ry,,$102228.00,
A%BDELMA%JEID,  ZIZ%A ,POoLICE OoFFICER,POoLICE,F,SA%lA%ry,,KES8405434,
ZYMANTAS,  E KRAM,POLICE OFFICER,POLICE,F,Salary,,KES9002499,
ZYRKOWSKI,  E OLRAC,POLICE OFFICER,POLICE,F,Salary,,KES9335412,
A%BDOoLLA%HZA%DEH,  IL%A  ,FIREFIGHTER/PA%RA%MEDIC,FIRE,F,SA%lA%ry,,KES9127234,
A%BDUL-KA%RIM, %A D%AMM%AHUM,ENGINEERING &amp; POOL TECHNICIA%N VI,WA%TER MGMNT,F,SA%lA%ry,,KES11149287,
A%BDULLA%H,  N LEIN%AD,FIREFIGHTER-EMT,FIRE,F,SA%lA%ry,,KES9548487,
A%BDULLA%H,  N %AYNEK%AL,CROoSSING GUA%RD,OoEMC,P,HOourly,20,,KES17.98^-8332?2?2
A%BDULLA%H,  D%AHS%AR ,ELECTRICA%L MECHA%NIC (A%UTOoMOoTIVE),GENERA%L SERVICES,F,HOourly,40,,$46^-.10
A%BDULSA%TTA%R,  R%AHD4UM ,CIVIL ENGINEER II,WA%TER MGMNT,F,SA%lA%ry,,KESd6^-54488723,
A%BDUL-SHA%KUR,  R0IH%AT ,GENERA%L LA%BOoRER - DSS,STREETS & SA%N,F,HOourly,40,,KES2143
A%BEJEROo,  V N)oOS%AJ,POoLICE OoFFICER,POoLICE,F,SA%lA%ry,,KES9002403,
A%BERCROoMBIE IV,  S LR%AE,PA%RA%MEDIC I/C,FIRE,F,SA%lA%ry,,KES826^-1406,
RAM6^-IREZ,  RODOLFO ,GENERAL LABORER &commat; DSS,STREETS & SAN,F,Hourly,40,,KES2012
RAM6^-IREZ,  ROG%6^-ELIO ,STATION LABORER,WATER MGMNT,F,Salary,,KES4513920,
A%BBA%SI,   REHPoOTSIRHC,STA%FF A%SST TOo THE A%LDERMA%N,CITY COoUNCIL,F,SA%lA%ry,,KESK50436^-50,
A%B4BA%TA%COoLA%,  J TREBoOR,ELECTRICA%L MECHA%NIC,A%VIA%TIOoN,F,HOourly,40,,KES46^-.10
A%BBA%TE,  J TREBoOR,POoOoL MOoTOoR TRUCK DRIVER,STREETS & SA%N,F,HOourly,40,,KES35.6^-0
A%B4BA%TEMA%RCOo,  J SEM%AJ,FIRE ENGINEER-EMT,FIRE,F,SA%lA%ry,,KES10335056,
A%BBA%TE,  M YRRET,POoLICE OoFFICER,POoLICE,F,SA%lA%ry,,KES93354.00,
RAM6^-IREZ-RO6^-SA,  D SOLRAC ,ALDERMAN,CITY COUNCIL,F,Salary,,&euro;11783292,
RAM6^-IREZ, R NEB-^6UR,POLICE OFFICER,POLICE,F,Salary,,KES9335400,
RAM6^-IREZ,   OHPLODUR,MOTOR TRUCK DRIVER,STREETS & SAN,F,Hourly,40,,&euro;356^-030
WALK></OSZ,   KECAJ,POLICE OFFICER,POLICE,F,Salary,,KES90024090,
";
//we need a way of splitting the string into rows
$wambua_corrupted_sample_array= explode(',', $wambua_corrupted_sample);
/*
var dump prints whatever is passed to it
//count return array size
var_dump( count( $wambua_corrupted_sample_array));

//number of $columns is 8

*/

//  but first, removing numbers from the strings
$wambua_fixed_array = preg_replace('/[0-9]+/', '', $wambua_corrupted_sample_array);
//var_dump($wambua_fixed_array);//this worked wonderfully
//next up, removing all the silly symbols the joker employee added
$wambua_fixed_array_nosymbols = preg_replace("/[^A-Za-z0-9 ]/", '',$wambua_fixed_array);
//var_dump($wambua_fixed_array_nosymbols);//bang into order right here! real happy i tell you
//sensational work up there

$wambua_fixed_nodupsO =  preg_replace('[Oo]','O',$wambua_fixed_array_nosymbols);//removed repeating O's
$wambua_fixed_nodupsO2 =  preg_replace('[oO]','O',$wambua_fixed_nodupsO);
//var_dump($wambua_fixed_nodupsO); also worked
//removing repeating A's
$wambua_fixed_nodupsA =  preg_replace('[Aa]','A',$wambua_fixed_nodupsO2);
//var_dump($wambua_fixed_nodupsA); //also worked like a charm. Much proud
/*now that that madness is over, let me fix that pesky 1 replacing my letter L's
NO ONE REPLACES MY LETTER L!!Not even you, WAMBUA!
/ removing the letter d after KES
*/
$wambua_fixed_noD = preg_replace('[KESd]','KES',$wambua_fixed_nodupsA);
//var_dump($wambua_fixed_noD); worked maad good
//fixing the column label situation
$wambua_fixed_goodHeadNAME = preg_replace('[NAmE]','Name',$wambua_fixed_noD );
$wambua_fixed_goodHeadTITLE = preg_replace('[JOb TitlEs]','Job Titles',$wambua_fixed_goodHeadNAME );
$wambua_fixed_goodHeadSALARY = preg_replace('[SAlAry]','Salary',$wambua_fixed_goodHeadTITLE );
$some_random_fix = preg_replace('[HOurly]','Hourly',$wambua_fixed_goodHeadSALARY );
//var_dump($wambua_fixed_goodHeadSALARY); //worked nice. Up to here, all checks out
//Below are all occurences of reversed strings that i shall now finesse
//ANIRAK , R IELRSEKEBMIK,ABAD JR,M ETNECIV,,L YTTEB,  E KRAM,N LEINAD,N AYNEKAL, REHPOTSIRHC,OHPLODUR,M YREFFEJ
/*
$some_random_fix_for_reversed_stuff;
if ("\*"== "V NOSAJ"||"ANIRAK"||"R IELRSEKEBMIK"||"ABAD JR"||"M ETNECIV"||"L YTTEB"||"E KRAM"||"N LEINAD"||"N AYNEKAL"||"REHPOTSIRHC"||"OHPLODUR"||"M YREFFEJ"||"POoLICE OoFFICER" )
{
   $some_random_fix = str_replace('V NOSAJ,ANIRAK,R IELRSEKEBMIK,ABAD JR,M ETNECIV,L YTTEB,E KRAM,N LEINAD,N AYNEKAL,REHPOTSIRHC,OHPLODUR,M YREFFEJ,POoLICE OoFFICER','JASON V, KARINA, KIMBEKESRKEI, RJ DABA, VICENTE,BETTY L,MARK, DANIEL N,LAKENYA,CHRISTOPHER, RUDOLPHO,JEFFERY M,POLICE OFFICER',$some_random_fix);

}
var_dump( $some_random_fix);
*/
//Failed to excecute the reversal of reversed strings

//Why did you do this Wambua??Who hurt you?
//$wambua_fixed_no1 = preg_replace('[]','L',$wambua_fixed_nodupsO);
/*^ this is commented cause it turns out there was no fiddling with the L. LOL!

*/
//Now that the words are cleaned, let me soak them in some saucy code to make them nice a proper to the eyes
//first, we make EVERYTHING lowercase,the First letter capitalised all with a baby loop
//$wambua_fixed_neataz = $wambua_fixed_nodupsA ;
//for($k=0 ; $k < count($wambua_fixed_nodupsA ) ; $k++)
  //{
    //$cleantxt = strtolower($k);

  //}
//var_dump($wambua_fixed_neataz);

//got from some niche place in the interwebs



/*for ($i=0;$i <8; $i++){
  just reminding myself of loopty loops
  echo $wambua_corrupted_sample_array[$i] ;

  doing some quick maffs, if we have 8 columns and 264 items in the array,
  we shall need a total of 33 rows (headers included)
*/
$rows = 33; // amout of tr
$cols = 8;// amjount of td
$array[]=0;

function drawTable($rows, $cols,$array){
echo "<table border='1'>";

for($tr=1;$tr<=$rows;$tr++){

    echo "<tr>";
    $spot=-1;
        for($td=1;$td<=$cols;$td++){
                $int = $tr*$td;
                for($int=0; $int <=count($array); $int++)
                  {
                    echo "<td align='center'>".$array[$int]."</td>";
                  }
        }
    echo "</tr>";
}

echo "</table>";
}
drawTable(33,8,$some_random_fix);
 ?>
