<?php require_once 'global.inc.php'; ?>

<?php

			$batchTools = new BatchTools();
			$batches = $batchTools->getAllBatches();
			
			foreach($batches as $batch) {
				echo '<input type="checkbox" name="batch[]" value="' . $batch->name . '">' . $batch->display_name . '<br>';
				echo " --  " . "<br>";
			}
			
			
?>