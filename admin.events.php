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

                    <div id="example-two">

                        <button id="add-event"><span style="display: inline-block;" class='ui-icon ui-icon-circle-plus'></span> Add Event</button>
                        <div class="list-wrap noborder">

                            <div id="featured2">

                                <table id="usertable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <!--<th>Description</th>-->
                                            <th>Date</th>
                                            <th title="Date Confirmed"><span class='ui-icon ui-icon-circle-check'></span></th>
                                            <th>Time</th>
                                            <th>Venue</th>
                                            <!--<th>Url</th>-->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $eventTools = new EventTools();
                                        $events = $eventTools->getAllEvents();
                                        foreach ($events as $event) {
                                            ?>
                                            <tr>
                                                <td><?= $event->id ?></td>
                                                <td><?= $event->title ?></td>
                                                <!--<td><?= "" /* $event->description */ ?></td>-->
                                                <td><?= $event->date ?></td>
                                                <td><?= ($event->date_confirmed ? "<span class='ui-icon ui-icon-circle-check'></span>" : "") ?></td>
                                                <td><?= $event->time ?></td>
                                                <td><?= $event->venue ?></td>
                                                <!--<td><?= ""/* $event->url */ ?></td>-->
                                                <td>
                                                    <button id="edit-event" ev_id="<?= $event->id ?>"><span class='ui-icon ui-icon-pencil'></span></button>
                                                    <button id="del-event" ev_id="<?= $event->id ?>"><span class='ui-icon ui-icon-trash'></span></button>                                                    
                                                </td>
                                            </tr>									
                                            <?php
                                        }
                                        ?>								    	

                                    </tbody>
                                </table>

                            </div>

                        </div> <!-- END List Wrap -->                        
                    </div>

                </div>
                <div id="rightSide">

                    <ul id="legend">
                        <li class=" clearfix">
                            <a href="admin.users.php">Manage Users</a>
                        </li>
                        <li class=" clearfix">
                            <a href="#">Manage Companies</a>
                        </li>
                        <li class=" clearfix">
                            <a href="#">Manage Batches</a>
                        </li>
                        <li class=" clearfix">
                            <a href="#">Manage Events</a>
                        </li>
                    </ul>
                </div>
                <div id="delete-dialog" title="Confirm Delete">
                    <input type="hidden" id="event_id" />
                    <p id="delete-dialog-text">Do you really want to remove this event?</p>
                </div>
                <div id="result-dialog" title="Status">
                    <p id="op-result"></p>
                </div>
                <div style="display: none" id="event-dialog" title="">
                    <form id="event-edit-form">
                        <input type="hidden" id="event-id" name="id"/>
                        <p id="event-dialog-desc">
                            <label for="event-dialog-title" id="event-dialog-title-label"><b>Event Title </b></label>
                            <input id="event-dialog-title" size="60" type="text" name="title"/>
                        </p>
                        <p id="event-dialog-desc">
                            <label for="event-dialog-desc" id="event-dialog-desc-label"><b>Description </b></label>
                            <textarea id="event-dialog-description" cols="80" name="description"></textarea>
                        </p>
                        <p class="clearfix">
                            <label for="event-dialog-date" id="event-dialog-date-label"></label>
                            <input id="event-dialog-date" type="text" name="date"/>
                            <label for="event-dialog-date-conf" id="event-dialog-date-conf-label">Confirmed</label>
                            <input id="event-dialog-date-conf" type="checkbox" name="date_confirmed"/>
                        </p>
                        <p class="clearfix">
                            <label for="event-dialog-time" id="event-dialog-time-label"></label>
                            <input id="event-dialog-time" type="text" name="time"/>
                        </p>
                        <p id="venue-details" class="clearfix">
                            <label for="event-dialog-venue" id="event-dialog-venue-label"></label>
                            <input id="event-dialog-venue" size="40" type="text" name="venue"/>
                        </p>
                        <p id="more-info">
                            <label for="event-dialog-url" id="event-dialog-url-label"><b>More info </b></label>
                            <input id="event-dialog-url" size="80" type="url" name="url"/>
                        </p>
                        <p id="error-message">Event title and date cannot be empty</p>
                    </form>
                </div>
            </div>

        </div>

        <!--        <div id="dialog-form" title="Change Company">
        
                    <form id="create_form" method="post" action="user.create.php">
                        <fieldset>
                            <input id="userId" name="userId" type="hidden" />
                            <select name="companyId" id="companylist" size="10" style="width:100%" >
                                //<?php
//                        $companyTools = new CompanyTools();
//                        $companies = $companyTools->getAllCompanies();
//                        foreach ($companies as $company) {
//                            echo '<option value="' . $company->id . '">' . $company->name . '</option>';
//                        }
//                        
        ?>
                            </select> 
        
                        </fieldset>
                    </form>
                </div>        -->

        <?php include_once 'scripts.inc.php'; ?>
        <script type="text/javascript" src="js/admin.event.js"></script>

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
