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

function getTool($id) {
	$tools = getTools();
	foreach($tools as $tool) {
		if($tool->index == $id) {
			$thisTool = $tool;
			break;
		}
	}
	
	return $thisTool;
}

function getBelt() {
	return $_SESSION['belt'];
}

function getBeltTool($id) {
	foreach($_SESSION['belt'] as $key => $tool) {
		if($tool['id'] == $id) {
			$index = $key;
			break;
		}
	}
	
	return $index;
}

function getBeltSums() {
	$time = 0;
	$cost = 0;
	foreach($_SESSION['belt'] as $tool) {
		$time = $time + $tool['time'];
		$cost = $cost + $tool['cost'];
	}
	
	return array(
		'time' => $time,
		'cost' => $cost
	);
}

function inBelt($id) {
	$inBelt = false;
	foreach($_SESSION['belt'] as $tool) {
		if($tool['id'] == $id) {
			$inBelt = true;
		}
	}
	return $inBelt;
}

function updateBelt($id, $time, $cost) {
	$beltTool = getBeltTool($id);
	$_SESSION['belt'][$beltTool]['time'] = $time;
	$_SESSION['belt'][$beltTool]['cost'] = $cost;
}

function addToBelt($id, $time, $cost) {
	if(!inBelt($id)) {
		$tool = getTool($id);
		$newTool = array(
			'id'   => $id,
			'tool' => $tool,
			'time' => $time,
			'cost' => $cost
		);
		$_SESSION['belt'][] = $newTool;
	} else {
		updateBelt($id, $time, $cost);
	}
}

function removeTool($id) {
	$beltTool = getBeltTool($id);
	
	if(!is_bool($beltTool)) {
		unset($_SESSION['belt'][$beltTool]);
	}
	if(empty($_SESSION['belt'])) {
		unset($_SESSION['belt']);
	}
}

function clearBelt() {
	session_unset();
}

?>