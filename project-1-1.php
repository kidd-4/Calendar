<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<?php
  session_start();
  $_SESSION['flag']=1;
  $_SESSION['sign']=1;

  if(!isset($_SESSION['user']))
  {
	  $_SESSION['user']="newGuest";
  }
  else
  {
	  $_SESSION['user']="oldGuest";
  }

  
?>



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calendar</title>
<link href="project.css" rel="stylesheet" type="text/css" />
<script src="testJS7.js"  >
</script>

</head>
<!--
<?php

if(!empty($_GET['today']) )
{   
    $_GET['month'] = date('m');
	$_GET['year'] = date('Y');
	
}
if ($_GET['month'] && $_GET['year'])  
    {  
	
        $month = $_GET['month'];  
        $year = $_GET['year'];  
	
    }  
    else   
    {  
        $month = date ('m');  
        $year = date ('Y');  
    }	 
	
$weekid = date ('w',mktime(0,0,0,$month,1,$year));//某年某月第一天是星期几。0-6分别代表星期日-星期六  
$countdays = date('t',mktime(0,0,0,$month,1,$year));//某年某个月的天数  
$arr_days = array ();//数组$arr_days代表某个月的每一天
 
 //初始化数组$arr_days  
    for ($i = 0; $i <= 41; $i++)  
    {  
        $arr_days[$i] = " ";  
    }  
  
    //给$arr_days数组赋值  
    for ($i = $weekid, $j = 1; $j <= $countdays; $i++, $j++)  
    {  
        $arr_days[$i] = $j;  
    }



?>

-->


<body   background="1.jpg">
<form id='0' action =""  >

<table align="center"  width=500px, height=400px >

<tr >
<td >
<div >
<table   width= 400px height="50px" cellpadding="0" cellspacing="0">
<tr >
<td width= 130px height="50px" align="center">
<button  id="backYear" class="btn-year"> < </button>
<select id="yearSelect" onchange="document.getElementById('0').submit();"  name="year" class="select">

<?php
$_SESSION['sign']=1;

if(!empty($_GET['today']) )
{
	$_SESSION['sign']=$_GET['today'];
	
}
else 
$_SESSION['sign']=1;

if(!empty($_GET['year']) && $_SESSION['sign']==1)
$k = $_GET['year'];
else
$k = date('Y');


for($i=1901;$i<=2050;$i++)
{
if($i == $k)
echo "<option value='$i'   selected  >$i</option>";
else 
echo "<option value='$i'     >$i</option>";
}

?>


</select>
<button  id="forwardYear" class="btn-year">></button>
</td>
<td width= 130px height="50px" align="center">
<button  id="backMonth" class="btn-month"> < </button>
<select id="monthSelect" onchange="document.getElementById('0').submit();" name="month" class="select">
  
  <?php
$_SESSION['flag']=1;



if(!empty($_GET['today']) )
{
	$_SESSION['flag']=$_GET['today'];
	
}
else 
$_SESSION['flag']=1;

if(!empty($_GET['month']) && $_SESSION['flag']==1)
$k=$_GET['month'];
else
$k=date('m');


for($i=1;$i<=12;$i++)
{	
if($i==$k)
echo "<option  value='$i' selected  >$i</option>";
else
echo "<option  value='$i'  >$i</option>";
}
 ?>
  
  
</select>
<button  id="forwardMonth" class="btn-month"> > </button>
</td>
<td width= 140px height="50px" align="center">
<input type="submit" value="返回今天" name="today" id="return-today" />	
</td>
</tr>
</table>
</div>



