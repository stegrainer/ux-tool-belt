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
	$uri = strtok($_SERVER["REQUEST_URI"],'?');

?>

<header>
	<h1><?= (!$_SESSION['project']) ? 'Untitled Project' : $_SESSION['project']; ?></h1>
</header>
<main>
	<ul class="tb">
		<li class="head">
			<div class="name">Tool</div>
			<div class="time">Hours</div>
			<div class="cost">Cost</div>
		</li>
	<? foreach($belt as $b): ?>
		<li>
			<div class="name">
				<?= $b['tool']->name ?>
				<div class="mute"><?= $b['tool']->description ?></div>
			</div>
			<div class="time"><?= $b['time'] ?></div>
			<div class="cost">$<?= $b['cost'] ?></div>
		</li>
	<? endforeach; ?>
	</ul>
	<div class="summary">
		<div class="name">Total: <?= count($belt) ?> tool<? if(count($belt) != 1): ?>s<? endif; ?></div>
		<div class="time"><?= $total['time'] ?></div>
		<div class="cost">$<?= $total['cost'] ?></div>
	</div>
</main>
<footer>
	<a href="<?= "http://$_SERVER[HTTP_HOST]$uri" ?>">Build your own tool belt</a>
</footer>
<script type="text/javascript">
	window.onload = function() { window.print(); }
</script>