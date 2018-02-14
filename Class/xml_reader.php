<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1" />
	</head>
	<body>
		<table id = "table" class = "table table-bordered" >
			<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				<?php
$xml = simplexml_load_file('phptut.xml');
foreach ($xml->employee as $employee) {
	echo '
							<tr>
									<td>' . $employee->name . '</td>
									<td>' . $employee->age . '</td>
									<td>' . $employee->gender . '</td>
									<td>' . $employee->address . '</td>
							</tr>
						';
}
?>
			</tbody>
		</table>
	</body>
</html>