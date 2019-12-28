<?php

$con = mysqli_connect("localhost","root","","ecomm");
if(isset($_POST['pincode']))
{
$name=$_POST['pincode'];


$get="select * from Pincode where pincode='$name' ";
$query=mysqli_query($con,$get);
$row=mysqli_num_rows($query);

if($row==0)
{
echo "<h5 style='color:black;' >
Courier Company are not providing delivery services at this Pincode: 
<span style='color:red;'>$name</span></h5>";
}
else{

echo"   
        ";
while($row1 = mysqli_fetch_array($query)){
    echo"   
        <tr style='width:100%'>
          <td style='width:15%'>".$row1['pincode']."</td>
          <td style='width:15%'>".$row1['courier_company']."</td>
          <td style='width:15%'>".$row1['city_name']."</td>
          <td style='width:15%'>".$row1['state_name']."</td>
        </tr>";

}
}

}
?>

</form>	