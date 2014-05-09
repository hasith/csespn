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


                        <div class="list-wrap noborder">

                            <div id="featured2">
							<table id="usertable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            
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
<?php include_once 'scripts.inc.php'; ?>

 <!--<script type="text/javascript" src="js/admin.company.js"></script>-->

 </body>
</html>
							