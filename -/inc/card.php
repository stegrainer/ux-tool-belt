<?
	if($_REQUEST) {
		if($_REQUEST['tool']) {
			$id = $_REQUEST['tool'];
			$tool = getTool($id, $tools);
			print_r($tool);
		} else {
			$tool = false;
		}
	}
?>

	<? if($tool): ?>
	<div class="overlay">
		<a href="./"></a>
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