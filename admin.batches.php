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


                        <div class="list-wrap noborder">

                            <div id="featured2">

                                <table id="usertable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Display Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$batchTools = new BatchTools();
									$batches = $batchTools->getAllBatches();
									
									foreach ($batches as $batch) 
									
							
									{
									?>
                                           <tr>
                                                <td><?= $batch->id?></td>
                                                <td><?= $batch->year?></td>
                                                <td><?= $batch->course?></td>
                                                <td><?= $batch->display_name?></td>
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
                            <a href="admin.company.php">Manage Companies</a>
                        </li>
                        <li class=" clearfix">
                            <a href="#">Manage Batches</a>
                        </li>
                        <li class=" clearfix">
                            <a href="admin.events.php">Manage Events</a>
                        </li>
                    </ul>



                </div>
            </div>

        </div>

        

<?php include_once 'scripts.inc.php'; ?>
        <script type="text/javascript" src="js/admin.user.js"></script>

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
