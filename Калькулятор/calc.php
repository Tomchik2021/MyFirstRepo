<?php
if (empty($_GET)) {
    return 'Ничего не передано!';
}

if (empty($_GET['operation'])) {
    return 'Не передана операция';
}

if (($_GET['x1']===" ") || ($_GET['x2']===" ")) {
    return 'Не переданы аргументы';
}

$x1 = $_GET["x1"];
$x2 = $_GET["x2"];
$operation = $_GET["operation"];
$expression = $x1 . " " . $operation . " " . $x2 . "=";
if (is_numeric($x1) && is_numeric($x2)){
switch ($operation) {
	case '+':
		$result = $x1+$x2;
		break;

	case "-":
		$result = $x1-$x2;
		break;
	case '/':
		if ($x2 ==0) {
			return "Not possible";
		}else{$result = $x1/$x2;
		}
		break;
	default:
	return $result = $x1*$x2;
}
return $expression . $result;
}else{return "Enter numbers";
}

?>