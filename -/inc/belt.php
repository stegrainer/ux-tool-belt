<?
	if($_REQUEST['add']) {
		$addTime = ($_GET['time']) ? $_GET['time'] : 2;
		$addCost = ($_GET['cost']) ? $_GET['cost'] : 200;
		if($_GET['add']) {
			$addID = $_GET['add'];
		}
	}
?>

<ul class="tb"></ul>