<?
	session_start();

	include_once '-/inc/functions.php';
	$tools = getTools();
	$phases = groupTools($tools);
	if($_REQUEST['clear'] == 1) {
		clearBelt();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<title>The UX Tool Belt</title>
	<link rel="stylesheet" href="-/css/styles.css">
</head>

<body>
	<div class="page">
		<header role="banner">
			<div class="wrap">
				<h1>The UX Tool Belt</h1>
				<div id="pName">
				<? include '-/inc/project.php' ?>
				</div>
				<div id="belt">
				<? include '-/inc/belt.php' ?>
				</div>
			</div>
		</header>
		<main role="main">
			<h2>The Tool Shed</h2>
			<div class="tabs">
				<input type="radio" name="tab" id="think" checked>
				<input type="radio" name="tab" id="make">
				<input type="radio" name="tab" id="check">
				<label for="think" tabindex="1">Think</label>
				<label for="make" tabindex="2">Make</label>
				<label for="check" tabindex="3">Check</label>
				<section>
					<ul class="tools">
					<? foreach($phases['think'] as $tool): ?>
						<li><a href="?tool=<?= $tool->index ?>"><p><?= $tool->name ?></p></a></li>
					<? endforeach; ?>
					</ul>
				</section>
				<section>
					<ul class="tools">
					<? foreach($phases['make'] as $tool): ?>
						<li><a href="?tool=<?= $tool->index ?>"><p><?= $tool->name ?></p></a></li>
					<? endforeach; ?>
					</ul>
				</section>
				<section>
					<ul class="tools">
					<? foreach($phases['check'] as $tool): ?>
						<li><a href="?tool=<?= $tool->index ?>"><p><?= $tool->name ?></p></a></li>
					<? endforeach; ?>
					</ul>
				</section>
			</div>
		</main>
		<footer>
			<a href="https://stegrainer.com">Made with care by Ste Grainer.</a>
		</footer>
	</div>
	<div class="modal" id="card">
	<? include '-/inc/card.php' ?>
	</div>
<script type="text/javascript" src="-/js/scripts.js"></script>
</body>
</html>