<div>
<table border = 1  cellpadding="0"  cellspacing="0" frame="above" rules="rows">
<tr bgcolor=transparent>
<th width="57px" height="50px"><font color="#FC0">日</font></th>
<th width="57px" height="50px"><font color="white">一</font></th>
<th width="57px" height="50px"><font color="white">二</font></th>
<th width="57px" height="50px"><font color="white">三</font></th>
<th width="57px" height="50px"><font color="white">四</font></th>
<th width="57px" height="50px"><font color="white">五</font></th>
<th width="57px" height="50px"><font color="#FC0">六</font></th>
</tr>
<?php
for ($i = 0; $i <= 41; $i++)  
            {  
                if ($i % 7 == 0)  
                {  
                    echo '<tr>';  
                }  
				if($arr_days[$i] == date("d") )
                echo '<td  class="output-td" >'.'<button class="btn" id="today-btn" type="submit"  name="num" value='.$arr_days[$i].' >'.$arr_days[$i].'</button>'.'</td>'; 
				else if ( $arr_days[$i] ==" ")
				echo '<td>'.'</td>';
				else if(date ('w',mktime(0,0,0,$month,$arr_days[$i],$year))== 0 || date ('w',mktime(0,0,0,$month,$arr_days[$i],$year))== 6 )
				echo '<td class="output-td" >'.'<button class="btn"  id="weekend-btn" type="submit" value='.$arr_days[$i].' name="num" >'.$arr_days[$i].'</button>'.'</td>'; 
				else 
				echo '<td class="output-td"  >'.'<button class="btn"  class="btn" type="submit" value='.$arr_days[$i].' name="num" >'.$arr_days[$i].'</button>'.'</td>'; 
                if (($i + 1) % 7 == 0)  
                {  
                    echo '</tr>';  
                }  
            }
			
	
	

			
?>
</table>
</div >
</td>

<td id="output">

<table width=110px >

<?php 

if(!empty($_GET['num']))
$num=$_GET['num'];
else
$num= date("d");


if(!empty($_GET['year'] )&& !empty($_GET['month'] ))
{
$week = date ('l',mktime(0,0,0,$_GET['month'],$num,$_GET['year']));
echo '<tr >'.'<td valign="top" align="center"  >'.'<font color="#FFFFFF" face="Arial, Helvetica, sans-serif" class="showBigDate">'.$_GET['year'].'-'.$_GET['month'].'-'.$num.'<br/>'.$week.'</font>'.'</td>'.'</tr>';
}
else
{
$week = date ('l',mktime(0,0,0,date('Y'),$num,date('m')));
echo '<tr  >'.'<td valign="top" align="center">'.'<font face="Arial, Helvetica, sans-serif"  color="#FFFFFF" class="showBigDate">'.date('Y').'-'.date('m').'-'.$num.'<br/>'.$week.'</font>'.'</td>'.'</tr>';
}


if(!empty($_GET['num']))
echo '<tr >'.'<td valign="top" align="center" id="bignum">'.'<font  size=30px color="#FFFFFF" class="showBigDate" >'.$_GET['num'].'</font  >'.'</td>'.'</tr>';
else
{
$day=date("d");
echo '<tr >'.'<td valign="top" align="center" id="bignum">'.'<font size=30px color="#FFFFFF" class="showBigDate">'.$day.'</font>'.'</td>'.'</tr>';
}

?>
<tr>
<td id="showLunarInfo">

</td>
</tr>

<tr><td>
<img src="" alt="" id="showShengxiaoPic"/>
</td></tr>
</table>


</td>
</tr>


</table>
</form>

<!--
<textarea style="display:block" id="hiddenText" ></textarea>
-->
<div  align="right">
<table >

<?php
   date_default_timezone_set('prc');
   function operationDb($sql){
	   @$link=mysql_connect('localhost','root','');
       mysql_select_db("pageviews",$link);
	   mysql_query("set names 'utf8'");
	   if($link)
	   {
		  return mysql_query( $sql,$link);
	   }
   }
   function getNumber($result)
   {
	   return  mysql_num_rows($result);
   }
   $today_number=0;
   $lastday_number=0;
   $total=0;
   $time=date('y-m-d G:i:s',time());
   echo '<tr>'.'<td align="left">'.'<font size=4px color="#FFFFFF">'.$time.'</font>'.'</td>'.'</tr>';
   $add='insert into visits values(0,0,now())';
   $select_today='select * from visits where to_days(now())=to_days(visittime)';
   $select_lastday='select * from visits where to_days(now())-to_days(visittime)=1';
   $select_total='select * from visits';
   if($_SESSION['user']=="newGuest")
   {
	   echo '<tr >'.'<td align="left">'.'<font size=4px color="#FFFFFF">'.'欢迎访问！我的新朋友！'.'</font>'.'</td>'.'</tr>';
       $rs=operationDb( $add); 
	   if(!$rs)
	   {
		 echo "<p style=\"color:red;\">".mysql_error()."</p>";   
	   }
   }
   else if($_SESSION['user']=="oldGuest")
   {
	   echo '<tr >'.'<td align="left">'.'<font  size=4px color="#FFFFFF">'.'欢迎回来老朋友！'.'</font>'.'</td>'.'</tr>';
	   
   }
   
   $today_number=getNumber(operationDb($select_today));
   $lastday_number=getNumber(operationDb($select_lastday));
   $total=getNumber(operationDb($select_total));
   
   echo '<tr >'.'<td align="left">'.'<font  size=4px color="#FFFFFF">'.'今日访问量:'.$today_number.'</font>'.'</td>'.'</tr>';
   echo '<tr >'.'<td align="left">'.'<font size=4px color="#FFFFFF">'.'昨日访问量:'.$lastday_number.'</font>'.'</td>'.'</tr>';
   echo '<tr >'.'<td align="left">'.'<font size=4px color="#FFFFFF">'.'总访问量:'.$total.'</font>'.'</td>'.'</tr>';
    
