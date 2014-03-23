<?php
require_once './global.inc.php';
    session_start();
    if(!isset($_SESSION['token'])){
        header('Location: ' . '404.php');
    }
    
    $studentTools = new StudentTools();
    $pending_intern_students = $studentTools->getPendingInternshipStudents();
    $pending_grad_students = $studentTools->getPendingGraduationStudents();
    
    /***********************Sorting Students************************************/
    if(isset($_GET['sort_by']) && $_GET['sort_by']=="gpa"){
        usort($pending_intern_students, "gpa_sort");
        usort($pending_grad_students, "gpa_sort");
    }else if(isset($_GET['sort_by']) && $_GET['sort_by']=="endorsements"){
        usort($pending_intern_students, "endorsements_sort");
        usort($pending_grad_students, "endorsements_sort");
    }else if(isset($_GET['sort_by']) && $_GET['sort_by']=="speciality"){
        usort($pending_intern_students, "speciality_sort");
        usort($pending_grad_students, "speciality_sort");
    }else if(isset($_GET['sort_by']) && $_GET['sort_by']=="name"){
        usort($pending_intern_students, "name_sort");
        usort($pending_grad_students, "name_sort");
    }        
    function gpa_sort($student1, $student2){
        return $student2->gpa-$student1->gpa;
    }    
    function endorsements_sort($student1, $student2){
        return $student2->endorsements-$student1->endorsements;
    }
    function speciality_sort($student1, $student2){
        return $student2->course-$student1->course;
    }
    function name_sort($student1, $student2){
        return $student2->getUser()->name-$student1->getUser()->name;
    }
    /***************************************************************************/
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        
        <link rel="stylesheet" href="css/style.css">
        
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->        
        <div id="header">
            <div class="container clearfix">                
                <div id="logo">
                    <a href="./index.php"><img src="img/logo.jpg" /></a>
                </div>
                
                <div id="nav">
                    <ul class="clearfix">
                        <li><u><a href="./students.php">Students</a></u></li>
                        <li><a href="./sessions.php">Sessions</a></li>
                        <li><a href="./research.php">Research</a></li>
                        <li><a href="./events.php">Events</a></li>
                        <?php
                            if(isset($_SESSION['user'])){
                                $user = $_SESSION['user'];
                                echo '<li><a href="">' . $user->display_name . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>                
            </div>
        </div>        
        <div class="container clearfix">        	
            <div id="bannerArea" class="clearfix">
            	<div id="bannerLeft">					
                    <div id="example-two">					
                        <ul class="nav">
                            <li class="nav-one"><a href="#featured2" class="current">Pending Internship</a></li>
                            <li class="nav-two"><a href="#core2">Pending Graduation</a></li>
                        </ul>                        
                        <div class="list-wrap">                        	
                            <div id="featured2">                           		
                                <p class="descriptionTab">
                                	Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                </p>                                
                               <div id="accordion"> 
                                   <?php echo getHtmlForStudents($pending_intern_students);?>
                               </div>                                   
                            </div>                             
                             <div id="core2" class="hide">
                                <div id="accordion2"> 
                                   <?php echo getHtmlForStudents($pending_grad_students);?>  
                                </div>
                             </div>                             
                         </div> <!-- END List Wrap -->                     
                     </div>                       
                </div>
                <div id="rightSide">	
                	
                    <div id="addProject">
                    	<a href="">
                        	Assemble a Team
                        </a>
                    </div>
                    			
                    <ul id="legend">
                    	<li class="cse clearfix">
                        	<span></span>
                            <p>Student Specialty - CSE</p>
                        </li>
                        <li class="ice clearfix">
                        	<span></span>
                            <p>Student Specialty - ICE</p>
                        </li>
                    </ul>                	                    
                    <div class="componentContainer">
                    	<div class="heading">
                        	<p>Filter by Technology</p>
                        </div>                        
                        <div class="ccContainer">
                        	<div class="cloudArea"><img src="img/cloud.jpg" /></div>
                            <div class="cloudArea">
                                <select>
                                	<option>Select Form</option>
                                </select>
                            </div>
                        </div>                        
                    </div>                    
                    <div class="componentContainer">
                    	<div class="heading">
                            <p>Sort Students</p>
                        </div>                        
                        <div class="ccContainer">
                            <ul>
                            	<li><input type="checkbox"><label>By GPA</label></li>
                                <li><input type="checkbox"><label>By Endorsements</label></li>
                                <li><input type="checkbox"><label>By Specialty</label></li>
                                <li><input type="checkbox"><label>By First Name</label></li>
                            </ul>
                        </div>                                                
                    </div>                                                        
                </div>
            </div>                                                                        
        </div>
        
        <script src="js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
	<script src="js/organictabs.jquery.js"></script>
        <script>
            $(function() {  
                $("#example-two").organicTabs({
                    "speed": 200
                });								
		$( "#accordion" ).accordion({
                    autoHeight: false,
                    navigation: true
		});
		$( "#accordion2" ).accordion({
                    autoHeight: false,
                    navigation: true
		});       
            });
        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>-->
    </body>
</html>

<?php

function getHtmlForStudents($students){
    $html = "";
    foreach ($students as $student){
        $html = $html . getHtmlForStudent($student);
    }
    
    return $html;
}

function getHtmlForStudent($student){
    $color = $student->course === "CSE" ? 'yellowColor' : 'orangeColor'; //else ICE
    $html = '<h3 class="' . $color . ' clearfix">';
    $html = $html . '<div class="descriptionArea">';
    $html = $html . '<a href="#">' . $student->getUser()->name . '</a>';
    $html = $html . '<p>' . getHtmlForStudentTechnologies($student) . '</p>';
    $html = $html . '</div>';
    $html = $html . '<div class="darkGray">';
    $html = $html . '<ul>';
    $html = $html . '<li class="endGPA">Endorsements: ' . $student->endorsements . '</li>';
    $html = $html . '<li class="endGPA">GPA: ' . $student->gpa . '</li>';
    $html = $html . '<li class="linkedLink"><a href="' . $student->linkedin_url . '">LinkedIn</a></li>';
    $html = $html . '</ul>';
    $html = $html . '</div>';
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    $html = $html . '<img src="img/' . $student->image_path . '"/>';
    $html = $html . '<p>';
    $html = $html . $student->description;
    $html = $html . '</p>';
    $html = $html . '</div>';       
    return $html;
}

function getHtmlForStudentTechnologies($student){
    $technologies = $student->getCompetentTechnologies();
    $html = "";
    $count = 1;
    foreach ($technologies as $key => $value) {
        if($count == count($technologies)){
            $html = $html . ' ' . $value[0]->name . ' ' .'('.$value[1].')';
            break;
        }
        $html = $html . ' ' . $value[0]->name . ' ' .'('.$value[1].'),';
    }
    
    return $html;
}

?>