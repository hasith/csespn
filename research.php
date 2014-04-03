<?php
require_once './global.inc.php';
    session_start();
    if(!isset($_SESSION['token'])){
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

        
        <div id="header">
            <div class="container clearfix">
                
                <div id="logo">
                    <a href="./index.html"><img src="img/logo.jpg" /></a>
                </div>
                
                <div id="nav">
                    <ul class="clearfix">
                        <li><a href="./students.php">Students</a></li>
                        <li><a href="./sessions.php">Sessions</a></li>
                        <li><u><a href="./research.php">Research</a></u></li>
                        <li><a href="./events.php">Events</a></li>
                        <?php
                            if(isset($_SESSION['user'])){
                                $user = $_SESSION['user'];
                                echo '<li><a href="">' . $user->display_name . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>                
            </div>
        </div>
        
        
        <div class="container clearfix">
        	
            <div id="bannerArea" class="clearfix">
            	<div id="bannerLeft">
					
                    <div id="example-two">
					
                        <ul class="nav">
                            <li class="nav-one"><a href="#featured2" class="current">3rd Year Proposals</a></li>
                            <li class="nav-two"><a href="#core2">Final Year Proposals</a></li>

                        </ul>
                        
                        <div class="list-wrap">
                        	
                            <div id="featured2">
                           		
                                <p class="descriptionTab">
                                	Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                </p>
                                
                                
                               <div id="accordion"> 
                                 
									<h3 class="greenColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Fuel Management System </a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> 99X Technology</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData research clearfix"> 
                                    
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div> 
                                     
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">High Performance Event Bus</a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> MIT</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div> 
                                     
                                    <h3 class="greenColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Fuzzy Logic based Geo Filtering</a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> CodeGen</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div>   
                                    
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Social Media Management System </a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> WSO2</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div>   
                                    
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Employee Performance Management System</a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> 99X Technology</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div> 
                                    </h3> 
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div>  
                                     
                                </div>   
                                
                            </div>
                             
                             <div id="core2" class="hide">
                                <div id="accordion2"> 
                                 
									<h3 class="greenColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Fuel Management System </a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> 99X Technology</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData research clearfix"> 
                                    
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div> 
                                     
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">High Performance Event Bus</a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> MIT</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div> 
                                     
                                    <h3 class="greenColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Fuzzy Logic based Geo Filtering</a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> CodeGen</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div>   
                                    
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Social Media Management System </a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> WSO2</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div>   
                                    
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Employee Performance Management System</a>
                                    		<p> HTML5/JavaScript, ASP.NET</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA"><span>Partner :</span> 99X Technology</li>
                                                <li class="endGPA"><span>Estimation :</span> 230 hours</li>
                                                <li class="linkedLink"><span>Lead :</span> <a href="asd.html">Frank Warnakula</a></li>
                                            </ul>
                                        </div> 
                                    </h3> 
                                    <div class="contentData clearfix"> 
                                    
                                    	<img src="img/img5.jpg"/> 
                                        <p>  
                                            Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                        </p>  
                                    </div>  
                                     
                                </div>
                             </div>
                             

                             
                         </div> <!-- END List Wrap -->
                     
                     </div>
                       
                </div>
                <div id="rightSide">
                    <div id="addProject">
                    	<a href="">
                        	Propose a New Project
                        </a>
                    </div>
                    				
                	<ul id="legend">
                    	<li class="greenBox clearfix">
                        	<span></span>
                            <p>Project Selected by Students</p>
                        </li>
                        <li class="ice clearfix">
                        	<span></span>
                            <p>Project not Selected yet</p>
                        </li>
                    </ul>
                	

                    
                    <div class="componentContainer">
                    	<div class="heading">
                        	<p>Filter by Technology</p>
                        </div>
                        
                        <div class="ccContainer">
                        	<div class="cloudArea"><img src="img/cloud.jpg" /></div>
                            <div class="cloudArea">
                                <select>
                                	<option>Select Form</option>
                                </select>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="componentContainer">
                    	<div class="heading">
                        	<p>Sort Research Projects</p>
                        </div>
                        
                        <div class="ccContainer">
                        	<ul>
                            	<li><input type="checkbox"><label>By Published Date</label></li>
                                <li><input type="checkbox"><label>By Estimated Hours</label></li>
                                <li><input type="checkbox"><label>By Project Name</label></li>
                                <li><input type="checkbox"><label>By Partner Company</label></li>
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
				
				
				$( "#accordion" ).accordion({
					autoHeight: false,
					navigation: true
				});
				$( "#accordion2" ).accordion({
					autoHeight: false,
					navigation: true
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