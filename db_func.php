
<?php
 // $week=date('Y-m-d 00:00:00',mktime(gmdate('H')+3,gmdate('i'),gmdate('s'),gmdate('m'),gmdate('d')-7,gmdate('Y')));
 $now=date('Y-m-d H:i:s');
 //$hour=date('Y-m-d H:i:s',mktime(gmdate('H')+2,gmdate('i'),gmdate('s'),gmdate('m'),gmdate('d'),gmdate('Y')));

  function db_connect()
{
   $result = @mysql_pconnect("localhost", "root","");
   if (!$result)
   {
   echo"root Cant conect ";
      return false;
      }
   if (!@mysql_select_db("db"))
      return false;

   return $result;
}
	 function set_login($id,$time)
     {
       	$end=substr($time,-2);
     	$reg_login=$end.$id;
     	return $reg_login;
     }
     function get_rid($rlogin)
     {

        $rid=substr($rlogin,2);
        return $rid;
      }
      function get_ruser($rid,$pass,$c)
      {
      $sql="SELECT name,sex
			FROM anketa_catalog
			WHERE id = '$rid' AND password='$pass'";
      $res = mysql_query($sql, $c);
      return $res;
      }


?>