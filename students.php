<?php
require_once './global.inc.php';
verify_oauth_session_exists();

$studentTools = new StudentTools();
$settingsTools = new SettingsTools();

$sort = 'name';
if(isset($_GET['sort'])) $sort = $_GET['sort'];

if(HttpSession::currentUser()->getOrganization()->access_level > 2) {
    $technology = $_GET['technology'];
}



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
                <p class="page-title" style="margin-bottom:20px">The vibrant pool of students who are keen of cross functional activities is our greatest strength. You are able to collaborate with the students in your organizational activities by forming teams according to your preference. </p>
                <div id="bannerLeft">	
                    
                    <div id="example-two">					
                        <ul class="nav">
                            <?php
                                
                                if($batch =="level_4"){
                                    echo '<li class="nav-one"><a class="batch-tab current" data-batch="level_4" href="javascript:void(0)">Level 4 students</a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab" data-batch="level_3" >Level 3 students</a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab" data-batch="level_2">Level 2 students</a></li>';
                                }
                                    
                                else if($batch =="level_3"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="javascript:void(0)">Level 4 students</a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab current" data-batch="level_3" >Level 3 students</a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab" data-batch="level_2">Level 2 students</a></li>';
                                }
                                else if($batch =="level_2"){
                                    echo '<li class="nav-one"><a class="batch-tab" data-batch="level_4" href="javascript:void(0)">Level 4 students</a></li>';
                                    echo '<li class="nav-two"><a href="javascript:void(0)" class="batch-tab" data-batch="level_3" >Level 3 students</a></li>';
                                    echo '<li class="nav-three"><a href="javascript:void(0)" class="batch-tab current" data-batch="level_2">Level 2 students</a></li>';
                                }
                            ?>                                                        
                        </ul>                        
                        <div class="list-wrap">                        	
                            <div id="featured2" style="margin-top: -30px;">                           		
                                <p class="descriptionTab"></p>                                
                                
                                    <?php 
                                        if (count($students) > 0) {
                                            echo '<div id="accordion" class="student-page">'.getHtmlForStudents($students).'</div>';
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

                                <select name="technology" id="technoFilterCombo" size="20">
                                    <option value="0" > -- ANY TECHNOLOGY --</option>
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
<?php require_once './common.inc.php'; ?>
<script>
    
    $(".batch-tab").click(function(){
        updateQueryString("batch", $(this).data('batch'));	
    });
    
    
    $('#technoFilterCombo').change(function() {
        <?php if (HttpSession::currentUser()->getOrganization()->access_level > 2) { ?>
            var tech = $('#technoFilterCombo').find(":selected").val();
            updateQueryString("technology", tech);	
        <?php } else { ?>
            premiumFeature();
        <?php } ?>
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
        var href = $(this).attr("href");
        if(href && href !== '') {
            window.open(href, '_blank');
        } else {
            premiumFeature();
        }
        
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
    $html = $html . '<a href="javascript:void(0)">' . $student->student_id . '</a>';
    $html = $html . '<p>'. getHtmlForStudentTechnologies($student) .'</p>';
    $html = $html . getLinkedInProfile($student).'</div>';
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
    $html = $html . getLinkedInProfile($student).'</div></div>';
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    //$html = $html . '<img height="79" width="65" src="'. $user->pic_url .'"/>';
    $html = $html . '<p>';  
    $html = $html .  getHtmlForStudentTechnologies($student) ;
    $html = $html . '</p>';  
    $html = $html . '</div>';
    
    return $html;
}

function getLinkedInProfile($student){
    if(HttpSession::currentUser()->getOrganization()->access_level > 1) {
        return '<a class="linkedInImg" href="' . $student->profile_url . '"></a>';
    } else {
        return '<a class="linkedInImg" href="" ></a>';
    }
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