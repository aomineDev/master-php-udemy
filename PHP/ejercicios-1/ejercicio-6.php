<style>
body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background-color: #f5f5f5;
}
table{
	border-collapse: collapse;
	text-align: center;
}

/*table th{
	border-bottom: 1px solid rgba(0, 0, 0, .5);
}
table td, table th{
	padding: 15px 15px 10px 1 5px;
	}*/

	table td, table th{
		padding: 15px 15px 10px 15px;
		border-bottom: 1px solid rgba(0, 0, 0, .5);
	}
</style>

<?php 
echo "<table>";
echo "<tr>";
for ($i=1; $i <= 10; $i++) { 
	echo "<th>Tabla del $i</th>";
}
echo "</tr>";

// echo "<tr>";
// for($i = 1; $i <= 10; $i++){
// 	echo "<td>";		
// 	for ($j=1; $j <= 12; $j++) { 
// 		echo "<p>$j x $i = " . ($i * $j) . "</p>";
// 	}
// 	echo "</td>";
// }
// echo "</tr>";

echo "<tr>";
for($i = 1; $i <= 10; $i++){
	echo "<tr>";		
	for ($j=1; $j <= 10; $j++) { 
		echo "<td>$j x $i = " . ($i * $j) . "</td>";
	}
	echo "</tr>";
}

echo "</table>";
?>