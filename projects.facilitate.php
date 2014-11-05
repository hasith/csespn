<?php
//class for get the interested project holders
    require_once './global.inc.php';
    verify_oauth_session_exists();

    if (HttpSession::currentUser()->getOrganization()->access_level== 2) {
        $projectId = $_POST["projectId"];
        $linkedinId = $_POST["linkedinId"];
        $stu_phone = $_POST["stu_phone"];
        $stu_comment = $_POST["stu_comment"];
		$idUser = $_POST["idUser"];
        
        $queryString = $_POST["queryString"];

         //echo $projectId . $studentId . $stu_phone . $stu_comment;
		

        Project::addInterestStudents($projectId, $linkedinId, $stu_phone, $stu_comment );
		AuditTrail::takeProject('project', $projectId,'take project',$idUser, false);

        header("Location: projects.php");
        die();
    }
?>