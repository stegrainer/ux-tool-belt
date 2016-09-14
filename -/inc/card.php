<?
	if($_REQUEST) {
		if($_GET['tool']) {
			$toolID = $_GET['tool'];
			$card = getTool($toolID, $tools);
		} else {
			$card = NULL;
		}
		if($_GET['time']) {
			$time = $_GET['time'];
		} else {
			$time = 2;
		}
		if($_GET['cost']) {
			$cost = $_GET['cost'];
		} else {
			$cost = 200;
		}
	}
?>

	<? if(is_object($card)): ?>
	<div class="modal-shown">
		<div class="overlay"><a href="./"></a></div>
		<div class="card">
			<h2><?= $card->name ?></h2>
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
			<form action="./" method="get">
				<input type="hidden" name="add" value="<?= $card->index ?>" />
				<div class="field">
					<label for="time">Time (in hours):</label>
					<input type="number" name="time" value="<?= $time ?>" min="1" max="100" step="1" id="time" tabindex="1">
				</div>
				<div class="field">
					<label for="cost">Estimated Cost:</label>
					<input type="number" name="cost" value="<?= $cost ?>" min="100" max="5000" step="100" id="cost" tabindex="1">
				</div>
				<button type="submit" tabindex="1">Add to your tool belt</button>
			</form>
		</div>
	</div>
	<? endif; ?>