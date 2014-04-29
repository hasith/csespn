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

            <div id="bannerArea" class="clearfix signInArea">
            	<p style="font-size: 30px">Welcome to the CSE Partner Portal</p>
            	<div style="padding-bottom: 30px">You have signed-in as  
            		<?php 
            			$org = User::currentUser()->getOrganization();
            			if($org->access_level == 1) {
            				echo "a Public User";
            			} else if($org->access_level == 2) {
            				echo "a Student";
            			} else if ($org->access_level == 3) {
            				echo "a <i>'Corporate Account'</i> under <i>'".$org->name."'</i>";
            			} else if ($org->access_level == 4) {
            				echo "a <i>'Premium Corporate Account'</i> under <i>'".$org->name."'</i>";
            			} else if ($org->access_level == 5) {
            				echo "an Admin User";
            			}
            		?>
            		
            	</div>
            	<img src="./img/cse_logo_shirt.png" width="600px"/>
                <div style="position: relative; top: -350px; left: 650px; width: 40%">
					Public users and students may view university-sessions, research-projects and department-events through this portal. 
					In order to contribute with content (suggest sessions, suggest projects, assemble teams, sponsor events, etc.), 
					you need to have a corporate account with us. <br/><br/>

					If your company has no corporate account but wish to open a one, please contact the department of Computer Science and Engineering 
					(CSE), University of Moratuwa. <br/><br/>
					
					Now it's time to use the navigation menu above to explore the partner portal !
                </div>
                <div id="">

                    

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
