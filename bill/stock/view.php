<?php

include'midviewstock.html';

echo'<style>button:hover {opacity: 0.4;}img.avatar {   width: 20%;   border-radius: 50%;}.container {  width: 100%;padding: 5px 5px;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;}html { overflow-y: hidden; }table{   width:98%;   height: 20%;   border-radius: 5px;   background-color: #f2f2f2;   padding: 5px;}.div{  align: center;border-radius: 4px;width:100%;height:7%;   background-color: #504d4c;}</style>';
echo'<br><br><form name="query" method="POST" action="view.php">  <table align="center"><tr>    <td align="center">view stock:</td>    <td><input type="text" style="width: 80%;    padding: 12px 20px;    margin: 8px 0;    display: inline-block;    border: 1px solid #ccc;    border-radius: 4px;    box-sizing: border-box;"placeholder="    enter the minimum quantity" name="stock" required></td>    <td><button type="submit" style="width: 80%;background-color: #4CAF50;color: white;padding: 14px20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;">view</button></td></tr></table><br><br></form>';












if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$stock = $_POST["stock"];

}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bill";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$i=1;
echo'<style>.fixed_header{    table-layout: fixed;    border-collapse: collapse;}.fixed_header tbody{  display:block;  width: 100%;  overflow: auto;  height: 200px;}.fixed_header thead tr {   display: block;}.fixed_header thead {  background: black;  color:#fff;}.fixed_header th, .fixed_header td {  padding: 10px;  text-align: left;  width: 150px;}</style><table cellspacing="0" cellpadding="0" border="0" border="1" width="50%" class="fixed_header"><thead><tr><th>product</th><th>product details</th><th>dealer details</th><th>dealer</th><th>stock</th></tr></thead>';
$result = mysqli_query($conn,"SELECT product_details.product_name,product_details.details,product_details.quantity, product_details.dealer, dealer_contact.mobile_no FROM (product_details INNER JOIN dealer_contact ON dealer_contact.name =product_details.dealer)where product_details.quantity<='".$stock."'");
while($row = mysqli_fetch_array($result))
{
  echo'<tr><td>'.$row['product_name'].'</td><td>'.$row['details'].'</td><td>'.$row['mobile_no'].'</td><td>'.$row['dealer'].'</td><td>'.$row['quantity'].'</td></tr>';
}
echo'</table>';
?>
