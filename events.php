<?php
    require_once './global.inc.php';
    session_start();
    if(!oauth_session_exists()){
        header('Location: ' . '404.php');
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        
        <link rel="stylesheet" href="css/style.css">
        
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        
        
        <div id="header">
            <div class="container clearfix">
                
                <div id="logo">
                    <a href="./index.php"><img src="img/logo.jpg" /></a>
                </div>
                
                <div id="nav">
                    <ul class="clearfix">
                        <li><a href="./students.php">Students</a></li>
                        <li><a href="./sessions.php">Sessions</a></li>
                        <li><a href="./research.php">Research</a></li>
                        <li><u><a href="./events.php">Events</a></u></li>
                        <?php
                            if(isset($_SESSION['user'])){
                                echo '<li><a href="events.php">' . $_SESSION['user']->display_name . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>                
            </div>
        </div>
        
        <div class="container clearfix">
        	
            <div id="bannerArea" class="clearfix">
            	<div id="bannerLeft">
					
                  <p>Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek</p>
                      
                  <div id="calendar">
                  	<ul>
                    	<li>
                        	<h4>JAN</h4>
                            <p>Decade of GSoC - 12th</p>
                            <p>MOFA Festival - 17th</p>
                            <p>Hit the Ground - 27th</p>
                        </li>
                        <li>
                        	<h4>FEB</h4>
                            <p>Code Challenge - 12th</p>
                            <p>Z Festival - 17th</p>
                            <p>Robotic Challenge - 27th</p>
                        </li>
                        <li>
                        	<h4>MAR</h4>
                            <p class="greenText">Drama Challenge - 12th</p>
                            <p class="orangeText">Code Fest - 17th</p>
                            <p class="greenText">Robotic Challenge - 27th</p>
                        </li>
                        <li>
                        	<h4>APR</h4>
                            <p class="orangeText">Decade of GSoC - 12th</p>
                            <p class="greenText">MOFA Festival - 17th</p>
                            <p class="orangeText">Hit the Ground - 27th</p>
                        </li>
                        <li>
                        	<h4>MAY</h4>
                            <p class="greenText">Decade of GSoC - 12th</p>
                            <p class="orangeText">New Festival - 17th</p>
                            <p class="orangeText">ABC Challenge - 27th</p>
                        </li>
                        <li>
                        	<h4>JUN</h4>
                            <p class="greenText">Drama Challenge - 12th</p>
                            <p class="orangeText">HAS Festival - 17th</p>
                            <p class="greenText">PQR Challenge - 27th</p>
                        </li>
                        <li>
                        	<h4>JUL</h4>
                            <p class="greenText">Decade of GSoC - 12th</p>
                            <p class="orangeText">MOFA Festival - 17th</p>
                            <p class="orangeText">Hit the Ground - 27th</p>
                        </li>
                        <li>
                        	<h4>AUG</h4>
                            <p class="orangeText">Decade of GSoC - 12th</p>
                            <p class="greenText">VCD Festival - 17th</p>
                            <p class="orangeText">Robotic Challenge - 27th</p>
                        </li>
                        <li>
                        	<h4>SEP</h4>
                            <p class="greenText">Drama Challenge - 12th</p>
                            <p class="orangeText">Go Festival - 17th</p>
                            <p class="greenText">Robotic Challenge - 27th</p>
                        </li>
                        <li>
                        	<h4>OCT</h4>
                            <p>Decade of GSoC - 12th</p>
                            <p class="orangeText">MOFA Festival - 17th</p>
                            <p class="greenText">Hit the Ground - 27th</p>
                        </li>
                        <li>
                        	<h4>NOV</h4>
                            <p>Decade of GSoC - 12th</p>
                            <p class="orangeText">MOFA Festival - 17th</p>
                            <p class="greenText">Hit the Ground - 27th</p>
                        </li>
                        <li>
                        	<h4>DEC</h4>
                            <p>Decade of GSoC - 12th</p>
                            <p class="orangeText">MOFA Festival - 17th</p>
                            <p class="greenText">Hit the Ground - 27th</p>
                        </li>
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
        
        
        

        <script src="js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
        
		<script src="js/organictabs.jquery.js"></script>
        <script>
            $(function() {  

                $("#example-two").organicTabs({
                    "speed": 200
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