?>



</table>
</div>

</body>
<script>

// solar festivals
var solarFes = {
			"0101" : "元旦节",
			"0214" : "情人节",
			"0305" : "学雷锋纪念日",//
			"0308" : "妇女节",
			"0312" : "植树节",
			"0315" : "消费者权益日",
			"0401" : "愚人节",
			"0501" : "劳动节",
			"0504" : "青年节",
			"0601" : "儿童节",
			"0701" : "建党节",
			"0801" : "建军节",
			"0910" : "教师节",
			"1001" : "国庆节",
			"1224" : "平安夜",
			"1225" : "圣诞节"
		};
var lunarFes = {
			"0101" : "春节",
			"0115" : "元宵节",
			"0505" : "端午节",
			"0815" : "中秋节",
			"0909" : "重阳节",
			"1208" : "腊八节",
			"0100" : "除夕"
		};

// 鼠、牛、虎、兔、龙、蛇、马、羊、猴、鸡、狗、猪
var shengxiaoPic = {
			"鼠" : "shu.png",
			"牛" : "niu.png",
			"虎" : "hu.png",
			"兔" : "tu.png",
			"龙" : "long.png",
			"蛇" : "she.png",
			"马" : "ma.png",
			"羊" : "yang.png",
			"猴" : "hou.png",
			"鸡" : "ji.png",
			"狗" : "gou.png",
			"猪" : "zhu.png"
}
//alert(solarFes["0101"]);



//	var btns = document.getElementsByClassName("btn");
/*
function yearSelectChange() {
	document.getElementById('0').submit();
	var ObjTemp = document.getElementById("yearSelect");
	var year = ObjTemp.options[ObjTemp.options.selectedIndex].value;
	var ObjTemp2 = document.getElementById("monthSelect");
	var month = ObjTemp2.options[ObjTemp2.options.selectedIndex].value;
	var date = (new Date()).getDate();
	
	var lunarTemp = calendar.solar2lunar(year,month,date);
	showInSidebar(lunarTemp);
}
*/

function showInSidebar(lunarTemp) {
//alert("diandian");


 var cMonthT = lunarTemp.cMonth; 
    var cDayT = lunarTemp.cDay; 
     
    var xingzuo = getXZ(cMonthT,cDayT); 
 




	var Obj3 = document.getElementById("showLunarInfo");
//var lunarTemp = calendar.solar2lunar(year,month,date);
	Obj3.innerHTML = "<div id='lunarInfo'>"+"<font color=white face='Arial Black', Gadget, sans-serif>"
			 + xingzuo + "<br>"
			+lunarTemp.IMonthCn+lunarTemp.IDayCn + "<br>" + lunarTemp.gzYear + "年" + "&nbsp;" 
			+ "[" + lunarTemp.Animal +"年]" + "<br>" + lunarTemp.gzMonth + "月" + "&nbsp"
			+ lunarTemp.gzDay + "日" +"</font>"+"</div>";
}



