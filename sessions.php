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

;

$filter = $_GET['filter'];
$sort = $_GET['sort'];
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


                        <div class="list-wrap noborder">

                            <div id="featured2">

                                <p class="descriptionTab">
                                    Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                </p>


                                <div id="sessionsList"> 

                                    <?php
                                    $sessions = Session::fetchAll($filter, $sort);

                                    foreach ($sessions as $session) {
                                        ?>

                                        <h3 class="greenColor clearfix">
                                            <div class="descriptionArea">
                                                <a href="#"><?php echo $session->get("title"); ?></a>
                                                <p><?php echo $session->get("description"); ?></p>
                                            </div>
                                            <div class="darkGray">
                                                <?php
                                                // edit available only for user's sessions OR by the admin
                                                if (haveAccess($session)) {
                                                    echo '<a href="#" class="session_edit" data-id="' . $session->get("id") . '">edit</a>';
                                                }
                                                ?>
                                                <ul>
                                                    <?php
                                                    if (!is_null($session->get("date"))) {
                                                        echo '<li class="endGPA">' . date("j F Y", strtotime($session->get("date"))) . '</li>';
                                                    } else {
                                                        echo '<li class="endGPA">Date not agreed</li>';
                                                    }
                                                    ?>                               		
                                                    <li class="endGPA">
                                                        <?php
                                                        $batches = $session->getBatches();
                                                        foreach ($batches as $batch) {
                                                            echo $batch["display_name"] . ",";
                                                        }
                                                        ?>
                                                    </li>

                                                    <?php
                                                    if (!is_null($session->get("org_id"))) {
                                                        $company = Company::get($session->get("org_id"));
                                                        echo '<li class="linkedLink" >' . $company->name . '</li>';
                                                    } else if (User::currentUser()->getOrganization()->access_level >= 3) {
                                                        echo'<li data-id="' . $session->id . '" class="linkedLink takeSession"><a href="">Take this Session</a></li>';
                                                    }
                                                    ?>

                                                </ul>
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

                    <ul id="legend">
                        <li class="greenBox clearfix">
                            <span></span>
                            <p>Finalized future sessions</p>
                        </li>
                        <li class="ice clearfix">
                            <span></span>
                            <p>Proposed, but not finalized</p>
                        </li>
                        <li class="redBox clearfix">
                            <span></span>
                            <p>Needs a facilitating company</p>
                        </li>                        
                        <li class="grayBox clearfix">
                            <span></span>
                            <p>Sessions happened in Past</p>
                        </li>
                    </ul>




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
                                <li><label><input type="radio" name="sortby" value="created"> Recently created</label></input></li>
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
            <p class="validateTips">Propose a session you would like to carryout to CSE syudents. We will get back to you regarding the possible dates for that.</p>

            <form id="create_form" method="post" action="sessions.create.php">
                <fieldset>
                    <input type="hidden" name="id" />
                    <input type="hidden" name="queryString"/>
                    <label for="title">Title</label>
                    <input type="text" name="title" size="60" minlength="10" maxlength="50" required><br/>

                    <label for="description">Description</label>
                    <textarea form="create_form" name="description" minlength="100" maxlength="256" rows="4" cols="70" required></textarea><br/>

                    <label for="date">Date</label>
                    <input type="text" id="datepicker" name="date"><br/>
                    <label for="start_time">Start Time</label>
                    <select name="start_time">
                        <option value="7:00 am">7:00 am</option>
                        <option value="7:30 am">7:30 am</option>
                        <option value="8:00 am">8:00 am</option>
                        <option value="8:30 am">8:30 am</option>
                    </select>
                    <label for="duration">Duration</label><input type="text"  size="6" name="duration"> mins<br/>

                    <label for="resp_name">Responsible Person</label> Name: <input type="text" maxlength="50" name="resp_name">
                    Phone: <input type="text" maxlength="10" size="12" name="resp_contact"><br/>

                    <label for="batch">Target Batches: </label>
                    <?php
                    $batchTools = new BatchTools();
                    $batches = $batchTools->getAllBatches();
                    foreach ($batches as $batch) {
                        echo '<input type="checkbox" name="batch[]" value="' . $batch->id . '">' . $batch->display_name . '</input>';
                    }
                    ?><br/>
                    <label for="company">Assigned To: </label>
                    <select name="org_id" >
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
                </fieldset>
            </form>
        </div> 

        <div id="dialog-confirmation" title="Confirm Facilitation of this Session">
            <form id="confirmation_form" method="post" action="sessions.facilitate.php">
                <fieldset>
                    <p>Thank you for volunteering to facilitate this session! <br/><br/> After confirmation, you will be able to edit 
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
