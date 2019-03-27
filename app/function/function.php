<?php 
function percent($total_marks, $scored){
	$total_marks = (($total_marks * 0.01) > 0) ? ($total_marks * 0.01) : 1;
	return round($scored / ($total_marks));
}
?>