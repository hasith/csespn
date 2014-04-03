<?php

require_once('global.inc.php');

session_start();

?>﻿
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

        
        
        <div id="header">
            <div class="container clearfix">
                
                <div id="logo">
                    <a href=""><img src="img/logo.jpg" /></a>
                </div>
                
                <div id="nav">
                    <ul class="clearfix">
                        <li><a href="">Partner Benefits</a></li>
                        <li><a href="">Current Partners</a></li>
                        <?php
                            if(oauth_session_exists()){
                                echo '<li><a href="./events.php">' . 'Name' . '</a></li>';
                                echo '<li><a href=' . "./login.php?lType=revoke" . ">Logout</a></li>";
                            }else{
                                echo '<li><a href=' . "./login.php?lType=initiate" . ">Connect with LinkedIn</a></li>";
                            }
                        ?>                        
                    </ul>
                </div>                
            </div>
        </div>
        
        <div class="container clearfix">
        	
            <div id="bannerArea" class="clearfix">
            	<div id="bannerLeft">
                	
                	<div id="banner-fade">

                        <!-- start Basic Jquery Slider -->
                        <ul class="bjqs">
                          <li><img src="img/banner01.jpg" title="Automatically generated caption"></li>
                          <li><img src="img/banner02.jpg" title="Automatically generated caption"></li>
                          <li><img src="img/banner03.jpg" title="Automatically generated caption"></li>
                        </ul>
                        <!-- end Basic jQuery Slider -->
                
                   </div>
                
                </div>
                <div id="bannerRight">
                	<div class="clearfix signInArea">
                    	<p>Already a Partner?</p>
                        <a class="buttonEffect" href="">Sign In</a>
                        <a class="linkNormal" href="">Renew Membership</a>
                    </div>
                    <div class="clearfix signInArea">
                    	<p>New to Partner Network?</p>
                        <a class="buttonEffect" href="">Join</a>
                        <a class="linkNormal" href="">Learn More</a>
                    </div>
                    <div id="contactUs" class="clearfix">
                    	<img src="img/contactUs.jpg" />
                        <div id="contactDetails">
                        	<h6>Contact Us</h6>
                            <p>	
                            	Dr. Gamage<br/>
								Tel: 0112640381-3101
                            </p>
                        </div>
                    </div>
                    
                    <p id="signMessage">
                    	CSE Partner Network is a program that helps organizations to grow their business through effective affiliation with the department of Computer Science & Engineering – <span>University of Moratuwa</span>.
                    </p>
                    
                </div>
            </div>
            
            
            
            
            <div id="boxesArea">
            	
                <ul>
                	<li>
                    	<h2>Collaborate students</h2>
                        <img src="img/img1.jpg" />
                    </li>
                    <li>
                    	<h2>Be our first preference
</h2>
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
            responsive  : true
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
