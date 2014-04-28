<?php
require_once './global.inc.php';
session_start();
if (!oauth_session_exists()) {
    header('Location: ' . '404.php');
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
                <div id="bannerLeft">

                    <p class="descriptionTab">
                        Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                    </p>
                    <div id="calendar">
                        <div style="display: none" id="event-dialog" title="Event Details">
                            <h2 id="event-dialog-title"></h2>
                            <p id="event-dialog-desc"></p>
                            <p>
                                <span id="event-dialog-date-label"><b>Date:</b> </span>
                                <span id="event-dialog-date"></span>
                            </p>
                            <p>
                                <span id="event-dialog-time-label"><b>Time:</b> </span>
                                <span id="event-dialog-time"></span>
                            </p>
                            <p>
                                <span id="event-dialog-venue-label"><b>Venue:</b> </span>
                                <span id="event-dialog-venue"></span>
                            </p>
                            <p>
                                <span id="event-dialog-url-label"><b>More info: </b></span>
                                <a id="event-dialog-url" href="" target='_blank'></a>
                            </p>
                            <p>
                                <span id="event-dialog-sp-label"><b>Sponsorships</b></span>
                            <ul id="event-dialog-sp"></ul>
                            </p>
                        </div>
                        <div style="display: none" id="sponsorships-dialog" title="Sponsorship Details">
                            <input type="hidden" id="sp-dialog-id"/>
                            <input type="hidden" id="user-level" value="<?php echo User::currentUser()->getOrganization()->access_level; ?>"/>
                            <h2 id="sp-dialog-name"></h2>
                            <p>
                                <b>Amount: </b>Rs.&nbsp;
                                <span id="sp-dialog-amount"></span>
                            </p>
                            <p id="sp-dialog-desc"></p>
                        </div>
                        <div  style="display: none" id="sp-confirm-dialog" title="Confirm">                            
                            <form id="sp-apply-form" method="post" action="sponsorships.take.php">
                                <fieldset>
                                    <input type="hidden" name="sp_id" id="sp-id" />
                                    <p>
                                        <label for="org_id">Company </label>
                                        <select name="org_id" id="org_id" >
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
                                    </p>
                                    <p>
                                        <label for="contact_name">Contact Person</label>
                                        <input type="text" maxlength="50" name="contact_name" id="contact_name">
                                    </p>
                                    <p>
                                        <label for="contact_phone">Phone</label>
                                        <input type="text" maxlength="10" size="12" name="contact_phone" id="contact_phone">
                                    </p>
                                </fieldset>
                            </form>
                            <p id="error-message">Some form fields are empty</p>
                        </div> 
                        <div style="display: none" id="message-dialog">                            
                            <p id="message-dialog-content"></p>
                        </div>
                        <ul>
                            <?php
                            $eventTools = new EventTools();
                            $sponsorshipTools = new SponsorshipTools();
                            $months = $eventTools->getGroupedEvents();
                            $currentDate = new DateTime();

                            foreach ($months as $month) {
                                echo "<li>";
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

                                        echo $event->title . " - <b>" . $date->format('dS') . "</b>";
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
                <div id="rightSide">

                    <ul id="legend">
                        <li class="greenBox clearfix">
                            <span></span>
                            <p>Sponsorship Opportunity Available</p>
                        </li>
                        <li class="cse clearfix">
                            <span></span>
                            <p>All Sponsorship Opportunities Taken</p>
                        </li>
                    </ul>

                    <!-- Following component is excluded from first release -->
                    <!--                    <div class="componentContainer">
                                            <div class="heading">
                                                <p>CodeGen sponsorships</p>
                                            </div>
                    
                                            <div class="ccContainer lastList">
                                                <ul>
                                                    <li>
                                                        <h3>Robotic Challenge – <span>27th Mar</span></h3>
                                                        <p>Silver Sponsorship (50,000)</p>
                                                    </li>
                                                    <li>
                                                        <h3>Go Festival - <span>17th Sep</span></h3>
                                                        <p>T-shirt Sponsorship (150,000)</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>-->

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Sponsorships open to take</p>
                        </div>

                        <div class="ccContainer lastList lastListWithScroll">
                            <ul>
                                <?php
                                $openSponsorships = $sponsorshipTools->getAllOpenSponsorships();

                                foreach ($openSponsorships as $openS) {
                                    $event = Event::get($openS->event_id);
                                    $event_date = new DateTime($event->date);

                                    echo "<li class='clickable-li open-sponsorship-entry'>";
                                    echo "<input id='sponsorship-id' type='hidden' value='" . $openS->id . "'/>";
                                    echo "<h3>";
                                    echo $event->title . "</br><span>" . $event_date->format("dS M") . "</span>";
                                    echo "</h3>";
                                    echo "<p>";
                                    echo $openS->name . " (Rs." . $openS->amount . ")";
                                    echo "</p>";
                                    echo "</li>";
                                }
                                ?>                                
                            </ul>
                        </div>


                    </div>



                </div>
            </div>







        </div>


        <?php include_once 'scripts.inc.php'; ?>
        <script type="text/javascript" src="js/event.js"></script>
        ]

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
