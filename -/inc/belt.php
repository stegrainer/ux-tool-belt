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
<link rel="stylesheet" href="-/css/belt.css">
<ul class="tb">
	<li class="head">
		<div class="name">Tool</div>
		<div class="time">Hours</div>
		<div class="cost">Cost</div>
	</li>
<? foreach($belt as $b): ?>
<? /*
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
*/ ?>
	<li><a href="?tool=<?= $b['id'] ?>&time=<?= $b['time'] ?>&cost=<?= $b['cost'] ?>">
		<div class="name"><?= $b['tool']->name ?></div>
		<div class="time"><?= $b['time'] ?></div>
		<div class="cost">$<?= $b['cost'] ?></div>
	</a></li>
<? endforeach; ?>
</ul>
<div class="summary">
	<div class="name">Total: <?= count($belt) ?> tool<? if(count($belt) != 1): ?>s<? endif; ?></div>
	<div class="time"><?= $total['time'] ?></div>
	<div class="cost">$<?= $total['cost'] ?></div>
</div>
<? else: ?>
<ul class="tb"></ul>
<? endif; ?>