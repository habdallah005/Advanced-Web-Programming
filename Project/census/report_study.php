<? 
session_start();
				if(isset($_SESSION['logged-in']) && $_SESSION['logged-in']==true){

?>
<!DOCTYPE html">
<html lang="EN" >
<head>
<meta http-equiv="Content-Type" content="text/html" charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="css/sheet.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/Enumerationprocess.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/table_design.css" media="all" />
<title> Census </title>
</head>

<body>
 <div class="hide" id="divtitle">
                 <h1 align="center"> REPUPLIC OF RWANDA </h1><br>
                             <img src="../img/logo.jpg" align="center"><br>
                          <h1 align="center"> NATIONAL INSTITUTE OF STATISTIC OF RWANDA </h1>

                      </div>

<div id="heading">

<p> NATIONAL STATIC OF RWANDA </p> </br>

</div>
<div id="Content">
<div id="navmenu">
<ul>
<li> <a href="admin.php">HOME</a><li>
<li><a href="admin.php?addenum=addenum">ADD ENUMERATOR </a></li>
<li> <a href="report.php">VIEW REPORT</a></li>
<li> <a href="list_enumerators.php"> LIST OF ENUMERATORS </a></li>
<li> <a href="logout.php"> LOGOUT </a></li>
</ul>

</div>
     <h1 align="center"> REPORT OF WHOLE POPULATION IN INSURANCE</h1>
                <?php
				require_once('db_connect.php');
				?>
                
                <table>
                <tr>
               
                <th>  NAME OF PROVINCE </th> <th> EVER STUDY </th> <th> CURRENT </th> <th> NEVER </th> <th> PRESCHOOL  </th><th> PRIMARY </th><th> SECONDARY </th> <th> UNIVERSITY </th> <th>A2</th><th>A1</th><th>A0</th><th>MASTER</th><th>DOCTORAT</th><th> TOTAL OF PERSON </th>
                </tr>
              
                <tr>
                <?
				$tever=0;
				$tprimary=0;
				$tsecondary=0;
				$tuniversity=0;
				$tnever=0;
				$tcurrent=0;
				$tA1=0;
				$tA2=0;
				$tPre=0;
				$tA0=0;
				$tmaster=0;
				$tdoctora=0;
				$ttotal=0;
				$tpreschool=0;
				$qy="SELECT * FROM province";
                $re=mysql_query($qy);
	             while($ro=mysql_fetch_array($re)){
				 $idprovince=$ro['Id'];
				$ever=0;
				$primary=0;
				$secondary=0;
				$university=0;
				$never=0;
				$current=0;
				$preschool=0;
				$A1=0;
				$A2=0;
				$Pre=0;
				$A0=0;
				$master=0;
				$doctora=0;
				$total=0;
				 // This is for selecting the Total number of Household
                
                $query="SELECT *from household where Id_province='$idprovince'";
                $res=mysql_query($query) or ('Error in selection');
                $house=0;
                while($row=mysql_fetch_array($res)){
				 $idhouse=$row['House_Id'];
                 $qy="SELECT *from population where House_Id='$idhouse'";
                $rs=mysql_query($qy) or ('Error in selection');
				 while($pp=mysql_fetch_array($rs)){
				 if($pp['Attend_School']=='Has ever attended')
				 {
				  $ever=$ever+1;
				  $total=$total+1;
				 }
				 else if($pp['Attend_School']=='Has never attended')
				 {
				  $never=$never+1;
				  $total=$total+1;
				 }
				 else 
				 {
				  $rcurrent=$current+1;
				  $total=$total+1;
				 }
				 
				 
				 if($pp['Level_Educat']=='University')
				 {
				  $university=$university+1;
				 }
				  else if($pp['Level_Educat']=='Preschool')
				 {
				  $preschool=$preschool+1;
				 }
				  else if($pp['Level_Educat']=='Primary')
				 {
				  $primary=$primary+1;
				 }
				  else 
				 {
				  $secondary=$secondary+1;
				 }
				 
				  if($pp['Degree']=='A2')
				 {
				  $A2=$A2+1;
				 }
				  else if($pp['Degree']=='A1')
				 {
				  $A1=$A1+1;
				 }
				  else if($pp['Degree']=='Master')
				 {
				  $master=$master+1;
				 }
				  else if($pp['Degree']=='Doctorate')
				 {
				  $doctora=$doctora+1;
				 }
				  else 
				 {
				  $A0=$A0+1;
				 }
				 
				 }
				 }
                ?>
                
                <td>  
                 
                 
                 
                  <?=$ro['Name']?> </td>
				 <td>  <? echo $ever; ?> </td>
				 
                 <td> <?   echo $never; ?> </td>
				 
                 <td> <? echo $current; ?> </td>
				
				  <td> <?   echo $preschool; ?> </td>
				 
                 <td> <? echo $primary; ?> </td>
                  <td> <? echo $secondary; ?> </td>
                   <td> <? echo $university; ?> </td>
                   
                   <td> <? echo $A2; ?> </td>
                  <td> <? echo $A1; ?> </td>
                   <td> <? echo $A0; ?> </td>
                   
                   <td> <? echo $master; ?> </td>
                  <td> <? echo $doctora; ?> </td>
				    <td> <? echo $total; ?> </td>
                 </tr>
	<? 
	
	$tever=$tever+$ever;
	$tnever=$tnever+$never;
	$tcurrent=$tcurrent+$current;
	$tpreschool=$tpreschool+$preschool;
	$tprimary=$tprimary+$primary;
	$tcurrent=$tcurrent+$current;
	$tsecondary=$tsecondary+$secondary;
	$tA1=$tA1+$A1;
	$tA0=$tA0+$A0;
	$tA2=$tA2+$A2;
	$doctora=$tdoctora+$doctora;
	$tmaster=$tmaster+$master;
    $ttotal=$ttotal+$total;
	}
	
	
	
	?>
    <tr> <td> <h3> RWANDA </h3></td> <td>  <? echo $tever; ?> </td> <td> <?   echo $tnever; ?> </td> <td> <? echo $tcurrent; ?> </td> <td> <?   echo $tpreschool; ?> </td> <td> <? echo $tprimary; ?> </td><td> <? echo $tsecondary; ?> </td><td> <? echo $tuniversity; ?> </td> <td> <? echo $tA2; ?> </td><td> <? echo $tA1; ?> </td><td> <? echo $tA0; ?> </td><td> <? echo $tmaster; ?> </td><td> <? echo $tdoctora; ?> </td><td> <? echo $ttotal; ?> </td></tr>
				 </table>
                 <div>
                <form action="residence/findRepStudy.php" method="post" name="form1" id="form1">
                
                <table width="60%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                      
                               <td  width="150">
                                    <select name="province" onChange="getDistrict(this.value)">
                                     <option value="#"> -- Select Province-- </option>
                                    <option value="1"> KIGALI </option>
                                     <option value="5"> SOUTH</option>
                                      <option value="2"> NORTH</option>
                                      <option value="4"> EAST</option>
                                       <option value="3"> WEST</option>
                                    </select></td>
                                    
                                    
                                      <td width="150"><input type="submit" value="search" name="submit"> </td>
                                    
                                        <td width="150">  <input id="printpagebutton" type="button" value="Print this list" onClick="printpage()"/>  </a></td>                                   
                
                </tr>
                
    
                </table> </div>
                </form>

<script type="text/javascript">                 
    function printpage() {
//Get the print button and put it into a variable
var printButton = document.getElementById("printpagebutton");
var divtitle=document.getElementById("divtitle");
var navmenu =document.getElementById("navmenu");
var heading =document.getElementById("heading");
var form1=document.getElementById("form1");
//Set the print button visibility to 'hidden'
printButton.style.visibility = 'hidden';
navmenu.style.visibility ='hidden';
heading.style.visibility ='hidden';
form1.style.visibility='hidden';
divtitle.style.visibility ='visible';
//Print the page content
window.print()
//Set the print button to 'visible' again
//[Delete this line if you want it to stay hidden after printing]
divtitle.style.visibility='hidden';
printButton.style.visibility = 'visible';
navmenu.style.visibility ='visible';
heading.style.visibility ='visible';
form1.style.visibility='visible';
}
</script>
</div>
<div id="footest">
<p> COPY RIGHT HABYARIMANA Abdallahman & NSANZIMFURA VALENS - All Rights Reserved </p>
</div>
</body>


</html>
<?
}
else
{
echo "Please this page can not open while Your are not logged in................";
echo '<a href="index.php"> Back to Log In</a>';
}
?>
<script type="text/javascript" language="javascript">
function showHiddenmenu(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none" || myLayer.style.display==""){
myLayer.style.display="block";
} else {
myLayer.style.display="none";
}
}
	
</script>


