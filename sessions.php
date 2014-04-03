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
                           		
                                <p class="descriptionTab">
                                	Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                </p>
                                
                                
                               <div id="sessionsList"> 
                                  
<?php
$sessionTools = new SessionTools();
$sessions = $sessionTools->getAllSessions();

foreach($sessions as $session) {
	echo $session->title;
}

?>                                  
									<h3 class="greenColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Go REST with ASP.NET Web API</a>
                                    		<p>Lorem ipsum dolor sit amet, congue massa sem vivamus nisl donec augue, nunc nonummy eget elit commodo odio, eros porta augue, eu natoque nec sit. Id mattis et molestie dolor augue.
</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA">24th March 2014</li>
                                                <li class="endGPA"><span>Level 2 Students</li>
                                                <li class="linkedLink"><a href="">Take this Session</a></li>
                                            </ul>
                                        </div>
                                    </h3>  

                                     
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">MV* in Large Scale Java Script Development</a>
                                    		<p>Lorem ipsum dolor sit amet, congue massa sem vivamus nisl donec augue, nunc nonummy eget elit commodo odio, eros porta augue, eu natoque nec sit. Id mattis et molestie dolor augue.
</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA">24th March 2014</li>
                                                <li class="endGPA"><span>Level 2 Students</li>
                                                <li class="linkedLink"><a href="">Take this Session</a></li>
                                            </ul>
                                        </div>
                                    </h3>  

                                     
                                    <h3 class="greenColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Java Script Development with Cloud Services</a>
                                    		<p>Lorem ipsum dolor sit amet, congue massa sem vivamus nisl donec augue, nunc nonummy eget elit commodo odio, eros porta augue, eu natoque nec sit. Id mattis et molestie dolor augue.
</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA">24th March 2014</li>
                                                <li class="endGPA"><span>Level 2 Students</li>
                                                <li class="linkedLink"><a href="">Take this Session</a></li>
                                            </ul>
                                        </div>
                                    </h3>  

                                    
                                    <h3 class="redColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Java Script Development with Cloud Services <span class="dangerLab">[Not Finalized]</span></a>
                                    		<p>Lorem ipsum dolor sit amet, congue massa sem vivamus nisl donec augue, nunc nonummy eget elit commodo odio, eros porta augue, eu natoque nec sit. Id mattis et molestie dolor augue.
</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA">24th March 2014</li>
                                                <li class="endGPA"><span>Level 2 Students</li>
                                                <li class="linkedLink"><a href="">Take this Session</a></li>
                                            </ul>
                                        </div>
                                    </h3>  
 
                                    
                                    <h3 class="yellowColor clearfix">
                                    	<div class="descriptionArea">
                                        	<a href="#">Go REST with ASP.NET Web API</a>
                                    		<p>Lorem ipsum dolor sit amet, congue massa sem vivamus nisl donec augue, nunc nonummy eget elit commodo odio, eros porta augue, eu natoque nec sit. Id mattis et molestie dolor augue.
</p>
                                        </div>
                                        <div class="darkGray">
                                        	<ul>
                                            	<li class="endGPA">24th March 2014</li>
                                                <li class="endGPA"><span>Level 2 Students</li>
                                                <li class="linkedLink"><a href="">Take this Session</a></li>
                                            </ul>
                                        </div>
                                    </h3> 
 
                                     
                                </div>   
                                
                            </div>
                             
                             
                             

                             
                         </div> <!-- END List Wrap -->
                     
                     </div>
                       
                </div>
                <div id="rightSide">
		            <div id="addProject">
                    	<a href="">
                        	Propose a New Session
                        </a>
                    </div>
                    		
                	<ul id="legend">
                    	<li class="greenBox clearfix">
                        	<span></span>
                            <p>Open for a Partner to Take</p>
                        </li>
                        <li class="ice clearfix">
                        	<span></span>
                            <p>Already Finalized</p>
                        </li>
                        <li class="redBox clearfix">
                        	<span></span>
                            <p>Proposed, but not Finalized</p>
                        </li>
                        <li class="grayBox clearfix">
                        	<span></span>
                            <p>Event occurred in Past</p>
                        </li>
                    </ul>
                	

                    
                    
                    <div class="componentContainer">
                    	<div class="heading">
                        	<p>Filter Sessions</p>
                        </div>
                        
                        <div class="ccContainer">
                        	<ul>
                            	<li><input type="checkbox"><label>Only future Sessions</label></li>
                                <li><input type="checkbox"><label>All Sessions</label></li>
                                <li><input type="checkbox"><label>CodeGen Sessions</label></li>
                                <li><input type="checkbox"><label>Open to Take</label></li>
                            </ul>
                        </div>
                        
                        
                    </div>
                    
                    <div class="componentContainer">
                    	<div class="heading">
                        	<p>Sort Sessions</p>
                        </div>
                        
                        <div class="ccContainer">
                        	<ul>
                            	<li><input type="checkbox"><label>By Status</label></li>
                                <li><input type="checkbox"><label>By Student Level</label></li>
                                <li><input type="checkbox"><label>By Date</label></li>
                                <li><input type="checkbox"><label>By Partner</label></li>
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
