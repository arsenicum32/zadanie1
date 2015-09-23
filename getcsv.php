<?php
header('Content-Type: application/x-excel');
header('Content-Disposition: attachment; filename="export.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
$headers=array('№','телефон:','Регион:','оператор:');
echo(implode(',',$headers));
echo("\n");
$cut = explode("|", $_POST['data']);
$req = explode("|",$_POST['regions']);
$oper = explode("|",$_POST['operators']);
for($i=0;$i<$_POST['length'];$i++){
  $row_1 = array(strval($i), $cut[$i],$req[$i],$oper[$i]);
  echo(implode(',',$row_1));
  echo("\n");
}
?>
