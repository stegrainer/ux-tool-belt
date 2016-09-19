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
				<div id="logo" class="img"></div>
				<h1>The UX Tool Belt</h1>
				<div class="intro">
					<p>
						There&rsquo;s a lot more to User Experience design than just mockups
						and prototypes. The Tool Shed below has a compilation of the many
						tools and techniques available to UX designers with documentation on
						how to use them and where to find more details. You can use this to
						document your overall process or to define your process for a
						specific project.
					</p>
					<p>
						The tools are organized by the Lean UX process framework: Think,
						Make, Check. Think Tools help you research, understand your users,
						and relate to their problem. Make Tools help you get to a testable
						solution. Finally, Check Tools help you validate whether or not your
						solution works for the customer. Some tools may be helpful in more
						than one phase.
					</p>
				</div>
			</div>
			<div class="project">
				<div class="wrap">
					<h2>Your Tool Belt</h2>
					<div id="pName">
					<? include '-/inc/project.php' ?>
					</div>
					<div id="belt">
					<? include '-/inc/belt.php' ?>
					</div>
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
			<a href="http://uxcellence.com">A UXcellence Project</a> &#x25cf;
			<a href="https://stegrainer.com/contact/">I welcome your feedback</a><br />
			<a href="https://stegrainer.com">Made with care by Ste Grainer.</a><br />
			&copy; 2016
		</footer>
	</div>
	<div class="modal" id="card">
	<? include '-/inc/card.php' ?>
	</div>
<script type="text/javascript" src="-/js/scripts.js"></script>
</body>
</html>