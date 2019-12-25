<html>
<head>
	<title>INVOICE</title>
</head>
<body style=' padding-left:10 ;'>
	<div style=' width:99% ; padding-bottom:20 ;'>
	<div style = " padding-left:30 ; padding-top:25 ;"><img src="logo.png" height="200" width="270"></div>
	<div style = "float:left ; padding-left:55 ; padding-top:20 ;">
		<font style=' font-family:Osaka ;'>
		<form action="homepage.html">
		<input type='submit' value='Logout' style=' border:1 solid black ; font-family:Zapfino ; color:white ; background-color:rgb(115, 0, 153) ; margin-left:10 ; height:70 ; width:200 ; font-size:20 ;'>
		</form>
		</font>
	</div>
</body>
</html>
<?php
	$userid = @$_REQUEST['userid'];
	$con=mysqli_connect('localhost','root','','theshaadiproject');
	if(!$con)
	{
		die("Connection Failed:".mysqli_connect_error());
	}
	$total;
	echo "<font style=' font-family:Osaka ;'>";
	
	$sql="select * from $userid";
	$res=mysqli_query($con,$sql);
	$rowcount = mysqli_num_rows($res);
	//echo $rowcount."<br>";
	$flag=$rowcount ;
	if ($flag>'1')
	{	
		$row = mysqli_fetch_array($res);
		echo "<div style=' padding-left:72% ; font-size:20 ;'>";
		echo "<i>Name : </i><font style=' font-size:25 ;'>".$row['name']."</font><br>";
		$row = mysqli_fetch_array($res);
		echo "<i>Invoice No. : </i>".$row['name']; 
		$total=$row['cost'];
		echo "</div>";
		echo "</div>";
	
		echo "<div style=' width:99% ; background-color:rgba(255,102,102,0.6) ;'>";
		echo "<div style=' margin-top:30 ; margin-bottom:10 ; border: solid ; text-align:center ; font-size:40;' name='invoice' id='invoice'>INVOICE</div>";
	
		echo "<table width='95%'>";
		echo "<tr style=' font-size:20 ;'>
				<th><i>Service ID.</i></th>
				<th><i>Name</i></th>
				<th style=' padding-left:20 ; text-align:left ;'><i>Cost</i></th>
				</tr>";
	
		$sa=0;
		$me=0;
		$ha=0;
		$sh=0;
		$re=0;
		
		function enter($row)
		{
		
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>".$row['id']."</td>
					<td style=' padding-left:10 ; text-align:center ;'>".$row['name']."</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. ".$row['cost']."</td>
					</tr>";
			$GLOBALS['rowcount']--;
		}
		
		while($rowcount-2>0)
		{
			$row = mysqli_fetch_array($res);
			if(strcmp($row['id'],'aa1')==0 && $sa==0)
			{
				$sa=1;
				echo "<tr style=' text-align:center ;'>
						<td colspan='3'><b><i><u>Sangeet</u></i></b></td>
						</tr>";
			}
			if(strcmp($row['id'],'ba1')==0 && $me==0)
			{
				$me=1;
				echo "<tr style=' text-align:center ;'>
						<td colspan='3'><b><i><u>Mehendi</u></i></b></td>
						</tr>";
			}
			if(strcmp($row['id'],'ca1')==0 && $ha==0)
			{
				$ha=1;
				echo "<tr style=' text-align:center ;'>
						<td colspan='3'><b><i><u>Haldi</u></i></b></td>
						</tr>";
			}
			if(strcmp($row['id'],'da1')==0 && $sh==0)
			{
				$sh=1;
				echo "<tr style=' text-align:center ;'>
						<td colspan='3'><b><i><u>Shaadi</u></i></b></td>
						</tr>";
			}
			if(strcmp($row['id'],'ea1')==0 && $re==0)
			{
				$re=1;
				echo "<tr style=' text-align:center ;'>
						<td colspan='3'><b><i><u>Reception</u></i></b></td>
						</tr>";
			}
			enter($row);
		}
	
		
	
		echo "<tr></tr>";
		echo "<tr style=' text-align:center ;'>
						<td></td>
						<td><b><i>Total</i></b></td>
						<td style=' padding-left:10 ; text-align:left ;'><b>Rs. $total</b></td>
						</tr>";
		echo "</table>";
		echo "</div>";
		
	}
	
	else
	{
		$row = mysqli_fetch_array($res);
		$des= $row['city'];
		if($des=='jaipur')
		{
		    $jainop=$row['nop'];
			$total=$row['total'];
			$username = $row['name'];
			$jaiplan = 72500; //per person
			$jaipur = 6000000; //conatant kharcha
			$tcj = ($jaiplan*$jainop)+$jaipur;

			echo "<div style=' padding-left:72% ; font-size:20 ;'>";
			echo "<i>Name : </i><font style=' font-size:25 ;'>".$row['name']."</font><br>";
			echo "<i>Invoice No. : </i>".$row['invoiceno']."<br>"; 
			echo "<i>Destination : </i> Jaipur <br>"; 
			echo "<i>Duration : </i> 5 Days <br>"; 
			echo "<i>Venue : </i> Lalit Laxmi Villas Palace"; 
			$total=$row['total'];
			echo "</div>";
			echo "</div>";
	
	
			echo "<div style=' width:99% ; background-color:rgba(255,102,102,0.6) ;'>";
			echo "<div style=' margin-top:30 ; margin-bottom:10 ; border: solid ; text-align:center ; font-size:40;' name='invoice' id='invoice'>INVOICE</div>";
			echo "<table width='95%'>";
			echo "<tr style=' font-size:20 ;'>
					<th><i>Service </i></th>
					<th><i>Cost per Person  </i></th>
					<th><i>Cost per Day </i></th>
					<th style=' padding-left:20 ; text-align:left ;'><i>Total Cost</i></th>
					</tr>";
			$tcr= (5000*5*$jainop) ;
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Rooms</td>
					<td style=' padding-left:10 ; text-align:center ;'>5000</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcr"." </td>
					</tr>";
			$tcf= (2000*5*$jainop) ;			
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Food</td>
					<td style=' padding-left:10 ; text-align:center ;'>2000</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcf"." </td>
					</tr>";			
			$tcd= (2500*5*$jainop) ;			
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Drinks</td>
					<td style=' padding-left:10 ; text-align:center ;'>2500</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcd"." </td>
					</tr>";	
			$tcra= (5000*2*$jainop) ;			
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Recreational Activities</td>
					<td style=' padding-left:10 ; text-align:center ;'>5000</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcra"." </td>
					</tr>";				
				
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Sound Light Generator Setup</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>2,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 10,00,000 </td>
					</tr>";	
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Photography and Videography</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>3,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 15,00,000 </td>
					</tr>";	
		
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Decoration</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>4,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 20,00,000 </td>
					</tr>";	
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Venue hire charges</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>3,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 15,00,000 </td>
					</tr>";
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:left ;'></td>
					</tr>";
	
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'><b>TOTAL</b></td>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:left ;'></td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. "."<b>$tcj</b>"." </td>
					</tr>";			
	
			echo "</table>";			
			echo "</div>";
	
			
		}
		
		if($des=='goa')
		{
			$goanop=$row['nop'];
			$total=$row['total'];
			$username = $row['name'];
			$goaplan = 72500; //per person
			$goa = 3500000; //conatant kharcha
			$tcg = ($goaplan*$goanop)+$goa ;
			
			echo "<div style=' padding-left:72% ; font-size:20 ;'>";
			echo "<i>Name : </i><font style=' font-size:25 ;'>".$row['name']."</font><br>";
			echo "<i>Invoice No. : </i>".$row['invoiceno']."<br>"; 
			echo "<i>Destination : </i> Goa <br>"; 
			echo "<i>Duration : </i> 5 Days <br>"; 
			echo "<i>Venue : </i> Taj Exotica"; 
			$total=$row['total'];
			echo "</div>";
			echo "</div>";
	
	
			echo "<div style=' padding-bottom:10 ; width:99% ;'>";
			echo "<div style=' margin-top:30 ; margin-bottom:10 ; border: solid ; text-align:center ; font-size:40;' name='invoice' id='invoice'>INVOICE</div>";
			echo "<table width=100%'>";
			echo "<tr style=' font-size:20 ;'>
					<th style=' border-bottom:1 solid black;'><i>Service </i></th>
					<th style=' border-bottom:1 solid black;'><i>Cost per Person  </i></th>
					<th style=' border-bottom:1 solid black;'><i>Cost per Day </i></th>
					<th style=' padding-left:20 ; text-align:left ; border-bottom:1 solid black;'><i>Total Cost</i></th>
					</tr>";
			$tcr= (5000*5*$goanop) ;
		
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Rooms</td>
					<td style=' padding-left:10 ; text-align:center ;'>5000</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcr"." </td>
					</tr>";
			$tcf= (2000*5*$goanop) ;			
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Food</td>
					<td style=' padding-left:10 ; text-align:center ;'>2000</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcf"." </td>
					</tr>";			
			$tcd= (2500*5*$goanop) ;			
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Drinks</td>
					<td style=' padding-left:10 ; text-align:center ;'>2500</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcd"." </td>
					</tr>";	
			$tcra= (5000*2*$goanop) ;			
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Recreational Activities</td>
					<td style=' padding-left:10 ; text-align:center ;'>5000</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs.  "."$tcra"." </td>
					</tr>";				
				
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Sound Light Generator Setup</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>1,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 5,00,000 </td>
					</tr>";	
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Photography and Videography</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>3,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 15,00,000 </td>
					</tr>";	
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Decoration</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>1,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 5,00,000 </td>
					</tr>";	
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'>Venue hire charges</td>
					<td style=' padding-left:10 ; text-align:center ;'>-</td>
					<td style=' padding-left:10 ; text-align:center ;'>2,00,000</td>
					<td style=' padding-left:10 ; text-align:left ;'>Rs. 10,00,000 </td>
					</tr>";
			
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:center ;'></td>
					<td style=' padding-left:10 ; text-align:left ;'></td>
					</tr>";
	
			echo "<tr>
					<td style=' padding-left:10 ; text-align:center ; border-top:1 solid black;'><b>TOTAL</b></td>
					<td style=' padding-left:10 ; text-align:center ; border-top:1 solid black;'></td>
					<td style=' padding-left:10 ; text-align:left ; border-top:1 solid black;'></td>
					<td style=' padding-left:10 ; text-align:left ; border-top:1 solid black;'>Rs. "."<b>$tcg<b>"." </td>
					</tr>";			
			
			echo "</table>";			
			echo "</div>";
				
		
		}
		
	}
	
	
	echo "<div style=' width:99% ; background-color:rgba(255,102,102,0.5) ;'>";
	echo "<div style=' text-align:center ; padding-left:10 ; margin-bottom:10 ; margin-top:30 ; border:solid black ;' name='reviewdiv' id='reviewdiv'>";
	echo "<br>";
	echo "<form action='logout.php' method='post'>
			<font style=' font-family:Zapfino ; font-size:30;'><b>Review</b></font><br>
			
			<textarea placeholder='Enter review here' rows='4' cols='50' name='review' id='review' required></textarea>
			<br><br>
			<input type='hidden' name='userid' value=".$userid.">
			<input type='submit' value='Submit' style=' font-family:Zapfino ; color:black ; border:1 solid black ; background-color:rgb(242, 242, 242) ; height:60 ; width:150 ; font-size:20 ;'>
			</font>
			</form>";
	echo "</div>";	
	echo "</font>";
	
	mysqli_close($con);

?>