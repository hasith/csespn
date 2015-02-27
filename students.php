<?php
require_once './global.inc.php';
verify_oauth_session_exists();

$studentTools = new StudentTools();
$settingsTools = new SettingsTools();

$sort = 'name';
if(isset($_GET['sort'])) $sort = $_GET['sort'];



if(HttpSession::currentUser()->getOrganization()->access_level > 2) {
    $technology = explode('_', $_GET['technology']);
}
//print_r($technology);

if (isset($_GET['batch']) && $_GET['batch'] == "level_2") {
    $batch = "level_2";
    $batchId = $settingsTools->getLevelTwoId();
} else if (isset($_GET['batch']) && $_GET['batch'] == "level_3") {
    $batch = "level_3";
    $batchId = $settingsTools->getLevelThreeId();
} else if (isset($_GET['batch']) && $_GET['batch'] == "level_1"){
    $batch = "level_1";
    $batchId = $settingsTools->getLevelOneId();
} else {
    $batch = "level_4";
    $batchId = $settingsTools->getLevelFourId();
}

$students = $studentTools->getStudentViewModels($batchId, $sort, $technology);  

/* * *********************Sorting Students*********************************** */
if (isset($_GET['sort']) && $_GET['order_by'] == "gpa") {
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
                <p class="page-title" style="margin-bottom:20px">The vibrant pool of students, keen of cross functional activities is our greatest strength. 
					You are able to access student profiles and collaborate for your organizational activities. On this page, corporate users will be able to search and filter for students 
					having specific technology competencies.</p>
                <div id="bannerLeft">	
                    
                    <div id="example-two">					
                        <ul class="nav">
                            <?php
                                
                                if($batch =="level_4"){
                                    echo '<li class="nav-one"><a class="batch-tab current" data-batch="level_4" href="javascript:void(0)">Level 4</a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab" data-batch="level_3" >Level 3</a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab" data-batch="level_2">Level 2</a></li>';
									echo '<li class="nav-four"><a href="javascript:void(0)" class="batch-tab" data-batch="level_1">Level 1</a></li>';
                                }
                                    
                                else if($batch =="level_3"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="javascript:void(0)">Level 4 </a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab current" data-batch="level_3" >Level 3 </a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab" data-batch="level_2">Level 2 </a></li>';
									echo '<li class="nav-four"><a href="javascript:void(0)" class="batch-tab" data-batch="level_1">Level 1 </a></li>';
                                }
                                else if($batch =="level_2"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="javascript:void(0)">Level 4 </a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab" data-batch="level_3" >Level 3 </a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab current" data-batch="level_2">Level 2 </a></li>';
									echo '<li class="nav-four"><a href="javascript:void(0)" class="batch-tab" data-batch="level_1">Level 1 </a></li>';
                                }
                                else if($batch =="level_1"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="javascript:void(0)">Level 4 </a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab" data-batch="level_3" >Level 3 </a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab" data-batch="level_2">Level 2 </a></li>';
									echo '<li class="nav-four"><a href="javascript:void(0)" class="batch-tab current" data-batch="level_1">Level 1 </a></li>';
                                }
                            ?>                                                        
                        </ul>                        
                        <div class="list-wrap">                        	
                            <div id="featured2" style="margin-top: -30px;">                           		
                                <p class="descriptionTab"></p>                                
                                
                                    <?php 
                                        if (count($students) > 0) {
                                            echo '<div id="accordion" class="student-page">'.getHtmlForStudents($students).'</div>';
											echo '<p class="message-text">Number of student records: '.count($students).'</p>';
                                        } else {
                                            echo '<p class="message-text">-- no student with the given criteria is available in this batch --</p>';
                                        }
									?>
                                                                   
                            </div>                             
                        </div> <!-- END List Wrap -->                     
                    </div>                       
                </div>
                
               <div id="rightSide">	
                    <?php if (HttpSession::currentUser()->getOrganization()->access_level >= 3) { ?>
                        <div id="addProject">
                            <a href="" id="assemble-team" >
                                Assemble a Team
                            </a>
                        </div>
                    <?php } ?>
                    <div class="componentContainer">
                        <div class="heading">
                            <p>Sort Students</p>
                        </div>                        
                        <div class="ccContainer">
                            <ul>
                                
                                <li><label><input type="radio" name="sort" value="users.name" checked="true"> By Name</label></li>
                                <li><label><input type="radio" name="sort" value="students.student_id"> By Student Id</label></li>
                            </ul>
                        </div>                                                
                    </div>    

                    <div style="display: none" id="team-dialog" title="We are still developing...">
                        <input type="hidden" id="sp-dialog-id"/>
                        <input type="hidden" id="user-level" value="<?php echo HttpSession::currentUser()->getOrganization()->access_level; ?>"/>

                        <p>Thanks for your interest on this feature, currently we are busy developing it :). <br/></br/>Once complete it will let you  assemble a team of students to assist you in your organizational activities such as events, promotions, CSR, etc.</p>
                        How likely you are to use this feature?
                        
                    </div> 
                   
                    <form action="" method="GET" id="sortForm">
                        <input name="sorter" type="hidden" id="sorterHiddenInput" value="<?php echo $orderBy; ?>">
                        <input name="techFilter" type="hidden" id="techFilterHiddenInput" value="0">                        
                    </form>
                    <div class="componentContainer">
                        <div class="heading">
                            <p>Filter by Technology<a href="" id="tech-filter" class="filterbtn"> Filter </a><a href="" id="tech-clear" class="filterbtn"> Clear </a></p>
                            
                        </div>

                        <div class="ccContainer">
                            <!--<div class="cloudArea"><img src="img/cloud.jpg" /></div>-->
                            <div class="cloudArea">
                                <select name="technology" id="technoFilterCombo" size="20" multiple="multiple">
                                    <?php
                                    $tecs = new TechnologyTools();
                                    $arr = $tecs->getTechnologiesForBatch($batchId);
                                    foreach ($arr as $value) {
                                        $selected = in_array($value->id, $technology) ? "selected" : "";
                                        echo "<option value='$value->id' $selected>$value->name</option>\n\r";
                                    }
                                    ?>
                                </select>
                                </form>
                            </div>
                        </div>


                    </div>                  
               </div>
                
            </div>                                                                        
        </div>

        <div id="dialog-form" title="University Scorecard">
            <p style="padding-top: 10px;" class="validateTips">Following is a subjective scorecard given by the CSE academia to this student.</p>

            <form id="create_form" method="post" action="">
                <fieldset>
                    <table width='100%'>
                        <tr>
                            <td>
                                <label for="event_organizing" class="input-label">Contribution in Organizing and Management</label>
                            </td>
                            <td>
                                <div id="event_organizing" class="rateit" data-rateit-readonly="true" ></div><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tech_contribution" class="input-label">Technological Contribution at the Department </label>
                            </td>
                            <td>
                                <div id="tech_contribution" class="rateit" data-rateit-readonly="true" ></div><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="social_engagement" class="input-label">Social and Community Engagement </label>
                            </td>
                            <td>
                                <div id="social_engagement" class="rateit" data-rateit-readonly="true" ></div><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="mentoring_program" class="input-label">Attendence and Passion in Mentoring Program </label>
                            </td>
                            <td>
                                <div id="mentoring_program" class="rateit" data-rateit-readonly="true" ></div><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lecture_attendence" class="input-label">Attendence for Lectures and Classes </label>
                            </td>
                            <td>
                                <div id="lecture_attendence" class="rateit" data-rateit-readonly="true" ></div><br/>
                            </td>
                        </tr>
                        
                    </table>

                </fieldset>
            </form>
        </div> 

    <?php include_once 'scripts.inc.php'; ?>
    <?php require_once './common.inc.php'; ?>
    <script type="text/javascript" src="js/students.js"></script>
    <script>
        $('#tech-filter').click(function() {
            <?php if (HttpSession::currentUser()->getOrganization()->access_level > 2) { ?>
                techFilter();
            <?php } else { ?>
                premiumFeature();
            <?php } ?>
            return false;
        });

        $('#tech-clear').click(function() {
            <?php if (HttpSession::currentUser()->getOrganization()->access_level > 2) { ?>
                techClear();
            <?php } else { ?>
                premiumFeature();
            <?php } ?>
            return false;
        });

        $(".uniScoreCard").click(function(){
            <?php if (HttpSession::currentUser()->getOrganization()->access_level > 2) { ?>
                showUniScorecard($(this));
            <?php } else { ?>
                premiumFeature();
            <?php } ?>
            return false;
        });
    </script>
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
    $description = strlen($student->description) > 1 ? $student->description.'...' : '-description not available -';
    $color = 'orangeColor'; 
    $html = '<h3 class="'.$color.' clearfix">';
    $html = $html . '<div class="descriptionArea">';
    $html = $html . '<img style="margin-top:10px;height: 80px;width: 80px;" src="'. getProfileUrl($student) .'"/>';
    $html = $html . '<div style="margin-left:100px; margin-top:-95px"><span class="title">' . $student->getUser()->name;  
    if (HttpSession::currentUser()->getOrganization()->access_level > 4) {
        $html = $html . '  <span style="font-size:10px">( '. $student->student_id.' )</span></span>';  
    }
    $html = $html . '<p>'. $description.'</p>';
    $html = $html . getLinkedInProfile($student).'</div></div>'; //.getUniScorecard($student)
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    //$html = $html . '<img height="79" width="65" src="'. $user->pic_url .'"/>';
    $html = $html . '<p>';  
    $html = $html .  getHtmlForStudentTechnologies($student) ;
    $html = $html . '</p>';  
    $html = $html . '</div>';
    
    return $html;
}

function getProfileUrl($student){
	$pic_url = $student->getUser()->pic_url;
    if($pic_url) {
        return $pic_url;
    } else {
        return './img/no_photo.png';
    }
}


function getUniScorecard($student){
    return '<a class="uniScoreCard" href="" data-student_id="'.$student->id.'">Uni Scorecard<img class="uniScoreCardImg" src="img/blue_star.png"/></a> ';
}

function getLinkedInProfile($student){
    return '<a class="linkedInImg" href="' . $student->getUser()->profile_url . '"></a>';
}

function getHtmlForStudentTechnologies($student) {
    if(HttpSession::currentUser()->getOrganization()->access_level > 1) {
        $technologies = $student->getCompetentTechnologies();
        $html = "";
        $count = 0;
        foreach ($technologies as $key => $value) {  
            if ($count == count($technologies) ) {
                $html = $html . " " . $value[0]->name ;//. " " . "(" . $value[1] . ")";
                break;
            }
            $html = $html . " " . $value[0]->name . ", ";// . "(" . $value[1] . "),";
            $count++;
        }
        return $html;
    } else {
        return '-- student competency information is available only to the corporate users --';
    }    
}


/**
 * Helper functions for different sort operations
 */

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