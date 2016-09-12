<?

function getTools() {
	$filepath = __DIR__ . '/../../ux-tools.json';
	$contents = file_get_contents($filepath);
	$contents = utf8_encode($contents);
	$tools = json_decode($contents);
	
	return $tools;
}

function groupTools($tools) {
	$tmpSort = Array();
	foreach($tools as &$item) {
		$tmpSort[] = &$item->name;
	}
	array_multisort($tmpSort, $tools);
	
	foreach($tools as $tool) {
		foreach($tool->phase as $phase) {
			$phases[$phase][] = $tool;
		}
	}
	
	return $phases;
}

function getTool($id, $tools) {
	foreach($tools as $tool) {
		if($tool->index == $id) {
			$thisTool = $tool;
			break;
		}
	}
	
	return $thisTool;
}

?>