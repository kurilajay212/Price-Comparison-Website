<?php
$con=mysqli_connect("localhost", "root", "");
//echo "Connection succesfull <br /><br />";
mysqli_select_db($con,"amaz");
//echo "Database selected <br /><br />";
if(isset($_POST['submit']))
{
$query = $_POST['query'];
?>
<html>
<head>
<title><?php echo $query;?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
$min_length = 1;
if(strlen($query) >= $min_length)
{
$query = htmlspecialchars($query);
$query = mysqli_real_escape_string($con,$query);
echo "<table border='0' width='300' align='left' cellpadding='1' cellspacing='1'>";
echo "<tr align='left'  bgcolor='#002C40' style='color:#FFF'>
<td height='35px' colspan='9' rowspan='1' width='1500px'>Name</td> <td>Price</td> <td>Source</td><td>Page URL</td>
</tr>";
$sql="SELECT * FROM data WHERE (`name` LIKE '%$query%')";
$raw_results =  mysqli_query($con,$sql);
if(mysqli_num_rows($raw_results) > 0)
{ 
while($results = mysqli_fetch_array($raw_results))
{ 
echo "<tr align='left' bgcolor='#0f7ea3'>

<td colspan='9' rowspan='1' height='25px'>".$results['name']."</td> <td>".$results['price']."</td> <td>".$results['source']."</td>
 <td>".$results['pageUrl']."</td>

</tr>" ;
}

}
else{
echo "<tr align='left' bgcolor='#6C0000'>

<td colspan='2' rowspan='5' height='25px'>No results</td><tr>";
echo "</table>";
}
}
else{
echo "Minimum length is ".$min_length;
}}

?>
</body>
</html> 
