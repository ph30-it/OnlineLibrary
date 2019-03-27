<?php 
function percent($total_marks, $scored){
	return round($scored / ($total_marks * 0.01));
}
?>