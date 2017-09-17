<?php

function get_relation($name1,$name2,$relation)
{


$first = mb_strtoupper($name1, "UTF-8");


$firstlength = strlen($name1);
$second = mb_strtoupper($name2, "UTF-8");

$secondlength = strlen($name2);


$PerepCount=0;
$LoveCount=0;
$ShlCount=0;
$RomCount=0;
for ($Count=0; $Count < $firstlength; $Count++)
{
	//$letter1 = $first[$Count];
	$letter1=mb_substr($first, $Count, 1,"UTF-8");
	
	switch($relation)
    {
    	case "Переписка/дружба":
        	    if ($letter1=="П")
	            $PerepCount+=2;
	            if ($letter1=="Е")
	            $PerepCount+=2;
	            if ($letter1=="Р")
	            $PerepCount+=2;
	            if ($letter1=="Е")
	            $PerepCount+=2;
	            if ($letter1=="П")
	            $PerepCount+=2;
	            if ($letter1=="И")
	            $PerepCount+=1;
	            if ($letter1=="С")
	            $PerepCount+=2;
                if ($letter1=="К")
	            $PerepCount+=1;
	            if ($letter1=="А")
	            $PerepCount+=1;
                break;
        case "Любов" :
            if ($letter1=="Л")
	        $LoveCount+=3;
	        if ($letter1=="Ю")
	        $LoveCount+=4;
	        if ($letter1=="Б")
	        $LoveCount+=3;
	        if ($letter1=="О")
	        $LoveCount+=3;
	        if ($letter1=="В")
	        $LoveCount+=3;
             break;
        case "Шлюб" :
            if ($letter1=="Ш")
	        $ShlCount+=4;
	        if ($letter1=="Л")
	        $ShlCount+=3;
	        if ($letter1=="Ю")
	        $ShlCount+=4;
	        if ($letter1=="Б")
	        $ShlCount+=3;
             break;
         case "Віртуальний роман" :
            if ($letter1=="Р")
	        $RomCount+=3;
	        if ($letter1=="О")
	        $RomCount+=2;
	        if ($letter1=="М")
	        $ShlCount+=2;
	        if ($letter1=="А")
	        $RomCount+=1;
            if ($letter1=="Н")
	        $RomCount+=3;
             break;
	}
}
for ($Count=0; $Count < $secondlength; $Count++)
{
	//$letter2= $second[$Count];
		$letter2=mb_substr($second, $Count, 1,"UTF-8");
     switch($relation)
    {
    	case "Переписка/дружба":
        	    if ($letter2=="П")
	            $PerepCount+=2;
	            if ($letter2=="Е")
	            $PerepCount+=2;
	            if ($letter2=="Р")
	            $PerepCount+=2;
	            if ($letter2=="Е")
	            $PerepCount+=2;
	            if ($letter2=="П")
	            $PerepCount+=2;
	            if ($letter2=="И")
	            $PerepCount+=1;
	            if ($letter2=="С")
	            $PerepCount+=2;
                if ($letter2=="К")
	            $PerepCount+=1;
	            if ($letter2=="А")
	            $PerepCount+=1;
                break;
        case "Любов" :
            if ($letter2=="Л")
	        $LoveCount+=3;
	        if ($letter2=="Ю")
	        $LoveCount+=4;
	        if ($letter2=="Б")
	        $LoveCount+=3;
	        if ($letter2=="О")
	        $LoveCount+=3;
	        if ($letter2=="В")
	        $LoveCount+=3;
             break;
        case "Шлюб" :
            if ($letter2=="Ш")
	        $ShlCount+=4;
	        if ($letter2=="Л")
	        $ShlCount+=3;
	        if ($letter2=="Ю")
	        $ShlCount+=4;
	        if ($letter2=="Б")
	        $ShlCount+=3;
             break;
         case "Віртуальний роман" :
            if ($letter2=="Р")
	        $RomCount+=3;
	        if ($letter2=="О")
	        $RomCount+=2;
	        if ($letter2=="М")
	        $ShlCount+=2;
	        if ($letter2=="А")
	        $RomCount+=1;
            if ($letter2=="Н")
	        $RomCount+=3;
             break;
	}
}
switch($relation)
{
  case "Переписка/дружба":
    	echo "<li> на цікаву переписку/дружбу маєте  " ;
	    $LoveCount=$PerepCount;
	    break;
  case "Любов" :
		echo "<li> на шалене кохання маєте " ;
         break;
  case "Шлюб" :
        echo "<li> на довгий шлюб маєте " ;
        $LoveCount=$ShlCount;
         break;
   case "Віртуальний роман" :
        echo "<li> на багатообіцяючий роман маєте " ;
        $LoveCount=$RomCount;
         break;
}
$Lamount=0;

if ($LoveCount> 0)
$Lamount=  5-(($firstlength+$secondlength)/2);
if ($LoveCount> 2)
$Lamount= 10-(($firstlength+$secondlength)/2);
if ($LoveCount> 4)
$Lamount= 20-(($firstlength+$secondlength)/2);
if ($LoveCount> 6)
$Lamount= 30-(($firstlength+$secondlength)/2);
if ($LoveCount> 8)
$Lamount= 40-(($firstlength+$secondlength)/2);
if ($LoveCount>10)
$Lamount= 50-(($firstlength+$secondlength)/2);
if ($LoveCount>12)
$Lamount= 60-(($firstlength+$secondlength)/2);
if ($LoveCount>14)
$Lamount= 70-(($firstlength+$secondlength)/2);
if ($LoveCount>16)
$Lamount= 80-(($firstlength+$secondlength)/2);
if ($LoveCount>18)
$Lamount= 90-(($firstlength+$secondlength)/2);
if ($LoveCount>20)
$Lamount=100-(($firstlength+$secondlength)/2);
if ($LoveCount>22)
$Lamount=110-(($firstlength+$secondlength)/2);
if ($Lamount < 0)
$Lamount= 0;
if ($Lamount > 99)
$Lamount=99;
 echo $Lamount." % шансів.</li>";
}

?>

