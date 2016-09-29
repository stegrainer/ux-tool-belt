<?
	session_start();

	include_once '-/inc/functions.php';
	$tools = getTools();
	$phases = groupTools($tools);
	if($_REQUEST['clear'] == 1) {
		clearBelt();
	}
	if($_REQUEST['print'] == 1) {
		$printView = 1;
	}
	if($_SESSION['visited']) {
		if($_REQUEST['newbie']) {
			$newbie = true;
			$_SESSION['visited'] = true;
		} else {
			$newbie = false;
		}
	} else {
		$newbie = true;
		$_SESSION['visited'] = true;
	}
	$uri = strtok($_SERVER["REQUEST_URI"],'?');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<title>The UX Tool Belt</title>
	<link rel="shortcut icon" href="-/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="180x180" href="-/img/apple-icon.png">
	<link rel="icon" type="image/png" href="-/img/android-icon.png" sizes="192x192">
	<meta name="twitter:title" property="og:title" content="The UX Tool Belt">
	<meta name="description" content="There's more to User Experience Design than mockups and prototypes.">
	<meta name="twitter:description" property="og:description" content="There's more to User Experience Design than mockups and prototypes.">

	<meta name="twitter:image" property="og:image" content="<?= "http://$_SERVER[HTTP_HOST]$uri" ?>-/img/logo-social.png">
	<meta name="twitter:url" property="og:url" content="<?= "http://$_SERVER[HTTP_HOST]$uri" ?>">
	<meta name="twitter:card" content="summary_large_image">

	
	<? if($printView): ?>
	<link rel="stylesheet" href="-/css/print.min.css">
	<? else: ?>
	<link rel="stylesheet" href="-/css/styles.min.css">
	<? endif; ?>
</head>
<body>
<? if($printView): ?>
	<? include '-/inc/print.php' ?>
<? else: ?>
	<div class="page">
		<header role="banner">
			<div class="wrap">
				<div id="logo" class="img"></div>
				<h1>The UX Tool Belt</h1>
			<? if($newbie) : ?>
				<div class="intro">
					<p>
						<strong>There&rsquo;s more to User Experience Design than mockups
						and prototypes.</strong> Compiled below are the time-honored tools
						and techniques of our trade, passed on from generation to generation.
						If you are unfamiliar with a technique, you can read a brief
						description or follow links to learn more from experienced
						professionals. Are there missing tools or techniques?
						<a href="https://stegrainer.com/contact/">Let me know, and I&rsquo;ll
						add them</a>!
					</p>
					<p>
						<strong>The tools are organized alphabetically within the Lean UX
						framework of Think > Make > Check.</strong> During the Think phase,
						you research and, well, think to better understand your users and
						the problems you are trying to solve to come up with hypotheses to
						test. Then you Make the quickest representation of a potential
						solution you can. Finally, you Check the solution against your
						hypotheses and learn.
					</p>
				</div>
			<? else: ?>
				<p class="readmore">
					<a href="?newbie=1">There&rsquo;s more to UX than mockups and prototypes.</a>
				</p>
			<? endif; ?>
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
			<div class="wrap">
				<div class="info">
					<a href="http://uxcellence.com">A UXcellence project</a><br />
					<a href="https://stegrainer.com/contact/?subject=My%20Thoughts%20on%20the%20UX%20Tool%20Belt">I welcome your feedback</a><br />
					<a href="https://stegrainer.com">Made with care by Ste Grainer.</a>
				</div>
				<div class="license">
					<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">The UX Tool Belt</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Ste Grainer</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.
				</div>
			</div>
		</footer>
	</div>
	<div class="modal" id="card">
	<? include '-/inc/card.php' ?>
	</div>
	<script type="text/javascript" src="-/js/scripts.min.js"></script>
<? endif; ?>
	<link rel="preload" href="https://fonts.googleapis.com/css?family=Raleway:400,900" as "style">
	<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,900"></noscript>
</body>
</html>