// get the xingzuo 
function getXZ(m,d){ 
 
    if((m==1&&d>=20)||(m==2&&d<=18)){        //水瓶座 1.20-2.18 
        return "水瓶座"; 
    }else if((m==2&&d>=19)||(m==3&&d<=20)){    //双鱼座 2.19-3.20 
        return "双鱼座"; 
    }else if((m==3&&d>=21)||(m==4&&d<=19)){    //白羊座 3.21-4.19 
        return "白羊座"; 
    }else if((m==4&&d>=20)||(m==5&&d<=20)){    //金牛座 4.20-5.20 
        return "金牛座"; 
    }else if((m==5&&d>=21)||(m==6&&d<=21)){    //双子座 5.21-6.21 
        return "双子座"; 
    }else if((m==6&&d>=22)||(m==7&&d<=22)){        //巨蟹座 6.22-7.22 
        return "巨蟹座"; 
    }else if((m==7&&d>=23)||(m==8&&d<=22)){     //狮子座 7.23-8.22 
        return "狮子座"; 
    }else if((m==8&&d>=23)||(m==9&&d<=22)){    //处女座 8.23-9.22 
        return "处女座"; 
    }else if((m==9&&d>=23)||(m==10&&d<=23)){    //天秤座 9.23-10.23 
        return "天秤座"; 
    }else if((m==10&&d>=24)||(m==11&&d<=22)){    //天蝎座 10.24-11.22 
        return "天蝎座"; 
    }else if((m==11&&d>=23)||(m==12&&d<=21)){    //射手座 11.23-12.21 
        return "射手座"; 
    }else {            //摩羯座 12.22-1.19 
        return "摩羯座"; 
    } 
 
}





function getLunarMonthDays(y,m) {
	return calendar.monthDays(y,m);
}






