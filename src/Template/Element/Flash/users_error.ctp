<?php

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" style="color:red; margin-left:40%;" onclick="this.classList.add('hidden');">
	<?php foreach($message as $msg){

		 foreach($msg as $show)
		 {
		 	echo $show;
		 	echo "<br>";

		 }
	} ?></div>