<?
	include_once 'functions.php';
	
	if(isset($_REQUEST['project'])) {
		if(empty($_REQUEST['project'])) {
			unset($_SESSION['project']);
		} else {
			$_SESSION['project'] = $_REQUEST['project'];
		}
	}
?>

<form action="./" method="post">
	<input type="text" name="project" id="project" value="<?= $_SESSION['project'] ?>"
		<? if(!empty($_SESSION['project'])) : ?>class="named"<? endif; ?>>
	<label for="project">What&rsquo;s your project name?</label>
</form>