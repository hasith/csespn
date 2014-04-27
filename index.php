<?php

require_once('global.inc.php');

session_start();

?>﻿
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CSE Partner Network - <?php echo $pageName ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bjqs.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->        
        <?php
            include './index_nav.inc.php';
        ?>        
        <div class="container clearfix">        	
            <div id="bannerArea" class="clearfix">
            	<div id="bannerLeft">                	
                	<div id="banner-fade">
                        <!-- start Basic Jquery Slider -->
                        <ul class="bjqs">
                          <li><img src="img/banner/global_presence.jpg" title="Make a global impact through achievements of Sri Lankan university students"></li>
                          <li><img src="img/banner/helpstudents.jpg" title="Help Sri Lankan undergraduates to be participative and competitive"></li>
                          <li><img src="img/banner/share.jpg" title="Promote the culture of giving back, through sharing and socializing"></li>
                          <li><img src="img/banner/achivers.jpg" title="Recognize the accomplishments of high achievers of our industry "></li>
                          <li><img src="img/banner/curriculum.jpg" title="Shape-up the uni curriculum to deliver for the modern IT industry"></li>
                          <li><img src="img/banner/gettoknow.jpg" title="Help the industry and students to become closer through collaboration "></li>

                        </ul>
                        <!-- end Basic jQuery Slider -->                
                   </div>                
                </div>
                <div id="bannerRight">
                	<div class="clearfix signInArea">
                    	<p>We are Open!</p><p id="signMessage">
                    	CSE Partner Network is a program that helps organizations to grow through an effective affiliation with the department of Computer Science & Engineering at 
                    	<span></span>University of Moratuwa.</span>
                    	<?php if(oauth_session_exists()){
                                 echo '<a class="buttonEffect" href="./landing.php">Access the Portal</a>';
                             }else{
                             	 echo '<a class="buttonEffect" href="./login.php?lType=initiate">Connect with LinkedIn</a>';
                             }
                        ?>
                    	<br/><br/><br/><br/>
                    	We are an open network and you may simply connect us by sign-in. 
                    	<br/><br/>To fully embrase the portal functionality one needs a premium partner account which can be obtained by contacting us.
                    	</p>                      
                    </div>
                    <div id="contactUs" class="clearfix">
                    	<img src="img/contactUs.jpg" />
                        <div id="contactDetails">
                            <h6 class="details_topic">Contact Us</h6>
                            <p>	
                            	Dr. Gamage<br/>Tel: 0112640381-3101
                            </p>
                        </div>
                    </div>                     
                </div>
            </div>  
            <div id="benefit_bookmark"/>
            <div  class="hd"><hr><h3>Partner Benifits</h3> </div>
            <div id="benefits">
            		<img src="http://lempnet.itcilo.org/images/icon-pax-profile/image_preview" />
            		<div class="topic details_topic">Access Student Profiles</div>
            		<div class="text">CSE premium partners will get access to the student registry of all CSE batches. Student profiles are comprises of a brief introduction, competencies, LinkedIn profile, etc. </div>
            </div>                                              
            <div id="benefits">
            		<img src="https://developer.qualcomm.com/sites/default/files/distribute-60px.png" />
            		<div class="topic details_topic">Assemble a Team</div>
            		<div class="text">Premium partners will be able to assemble a team of students to assist in their organizational activities such as event organization, CSR work, software development, etc.</div>
            </div>  
            <div id="benefits">
            		<img src="http://medicine.mytau.org/attali/wp-content/uploads/2011/09/Lab-Icon-150x150.png" />
            		<div class="topic details_topic">Participate in Research </div>
            		<div class="text">Partner companies will be able to propose research projects (both Final Year and 3rd Year Projects) to be carried out by the students. In addition, partners will be able to follow the research work already happenning in the department to make use of such.</div>
            </div>  
            <div id="benefits">
            		<img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTARPqWLr44-bHqa099FZaqMKw51ERCYcwMj7YryKGP7vUqnlcR" />
            		<div class="topic details_topic">Conduct University Sessions</div>
            		<div class="text">University needs for external sessions (technical as well as softskills) are listed through this portal. Partner are able to pick the sessions of their interest to facilitate. This is an excellent oppotunity for the organizations of collaborate with the students. In addition partners are able to propose new sessions to be carried out for the students. </div>
            </div>                          
       
            <div id="benefits">
            		<img src="http://funny-days.com/wp-content/uploads/2014/03/2014-holiday-calendar-good_1395596625.jpg" />
            		<div class="topic details_topic">Plan for Events</div>
            		<div class="text">Partners will get the access to department event calandar. This will help the organizations to pre-plan the events to participate and sponsor to recieve the optimum benefits through student interactions. </div>
            </div>  
            <div id="benefits">
            		<img src="https://developer.qualcomm.com/sites/default/files/discuss-60px.png" />
            		<div class="topic details_topic">Shape-up the Curriculum</div>
            		<div class="text">Partners are invited for planning meeting of the department activities. This is an oppotunity for the organizations to make a positive impact to the academic curriculum and other event lineup of the department.</div>
            </div> 
        <div id="footer">
        	<hr/>
        	Developed and maintained by - Computer Science & Engineering Society (CS&ES)
        </div>
        
        
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/bjqs-1.3.min.js"></script>
        
        <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 520,
            width       : 820,
            responsive  : true,
            animtype : 'fade', // accepts 'fade' or 'slide'
			animduration : 2000, // how fast the animation are
			animspeed : 8000, // the delay between each slide
			automatic : true, // automatic

          });

        });
      </script>

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
