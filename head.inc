<html>
<head>
	<title>ВЕСІЛЛЯ</title>
	 <meta content="text/html; charset=UTF-8">
	<link rel='stylesheet' href='style.css' type="text/css">
    <script type="text/javascript">
                function out1(){

                         var  dataRight=true, message=" ";
                        if(document.log.user.value=="")
            			{  dataRight=false;
                          message="Введіть логін";
                       // document.log.action="index.php";
                        }
                        else
                        {
                        	if (document.log.pass.value=="")
                        	{  dataRight=false;
                          	message="Введіть пароль";

                        	}


                        }
                        if(dataRight)
                            document.log.action="ruser.php";
                        else
                        {
                         document.log.action="index.php";
                        window.alert(message);
                        }
                }
        </script>
		
<style>
.tre2{
border-top:7px solid green;
border-bottom: 7px solid red;
border-left: 6px solid blue;
border-right: 6px solid yellow;
width:5px;
position:absolute;
top:8px;
left:155px;
}
</style>
<style>
.header{
margin-top:-15px;
}
#main{
width:900px;
float:left;
}
#left_block{
width:400px;
float:left;
}
#peoples{
width:400px;
float:left;
}
#foot{
position:relative;
margin:200px;
}
</style>
</head>
<body>
  <div class="header">
	<div class="logo"><a href="/">НОВЕ ВЕСІЛЛЯ</a><div class="tre2"></div></div>
	<div class="auth"><?php
 	if(isset($rsex))
	{    echo "";
    	if($rsex=="Жіноча")
        echo"<font style=font-size:20>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:Жінки&nbsp;&nbsp;&nbsp;&nbsp;
        </font></td> ";
        else
        echo" <font style=font-size:20>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Чоловіки&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;</font></td> ";
    }
    if(isset($ruser))
    {
    	echo "<td rowspan=2 align=left
             width=30%>".$ruser.", Ми раді бачити Вас!" ;
    }
    else
        echo "   
    <form action =ruser.php method=\"get\" name=\"log\" onsubmit=\"out1();\" >
   <div align='center'> <input type=text name=\"user\" class=\"box\" placeholder=\"Логін...\">
    <input type=password name=\"pass\" class=\"box\" placeholder=\"Пароль...\"> 
    <input type=submit name=\"aut\" value=\"Увійти\" class=\"butt\">
    <a href=\"reg.php\">Зареєструватись</a></div>
    </form>";
 ?> </div>
	<div class="localization"><img src="img/ukr.png" /><div class="tre"></div></div>
 </div>
   <!--Main body begin-->
  <table width=90%  align=center><tr><td >