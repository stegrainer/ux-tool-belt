<?
	include_once 'functions.php';
	
	if($_REQUEST) {
		if($_REQUEST['tool']) {
			$toolID = $_REQUEST['tool'];
			$card = getTool($toolID);
		} else {
			$card = NULL;
		}
		if(inBelt($toolID)) {
			$beltTool = getBeltTool($toolID);
			$time = $_SESSION['belt'][$beltTool]['time'];
			$cost = $_SESSION['belt'][$beltTool]['cost'];
		} else {
			$time = 2;
			$cost = 200;
		}
		if($_REQUEST['expand']) {
			$expand = $_REQUEST['expand'];
		}
	}
?>

	<? if(is_object($card)): ?>
	<link rel="stylesheet" href="-/css/card.css">
	<div class="modal-shown">
		<div class="overlay"><a href="./"></a></div>
		<div class="card">
			<h2><?= $card->name ?></h2>
		<? if(!inBelt($card->index) || ($expand)): ?>
			<p>
				<?= $card->description ?>
			</p>
			<? if($card->links): ?>
			<h4>Learn more:</h4>
			<ul>
			<? foreach($card->links as $link): ?>
				<li><a href="<?= $link->url ?>" tabindex="1"><?= $link->title ?></a></li>
			<? endforeach; ?>
			</ul>
			<? endif; ?>
		<? else: ?>
			<p class="readmore">
				<a href="?<?=$_SERVER['QUERY_STRING']?>&amp;expand=1">Read more about <?= $card->name ?></a>
			</p>
		<? endif; ?>
			<div class="card-actions">
				<form action="./" method="post">
					<input type="hidden" name="add" value="<?= $card->index ?>" />
					<div class="field">
						<label for="time">Time (in hours):</label>
						<input type="number" name="time" value="<?= $time ?>" min="1" max="400" step="1" id="time" tabindex="1">
					</div>
					<div class="field">
						<label for="cost">Estimated Cost:</label>
						<input type="number" name="cost" value="<?= $cost ?>" min="100" max="50000" step="100" id="cost" tabindex="1">
					</div>
					<button type="submit" tabindex="1"><? if(!inBelt($card->index)): ?>Add to<? else: ?>Update<? endif; ?> your tool belt</button>
				</form>
				<? if(inBelt($card->index)): ?>
				<form action="./" method="post">
					<input type="hidden" name="remove" value="<?= $card->index ?>" />
					<button class="remove secondary warn">Remove from your tool belt</button>
					<!-- <a href="?remove=<?= $toolID ?>" class="remove warn">Remove from your tool belt</a> -->
				</form>
				<? endif; ?>
			</div>
		</div>
	</div>
	<? endif; ?>