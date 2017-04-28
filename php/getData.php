<?php
    require 'config.php';

	$input = $_GET['q'];
	$input = mysql_real_escape_string($input);
    // query the database 

    $query = mysql_query("SELECT c.contactFirstName AS customerFirstName, 
								 c.contactLastName AS customerLastName,
								 p.productName AS productName,
								 o.orderDate AS orderDate,
								 od.priceEach AS priceEach,
								 od.quantityOrdered AS quantityOrdered
								 FROM customers as c INNER JOIN orders as o 
										ON c.customerNumber=o.customerNumber INNER JOIN orderdetails as od 
										ON o.orderNumber=od.orderNumber INNER JOIN products as p
										ON od.productCode=p.productCode
										WHERE UPPER(c.contactLastName) LIKE UPPER('%$input%') OR UPPER(c.contactFirstName) LIKE UPPER('%$input%')");

    //create an array
    echo "<table class=\"table\">
<tr>
<th>Ime Kupca</th>
<th>Proizvod</th>
<th>Datum</th>
<th>Cijena</th>
<th>Kolicina</th>
</tr>";

while($row = mysql_fetch_array($query))
{
echo "<tr>";
echo "<td>" . $row['customerFirstName'] . " " . $row['customerLastName'] . "</td>";
echo "<td>" . $row['productName'] . "</td>";
echo "<td>" . $row['orderDate'] . "</td>";
echo "<td>" . $row['priceEach'] . "</td>";
echo "<td>" . $row['quantityOrdered'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>