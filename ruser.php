
<?php
     include "relation_func.php";
    include "db_func.php";
    $conn = db_connect();
	 mysql_query("SET NAMES 'UTF8'");
	 mysql_query("SET CHARACTER SET 'UTF8'");
/*if(!isset($user)||$user=="")
 {
     echo"<script lanquage=\"JavaScript\">alert(\"¬и не ввели лог≥н\");
     history.back();</script>" ;
     //  echo"<script>history.back();</script>";

 }
else if(!isset($pass)||$pass=="")
{

  echo"<script lanquage=\"JavaScript\">alert(\"¬ви не ввели пароль\");
     history.back();</script>" ;
}

else
{
*/
 if(!isset($rid))
	{$rid=get_rid($user) ;
	$r=get_ruser($rid,$pass,$conn);

	if (mysql_num_rows($r)>0)
 	{
 	$ruser=mysql_result($r,0,"name");
    $rsex=mysql_result($r,0,"sex");


 	}
 else
  echo "Cпочатку зареєструйтесь<br><script lanquage=\"JavaScript\">alert(\"Ви не ввели пароль\");
     history.back();</script>";
     }
      if (!@session_is_registered("rid"))
   		@session_register("rid");
    if (!@session_is_registered("ruser"))
   		@session_register("ruser");
     if (!@session_is_registered("rsex"))
   		@session_register("rsex");
//}
include("head.inc");
?>
<h3 align=center>Раді вітати Вас на цьому сайті!</h3>
<div id="main">
<div id="left_block">
<table  > <tr ><td   >
        <form action=ruser.php method=get>
		Виберіть мету знайомсва:<br>
		<input name="tr1" type="checkbox" value="Переписка/дружба" class="box" >Переписка/дружба<br>
        <input name="tr2" type="checkbox" value="Кохання" class="box" >Кохання<br>
        <input name="tr3" type="checkbox" value="Шлюб" class="box" >Шлюб<br>
        <input name="tr4" type="checkbox" value="Віртуальний роман"  class="box" >Віртуальний роман<br>
        <input name="choose" type="submit" value="Вибрав" class=butt>
</form>
</td></tr>
 <tr><td >
 <?php
 //&&( isset($tr1)||isset($tr2)||isset($tr3)||isset($tr4))
 if(!isset($tr1))
 	$tr1=" ";
  if(!isset($tr2))
 	$tr2=" ";
     if(!isset($tr3))
 	$tr3=" ";
     if(!isset($tr4))
 	$tr4=" ";

 if(isset($choose)&& ($choose=="Вибрав"))
 {   //if($rsex)
//{
	$sql_c="SELECT id,name, tr1, tr2,tr3,tr4
    FROM anketa_catalog WHERE sex!='$rsex'
     AND(tr1='$tr1'OR tr2='$tr2'OR tr3='$tr3' OR tr4='$tr4')
    GROUP BY name	";
    /*
	sql_c="SELECT id, name, tr1, tr2,tr3,tr4 FROM anketa_catalog
    WHERE sex='„ќЋќ¬≤„ј'
         ";                              //AND (tr1='$tr1' OR tr2='$tr2' OR tr3='$tr3' OR tr4='$tr4'))
      */
         $result_c=mysql_query($sql_c,$conn);

 	$n=mysql_num_rows($result_c);
  
    if(!$n)
	echo " Не існує людей з такими даними. <br> ";
    else
    {
	// echo $n."III";
    	    for($i=0;$i<$n;$i++)
	        {
	           $name2=mysql_result($result_c,$i,"name");
	           echo " - ".$ruser." та ".$name2." <ul>";
			   
	           $btr1=mysql_result($result_c,$i,"tr1");
	           $btr2=mysql_result($result_c,$i,"tr2");
	           $btr3=mysql_result($result_c,$i,"tr3");
	           $btr4=mysql_result($result_c,$i,"tr4");
			   
			 // echo $btr1." iii".$btr2." iii".$btr3." iii".$btr4;
	           if(isset($btr1))
	                get_relation($ruser,$name2,$btr1) ;
	           if(isset($btr2))
	                get_relation($ruser,$name2,$btr2) ;
	           if(isset($btr3))
	                get_relation($ruser,$name2,$btr3) ;
	           if(isset($btr4))
	                get_relation($ruser,$name2,$btr4) ;
	         echo"</ul>";
	        }
     }

}
 ?>
 </td></tr>
</table>
</div>
<div id="peoples">
<h3 align=center>Користувачі сайтом</h3>
<?php
echo $ruser;
//visit date
$sql_d="update anketa_catalog set last_date='$now'WHERE id='$rid'";
	$r=mysql_query($sql_d,$conn);
echo "<table align=center >";
//echo $rsex;
if($rsex)
{
	$sql="SELECT id,name, home,  byear, hobby,pic1,pic2
    FROM anketa_catalog WHERE sex!='$rsex'
    	ORDER BY last_date";

    $result=mysql_query($sql,$conn);
    $n=mysql_num_rows($result);

    for($i=0;$i<$n;$i++)
    {
    	$byear=mysql_result($result,$i,"byear");
        $age=date("Y")-$byear;
        $hobby=mysql_result($result,$i,"hobby") ;
        $arr=(explode(' ', $hobby,5));
        //print_r(explode('|', $str, 2));

    	$p=mysql_result($result,$i,"pic1");
   		if(!$p)
      		$p=mysql_result($result,$i,"pic2");
    	echo"<tr valign=top style=\"border-bottom:1 solid green\"><td width=100 height=150>";
        if($p)
        	 echo"<img src=".$p.">";
        else echo"&nbsp;";
        echo"</td><td>";
         echo mysql_result($result,$i,"name").", ".$age."<br><br>";
         echo "Місто: ".mysql_result($result,$i,"home")."<br>";
         echo "Хоббі: ";
         $j=0;
         while(isset($arr[$j]))
         {
         	echo"&nbsp;".$arr[$j];
            $j++;
            if($j>=4)
            {
            echo"...";
            break;
           }
         }
        $aid=mysql_result($result,$i,"id") ;
        echo"<br>Анкета:&nbsp;<a href=anketa.php?aid=$aid>&gt;&gt;</a>
        <hr color= #339933;></td></tr>";


    }

 }

echo"</table>";
 ?>
</div>
</div>
<?php
include("foot.inc");
?>