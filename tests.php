<?php require_once 'global.inc.php'; ?>

<?php

//			$batchTools = new BatchTools();
//			$batches = $batchTools->getAllBatches();
//			
//			foreach($batches as $batch) {
//				echo '<input type="checkbox" name="batch[]" value="' . $batch->name . '">' . $batch->display_name . '<br>';
//				echo " --  " . "<br>";
//			}
require_once('linkedin_3.2.0.class.php');
// display constants
    $API_CONFIG = array(
        'appKey' => '75d6pivzxrsxbo',
        'appSecret' => 'EglOAOQCTzy7pVLI',
        'callbackUrl' => NULL
    );
    $OBJ_linkedin = new LinkedIn($API_CONFIG);
    $OBJ_linkedin->setToken(array("oauth_token"=>"d5bc154e-f98b-4372-892b-54ad5efce7e4","oauth_token_secret"=>"e164bdef-1b46-45d2-97e1-488986d3c4e6"));
    $OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
                    $response = $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url,skills,summary,languages,public-profile-url)');
                    
                    var_dump($response);
?>