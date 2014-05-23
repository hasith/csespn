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
    <?php
    require_once './head.inc.php';
    ?>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php
        require_once './nav.inc.php';
        ?>

        <div class="container clearfix">

            <div id="bannerArea" class="clearfix">
                <div id="bannerLeft">

                    <div id="example-two">

                        <button id="add-company"><span style="display: inline-block;" class='ui-icon ui-icon-circle-plus'></span> Add Company</button>
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
                                        foreach ($companies as $company) {
                                            ?>
                                            <tr>
                                                <td><?= $company->id ?></td>
                                                <td><?= $company->name ?></td>
                                                <td><?= $company->access_level ?></td>
                                                <td>
                                                    <button id="edit-company" co_id="<?= $company->id ?>"><span class='ui-icon ui-icon-pencil'></span></button>
                                                    <button id="del-company" co_id="<?= $company->id ?>"><span class='ui-icon ui-icon-trash'></span></button>  
                                                </td> 

                                            </tr>						
<?php } ?>		
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
            <p id="delete-dialog-text">
                Do you really want to remove this company?
            </p>
        </div>
        <div id="result-dialog" title="Status">
            <p id="op-result"></p>
        </div>
        <div style="display: none" id="company-dialog">
            <form id="company-update-edit-form">
                <input type="hidden" id="company-id" name="id"/>
                <p id="company-dialog-desc">
                    <label for="company-dialog-name" id="company-dialog-title-label"><b>Company Name </b></label>
                    <input id="company-dialog-name" size="60" type="text" name="name"/>
                </p>
                <p id="company-dialog-desc">
                    <label for="company-dialog-accesslevel" id="company-dialog-access-label"><b>Access Level </b></label>
                    
                    <select name = "accesslevel" style="width: 50px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </p>

                <p id="error-message">
                    Company name and accesslevel cannot be empty
                </p>
            </form>
        </div>
        
        <div style="display: none" id="company-add-dialog">
            <form id="company-add-edit-form">
                <input type="hidden" id="company-id" name="id"/>
                <p id="company-dialog-desc">
                    <label for="company-dialog-name" id="company-dialog-title-label"><b>Company Name </b></label>
                    <input id="company-dialog-name" size="60" type="text" name="name"/>
                </p>
                <p id="company-dialog-desc">
                    <label for="company-dialog-accesslevel" id="company-dialog-access-label"><b>Access Level </b></label>
                    
                    <select name = "accesslevel" style="width: 50px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </p>

                <p id="add-error-message">
                    Company name and accesslevel cannot be empty
                </p>
            </form>
        </div>






<?php
include_once 'scripts.inc.php';
?>

        <script type="text/javascript" src="js/admin.company.js"></script>
        <!--ript type="text/javascript" src="js/admin.event.js"></script>-->	
    </body>
</html>
