<?php
require_once './global.inc.php';
verify_oauth_session_exists();

$currentYear = date("Y");
if(isset($_GET['year'])) {
    $yearParam = $_GET['year'];
    if (!is_numeric($yearParam) || ($yearParam < ($currentYear - 5))  || ($yearParam > ($currentYear + 5))) {
        header('Location: ./events.php');
    }
}

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
                    Our calendar is kept busy with diverse events for creating all rounded graduates who work hand-in-hand with the industry. This page lets you to plan your sponsorships to maximise the return on your investment.
                </p>

                <div id="calendar">
                    <div id="year-selector-div">
                        <label for="year-selector">Select Year</label>
                        <select id="year-selector" name="year-selector">
                            <?php
                            for ($year = $currentYear - 5; $year <= ($currentYear + 5); $year++) {
                                if (isset($_GET['year']) && ($_GET['year'] == $year)) {
                                    echo '<option value="' . $year . '" selected>' . $year . '</option>';
                                } else if (!isset($_GET['year']) && ($currentYear == $year)) {
                                    echo '<option value="' . $year . '" selected>' . $year . '</option>';
                                } else {
                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                        <div style="display: none" id="event-dialog" title="">
                            <p id="event-dialog-desc"></p>
                            <div id="date-details" class="clearfix">
                            	<p class="clearfix">
                                    <span id="event-dialog-date-label"></span>
                                    <span id="event-dialog-date"></span>
                                </p>
                                <p class="clearfix">
                                    <span id="event-dialog-time-label"></span>
                                    <span id="event-dialog-time"></span>
                                </p>
                            </div>
                            <p id="venue-details" class="clearfix">
                                <span id="event-dialog-venue-label"></span>
                                <span id="event-dialog-venue"></span>
                            </p>
                            <p id="more-info">
                                <span id="event-dialog-url-label"><b>Related Links: </b></span>
                                <a id="event-dialog-url" href="" target='_blank'></a>
                            </p>
                            <div id="sponsor-ship">
                                <span id="event-dialog-sp-label"><b>Sponsorships</b></span>
                            	<ul id="event-dialog-sp"></ul>
                            </div>
                        </div>
                        <div style="display: none" id="sponsorships-dialog" title="">
                            <input type="hidden" id="sp-dialog-id"/>
                            <input type="hidden" id="user-level" value="<?php echo HttpSession::currentUser()->getOrganization()->access_level; ?>"/>
                           
                            <p id="amount-details">
                                <b>Amount: </b>Rs.<span id="sp-dialog-amount"></span>
                            </p>
                            <p id="sp-dialog-desc"></p><br/>
							<div style="font-size: 14px;">Please contact the head of the department for confirmations: <div style="padding-left:4em">Tel: 0112640381 <br/>Email: chathura@cse.mrt.ac.lk</div></div>
                        </div>
                        <div  style="display: none" id="sp-confirm-dialog" title="Confirm">                            
                            <form id="sp-apply-form" method="post" action="sponsorships.take.php">
                                <fieldset>
                                    <input type="hidden" name="sp_id" id="sp-id" />
                                    <p id="company-name">
                                        <label for="org_id">Company </label>
                                        <select name="org_id" id="org_id" >
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
                                    </p>
                                    <p class="contact-person">
                                        <label for="contact_name">Contact Person</label>
                                        <input type="text" maxlength="50" name="contact_name" id="contact_name">
                                    </p>
                                    <p class="contact-person">
                                        <label for="contact_phone">Phone</label>
                                        <input type="text" maxlength="10" size="12" name="contact_phone" id="contact_phone">
                                    </p>
                                </fieldset>
                            </form>
                            <p id="error-message">Some form fields are empty</p>
                        </div> 
                        <div style="display: none" id="message-dialog">     
                            <input type="hidden" id="reload-at-ok" value="" />
                            <p id="message-dialog-content"></p>
                        </div>
                        <div style="display: none" id="wait-dialog">                            
                            <img src="img/ajax-loader.gif" alt="wait..."/>
                        </div>
                        <ul>
                            <?php
                            $eventTools = new EventTools();
                            $sponsorshipTools = new SponsorshipTools();
                            if (isset($_GET['year'])) {
                                $months = $eventTools->getGroupedEventsOfYear($_GET['year']);
                            } else {
                                $months = $eventTools->getGroupedEvents();
                            }
                            $currentDate = new DateTime();

                            foreach ($months as $month) {
                                echo "<li class='month-item'>";
								echo "<div class='curl'></div>";
                                echo "<h4>" . key($month) . "</h4>";

                                $events = $month[key($month)];
                                if (count($events) > 0) {
                                    foreach ($events as $event) {

                                        $date = new DateTime($event->date);
                                        $avail_sponsorships = $sponsorshipTools->getSponsorshipsByEvent($event->id, TRUE);

                                        echo "<div class='calendar-entry'>";
                                        echo "<input id='event-id' type='hidden' value='" . $event->id . "'/>";

                                        if ($currentDate > $date) {
                                            echo "<p class='clickable'>";
                                        } else {
                                            if (count($avail_sponsorships) == 0) {
                                                echo "<p class='orangeText clickable'>";
                                            } else {
                                                echo "<p class='greenText clickable'>";
                                            }
                                        }

                                        $dateStr = "";
                                        if ($event->date_confirmed) {
                                            $dateStr = "(" . $date->format('dS') . ")";
                                        }
                                        echo $event->title . "<b> " . $dateStr . "</b>";
                                        echo '</p></div>';
                                    }
                                } else {
                                    echo "<p><b>No Scheduled Events</b></p>";
                                }
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
            </div>

        </div>
        <?php require_once './footer.php'; ?>

        <?php include_once 'scripts.inc.php'; ?>
        <?php require_once './common.inc.php'; ?>
        <script type="text/javascript" src="js/event.js"></script>
        
    </body>
</html>
