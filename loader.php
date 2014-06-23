<?php
header( 'Content-type: text/html; charset=utf-8' );
require_once './global.inc.php';
require_once 'simple_html_dom.php';

session_start();
verify_oauth_session_exists();

if (User::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
}

$start_index = 0;
if(isset($_GET['start_index'])) $start_index = $_GET['start_index'];


function getSkills($html) {
    $skills = array();   
    if($html) {
        foreach($html->find('li.competency') as $element) {
            $tech_name = trim($element->find('span', 0)->plaintext);
            if (strpos($tech_name, '(') !== 0) {
                array_push($skills, $tech_name);
            }
        }    
    }
    return $skills;   
}

function insertSkills($skills, $student_id) {
    foreach($skills as $tech){   

        $techId = Technology::checkTechnologyExists(trim($tech));
        if($techId <= 0){
            $technology = new Technology();                                
            $technology->name = trim($tech);
            $technology->save(TRUE);
        }

        if(!Endorsement::checkEndorsementExists($techId, $student_id)){
            $endorsement = new Endorsement();
            $endorsement->student_id = $student_id;
            $endorsement->technology_id = $techId;
            $endorsement->count = 1;
            $endorsement->save(TRUE);
        }
    }
}

?>

<?php

$studentTools = new StudentTools();
$students = $studentTools->getAllStudents($start_index);


echo 'Begining the processing ...<br />';
foreach($students as $student){
    try{
        $html = file_get_html($student->profile_url);
        $skills = getSkills($html);

        insertSkills($skills, $student->id);

        echo 'Imported data for Student:'.$student->id.'<br />';

        flush();
        ob_flush();

    } catch(Exception $e) {
        echo 'Caught exception: '.$e->getMessage().' on Student Id:'.$student->id.'<br />';
    }
}
echo 'Processing complete ...<br />';
  
?>
