<?php
foreach($transaction as $data){
	$res[] = $data;
}
echo json_encode($res);
?>