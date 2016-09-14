<?
	if($_REQUEST['add']) {
		$addTime = ($_GET['time']) ? $_GET['time'] : 2;
		$addCost = ($_GET['cost']) ? $_GET['cost'] : 200;
		if($_GET['add']) {
			$addID = $_GET['add'];
			addToBelt($addID, $addTime, $addCost);
		}
	}
	if($_REQUEST['remove']) {
		$removeID = $_GET['remove'];
		if(inBelt($removeID)) {
			removeTool($removeID);
		}
	}
	$belt = getBelt();
	$total = getBeltSums();
?>

<? if(is_array($belt)): ?>
<?= $total['time'] ?> hours
$<?= $total['cost'] ?>
<ul class="tb">
<? foreach($belt as $b): ?>
	<li><a href="?tool=<?= $b['id'] ?>&time=<?= $b['time'] ?>&cost=<?= $b['cost'] ?>">
		<h4><?= $b['tool']->name ?></h4>
		<div>
			<strong><?= $b['time'] ?></strong>
			Hours
		</div>
		<div>
			<strong>$<?= $b['cost'] ?></strong>
			Estimated Cost
		</div>
	</a></li>
<? endforeach; ?>
</ul>
<? else: ?>
<ul class="tb"></ul>
<? endif; ?>