<?
	include '-/inc/functions.php';
	$tools = getTools();
	$phases = groupTools($tools);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<title>Title</title>
	<link rel="stylesheet" href="-/css/styles.css">
</head>

<body>
	<div class="page">
		<header role="banner">
			<h1>UX Toolbelt</h1>
			<ul class="tb"></ul>
		</header>
		<main role="main">
			<h2>The Tool Shed</h2>
			<div class="tabs">
				<input type="radio" name="tab" id="t1" checked>
				<input type="radio" name="tab" id="t2">
				<input type="radio" name="tab" id="t3">
				<label for="t1" tabindex="1">Think</label>
				<label for="t2" tabindex="2">Make</label>
				<label for="t3" tabindex="3">Check</label>
				<section id="think">
					<h3>Tools for Thinking</h3>
					<ul class="tools">
					<? foreach($phases['think'] as $tool): ?>
						<li><a href="?tool=<?= $tool->index ?>"><p><?= $tool->name ?></p></a></li>
					<? endforeach; ?>
					</ul>
				</section>
				<section id="make">
					<h3>Tools for Making</h3>
					<ul class="tools">
					<? foreach($phases['make'] as $tool): ?>
						<li><a href="?tool=<?= $tool->index ?>"><p><?= $tool->name ?></p></a></li>
					<? endforeach; ?>
					</ul>
				</section>
				<section id="check">
					<h3>Tools for Checking</h3>
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
	<? include '-/inc/card.php' ?>
<script type="text/javascript" src="-/js/scripts.js"></script>
</body>
</html>