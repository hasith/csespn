<?php
require_once './global.inc.php';
session_start();
if (!oauth_session_exists()) {
    header('Location: ' . '404.php');
}

function haveAccess($session) {
    if (User::currentUser()->getOrganization()->access_level > 4 || $session->get("org_id") === User::currentUser()->company_id) {
        return true;
    }
    return false;
}

$filter = (isset($_GET['filter'])) ? $_GET['filter'] : "future";
$sort = (isset($_GET['sort']))? $_GET['sort']: "updated";

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

                <p class="page-title">
                   Below we are listing the needs for external uni-sessions (technical and soft-skill). We would like to invite you to facilitate sessions of of your interest, which in turn will be an opening to enhance the collaboration with the students. In addition, you may also propose new sessions which you think would be useful to students.
                </p>
                <div id="bannerLeft">

                    <div id="example-two">


                        <div class="list-wrap noborder">

                            <div id="featured2">



                                <div id="sessionsList"> 

                                    <?php
                                    $sessions = Session::fetchAll($filter, $sort);          
                                    
                                    if(count($sessions) < 1) {
                                        echo '-- no data available --';
                                    }

                                    foreach ($sessions as $session) {
                                        $session_date = strtotime($session->get("date"));
                                        $color = 'greenColor';
                                        if ($session->get("org_id") === User::currentUser()->company_id) {
                                            $color = 'orangeColor';
                                        } else if(!is_null($session->get("date")) && $session_date < time()) {
                                            $color = 'grayColor';
                                        } 
                                        
                                        
                                        ?>

                                        <h3 class="<?php echo $color ?> clearfix">
                                            <div class="descriptionArea sessionDescription">
                                                <?php 
                                                    $pic_url = './css/images/session.png'; 
                                                    if($session->get("pic_url")){
                                                        $pic_url = $session->get("pic_url");
                                                    }
                                                ?>
                                                <img style="margin-top:10px" height="100" width="100" src="<?php echo $pic_url; ?>"/>
                                                <a href="#" style="margin-top: -95px; margin-left: 140px;"><?php echo $session->get("title"); ?></a>
                                                <p style="margin-left: 140px;"><?php echo $session->get("description"); ?></p>
                                                
                                                <div class="sessionDetails">
                                                	<div class="dateIcon">
                                                    	<?php
                                                            $datestyle = "";
                                                            if(!is_null($session->get("date")) && $session_date < time()) {
                                                                $datestyle = 'style="color:#7f7f7f   !important"';
                                                            } else {
                                                                $datestyle = 'style="color:#70ad47  !important"';
                                                            }
                                        
                                                            if (!is_null($session->get("date"))) {
                                                                echo '<div class="endGPA" '.$datestyle.'>' . date("j F Y", strtotime($session->get("date"))) . '</div>';
                                                            } else {
                                                                echo '<div class="endGPA">Date not agreed</div>';
                                                            } 
														?> 
                                                    </div>  
                                                    <div class="companyIcon">
                                                    	<?php
														if (!is_null($session->get("org_id"))) {
															$company = Company::get($session->get("org_id"));
                                                            $style = "";
                                                            if($session->get("org_id") === User::currentUser()->company_id) {
                                                                $style = 'style="color:#ed7d31 !important"';
                                                            }
															echo '<div class="linkedLink company-name" '.$style.' >' . $company->name . '</div>';
														} else if (User::currentUser()->getOrganization()->access_level >= 3) {
                                                            if(!is_null($session->get("date")) && $session_date < time()) {
                                                                echo'<div data-id="' . $session->id . '" class="linkedLink" style="font-size:12px !important">(No Facilitator)</div>';
                                                            } else {
                                                                echo'<div data-id="' . $session->id . '" class="linkedLink takeSession"><a href="">Take this Session</a></div>';
                                                            }
															
														}
														?>
                                                    </div>
                                                                                		
                                                    <div class="endGPA">
                                                        <?php
                                                        $batches = $session->getBatches();
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
                                                // edit available only for user's sessions OR by the admin
                                                if (haveAccess($session)) {
                                                    echo '<a href="#" class="session_edit" data-id="' . $session->get("id") . '"></a>';
                                                }
                                                ?>
                                            </div>
                                        </h3>  

                                        <?php
                                    }
                                    ?>                                  


                                </div>   

                            </div>





                        </div> <!-- END List Wrap -->

                    </div>

                </div>
                <div id="rightSide">
                    <?php if (User::currentUser()->getOrganization()->access_level >= 3) { ?>
                        <div id="addProject">
                            <a href="" id="propose-session" >
                                Propose a New Session
                            </a>
                        </div>
                    <?php } ?>

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Filter Sessions</p>
                        </div>

                        <div class="ccContainer">
                            <ul>
                                <li><label><input type="radio" name="filterby" value="future" checked="true"> Sessions planned for future</label></li>
                                <li><label><input type="radio" name="filterby" value="past"> Sessions happned in past</label></li>
                                <li><label><input type="radio" name="filterby" value="my"> Sessions by my company</label></li>
                                <li><label><input type="radio" name="filterby" value="open"> Sessions open to take</label></li>
                            </ul>
                        </div>


                    </div>

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Sort Sessions By</p>
                        </div>

                        <div class="ccContainer">
                            <ul>
                                <li><label><input type="radio" name="sortby" value="updated" checked="true"> Recently modified</label></input></li>
                                <li><label><input type="radio" name="sortby" value="date"> Session date</label></input></li>
                                <li><label><input type="radio" name="sortby" value="title"> Session title</label></input></li>
                                <li><label><input type="radio" name="sortby" value="duration"> Session longest duration</label></input></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div id="dialog-form" title="Session Details">
            <p style="padding-top: 10px;" class="validateTips">Propose a session you would like to carryout to CSE students. We will get back to you regarding the possible dates for that.</p>

            <form id="create_form" method="post" action="sessions.create.php">
                <fieldset>
                    <input type="hidden" name="id" />
                    <input type="hidden" name="queryString"/>
                    <table>
                        <tr>
                            <td><label for="title" class="input-label">Title</label></td>
                            <td><input type="text" id="title" name="title" size="60" minlength="10" maxlength="50" required><br/></td>
                        </tr>
                        <tr>
                            <td><label for="description">Description</label></td>
                            <td><textarea form="create_form" id="description" name="description" minlength="50" maxlength="256" rows="4" cols="70" required></textarea><br/></td>
                        </tr>
                        <tr>
                            <td><label for="pic_url">Image Url</label></td>
                            <td><input type="text" form="create_form" id="pic_url" name="pic_url" size="60"></textarea><br/></td>
                        </tr>                        
                        <tr>
                            <td><label for="datepicker">Date</label></td>
                            <td><input type="text" id="datepicker" name="date"><br/></td>
                        </tr>
                        <tr>
                            <td><label for="start_time">Start Time</label></td>
                            
                            <td><input id="session-time" type="text" name="start_time"> </td>
                            
                            
                        </tr>
                        <tr>
                            <td><label for="duration">Duration</label></td>
                            <td><input type="text"  size="6" id="duration" name="duration"> mins<br/></td>
                        </tr>
                        <tr>
                            <td><label for="resp_name">Responsible Person</label></td>
                        </tr>
                        <tr>
                            <td><label for="resp_name">&nbsp;&nbsp;&nbsp;&nbsp;Name</label></td>
                            <td><input type="text" maxlength="50" name="resp_name" id="resp_name"></td>
                        </tr>
                        <tr>
                            <td><label for="resp_contact">&nbsp;&nbsp;&nbsp;&nbsp;Phone</label></td>
                            <td><input type="text" maxlength="10" size="12" id="resp_contact" name="resp_contact"><br/></td>
                        </tr>
                        <tr>
                            <td><label for="batch">Target Batches: </label></td>
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
                                        if (User::currentUser()->getOrganization()->access_level > 4 || User::currentUser()->company_id === $company->id) {
                                            echo '<option value="' . $company->id . '">' . $company->name . '</option>';
                                        }
                                    }
                                    ?>				
                                </select> 
                            </td>
                        </tr>
                    </table>

                </fieldset>
            </form>
        </div> 

        <div id="dialog-confirmation" title="Confirm Facilitation of this Session">
            <form id="confirmation_form" method="post" action="sessions.facilitate.php">
                <fieldset>
                    <p class="validateTips">Thank you for volunteering to facilitate this session! <br/><br/> After confirmation, you will be able to edit 
                        session details where you may fill in contact person details, etc. 
                        We will get in touch with you soon.</p>
                    <input type="hidden" name="orgId" value="<?= User::currentUser()->company_id ?>" />
                    <input type="hidden" name="sessionId" />
                    <input type="hidden" name="queryString"/>
                </fieldset>
            </form>
        </div>      


        <?php include_once 'scripts.inc.php'; ?>
        <script type="text/javascript" src="js/session.js"></script>

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
