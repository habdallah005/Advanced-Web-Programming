<? 
session_start();
				if(isset($_SESSION['logged-in']) && $_SESSION['logged-in']==true){

?>
<!DOCTYPE html">
<html lang="EN" >
<head>
<meta http-equiv="Content-Type" content="text/html" charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="../css/sheet.css" media="all" />
<link type="text/css" rel="stylesheet" href="../css/Enumerationprocess.css" media="all" />
<link type="text/css" rel="stylesheet" href="../css/table_design.css" media="all" />

<title> Census </title>
</head>

<body>

<div id="heading">

<p> NATIONAL STATIC OF RWANDA </p> </br>

</div>
<div id="Content">
<div id="navmenu">
<ul>
<li> <a href="../admin.php">HOME</a><li>
<li><a href="../admin.php?addenum=addenum">ADD ENUMERATOR </a></li>
<li> <a href="report.php">VIEW REPORT</a></li>
<li> <a href="../list_enumerators.php"> LIST OF ENUMERATORS </a></li>
<li> <a href="../logout.php"> LOGOUT </a></li>
</ul>

</div>    
<? $province=intval($_POST['province']);
   $district=intval($_POST['district']);
   ?>
 <table>
                <div class="hide" id="divtitle">
                 <h1 align="center"> REPUPLIC OF RWANDA </h1><br>
                             <img src="../img/logo.jpg" align="center"><br>
                          <h1 align="center"> NATIONAL INSTITUTE OF STATISTIC OF RWANDA </h1>
                <tr>
                <th>  PROVINCE </th> <th> MALE  </th> <th> FEMALE  </th> <th> NON-INSURANCE </th><th> INSURANCE  </th> <th>NON-RELIGION  </th> <th> MUSLIM </th><th>CHRISTIAN  </th><th>TOTAL </th><th> #</th>
                </tr>
                <?
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('census');
// Variable that Hold the Total
			            $tmutuelle=0;
				$tmmi=0;
				$trama=0;
				$tfarg=0;
				$tcie=0;
				$tschool=0;
				$temployer=0;
				$tnone=0;
				$ttotal=0;
				        
$qy="SELECT * FROM district WHERE Id='$district'";
       $re=mysql_query($qy);
	    while($ro=mysql_fetch_array($re)){
		$iddistrict=$ro['Id'];
		$name=$ro['districtname']
		
	             
?>
 <h1 align="center"> LIST OF OF <?=$ro['districtname']?> </h1>

<? } ?><?
                
		
		//Select from District
				
          $jqy="SELECT * FROM sector WHERE Id_district='$iddistrict'";
               $jre=mysql_query($jqy);
	            while($jro=mysql_fetch_array($jre)){
                $idsector=$jro['Id'];
				$mutuelle=0;
				$mmi=0;
				$rama=0;
				$farg=0;
				$cie=0;
				$school=0;
				$employer=0;
				$none=0;
				$total=0;
				$dd="SELECT * FROM cell WHERE Id_sector='$idsector'";
               $jj=mysql_query($dd);
	            while($jlo=mysql_fetch_array($jj)){
                $idcell=$jlo['Id'];
				{
				
				
				 // This is for selecting the Total number of Household
                
                $query="SELECT *from household where Cell_id='$idcell' AND Id_sector='$idsector'";
                $res=mysql_query($query) or ('Error in selection');
                while($row=mysql_fetch_array($res)){
				 $idhouse=$row['House_Id'];
                 $qy="SELECT *from population where House_Id='$idhouse'";
                $rs=mysql_query($qy) or ('Error in selection');
				 while($pp=mysql_fetch_array($rs)){
			      if($pp['Insurance']=='Mutuelle')
				 {
				  $mutuelle=$mutuelle+1;
				  $total=$total+1;
				 }
				 else if($pp['Insurance']=='MMI')
				 {
				  $mmi=$mmi+1;
				  $total=$total+1;
				 }
				 else if($pp['Insurance']=='RAMA')
				 {
				  $rama=$rama+1;
				  $total=$total+1;
				 }
				 else if($pp['Insurance']=='FARG')
				 {
				  $farg=$farg+1;
				  $total=$total+1;
				 }
				  else if($pp['Insurance']=='Insurance Cie')
				 {
				  $cie=$cie+1;
				  $total=$total+1;
				 }
				  else if($pp['Insurance']=='School')
				 {
				  $school=$school+1;
				 $total=$total+1;
				 }
				  else if($pp['Insurance']=='Employer')
				 {
				  $employer=$employer+1;
				  $total=$total+1;
				 }
				 else
				 {
				      
					  $none=$none+1;
					  $total=$total+1;
				 }    
				     } }   } }?>
                            
              
              
                <tr>
				 <td>   <? echo $jro['sectorname']; ?> </td>
				 
 
				 
                 <td>  
                 
                 
                 
                  <? echo $mutuelle; ?> </td>
				 
                 <td> <?   echo $mmi; ?> </td>
				 
                 <td> <? echo $rama; ?> </td>
				
				  <td> <?   echo $farg; ?> </td>
				 
                 <td> <? echo $cie; ?> </td>
                  <td> <? echo $employer; ?> </td>
                   <td> <? echo $none; ?> </td>
				    <td> <? echo $total; ?> </td>
				
                   <td id="ddddd"> <a href="findlistSector.php?sector=<?=$jro['Id']?>"> View List </a> </td>	  
                 </tr>
	<? 
	
	
	$tmutuelle=$tmutuelle+$mutuelle;
	$tmmi=$tmmi+$mmi;
	$trama=$trama+$rama;
	$tfarg=$tfarg+$farg;
	$tcie=$tcie+$cie;
	$temployer=$temployer+$employer;
	$tnone=$tnone+$none;
    $ttotal=$ttotal+$total;
	
	}
	
	
	?>
    <tr> <td> <h3> <?=$name?> </h3></td><td> <? echo $tmutuelle; ?> </td> <td> <?   echo $tmmi; ?></td> <td> <? echo $trama; ?> </td> <td> <?   echo $tfarg; ?> </td><td>  <? echo $tcie; ?></td><td> <? echo $temployer; ?> </td><td> <? echo $tnone; ?> </td> <td> <? echo $ttotal; ?> </td> </tr>
	
				 </table>   

</div>
<div id="footest">

</div>
</body>
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
divtitle.style.visibility='visible';
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
