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
                <div style="padding-bottom: 30px;color: #888;">You have signed-in as  
                    <?php
                    $org = User::currentUser()->getOrganization();
                    if ($org->access_level == 1) {
                        echo "a Public User";
                    } else if ($org->access_level == 2) {
                        echo "a Student";
                    } else if ($org->access_level == 3) {
                        echo "a <i>'Corporate Account'</i> under <i>'" . $org->name . "'</i>";
                    } else if ($org->access_level == 4) {
                        echo "a <i>'Premium Corporate Account'</i> under <i>'" . $org->name . "'</i>";
                    } else if ($org->access_level == 5) {
                        echo "an Admin User";
                    }
                    ?>

                </div>
                <div style="font-size:15px">
                
                
                    <div id="benefits">
                            <img src="./img/benefits/profiles.jpeg" />
                            <div ><a href="./students.php"  class="topic details_topic" style="margin-bottom: 5px;">Student Profiles</a></div>
                            <div class="text">
                                The student profiles will comprise of brief introductions about the students, their competencies and LinkedIn profile. Portal allows you to filter students with given competencies. Also you may collaborate with students to engage them in organizational activities such as event planning, CSR, software development, etc. by forming teams according to your preference
                            
                            </div>
                    </div>  
                    <div id="benefits">
                            <img src="./img/benefits/research.png" />
                            <div ><a href="./projects.php"  class="topic details_topic" style="margin-bottom: 5px;">Research Projects</a></div>
                            <div class="text">
                                Through this portal you may propose research projects (for Final Year and 3rd Year Projects) to be carried out by the students. In addition, partners will be able to follow the research work being carried out in the department to make use of such.
                            </div>
                    </div>  
                    <div id="benefits">
                            <img src="./img/benefits/sessions.jpeg" />
                            <div ><a href="./sessions.php"  class="topic details_topic" style="margin-bottom: 5px;">University Sessions</a></div>
                            <div class="text">
                                Needs for external uni-sessions (technical and soft-skill) are listed through this portal. Partners get the opportunity to facilitate sessions of their interests, which in turn will be an opening to enhance the collaboration with the students. 
                            </div>

                    </div>                          

                    <div id="benefits">
                            <img src="./img/benefits/events.jpg" />
                            <div ><a href="./events.php"  class="topic details_topic" style="margin-bottom: 5px;">Event Calandar</a></div>
                            <div class="text">
                                You may gain access to the department's event calandar via this portal. This will help the organizations to pre-plan the participation to the events and offer sponsorships to recieve the optimum benefits through engagement activities.
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