window.onload = function() {
	
	var Obj = document.getElementById("yearSelect");
	
	var year = Obj.options[Obj.options.selectedIndex].value;
	var Obj2 = document.getElementById("monthSelect");
	var month = Obj2.options[Obj2.options.selectedIndex].value;
	var btns = document.getElementsByClassName("btn");



	

	//var lunar = calendar.solar2lunar();
	//alert("hah: " + lunar.lMonth+lunar.lDay);



	for(j=0;j<btns.length;j++) {
		//var A = new U(new Date(year, month, j+1));   // old method 
		
		btns[j].onmouseover=function(){
			this.style.cursor="pointer";
			};

		var temp = btns[j].value;		
		
		var lunar = calendar.solar2lunar(year,month,j+1);


		var lYear = lunar.lYear;
		var lMonth = lunar.lMonth;
		var lDay = lunar.lDay;
		// show lunar festival		
		if(lMonth==1) { 
            if(lDay==1) {   //  +"<div id='box' >"    +"</div>" 
                btns[j].innerHTML=temp + "<br>"+"<div class='box' >" +"<font color='red' >" + lunarFes["0101"] + "</font>"; 
                continue; 
            }else if(lDay==15) { 
                btns[j].innerHTML=temp + "<br>" +"<div class='box' >" + "<font color='red'>" + lunarFes["0115"] + "</font>"+"</div>"; 
                continue; 
            }else {} 
        }else if(lMonth==5 && lDay==5) {        //0505 
                btns[j].innerHTML=temp + "<br>" +"<div class='box' >" + "<font color='red'>" + lunarFes["0505"] + "</font>"+"</div>"; 
                continue; 
        }else if(lMonth==8 && lDay==15) {        //0815 
                btns[j].innerHTML=temp + "<br>" +"<div class='box' >" + "<font color='red'>" + lunarFes["0815"] + "</font>"+"</div>"; 
                continue; 
        }else if(lMonth==9 && lDay==9) {        //0909 
                btns[j].innerHTML=temp + "<br>" + "<div class='box' >" +"<font color='red'>" + lunarFes["0909"] + "</font>"+"</div>"; 
                continue; 
        }else if(lMonth==12) {    //1208,0100 
                if(lDay==8) { 
                    btns[j].innerHTML=temp + "<br>" + "<div class='box' >" + "<font color='red'>" + lunarFes["1208"] + "</font>" + "</div>"; 
                    continue; 
                }else if(lDay==getLunarMonthDays(lYear,lMonth)) { 
                    btns[j].innerHTML=temp + "<br>"+ "<div class='box' >" + "<font color='red'>" + lunarFes["0100"] + "</font>"+ "</div>"; 
                    continue; 
                }else {} 
        }else {} 
         
/* 
小寒、大寒、立春、雨水、惊蛰、春分、清明、谷雨、立夏、小满、芒种、夏至、小暑、大暑、立秋、处暑、白露、秋分、寒露、霜降、立冬、小雪、大雪,冬至、 
*/ 
 
//var ttt = calendar.getTerm(year,4);    xiaohan  start. 
        // show solar festival 
        if(month==1) { 
                if(j==0) { 
                        btns[j].innerHTML=temp + "<br>"+"<div class='box'>" +  "<font color='red'>" + solarFes["0101"] + "</font>"+"</div>"; 
                        continue; 
                }else if((j+1)==calendar.getTerm(year,1)) {  // xiaohan 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "小寒" + "</font>"; 
                        continue; 
                }else if((j+1)==calendar.getTerm(year,2)) {   // dahan 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "大寒" + "</font>"; 
                        continue; 
                }else {} 
        } else if(month==2) { 
                if(j==13){ 
                        btns[j].innerHTML=temp + "<br>" +"<div class='box'>"+ "<font color='red'>" + solarFes["0214"] + "</font>"+"</div>"; 
                        continue; 
                }else if((j+1)==calendar.getTerm(year,3)){        // lichun  立春、雨水 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "立春" + "</font>"; 
                        continue; 
                }else if((j+1)==calendar.getTerm(year,4)){        // yushui 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "雨水" + "</font>"; 
                        continue; 
                }else {}   
        } else if(month==3) {  //学雷锋纪念日  solarFes["0305"]   惊蛰、春分 
                if(j==4) { 
                        btns[j].innerHTML=temp + "<br>"  +"<div class='box'>"+ "<font color='red'>学雷..."  + "</font>"+"</div>"; 
                        if(calendar.getTerm(year,5)==5){ 
                            btns[j].setAttribute("title","学雷锋纪念日"+ "   " +"节气: 惊蛰"); 
                        }else { 
                            btns[j].setAttribute("title","学雷锋纪念日"); 
                        } 
                continue; 
            }else if(j==7) { 
                btns[j].innerHTML=temp + "<br>"  +"<div class='box'>" + "<font color='red'>" + solarFes["0308"] + "</font>"+"</div>"; 
                continue; 
            }else if(j==11) {   
                btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["0312"] + "</font>"+"</div>"; 
                continue; 
            }else if(j==14) {  //消费者权益日0315 
                btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>消费..." + "</font>"+"</div>"; 
                btns[j].setAttribute("title","消费者权益日"); 
                continue; 
            }else if((j+1)==calendar.getTerm(year,5)){        //惊蛰5  maybe comfict with xueleifeng 
                    btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "惊蛰" + "</font>"; 
                    continue; 
            }else if((j+1)==calendar.getTerm(year,6)){        //春分6 
                    btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "春分" + "</font>"; 
                    continue; 
            }else {} 
        } else if(month==4) {        //0401  清明7、谷雨8 
                    if(j==0) { 
                        btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["0401"] + "</font>"+"</div>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,7)){ 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "清明" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,8)){        //谷雨8 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "谷雨" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==5) {        //"0501" : "劳动节","0504" : "青年节", 
                    if(j==0) {         
                        btns[j].innerHTML=temp + "<br>"  +"<div class='box'>" + "<font color='red'>" + solarFes["0501"] + "</font>"+"</div>"; 
                        continue; 
                    } else if(j==3) { 
                        btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["0504"] + "</font>"+"</div>"; 
                        continue; 
                    } else if((j+1)==calendar.getTerm(year,9)){ //立夏9、小满10 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "立夏" + "</font>"; 
                        continue; 
                    } else if((j+1)==calendar.getTerm(year,10)){    //小满 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "小满" + "</font>"; 
                        continue; 
                    } else {} 
        } else if(month==6) {        //"0601" : "国际儿童节", 
                    if(j==0) { 
                        btns[j].innerHTML=temp + "<br>"  +"<div class='box'>"+ "<font color='red'>" + solarFes["0601"] + "</font>"+"</div>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,11)){  //芒种11、夏至12、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "芒种" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,12)){        // 夏至 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "夏至" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==7) {        //"0701" : "中国共产党诞辰", 
                    if(j==0) { 
                        btns[j].innerHTML=temp + "<br>" +"<div class='box'>"+ "<font color='red'>" + solarFes["0701"] + "</font>"+"</div>"; 
                        btns[j].setAttribute("title","中国党诞辰"); 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,13)){        //小暑13、大暑14、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "小暑" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,14)){        //大暑14 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "大暑" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==8) {        //"0801" : "建军节", 
                    if(j==0) { 
                        btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["0801"] + "</font>"+"</div>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,15)){    //立秋15、处暑16、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "立秋" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,16)){        //处暑16 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "处暑" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==9) {        //"0910" : "中国教师节", 
                    if(j==9) { 
                        btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["0910"] + "</font>"+"</div>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,17)){  //白露17、秋分18、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "白露" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,18)){        //秋分18 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "秋分" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==10) {    //"1001" : "国庆节", 
                    if(j==0){ 
                        btns[j].innerHTML=temp + "<br>"  +"<div class='box'>"+ "<font color='red'>" + solarFes["1001"] + "</font>"+"</div>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,19)){        //寒露19、霜降20、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "寒露" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,20)){        //霜降20 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "霜降" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==11){ 
                    if((j+1)==calendar.getTerm(year,21)){        //立冬21、小雪22、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "立冬" + "</font>"; 
                        continue; 
                    }else if((j+1)==calendar.getTerm(year,22)){        //小雪22、 
                        btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "小雪" + "</font>"; 
                        continue; 
                    }else {} 
        } else if(month==12) {    //"1224" : "平安夜","1225" : "圣诞节" 
                        if(j==23) { 
                            btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["1224"] + "</font>"+"</div>"; 
                            continue; 
                    }else if(j==24) { 
                            btns[j].innerHTML=temp + "<br>" +"<div class='box'>" + "<font color='red'>" + solarFes["1225"] + "</font>"+"</div>"; 
                            continue; 
                    }else if((j+1)==calendar.getTerm(year,23)){        //大雪23,冬至24 
                            btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "大雪" + "</font>"; 
                            continue; 
                    }else if((j+1)==calendar.getTerm(year,24)){        //冬至24 
                            btns[j].innerHTML=temp + "<br>" + "<font color='red'>" + "冬至" + "</font>"; 
                            continue; 
                    }else {} 
        }    
		
		btns[j].innerHTML=temp + "<br>" + lunar.IDayCn;
	}

// sidebar show lunar info

var tempDate = document.getElementsByClassName("showBigDate");
var temp1 = tempDate[0].innerHTML;
//alert(temp1);
//alert(temp1);
var arr = temp1.split("-");
var dateT = arr[2].split("<");
var date = dateT[0];
//alert(date);

showInSidebar(calendar.solar2lunar(year,month,date));

// 鼠、牛、虎、兔、龙、蛇、马、羊、猴、鸡、狗、猪   shengxiaoPic[]
var shengxiaoImg = document.getElementById("showShengxiaoPic");
//<img src="/i/eg_tulip.jpg"  alt="上海鲜花港 - 郁金香" />  .setAttribute('src','7.jpg');//
var shengxiaoT = (calendar.solar2lunar(year,month,date)).Animal;

shengxiaoImg.setAttribute("src","shengxiao/"+shengxiaoPic[shengxiaoT]);

// year back and forward
var backBtn = document.getElementById("backYear");
backBtn.onclick = function backYear() {
//	alert("haha ");
	var index = Obj.options.selectedIndex - 1;
	Obj.options[index].selected = true;
}

var forwardBtn = document.getElementById("forwardYear");
forwardBtn.onclick = function forwardYear() {
//	alert("haha ");
	var index = Obj.options.selectedIndex + 1;
	Obj.options[index].selected = true;
}


// month back and forward
var backBtn2 =document.getElementById("backMonth");
backBtn2.onclick = function backMonth() {
	var index = Obj2.options.selectedIndex;
	if(index==0) {
		backBtn.onclick();
		Obj2.options[11].selected = true;
	}else {
		Obj2.options[index-1].selected = true;
	}
}

var forwardBtn2 =document.getElementById("forwardMonth");
forwardBtn2.onclick = function forwardMonth() {
	var index = Obj2.options.selectedIndex;
	//alert("index: " + index);
	if(index==11) {	// end
		forwardBtn.onclick();
		Obj2.options[0].selected = true;
	}else {
		Obj2.options[index+1].selected = true;
	}
}
}

</script>


</html>
