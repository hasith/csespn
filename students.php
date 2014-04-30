<?php
require_once './global.inc.php';
session_start();
if (!oauth_session_exists()) {
    header('Location: ' . '404.php');
}

$studentTools = new StudentTools();
$settingsTools = new SettingsTools();

if (isset($_GET['batch']) && $_GET['batch'] == "level_1") {
    $students = $studentTools->getStudents($settingsTools->getLevelOneId());
    $batch = "level_1";
} else if (isset($_GET['batch']) && $_GET['batch'] == "level_2") {
    $students = $studentTools->getStudents($settingsTools->getLevelTwoId());
    $batch = "level_2";
} else if (isset($_GET['batch']) && $_GET['batch'] == "level_3") {
    $students = $studentTools->getStudents($settingsTools->getLevelThreeId());
    $batch = "level_3";
} else {
    $students = $studentTools->getStudents($settingsTools->getLevelFourId());
    $batch = "level_4";
}


/* * *********************Sorting Students*********************************** */
if (isset($_GET['order_by']) && $_GET['order_by'] == "gpa") {
    usort($students, "gpa_sort");
} else if (isset($_GET['sort_by']) && $_GET['order_by'] == "endorsements") {
    usort($students, "endorsements_sort");
} else if (isset($_GET['order_by']) && $_GET['order_by'] == "speciality") {
    usort($students, "speciality_sort");
} else if (isset($_GET['order_by']) && $_GET['order_by'] == "name") {
    usort($students, "name_sort");
}
/* * ************************************************************************ */


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php require_once './head.inc.php'; ?>
<body>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->  

<?php require_once './nav.inc.php'; ?>    
        <div class="container clearfix">        	
            <div id="bannerArea" class="clearfix">
                <div id="bannerLeft">					
                    <div id="example-two">					
                        <ul class="nav">
                            <?php
                                if($batch == "level_4"){
                                    echo '<li class="nav-one"><a href="./students.php?batch=level_4" class="current">Pending Graduation</a></li>';
                                    echo '<li class="nav-two"><a href="./students.php?batch=level_3">Pending Internship</a></li>';
                                    
                                }else{
                                    echo '<li class="nav-one"><a href="./students.php?batch=level_4">Pending Graduation</a></li>';
                                    echo '<li class="nav-two"><a href="./students.php?batch=level_3" class="current">Pending Internship</a></li>';
                                }
                            ?>                                                        
                        </ul>                        
                        <div class="list-wrap">                        	
                            <div id="featured2">                           		
                                <p class="descriptionTab">
                                    Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                </p>                                
                                <div id="accordion">
                                    <?php echo getHtmlForStudents($students); ?>
                                </div>                                   
                            </div>                             
                        </div> <!-- END List Wrap -->                     
                    </div>                       
                </div>
                <div id="rightSide">	
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
                            <p>Sort Students</p>
                        </div>                        
                        <div class="ccContainer">
                            <ul>
                                <!--<li><a href="./students.php?batch=<?php //echo $batch ?>&order_by=gpa">By GPA</a></li>-->
                                <!--<li><a href="./students.php?batch=<?php // echo $batch ?>&order_by=endorsements">By Endorsements</a></li>-->
                                <li><a href="./students.php?batch=<?php echo $batch ?>&order_by=speciality">By Specialty</a></li>
                                <li><a href="./students.php?batch=<?php echo $batch ?>&order_by=name">By First Name</a></li>
                            </ul>
                        </div>                                                
                    </div>                                                        
                </div>
            </div>                                                                        
        </div>
<?php include_once 'scripts.inc.php'; ?>
<script>
    $(function() {
        $("#example-two").organicTabs({
            "speed": 200
        });
        $("#accordion").accordion({
            autoHeight: false,
            navigation: true
        });
        $("#accordion2").accordion({
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
function getHtmlForStudents($students) {
    $html = "";
    foreach ($students as $student) {
        $html = $html . getHtmlForStudent($student);
    }

    return $html;
}

function getHtmlForStudent($student) {
    $color = $student->course === "CSE" ? 'yellowColor' : 'orangeColor'; //else ICE
    $html = '<h3 class="'.$color.' clearfix">';
    $html = $html . '<div class="descriptionArea">';
    $html = $html . '<a href="#">' . $student->getUser()->name . '</a>';
    $html = $html . '<p>'. getHtmlForStudentTechnologies($student) .'</p>';
    $html = $html . '</div>';
    $html = $html . '<div class="darkGray" style="float:right">';
    $html = $html . '<ul>';
    //$html = $html . '<li class="endGPA"><span>Endorsements :</span>' . $student->getEndorsements() . '</li>';
    //$html = $html . '<li class="endGPA"><span>GPA :</span>' . $student->gpa . '</li>';
    $html = $html . '<li class="linkedLink"><a href="' . $student->getUser()->profile_url . '">LinkedIn</a></li>';
    $html = $html . '</ul>';
    $html = $html . '</div>';
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    $html = $html . '<img height="79" width="65" src="'. $student->getUser()->pic_url .'"/>';
    $html = $html . '<p>';  
    $html = $html .  $student->description;
    $html = $html . '</p>';  
    $html = $html . '</div>';
    
    return $html;
}

function getHtmlForStudentTechnologies($student) {
    $technologies = $student->getCompetentTechnologies();
    $html = "";
    $count = 0;
    foreach ($technologies as $key => $value) {        
        //max display is 3 - should come from a config file
        if ($count == count($technologies) || $count == 4) {
            $html = $html . " " . $value[0]->name ;//. " " . "(" . $value[1] . ")";
            break;
        }
        $html = $html . " " . $value[0]->name . ", ";// . "(" . $value[1] . "),";
        $count++;
    }
    return $html;
}


/**
 * Helper functions for different sort operations
 */
function gpa_sort($student1, $student2) {
    return doubleval($student1->gpa) - doubleval($student2->gpa);
}

function endorsements_sort($student1, $student2) {
    return intval($student2->getEndorsements()) - intval($student1->getEndorsements());
}

function speciality_sort($student1, $student2) {
    return strcmp($student2->course,$student1->course);
}

function name_sort($student1, $student2) {
    return $student2->getUser()->name - $student1->getUser()->name;
}
?>