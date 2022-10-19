<?php
$n=$_POST['name'];
if(!empty($n))
{
	$host="localhost";
	$dbusr="root";
	$dbpwd="123";
	$dbname="charana";
	$conn=new mysqli($host,$dbusr,$dbpwd,$dbname);
	//if mysqli_connect_error()
	//{
		//die('connect error('.mysqli_connect_errno().')'.mysqli_connect());
	//}
	//else
	//{
		$sel="select name from sam1 where name=? limit 1";
		$in="INSERT INTO sam1(name)values(?) ";
		$stmt=$conn->prepare($sel);
		$stmt->bind_param("s",$n);
		$stmt->execute();
		$stmt->bind_result($n);
		$stmt->store_result();
		$rnum=$stmt->num_rows;
		if($rnum==0)
		{
			$stmt->close();
			$stmt=$conn->prepare($in);
			$stmt->bind_param("s",$n);
			$stmt->execute();
			echo "good";
		}
		else{ echo"bad";}
		$stmt->close();
		$conn->close();
	//}
}

?>