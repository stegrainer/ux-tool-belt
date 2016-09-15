<?
	if($_REQUEST) {
		if($_GET['tool']) {
			$toolID = $_GET['tool'];
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
		if($_GET['expand']) {
			$expand = $_GET['expand'];
		}
	}
?>

	<? if(is_object($card)): ?>
	<link rel="stylesheet" href="-/css/card.css">
	<div class="modal-shown">
		<div class="overlay"><a href="./"></a></div>
		<div class="card">
			<h2><?= $card->name ?></h2>
		<? if(!inBelt($toolID) || ($expand)): ?>
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
			<p>
				<a href="?<?=$_SERVER['QUERY_STRING']?>&amp;expand=1">Read more about this</a>
			</p>
		<? endif; ?>
			<form action="./" method="get">
				<input type="hidden" name="add" value="<?= $card->index ?>" />
				<div class="field">
					<label for="time">Time (in hours):</label>
					<input type="number" name="time" value="<?= $time ?>" min="1" step="1" id="time" tabindex="1">
				</div>
				<div class="field">
					<label for="cost">Estimated Cost:</label>
					<input type="number" name="cost" value="<?= $cost ?>" min="100" step="100" id="cost" tabindex="1">
				</div>
				<button type="submit" tabindex="1"><? if(!inBelt($toolID)): ?>Add to<? else: ?>Update<? endif; ?> your tool belt</button>
				<? if(inBelt($toolID)): ?>
				<a href="?remove=<?= $toolID ?>" class="remove">Remove from your tool belt</a>
				<? endif; ?>
			</form>
		</div>
	</div>
	<? endif; ?>