<html>
<head>
	<title></title>
	 <meta   content="text/html; charset=UTF8">
	<link rel='stylesheet' href='sva.css' type="text/css">
	<style>
	.header{
margin-top:-50px;
}
</style>
    </head>
<body>
<?php include('head.inc') ?>
  <td width=100%  valign="top" align="center"><!--Cell for body-->
  <!--Top Menu begin-->
  <table style='margin-top:50px;'><tr><td class=menu align="center">..::<a href="javascript:history.back();">НАЗАД</a>::..
   </td></tr>
    </table>
  <table width=90%  align=center><tr><td >
  <table border=1  cellspacing="0" style="border-color:#000000" align=center width=80%>
<?php
    include "db_func.php";
    $conn = db_connect();
	
 mysql_query("SET NAMES 'UTF8'");
	 mysql_query("SET CHARACTER SET 'UTF8'");
	 if(isset($aid))
 {
 	$sql ="SELECT * FROM anketa_catalog WHERE id='$aid' ";
	 $result=mysql_query($sql,$conn);
	 $name=mysql_result($result,0,"name");
	 $e=mysql_result($result,0,"email");

	 echo"<tr><th colspan=2 class=tab>$name </th></tr>";
	 echo"<tr><td  class=tab>email:</td><td  class=tab><a href=mailto://".$e.">".$e."</a></td></tr>";
	 echo"<tr><td  class=tab> Місто:</td><td  class=tab>".(mysql_result($result,0,"home"))."</td></tr>";
     echo"<tr><td  class=tab> Дата народження:</td><td  class=tab>".(mysql_result($result,0,"bday")).
     "-".(mysql_result($result,0,"bmonth"))."-".(mysql_result($result,0,"byear"))."</td></tr>";
      echo"<tr><td  class=tab> Сімейний стан:</td><td  class=tab>".(mysql_result($result,0,"family"))."</td></tr>";
      echo"<tr><td  class=tab> Діти:</td><td  class=tab>".(mysql_result($result,0,"child"))."</td></tr>";
      echo"<tr><td  class=tab>Освіта:</td><td  class=tab>".(mysql_result($result,0,"edu"))."</td></tr>";
      echo"<tr><td  class=tab> Зріст:</td><td  class=tab>".(mysql_result($result,0,"height"))."</td></tr>";
      echo"<tr><td  class=tab> Вага:</td><td  class=tab>".(mysql_result($result,0,"weight"))."</td></tr>";
      echo"<tr><td  class=tab> Колір волосся:</td><td  class=tab>".(mysql_result($result,0,"hair"))."</td></tr>";
      echo"<tr><td  class=tab> Колір очей:</td><td  class=tab>".(mysql_result($result,0,"eyes"))."</td></tr>";
      echo"<tr><td  class=tab><a href=temper.htm  class=tab> Темперамент:</a></td><td  class=tab>".(mysql_result($result,0,"temper"))."</td></tr>";
      echo"<tr><td  class=tab> Хоббі,захоплення:</td><td  class=tab>".(mysql_result($result,0,"hobby"))."</td></tr>";
     $p1= mysql_result($result,0,"pic1");
          $p2= mysql_result($result,0,"pic2");

     $f=0;
      if(isset($p1)&&$p1)
         $f+=1; //1
      if(isset($p2)&&$p2)
        $f+=2;//2 OR 3

     if($f>0)
        {
      	echo"<tr><td colspan=2  class=tab align=center>Фотографії: </td></tr>";
         switch($f)
         {
         case 1 :
             echo"<tr><td colspan=2  class=tab align=center><img src=".$p1."></td></tr>";
             break;
         case 2 :
             echo"<tr><td colspan=2  class=tab align=center><img src=".$p2."></td></tr>";
             break;
         case 3 :
             echo"<tr><td  class=tab><img src=".$p1."></td><td  class=tab align=right><img src=".$p2."></td></tr>";
             break;
         }

      }




 }
 echo "</table>";
include("foot.inc");
?>
