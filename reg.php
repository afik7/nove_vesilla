 
	<?php
include("head.inc");
?>
<style>
.header{
margin-top:-15px;
}
input{
border-style:1px, solid #ccc;
}
</style>
     <script type="text/javascript">
                function out(){
                        //alert(registration.pass.value);
                         var address, re, dataRight=true, message=" ";
                         re=/([0-9a-zA-Z\.-_]+)@([0-9a-zA-Z\.-_]+)/;
                         address=document.registration.email.value;
                        if(document.registration.login.value=="")
            			{  dataRight=false;
                          message="Введіть ім`я";
                       // document.registration.action="reg.php";
                        }
                        else
                        {
                        	if (document.registration.pass.value=="")
                        	{  dataRight=false;
                          	message="Введіть пароль";

                        	}

                        	else
                            {
                             if(address.match(re)==null)
                        		{  dataRight=false;
                          		message="Введіть правильну адресу пошти";
                        		}
                			}
                        }
                        if(dataRight)
                            document.registration.action="newuser.php";
                        else
                        {  
                         document.registration.action="reg.php";
                        window.alert(message);
                        }
                }
        </script>

<table style="margin-top:50px; align:center"  ><tr><td valign=top width=600>
<div style="layout-flow: vertical-ideographic; height: 300;FONT-WEIGHT:bold;
font-family: Arial, Helvetica, sans-serif;" align="right">
<font color="#FF0000" >*</font>
ПОЛЯ&nbsp; ОБОВ`ЯЗКОВІ&nbsp; ДЛЯ &nbsp;ЗАПОВНЕННЯ</div></td><!--End of Logo cell -->
<td valign="top" width="80%" style="padding-left: 50">
 <form name="registration" id="registration" action="newuser.php" method=post enctype=multipart/form-data
   onsubmit="out();"> <!--action="newuser.php"-->
 <table align=left style="margin-left:150px;>
<tr class=anc><td ><font color=#FF0000>*</font>Ім`я: </td><td>
		<input type="text" size="15" maxlength="20"  name="login"></td></tr>

<tr class=anc><td ><font color=#FF0000>*</font>E-mail адреса:</td><td>
<input type="text" name="email" size=15 value=""></td></tr>
<tr class=anc><td ><font color=#FF0000>*</font>Місто:</td>
	<td><select name=home size=1 class="box">
<?php
$baze1 = file("city.dat");
for ($m=0;$m<count($baze1);$m++)
{
	if(strlen ($baze1[$m])>2)
echo "<option value=$baze1[$m]>$baze1[$m]</option>";
}
?>
</select></td></tr>

<tr class=anc><td ><font color=#FF0000>*</font>Дата народження:</td>
<td class=anc><select name=bday size=1  >
<?php
for($d=1;$d<10;$d++)
 
	echo " <option  value=0$d>0$d</option>";
 

for($d=10;$d<32;$d++)
 
	echo " <option value=$d>$d</option>"; 
 
?>
 </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name=bmonth size=1 >
<?php
for($m=1;$m<10;$m++)
       // <option selected value=$bmonth>$bmonth</option>
 
	   echo"<option value=0$m>0$m</option>"; 

for($m=10;$m<13;$m++)
{
 
 echo"<option value=$m>$m</option>";
}
?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
 <select name=byear size=1 >
<?php
        //<option selected value=$byear>$byear</option>
       $y=date("Y")-100;
       $y_max=date("Y")-10; //max age 10 years
       do
       {
       echo "<option value=$y >$y</option>" ;
       $y++;
       }while($y< $y_max);


 ?>
 </select><br>день&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;місяць&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;рік</td></tr>

  <tr class=anc>
      <td valign="top"><font color="#ff0000">*</font>Мета знайомсва:</td>
      <td >
        <input name="tr1" type="checkbox" value="Переписка/дружба" class="box" >Переписка/дружба<br>
        <input name="tr2" type="checkbox" value="Любов" class="box" >Кохання<br>
        <input name="tr3" type="checkbox" value="Шлюб" class="box" >Шлюб<br>
        <input name="tr4" type="checkbox" value="Віртуальний роман" checked class="box" >Віртуальний роман<br>
       </td>
    </tr>
     <tr class=anc>
     <td ><font color="#ff0000">*</font>Стать:</td>
      <td >
        <select name="sex" size="1" class="box" >
          <option value="Чоловіча">Чоловіча</option>
          <option value="Жіноча" selected>Жіноча</option>
        </select></td>
    </tr>
    <tr class=anc><td ><font color=#FF0000>*</font>Сімейний стан:</td>
