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
                    	<br/><a class="buttonEffect" href="">Connect with LinkedIn</a><br/><br/><br/>
                    	We are an open network and you may simply connect us by sign-in. 
                    	<br/><br/>To fully embrase the portal functionality one needs a premium partner account which can be obtained by contacting us.
                    	</p>                      
                    </div>
                    <div id="contactUs" class="clearfix">
                    	<img src="img/contactUs.jpg" />
                        <div id="contactDetails">
                            <h6>Contact Us</h6>
                            <p>	
                            	Dr. Gamage<br/>Tel: 0112640381-3101
                            </p>
                        </div>
                    </div>                     
                </div>
            </div>  
            
            <div class="hd"><hr><h3>Partner Benifits</h3>  
            	<div>
            		<div>image</div>
            		<div>content</div>
            	</div>
            </div>                                              
            <div id="boxesArea">            	
                <ul>
                    <li>
                    	<h2>Collaborate students</h2>
                        <img src="img/img1.jpg" />
                    </li>
                    <li>
                    	<h2>Be our first preference</h2>
                        <img src="img/img2.jpg" />
                    </li>
                    <li>
                    	<h2>Partner in research</h2>
                        <img src="img/img3.jpg" />
                    </li>
                    <li>
                    	<h2>Customize curriculum</h2>
                        <img src="img/img4.jpg" />
                    </li>
                </ul>                
            </div>
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
