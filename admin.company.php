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

						<button id="add-event"><span style="display: inline-block;" class='ui-icon ui-icon-circle-plus'></span> Add Company</button>
                        <div class="list-wrap noborder">

                            <div id="featured2">
							
								<table id="usertable" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
											<th>Access Level</th>
											<th>Settings</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
							<?php 
							
							$companyTools = new CompanyTools();
							$companies = $companyTools->getAllCompanies();
							foreach ($companies as $company)
							{
							?>
                                           <tr>
                                                <td><?= $company->id ?></td>
                                                <td><?= $company->name ?></td>
												<td><?= $company->access_level?></td>
												<td>
												<button id="edit-event" co_id="<?= $company->id ?>"><span class='ui-icon ui-icon-pencil'></span></button>
                                                <button id="del-event" co_id="<?= $company->id ?>"><span class='ui-icon ui-icon-trash'></span></button>  
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
            </div>

        </div>
        
        <div id="delete-dialog" title="Confirm Delete">
                    <input type="hidden" id="company_id" />
                    <p id="delete-dialog-text">Do you really want to remove this company?</p>
                </div>
                <div id="result-dialog" title="Status">
                    <p id="op-result"></p>
                </div>
                <div style="display: none" id="event-dialog" title="Add new Company">
                    <form id="event-edit-form">
                        <input type="hidden" id="company-id" name="id"/>
                        <p id="event-dialog-desc">
                            <label for="event-dialog-title" id="event-dialog-title-label"><b>Company Name </b></label>
                            <input id="event-dialog-title" size="60" type="text" name="title"/>
                        </p>
                        <p id="event-dialog-accesslevel">
                            <label for="event-dialog-accesslevel" id="event-dialog-access-label"><b>Access Level </b></label>
                            <input id="event-dialog-accesslevel" size="60" type="text" name="access level"></textarea>
                        </p>
   
                        <p id="error-message">Company name and accesslevel cannot be empty</p>
                    </form>
                </div>
            </div>

        </div>
        
        
        
<?php include_once 'scripts.inc.php'; ?>

 <!--<script type="text/javascript" src="js/admin.company.js"></script>-->
 <script type="text/javascript" src="js/admin.event.js"></script>-->	
 </body>
</html>
							