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

                    <p>Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek</p>
                       <!-- comment -->
                    <div id="calendar">
                        <div style="display: none" id="event-dialog"></div>
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

                    <div class="componentContainer">
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


                    </div>

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Sponsorships open to take</p>
                        </div>

                        <div class="ccContainer lastList lastListWithScroll">
                            <ul>
                                <li>
                                    <h3>Code Challenge – <span>27th Mar</span></h3>
                                    <p>Silver Sponsorship (50,000)</p>
                                </li>
                                <li>
                                    <h3>Drama Festival - <span>17th Sep</span></h3>
                                    <p>Silver Sponsorship (50,000)</p>
                                </li>
                                <li>
                                    <h3>Field Challenge – <span>27th Mar</span></h3>
                                    <p>Silver Sponsorship (50,000)</p>
                                </li>
                                <li>
                                    <h3>GSoC Meet-up - <span>17th Sep</span></h3>
                                    <p>Silver Sponsorship (50,000)</p>
                                </li>
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
