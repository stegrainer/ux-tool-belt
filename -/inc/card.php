<?
	if($_REQUEST) {
		if($_REQUEST['tool']) {
			$id = $_REQUEST['tool'];
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
				<li><a href="<?= $link->url ?>"><?= $link->title ?></a></li>
			<? endforeach; ?>
			</ul>
			<? endif; ?>
			<form action="./" method="get">
				<input type="hidden" name="add" value="<?= $tool->index ?>" />
				<button type="submit">Add to your tool belt</button>
			</form>
		</div>
	</div>
	<? endif; ?>