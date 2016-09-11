<?
	if($_REQUEST) {
		if($_REQUEST['tool']) {
			$tool = $_REQUEST['tool'];
		} else {
			$tool = false;
		}
	}
?>

	<? if($tool): ?>
	<div class="overlay">
		<div class="card">
			<h2>Affinity Diagramming</h2>
			<p>
				A brief description of the technique
			</p>
			<h4>Learn more:</h4>
			<ul>
				<li><a href="#">Informative Link 1</a></li>
				<li><a href="#">Informative Link 2</a></li>
				<li><a href="#">Informative Link 3</a></li>
			</ul>
			<form>
				
				<button type="submit">Add to your tool belt</button>
			</form>
		</div>
	</div>
	<? endif; ?>