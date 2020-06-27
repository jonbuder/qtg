<!doctype html>
<html lang="en">
<head><title></title></head>
<body>

/*
This is a utility for generating PHP code which displays the results of an SQL query in the form of an HTML table. No formatting is provided.
The utility is released as public domain. Modification and repurposing is highly encouraged.
*/


<?php
# Define all the variables coming in from the web form
$codestart = '<?php';
$codeend = '?>';
$servername=$_REQUEST['servername'];
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$database=$_REQUEST['database'];
$table=$_REQUEST['table'];
$field1=$_REQUEST['field1'];
$field2=$_REQUEST['field2'];
$field3=$_REQUEST['field3'];
$field4=$_REQUEST['field4'];
$field5=$_REQUEST['field5'];
$field6=$_REQUEST['field6'];
$field7=$_REQUEST['field7'];
$field8=$_REQUEST['field8'];
$field9=$_REQUEST['field9'];
$field10=$_REQUEST['field10'];
#Define the field array
$fieldarray = array($field1, $field2, $field3, $field4, $field5, $field6, $field7, $field8, $field9, $field10);

#Perform the iteration to count non-empty fields
$arraylength = 0;
$n = 0;
while($n < 10) {
	if(!empty($fieldarray[$n])) {
		$arraylength++;
	}
	$n++;
}
$stopcomma = $arraylength - 1;

#Echo the length of the array for debug and information purposes.
echo 'Array Length: ' . $arraylength . '<br><br>';


#Begin the ardous task of syntax wrangling to use php to display php... and html.
echo '<pre>' . htmlspecialchars($codestart) . '<br>';
echo '$servername = "' . $servername . '";' . '<br>';
echo '$username = "' . $username . '";' . '<br>';
echo '$password = "' . $password . '";' . '<br>';
echo '$database = "' . $database . '";' . '<br>';
echo '$sql = "SELECT ';

#Iterate to echo the non-empty fields into the business end of the SELECT query.
$x = 0;
while($x < $stopcomma) {
	if(!empty($fieldarray[$x])){ 

echo $fieldarray[$x] . ', ';
}
$x++;
}
#Display the last non-empty field without a trailing comma.
echo $fieldarray[$stopcomma];

echo ' FROM ' . $table . '";' . '<br>';
echo '$conn = new mysqli(' . '$servername' . ', ' . '$username' . ', ' . '$password' . ', ' . '$database' . ');' . '<br>';
echo 'if ($conn->connect_error) {' . '<br>';
echo '    die("Connection failed: " . $conn->connect_error);' . '<br>';
echo '}' . '<br>';
echo 'else {' . '<br>';
echo '$result = $conn->query($sql);' . '<br>';
echo '}' . '<br>';
echo '<br>';

echo 'if ($result->num_rows > 0) {' . '<br>';


echo '<pre>' . 'echo "' . htmlspecialchars('<table id=\'QTG\'><tr>') . '";';


#Iterate to echo non-empty table headers.
$y = 0;
while($y < $stopcomma) {
	if(!empty($fieldarray[$y])){ 

echo '<pre>' . 'echo "' . htmlspecialchars('<th>') . $fieldarray[$y] . htmlspecialchars('</th>') . '";';
}
$y++;
}
echo '<pre>' . 'echo "' . htmlspecialchars('<th>') . $fieldarray[$stopcomma] . htmlspecialchars('</th>') . '";';

echo '<br>';

echo 'while($row = $result->fetch_assoc()) {' . '<br>';


#Iterate to echo non-empty fields into table rows.
$z = 0;
echo 'echo "' . htmlspecialchars('<tr>') . htmlspecialchars('<td>') . '"' . '.$row["' . 	$fieldarray[$z] . '"].' . '"' . htmlspecialchars('</td>') . '";';
$z++;
while($z < $stopcomma) {
	if(!empty($fieldarray[$z])){

echo '<pre>' . 'echo "' . htmlspecialchars('<td>') . '"' . '.$row["' . 	$fieldarray[$z] . '"].' . '"' . htmlspecialchars('</td>') . '";';	
	}
$z++;	
}
echo '<pre>' . 'echo "' . htmlspecialchars('<td>') . '"' . '.$row["' . 	$fieldarray[$stopcomma] . '"].' . '"' . htmlspecialchars('</td></tr>') . '";';

echo '<br>' . '}' . '<br>';

#Close out the table, and finish the if - else statement.
echo 'echo "' . htmlspecialchars('</table>') . '";' . '<br>';
echo '} else {' . '<br>';
echo 'echo "' . '0 results' . '";' . '<br>';
echo '}' . '<br>';
echo '$conn->close();' . '<br>';

#Display closing php tag.
echo '<br>';
echo '<pre>' . htmlspecialchars($codeend) . '<br>';
?>

</body>
</html>
