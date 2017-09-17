<?php
include("head.inc");
?>
<style>
.header{
margin-top:-15px;
}
</style>
<body>
<div align="center" style="margin-top:150px;">
<table ><tr>
    <td>
<?php
		 include "img_func.php";
        // include "gettime_func.php";
         include "db_func.php";
    $conn = db_connect();
	mysql_query("SET NAMES 'utf8'");
	 mysql_query("SET CHARACTER SET 'utf8'");
 if(isset($login)&&$login!=="")
 {

    $sql="select ID from anketa_catalog  where name='$login'";
    $result = mysql_query($sql, $conn);
    if(mysql_num_rows($result)>0)
    {
    	echo"<div align='center'><h1>Користувач з ім`ям - $login <br>
        вже зареєстрований.</h1></div><br>"  ;
        echo "<br><div align='center'><a href=reg.php>До реєстрації</a></div>";
        // exit;
    }
    else
    {
        $sql_in="insert into anketa_catalog (name,email,home,
        password,enter_date,last_date)
       	values ('$login','$email','$home','$pass','$now','$now')";
        $result_in=mysql_query($sql_in,$conn);
        $id=mysql_insert_id($conn);
  		if ($id)
        {
  			 mysql_query("update anketa_catalog set sex='$sex',
    	     bday='$bday', bmonth='$bmonth', byear='$byear', family='$family',
     		 child='$child', edu='$edu', hair='$hair', eyes='$eyes',
     		 temper='$temper' where id=$id",$conn);
   		     if (isset($tr1)) mysql_query("update anketa_catalog set tr1='$tr1' where id=$id",$conn);
   			if (isset($tr2)) mysql_query("update anketa_catalog set tr2='$tr2' where id=$id",$conn);
   			if (isset($tr3)) mysql_query("update anketa_catalog set tr3='$tr3' where id=$id",$conn);
   			if (isset($tr4)) mysql_query("update anketa_catalog set tr4='$tr4' where id=$id",$conn);

   			if (isset($height)) mysql_query("update anketa_catalog set height='$height' where id=$id",$conn);
   			if (isset($weight)) mysql_query("update anketa_catalog set weight='$weight' where id=$id",$conn);
   			if (isset($hobby)) mysql_query("update anketa_catalog set hobby='$hobby' where id=$id",$conn);
        //Preparation for image processing
        if($sex=="Чоловіча")
        	$s="m";
        else $s="f";
        switch($hair)
        {
             case "Рудий" :
                   $h="Red";
                   break;
             case "Білявий" :
                   $h="Blo";
                   break;
             case "Чорнявий" :
                   $h="Cho";
                   break;
             case "Каштановий" :
                   $h="Kas";
                   break;
         }
            //Image1 processing
    if ( ($pic1) && ($pic1 != "none") )
    {
    	$pic1=str_replace(' ','%20',$pic1);  //if path to image file has cyrillic letters
    	$type = basename($pic1_type);  //image file type
        $iname=basename($pic1_name);    //image file name
         //$size=
         // $type = basename($pfileclient_type);  //file type

    	switch ($type)
     	{
   			 case "jpeg":
    	     case "pjpeg":

    				$filename = "photos1/".$h."-".$s."-".$id.".jpg";
                    pic_save($pic1,$filename,$type);
                   //	copy ($pic1, $filename);
                    $sql = "update anketa_catalog set pic1 = '$filename'
                           where id = $id";
                   	$result = mysql_query($sql, $conn);
                    if(!$result)
        	        {
	                    print "Помилка запросу до БД <PRE>$sql_t</PRE>";
	                    print mysql_error();
	                    exit;
	                }
                   echo"&nbsp;".$login."&nbsp;фото --->&nbsp;".$iname."<br> успішно відправлено до серверу<br> ";
                    break;
             case "gif":
             		$filename = "photos1/".$h."-".$s."-".$id.".gif";
                    pic_save($pic1,$filename,$type) ;
                   //	copy ($pict, $filename);
                    $sql = "update anketa_catalog set pic1 = '$filename'
                           where id = $id";
                   	$result = mysql_query($sql, $conn);
					 echo"&nbsp;".$login."&nbsp;фото --->&nbsp;".$iname."<br> успішно відправлено до серверу<br> ";
                    break;

    		default:
                    print "Невірний формат зображення: ".$type;
 		 }//switch end

    } //end Image1 procesing

    //Image2 processing
    if ( ($pic2) && ($pic2 != "none") )
    {
    	$pic2=str_replace(' ','%20',$pic2);  //if path to image file has cyrillic letters
    	$type = basename($pic2_type);  //image file type
        $iname=basename($pic2_name);    //image file name

    	switch ($type)
     	{
   			 case "jpeg":
    	     case "pjpeg":

    				$filename = "photos2/".$h."-".$s."-".$id.".jpg";
                    pic_save($pic2,$filename,$type);
                   //	copy ($pic1, $filename);
                    $sql = "update anketa_catalog set pic2 = '$filename'
                           where id = $id";
                   	$result = mysql_query($sql, $conn);
                    if(!$result)
        	        {
	                    print "Помилка запросу до БД <PRE>$sql_t</PRE>";
	                    print mysql_error();
	                    exit;
	                }
                    echo"&nbsp;".$login."&nbsp;фото --->&nbsp;".$iname."<br> успішно відправлено до серверу<br> ";
                    break;
             case "gif":
             		$filename = "photos2/".$h."-".$s."-".$id.".gif";
                    pic_save($pic2,$filename,$type) ;
                   //	copy ($pict, $filename);
                    $sql = "update anketa_catalog set pic2 = '$filename'
                           where id = $id";
                   	$result = mysql_query($sql, $conn);
					echo"&nbsp;".$login."&nbsp;фото --->&nbsp;".$iname."<br> успішно відправлено до серверу<br> ";
                    break;

    		default:
                    print "Невірний формат зображення: ".$type;
 		 }//switch end

    } //end Image2 procesing
 }
    	echo "<h1><center>".$login."<br>Дякуємо за реєстрацію!  <br></h1>" ;
        echo "<div align='center'><h2><br>Ваш логін:<br>  ".(set_login($id,$now))."<br></h2></div>" ;
    	echo "<div align='center'><a href=index.php>Зайдіть під цим логіном</a></div></center>";
      }
 }

?>
 </td></tr> </table></div>
</body>

</html>