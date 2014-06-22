<?php
require_once './global.inc.php';
session_start();
if (!oauth_session_exists()) {
    header('Location: ' . '404.php');
}

$studentTools = new StudentTools();
$settingsTools = new SettingsTools();

$sort = 'name';
if(isset($_GET['sort'])) $sort = $_GET['sort'];

$technology = $_GET['technology'];

$batch = "level_4";

if (isset($_GET['batch']) && $_GET['batch'] == "level_2") {
    $students = $studentTools->getStudents($settingsTools->getLevelTwoId(), $sort, $technology);	
    $batch = "level_2";
} else if (isset($_GET['batch']) && $_GET['batch'] == "level_3") {
    $students = $studentTools->getStudents($settingsTools->getLevelThreeId(), $sort, $technology);
    $batch = "level_3";
} else {
    $students = $studentTools->getStudents($settingsTools->getLevelFourId(), $sort, $technology);   
}


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
                <p class="page-title">A vibrant pool of CSE students who are keen to be part of cross functional activities is our greatest strength. The organizations are able to collaborate with the students in their organizational activities by forming teams according to their preference. Such initiatives help the students to engage with the corporate sector during their academic life.</p>
                <div id="bannerLeft">	
                    
                    <div id="example-two">					
                        <ul class="nav">
                            <?php
                                
                                if($batch =="level_4"){
                                    echo '<li class="nav-one"><a class="batch-tab current" data-batch="level_4" href="#">Level 4 students</a></li>';
                                    echo '<li class="nav-two"><a href="#" class="batch-tab" data-batch="level_3" >Level 3 students</a></li>';
                                    echo '<li class="nav-three"><a href="#" class="batch-tab" data-batch="level_2">Level 2 students</a></li>';
                                }
                                    
                                else if($batch =="level_3"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="#">Level 4 students</a></li>';
                                    echo '<li class="nav-two"><a href="#" class="batch-tab current" data-batch="level_3" >Level 3 students</a></li>';
                                    echo '<li class="nav-three"><a href="#" class="batch-tab" data-batch="level_2">Level 2 students</a></li>';
                                }
                                else if($batch =="level_2"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="#">Level 4 students</a></li>';
                                    echo '<li class="nav-two"><a href="#" class="batch-tab" data-batch="level_3" >Level 3 students</a></li>';
                                    echo '<li class="nav-three"><a href="#" class="batch-tab current" data-batch="level_2">Level 2 students</a></li>';
                                }
                            ?>                                                        
                        </ul>                        
                        <div class="list-wrap">                        	
                            <div id="featured2">                           		
                                <p class="descriptionTab"></p>                                
                                <div id="accordion" class="student-page">
                                    <?php echo getHtmlForStudents($students);
										  
									?>
                                </div>                                   
                            </div>                             
                        </div> <!-- END List Wrap -->                     
                    </div>                       
                </div>
                
               <div id="rightSide">	
                    <?php if (User::currentUser()->getOrganization()->access_level >= 3) { ?>
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
                        <input type="hidden" id="user-level" value="<?php echo User::currentUser()->getOrganization()->access_level; ?>"/>

                        <p>Thanks for your interest on this feature, currently we are busy developing it :). <br/></br/>Once complete it will let you  assemble a team of students to assist you in your organizational activities such as events, promotions, CSR, etc.</p>
                    </div> 
                   
                    <form action="" method="GET" id="sortForm">
                        <input name="sorter" type="hidden" id="sorterHiddenInput" value="<?php echo $orderBy; ?>">
                        <input name="techFilter" type="hidden" id="techFilterHiddenInput" value="0">                        
                    </form>
                    <div class="componentContainer">
                        <div class="heading">
                            <p>Filter by Technology</p>
                        </div>

                        <div class="ccContainer">
                            <!--<div class="cloudArea"><img src="img/cloud.jpg" /></div>-->
                            <div class="cloudArea">

                                <select name="technology" id="technoFilterCombo" size="15">
                                    <option value="0">Any Technology</option>
                                    <?php
                                    $tecs = new TechnologyTools();
                                    $arr = $tecs->getAlltechnologies();
                                    foreach ($arr as $value) {
                                        $selected = $techoFilter == $value->id ? "selected" : "";
                                        echo "<option value='$value->id' $selected>$value->name</option>";
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
<?php include_once 'scripts.inc.php'; ?>
<script>
    
    $(".batch-tab").click(function(){
        updateQueryString("batch", $(this).data('batch'));	
    });
    
    
    $('#technoFilterCombo').change(function() {
        var tech = $('#technoFilterCombo').find(":selected").val();
        updateQueryString("technology", tech);	
    });
    
    
    $('#technoFilterCombo').val(qs['technology'])
    
    $(function() {
        $("#example-two").organicTabs({
            "speed": 200
        });
        $("#accordion").accordion({
            autoHeight: true,
            navigation: true,
            collapsible: true,
            heightStyle: "content" 
        });
        
    });
    
   $("#accordion a").click(function() {
      window.open($(this).attr("href"), '_blank');
      return false;
   });
    
   $("#team-dialog").dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            Close: function() {
                $(this).dialog("close");
            }
        },
        show: {
            effect: "fade",
            duration: 200
        },
        hide: {
            effect: "fade",
            duration: 200
        }
    });
    
    $( "#assemble-team" )
	  .button()
	  .click(function() {
	    $( "#team-dialog" ).dialog( "open" );
	    return false;
	  });
	    

	$("input[name='sort'][value='" + qs['sort'] + "']").prop('checked', true);

	$("input[name='sort']").change(function(){
		var filter = $("input[name='sort']:checked").val();
		updateQueryString("sort", filter);	
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
    //$user = $student->getUser();
    if($student->user_id == null){
        
       
    $color = 'grayColor'; 
    $html = '<h3 class="'.$color.' clearfix">';
    $html = $html . '<div class="descriptionArea">';
    $html = $html . '<a href="#">' . $student->student_id . '</a>';
    $html = $html . '<p>'. getHtmlForStudentTechnologies($student) .'</p>';
    $html = $html . '<a class="linkedInImg" target="_blank" href="' . $student->profile_url . '"></a></div>';
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    $html = $html . '<img height="79" width="65" src="img/unknown-member.gif"/>';
    //$html = $html . '<p>';  
    $html = $html .  'No data available. Student with id '. $student->student_id .' has not signed-in to the application yet.';
    //$html = $html . '</p>';  
    $html = $html . '</div>';
    
    return $html;
    }
    $color = 'orangeColor'; 
    $html = '<h3 class="'.$color.' clearfix">';
    $html = $html . '<div class="descriptionArea">';
    $html = $html . '<img style="margin-top:10px" height="79" width="65" src="'. $student->pic_url .'"/>';
    $html = $html . '<div style="margin-left:100px; margin-top:-95px"><span class="title">' . $student->name .'  <span style="font-size:10px">('. $student->student_id.')</span></span>';    
    $html = $html . '<p>'. $student->description.'</p>';
    $html = $html . '<a class="linkedInImg" target="_blank" href="' . $student->profile_url . '"></a></div></div>';
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    //$html = $html . '<img height="79" width="65" src="'. $user->pic_url .'"/>';
    $html = $html . '<p>';  
    $html = $html .  getHtmlForStudentTechnologies($student) ;
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
        if ($count == count($technologies) ) {
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