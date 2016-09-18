<?
	include_once 'functions.php';
	
	if($_REQUEST['add']) {
		$addTime = ($_REQUEST['time']) ? $_REQUEST['time'] : 2;
		$addCost = ($_REQUEST['cost']) ? $_REQUEST['cost'] : 200;
		if($_REQUEST['add']) {
			$addID = $_REQUEST['add'];
			addToBelt($addID, $addTime, $addCost);
		}
	}
	if($_REQUEST['remove']) {
		$removeID = $_REQUEST['remove'];
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
<div class="actions">
	<form action="./" method="post">
		<input type="hidden" name="print" value="1">
		<button type="submit">Print this project</button>
	</form>
	<form action="./" method="post">
		<input type="hidden" name="clear" value="1">
		<button type="submit" class="secondary">Clear this project</button>
	</form>
</div>
<? else: ?>
<ul class="tb"></ul>
<? endif; ?>