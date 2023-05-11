<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

	// $dataa = json_decode(json_encode($data), false);

	foreach ($data as $key => $value) {

		$orderdataunit = json_decode($data[$key]['data_unit'], true);

		$fixorder = usort($orderdataunit, function($a , $b) { return strtotime($a['jam_mulai']) - strtotime($b['jam_mulai']); });

		$data[$key]['data_unit'] =  $orderdataunit;

		echo json_encode($orderdataunit).'<br><br>';

	}
	?>
</body>
</html>