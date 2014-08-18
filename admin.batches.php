<?php
require_once './global.inc.php';
verify_oauth_session_exists();

if (HttpSession::currentUser()->getOrganization()->access_level < 4) {
    echo "Access denied";
    die();
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
					<button id="add-batches"><span style="display: inline-block;" class='ui-icon ui-icon-circle-plus'></span> Add Batches</button>


                        <div class="list-wrap noborder">

                            <div id="featured2">

                                <table id="usertable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Display Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
											<th></th>
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
												 <td><?= $batch->display_name?></td>
												 <td><?= $batch->course?></td>
                                                <td><?= $batch->year?></td>
                                                <td> 
												<button id="del-batch" bt_id="<?= $batch->id ?>"><span class='ui-icon ui-icon-trash'></span></button>
												<button id="edit-batch" bt_id="<?= $batch->id ?>"><span class='ui-icon ui-icon-pencil'></span></button>
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
                            <a href="admin.company.php">Manage Companies</a>
                        </li>
                        <li class=" clearfix">
                            <a href="admin.batches.php">Manage Batches</a>
                        </li>
                        <li class=" clearfix">
                            <a href="admin.events.php">Manage Events</a>
                        </li>
                    </ul>



                </div>
				
				<div id="delete-dialog" title="Confirm Delete">
                    <input type="hidden" id="batch_id" />
                    <p id="delete-dialog-text">Do you really want to remove this event?</p>
                </div>
                <div id="result-dialog" title="Status">
                    <p id="op-result"></p>
                </div>
		
		
                <div style="display: none" id="batch-dialog" title="">
                    <form id="batch-add-form">
                        <input type="hidden" id="batch-id" name="id"/>
                        <p id="batch-dialog-name_desc">
                            <label for="batches-dialog-name" id="batch-dialog-name-label"><b>Display Name </b></label>
                            <input id="batches-dialog-name" size="60" type="text" name="title"/>
                        </p>
                        <p id="batch-dialog-course_desc">
                            <label for="batches-dialog-course" id="batch-dialog-course-label"><b>Course</b></label>
                            <input id="batches-dialog-course" size="60" type="text" name="course"/>
                        </p>
                        <p id="year">
                            <label for="batches-dialog-year" id="batch-dialog-year-label"><b>Year </b></label>
                            <input id="batches-dialog-year" size="60" type="text" name="year"/>
                        </p>
						
						<p id="error-message">Event title and date cannot be empty</p>
                    </form>
                </div>
            </div>

        </div>
		
		
		
		

        

<?php include_once 'scripts.inc.php'; ?>
        <script type="text/javascript" src="js/admin.batches.js"></script>
         
        
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
