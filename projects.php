<?php
require_once './global.inc.php';
verify_oauth_session_exists();
$projectID = new Project();



function haveEditAccess($project) {
    if (HttpSession::currentUser()->getOrganization()->access_level > 4 || $project->get("org_id") === HttpSession::currentUser()->company_id) {
        return true;
    }
    return false;
}

function haveViewAccess($project) {
    if (HttpSession::currentUser()->getOrganization()->access_level == 2 || HttpSession::currentUser()->getOrganization()->access_level > 4 || HttpSession::currentUser()->company_id === $project->get("org_id")) {
        return true;
    }
    return false;
}

$filter = (isset($_GET['filter'])) ? $_GET['filter'] : "levelall";

$sort = (isset($_GET['sort']))? $_GET['sort']: "updated";

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php require_once './head.inc.php'; ?>
	<head> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>



<script type="text/javascript"> $(document).ready(function(){ $("#confirmation_form").validate(); }); </script>
</head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php require_once './nav.inc.php'; ?>

        <div class="container clearfix">

            <div id="bannerArea" class="clearfix">

                <p class="page-title">
                    You are welcome to collaborate with the university by partnering student research projects. 
                    You may propose your research work through this portal where interested students would pick such as their academic 
                    research projects. <br/><br/>NOTE: Details of your research can be viewed only by your organization and the students.
                </p>
                <div id="bannerLeft">

                    <div id="example-two">


                        <div class="list-wrap noborder">

                            <div id="featured2">



                                <div id="sessionsList"> 

                                    <?php
                                    $projects = Project::fetchAll($filter, $sort);          
                                    
                                    $dataAvailable = false;

                                    foreach ($projects as $project) {
                                        
                                        
                                            $dataAvailable = true;
                                            
                                            $color = 'greenColor';
                                            if ($project->get("org_id") === HttpSession::currentUser()->company_id) {
                                                $color = 'orangeColor';
                                            } else {
                                                $color = 'grayColor';
                                            } 


                                            ?>

                                            <h3 class="<?php echo $color ?> clearfix">
                                                <div class="descriptionArea sessionDescription">

                                                    <a href="javascript:void(0)" ><?php echo $project->get("title"); ?></a>
                                                    <p >
                                                    <?php 
                                                    if (haveViewAccess($project)) {
                                                        echo '<pre style="font-weight: normal; font-size: 15px;">'.$project->get("description").'</pre>'; 
                                                    } else {
                                                        echo '<span style="margin-left:20px;">- Research details are only accessible to CSE students - </span>';
                                                    }
                                                    ?>
                                                    </p>

                                                    <div class="sessionDetails">
                                                        <?php if (haveViewAccess($project)) { ?>
                                                        <div class="userIcon">
                                                            <div class="endGPA"><?php echo $project->get("resp_name").' ('.$project->get("resp_contact").')' ?></div>

                                                        </div>  
                                                        <?php } ?>
                                                        <div class="companyIcon">
                                                            <?php
                                                            if (!is_null($project->get("org_id"))) {
                                                                $company = Company::get($project->get("org_id"));
                                                                $style = "";
                                                                if($project->get("org_id") === HttpSession::currentUser()->company_id) {
                                                                    $style = 'style="color:#ed7d31 !important"';
                                                                }
                                                                echo '<div class="linkedLink company-name" '.$style.' >' . $company->name . '</div>';
                                                            }

                                                             else {
                                                                echo'<div data-orgId="'.HttpSession::currentUser()->company_id.'" data-access="'.HttpSession::currentUser()->getOrganization()->access_level.'" data-id="' . $project->id . '" class="linkedLink takeSession"><a href="">Express Interest to pick the Research Work</a></div>';
                                                            }		
																													
                                                            ?>
                                                        </div>

                                                        <div class="endGPA">
                                                            <?php
                                                            $batches = $project->getBatches();
                                                            if(count($batches) > 0) {
                                                                echo "(";
                                                                for ($i = 0; $i < count($batches); $i++) {
                                                                    echo $batches[$i]["display_name"] ;
                                                                    if($i !== count($batches) - 1) {
                                                                        echo ", ";
                                                                    }
                                                                }
                                                                echo ")";
                                                            }
                                                            ?>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="darkGray">
                                                    <?php
                                                    // edit available only for user's projects OR by the admin
                                                    if (haveEditAccess($project)) {
                                                        echo '<a href="javascript:void(0)" class="session_edit project_edit" data-id="' . $project->get("id") . '"></a>';
                                                    }
                                                    ?>
                                                </div>
                                            </h3>  

                                            <?php
                                        
                                    }

                                    if(!$dataAvailable) {
                                        echo '-- no data available --';
                                    }
                                    ?>                                  


                                </div>   

                            </div>





                        </div> <!-- END List Wrap -->

                    </div>

                </div>
                <div id="rightSide">
                    <div id="addProject">
                        <a data-access="<?php echo HttpSession::currentUser()->getOrganization()->access_level ?>" href="javascript:void(0)" id="propose-project" >
                            Propose a New Research
                        </a>
                    </div>

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Filter Projects by Level</p>
                        </div>

                        <div class="ccContainer">
                            <ul>
                                <li><label><input type="radio" name="filterby" value="levelall" checked="true"> All Levels</label></li>
                                <li><label><input type="radio" name="filterby" value="level1"> Level 1</label></li>
                                <li><label><input type="radio" name="filterby" value="level2"> Level 2</label></li>
                                <li><label><input type="radio" name="filterby" value="level3"> Level 3</label></li>
                                <li><label><input type="radio" name="filterby" value="level4"> Level 4</label></li>
                                <li><label><input type="radio" name="filterby" value="obsolete"> Marked as Obsolete</label></li>
                            </ul>
                        </div>


                    </div>

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Sort Projects by</p>
                        </div>

                        <div class="ccContainer">
                            <ul>
                                <li><label><input type="radio" name="sortby" value="updated" checked="true"> Modified Date</label></input></li>
                                <li><label><input type="radio" name="sortby" value="org"> Proposed Organization</label></input></li>
                                <li><label><input type="radio" name="sortby" value="title"> Project Title</label></input></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div id="dialog-form" title="project Details">
            <p style="padding-top: 10px;" class="validateTips">Propose a project you would like to carryout to CSE students. We will get back to you regarding the possible dates for that.</p>

            <form id="create_form" method="post" action="projects.create.php">
                <fieldset>
                    <input type="hidden" name="id" />
                    <input type="hidden" name="queryString"/>
					<input type="hidden" name="idUser" value="<?= HttpSession::currentUser()->id?>" />
					 
					
                    <table>
                        <tr>
                            <td><label for="title" class="input-label">Research Title</label></td>
                            <td><input type="text" id="title" placeholder="title is publicly visible" name="title" size="60" minlength="10" maxlength="80" required><br/></td>
                        </tr>
                        <tr>
                            <td><label for="description">Description</label></td>
                            <td><textarea form="create_form" id="description" placeholder="description is only visble to CSE students " name="description" minlength="50" maxlength="2000" rows="15" cols="80" required></textarea><br/></td>
                        </tr>                       
                        
                        <tr>
                            <td><label for="resp_name">Responsible Person</label></td>
                        </tr>
                        <tr>
                            <td><label for="resp_name">&nbsp;&nbsp;&nbsp;&nbsp;Name</label></td>
                            <td><input type="text" maxlength="50" name="resp_name" id="resp_name" minlength="3" maxlength="20"  required></td>
                        </tr>
                        <tr>
                            <td><label for="resp_contact">&nbsp;&nbsp;&nbsp;&nbsp;Phone</label></td>
                            <td><input type="text" minlength="10" maxlength="10" size="10" id="resp_contact" name="resp_contact" required><br/></td>
                        </tr>
                        <tr>
                            <td><label for="batch">Proposed for: </label></td>
                            <td>
                                <?php 
                                $settingsTools = new SettingsTools();
                                ?>
                                <input type="checkbox" name="batch[]" value="<?php echo $settingsTools->getLevelFourId() ?>"> Level 4</input>&nbsp;&nbsp;
                                <input type="checkbox" name="batch[]" value="<?php echo $settingsTools->getLevelThreeId() ?>"> Level 3</input>&nbsp;&nbsp;
                                <input type="checkbox" name="batch[]" value="<?php echo $settingsTools->getLevelTwoId() ?>"> Level 2</input>&nbsp;&nbsp;
                                <input type="checkbox" name="batch[]" value="<?php echo $settingsTools->getLevelOneId() ?>"> Level 1</input>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td><label for="company">Assigned To: </label></td>
                            <td>
                                <select name="org_id" id="company" >
								<option value="-1"> - Unassign - </option>
                                    <?php
                                    $companyTools = new CompanyTools();
                                    $companies = $companyTools->getAllCompanies();
                                    foreach ($companies as $company) {
                                        if (HttpSession::currentUser()->getOrganization()->access_level > 4 || HttpSession::currentUser()->company_id === $company->id) {
                                            echo '<option value="' . $company->id . '">' . $company->name . '</option>';
                                        }
                                    }
                                    ?>				
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td><label for="status">Status: </label></td>
                            <td>
                                <select name="status" id="status" >
                                    <option value="Active">Active</option>
                                    <option value="Obsolete">Obsolete</option> 			
                                </select> 
                            </td>
                        </tr>
                    </table>

                </fieldset>
            </form>
        </div> 
		
		<!-- new code for display form when clicking the link -->
		<div id="dialog-confirmation" title="Express Interest to pick the Research Projects">
            <p style="padding-top: 10px;" class="validateTips">Choose a research work that you would like to carryout as your academic research project. </p>

            <form id="confirmation_form" method="post" action="projects.facilitate.php">
                <fieldset>
                    <p class="validateTips">Thank you for collaborating with the research work <br/><br/> You can get to know the other students who were interested to 
					take this as their academic research projects.</p>
                    
                    <input type="hidden" name="id" />
					<input type="hidden" name="queryString"/>
                    <input type="hidden" name="linkedinId" value="<?= HttpSession::currentUser()->linkedin_id?>" />
                    <input type="hidden" name="projectId" />
					<input type="hidden" name="idUser" value="<?= HttpSession::currentUser()->id?>" />
					
                    <table id="facilitators">
                 					
                    <table id="resp_person">
                        
                        <tr>
                            <td><label for="resp_name">Student Details</label></td>
                        </tr>
                        <tr>
                            <td><label for="title">&nbsp;&nbsp;&nbsp;&nbsp;Phone</label></td>
                            <td><input type="text" maxlength="50" name="stu_phone" id="stu_phone" class="required"/></td>
                        </tr>
                        <tr>
                            <td><label for="title">&nbsp;&nbsp;&nbsp;&nbsp;Comment</label></td>
                            <td><textarea style="width: 400px; height: 200px" maxlength="10" size="12" id="stu_comment" name="stu_comment" class="required"/></textarea><br/></td>
                        </tr>
                        
                    </table>

                </fieldset>
            </form>
            </div>
        <?php require_once './footer.php'; ?>

        <?php include_once 'scripts.inc.php'; ?>
        <?php require_once './common.inc.php'; ?>
        <script type="text/javascript" src="js/project.js"></script>

    </body>
</html>
