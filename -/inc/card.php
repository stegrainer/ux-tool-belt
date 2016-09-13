<?
	if($_GET) {
		if($_GET['tool']) {
			$id = $_GET['tool'];
			$tool = getTool($id, $tools);
		} else {
			$tool = false;
		}
	}
?>

	<? if($tool): ?>
	<div class="modal-shown">
		<div class="overlay"><a href="./"></a></div>
		<div class="card">
			<h2><?= $tool->name ?></h2>
			<p>
				<?= $tool->description ?>
			</p>
			<? if($tool->links): ?>
			<h4>Learn more:</h4>
			<ul>
			<? foreach($tool->links as $link): ?>
				<li><a href="<?= $link->url ?>" tabindex="1"><?= $link->title ?></a></li>
			<? endforeach; ?>
			</ul>
			<? endif; ?>
			<form action="./" method="get">
				<input type="hidden" name="add" value="<?= $tool->index ?>" />
				<div class="field">
					<label for="time">Time (in hours):</label>
					<input type="number" name="time" value="5" min="1" max="100" step="1" id="time" tabindex="1">
				</div>
				<div class="field">
					<label for="cost">Cost:</label>
					<input type="number" name="cost" value="100" min="100" max="5000" step="100" id="cost" tabindex="1">
				</div>
				<button type="submit" tabindex="1">Add to your tool belt</button>
			</form>
		</div>
	</div>
	<? endif; ?>