<td>
<select name=family size=1 class="box">

<option value="Не&nbsp;у&nbsp;шлюбі">Не&nbsp;у&nbsp;шлюбі</option>
<option value="У&nbsp;&nbsp;шлюбі">У&nbsp;&nbsp;шлюбі</option>
</select></td></tr>
 <tr class=anc>
      <td >Діти:</td>
      <td ><select name="child" size="1" class="box">
          <option value="Є">Є</option>
          <option value="Нема">Нема</option>
        </select></td>
    </tr>
 <tr class=anc>
      <td >Освіта:</td>
      <td ><select name="edu" size="1" class="box">
          <option value="Школяр">Школяр</option>
          <option value="Студент">Студент</option>
          <option value="Вища">Вища</option>
          <option value="Средня">Средня</option>
          <option value="Незакінчена">Незакінчена</option>
          <option value="Інше">Інше</option>
        </select></td>
    </tr>
     <tr class=anc><td >Зріст (см):</td><td ><input name="height" size="5"></td></tr>
    <tr class=anc><td >Вага (кг):</td><td><input name="weight" size="5"></td></tr>
    <tr class=anc><td >Колір волосся:</td>
      <td ><select name="hair" size="1" class="box">
      	<option value="Рудий">Рудий</option>
          <option value="Білявий">Білявий</option>
          <option value="Чорнявий">Чорнявий</option>
          <option value="Каштановий">Каштановий</option>
        </select></td>
    </tr>
    <tr class=anc>
      <td>Колір очей:</td>
      <td><select name="eyes" size="1" class="box">

          <option value="Голубий">Голубий</option>
          <option value="Коричневий">Коричневий</option>
          <option value="Сірий">Сірий</option>
          <option value="Чорний">Чорний</option>
          <option value="Зелений">Зелений</option>
        </select></td>
    </tr>
     <tr class=anc>
      <td ><a href="temper.htm" target="_blank">Темперамент</a>:</td>
      <td ><select name="temper" size="1" class="box">
          <option value="Сангвиник">Сангвіник</option>
          <option value="Флегматик">Флегматик</option>
          <option value="Холерик">Холерик</option>
          <option value="Меланхолик">Меланхолік</option>
        </select></td>
    </tr>
     <tr class=anc><td  vAlign="top">Хоббі,захоплення:</td>
      <td><textarea cols="28" name="hobby"  rows="3" style=" border-color: #ccc;"></textarea></td></tr>
       <tr class=anc><td >Фото1: </td>
      <td><input type="file" class="box" size="15" maxlength="20"  name="pic1"></td></tr>
      <tr class=anc><td >Фото2: </td>
      <td><input type="file" class="box" size="15" maxlength="20"  name="pic2"></td></tr>
      <tr class=anc><td ><font color=#FF0000>*</font>Пароль: </td>
      <td><input type="password" size="15" maxlength="20"  name="pass"></td></tr>
     <tr valign="middle" class=anc>
      <td width=100 align="right">
        <p>&nbsp;</p>
        <p  ><input type="reset"  value="Очистити" class="butt"></p>
       <p>&nbsp;</p>
      </td>
<!--Button submit-->
<td  width=200 align="left">
 <p>&nbsp; </p>
<p ><input type="submit"  class="butt" value="Реєструватись"
 name="go" id="go" ></p>
 <p>&nbsp;</p>
 </td></tr>
</table>
 </form>
</td>
<td align=left><script >
</script></td><!--document.write(out());Cell for messages -->
</tr></table>
</body>
</html>