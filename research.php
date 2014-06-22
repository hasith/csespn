<?php
require_once './global.inc.php';
session_start();
if (!oauth_session_exists()) {
    header('Location: ' . '404.php');
}
?>
<?php
//data feeding to the database
if (isset($_POST['valid'])) {
//$user = $_SESSION['user']->id;
    $userId = $_SESSION['user']->id;
    $title = $_POST['title'];
    $partner = $_POST['partner'];
    $leader = $_POST['lead'];
    $estimation = $_POST['estimation'];
    $technos = $_POST['technologies'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $resp_contact = $_POST['resp_contact'];
    
    $data = array(
        "title" => $title,
        "author_id" => $userId,
        "lead_id" => $leader,
        "company_id" => $partner,
        "time" => $estimation,
        "description" => $description,
        "category" => $category,
        "technologies" => $technos,
        "resp_contact" => $resp_contact
    );

    $research = new Research($data);
    $research->save();
    return 'true';
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

                        <ul class="nav">
                            <li class="nav-one"><a href="#thirdYear" class="current">3rd Year Proposals</a></li>
                            <li class="nav-two"><a href="#finalYear">Final Year Proposals</a></li>

                        </ul>

                        <div class="list-wrap">

                            <div id="thirdYear">

                                <p class="descriptionTab">
                                    Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.
                                </p>


                                <div id="accordion" class="research-page">  
                                    <?php
                                    $orderBy = "published";
                                    $techoFilter = 0;
                                    if (isset($_GET['sorter'])) {
                                        $orderBy = $_GET['sorter'];
                                    }

                                    $researchTools = new ResearchTools();
                                    $allResearches = $researchTools->getAllResearches($orderBy);
                                    if (isset($_GET['techFilter']) && $_GET['techFilter'] != 0) {
                                        $techoFilter = $_GET['techFilter'];
                                        $allResearches = $researchTools->getResearchByTech($techoFilter, "research.".$orderBy);
                                    }
                                    //$allResearches = $researchTools->getResearchByTech(30, $orderBy);
                                    foreach ($allResearches as $research) {
                                        if ($research->category == 3) {
                                            ?>                                    
                                            <h3 class="greenColor clearfix">
                                                <div class="descriptionArea">
                                                    <a href="#"><?php echo $research->title ?></a>
                                                    <p> 
                                                        <?php
                                                        foreach ($research->technologies as $researchTechId) {
                                                            echo Technology::get($researchTechId)->name . ", ";
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="darkGray">
                                                    <ul>
                                                        <li class="endGPA"><span>Partner : </span><?php
                                                            $company = Company::get($research->company_id);
                                                            echo '<strong>'. $company->name.'</strong>'
                                                            ?></li>
                                                        <li class="endGPA estimations"><span>Estimation :</span><?php echo $research->time ?> hours</li>
                                                        <li class="linkedLink"><span>Contact person :</span> <a href="asd.html"><?php
                                                                $leader = User::get($research->lead_id);
                                                                echo $leader->name;
                                                                ?></a></li>
                                                    </ul>
                                                </div>
                                            </h3>  
                                            <div class="contentData clearfix"> 
                                                <?php
                                                $proposedUser = User::get($research->author_id);
                                                ?>
                                                <img src="<?php echo $proposedUser->pic_url ?>"/> 
                                                <p>  
                                                    <?php echo $research->description; ?>    
                                                </p>  
                                            </div> 
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>   

                            </div>

                            <div id="finalYear" class="hide">
                                <div id="accordion2" class="research-page"> 
                                    <?php
                                    foreach ($allResearches as $research) {
                                        if ($research->category == 4) {
                                            ?>
                                            <h3 class="greenColor clearfix">
                                                <div class="descriptionArea">
                                                    <a href="#"><?php echo $research->title ?></a>
                                                    <p> 
                                                        <?php
                                                        foreach ($research->technologies as $researchTechId) {
                                                            echo Technology::get($researchTechId)->name . ", ";
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="darkGray">
                                                    <ul>
                                                        <li class="endGPA"><span>Partner : </span><?php
                                                            $company = Company::get($research->company_id);
                                                             echo '<strong>'.$company->name.'</strong>'
                                                            ?></li>
                                                        <li class="endGPA estimations"><span>Estimation :</span><?php echo $research->time ?> hours</li>
                                                        <li class="linkedLink"><span>Contact Person :</span> <a href="asd.html"><?php
                                                                $leader = User::get($research->lead_id);
                                                                echo $leader->name;
                                                                ?></a></li>
                                                    </ul>
                                                </div>
                                            </h3>  
                                            <div class="contentData contentHeight clearfix"> 
                                                <?php
                                                $proposedUser = User::get($research->author_id);
                                                ?>
                                                <img src="<?php echo $proposedUser->pic_url ?>"/> 
                                                <p>  
                                                    <?php echo $research->description; ?>    
                                                </p>  
                                            </div> 
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div> <!-- END List Wrap -->
                    </div>
                </div>
                <div id="rightSide">
                    <?php if (User::currentUser()->getOrganization()->access_level >= 3) { ?>
                        <div id="addProject">
                            <a href="javascript: void(0)">
                                Propose a New Project
                            </a>
                        </div>
                    <?php } ?>

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


                    <form action="" method="GET" id="sortForm">
                        <input name="sorter" type="hidden" id="sorterHiddenInput" value="<?php echo $orderBy; ?>">
                        <input name="techFilter" type="hidden" id="techFilterHiddenInput" value="0">                        
                    </form>
                    <div class="componentContainer">
                        <div class="heading">
                            <p>Filter by Technology</p>
                        </div>

                        <div class="ccContainer">
                            <!--<div class="cloudArea"><img src="img/cloud.jpg" /></div>-->
                            <div class="cloudArea">

                                <select name="technology" id="technoFilterCombo" size="10">
                                    <option value="0">Any Technology</option>
                                    <?php
                                    $tecs = new TechnologyTools();
                                    $arr = $tecs->getAlltechnologies();
                                    foreach ($arr as $value) {
                                        $selected = $techoFilter == $value->id ? "selected" : "";
                                        echo "<option value='$value->id' $selected>$value->name</option>";
                                    }
                                    ?>
                                </select>
                                </form>
                            </div>
                        </div>


                    </div>

                    <div class="componentContainer">
                        <div class="heading">
                            <p>Sort Research Projects</p>
                        </div>

                        <div class="ccContainer">
                            <ul> 
                                <li><input name="sort" type="radio" value="published" id="sortDateRadio" <?php
                                    if (strcmp($orderBy, "published") == "0") {
                                        echo"checked";
                                    }
                                    ?>><label for="sortDateRadio">By Published Date</label></li>
                                <li><input name="sort" type="radio" value="time"  id="sortHourRadio"  <?php
                                    if (strcmp($orderBy, "time") == "0") {
                                        echo"checked";
                                    }
                                    ?>><label for="sortHourRadio">By Estimated Hours</label></li>
                                <li><input name="sort" type="radio" value="title" id="sortNameRadio"  <?php
                                    if (strcmp($orderBy, "title") == "0") {
                                        echo"checked";
                                    }
                                    ?>><label for="sortNameRadio">By Project Name</label></li>
                                <li><input name="sort" type="radio" value="company_id"  id="sortCompanyRadio"  <?php
                                    if (strcmp($orderBy, "company_id") == 0) {
                                        echo"checked";
                                    }
                                    ?>><label for="sortCompanyRadio">By Partner Company</label></li>

                            </ul>
                        </div>

                    </div>


                </div>
            </div>

        </div>
        <!--application form-->


        <div id="projectApplicationWrapper">
            <div id="projectApplication" class="researchPopUp">
            	
                <div class="heading">
                	<h2>New project proposal</h2>
                </div>
                
                
                <div id="projectForm">
                    <table style="border-collapse:collapse;">
                        <tr>
                            <td>
                                <label for="titleTxt">Title</label>
                            </td>
                            <td class="formInput">
                                <input type="text" id="titleTxt" name="title">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="categoryCombo">Category</label>
                            </td>
                            <td class="formInput">
                                <select name="category" id="categoryCombo">
                                    <option value="3">3rd year project</option>
                                    <option value="4">final year project</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="partnerCombo">Partner</label>
                            </td>


                            <td class="formInput">
                                <?php
                                $userIsAdmin = true;
                                $userCompany = User::currentUser()->getOrganization();

                                if ($userCompany->access_level < 5) {
                                    $organizaion_id = User::currentUser()->getOrganization()->id;
                                    $userIsAdmin = false;
                                }
                                ?>

                                <select name="partner" id="partnerCombo" contenteditable="<?php echo $userIsAdmin ?>">
                                    <?php if (!$userIsAdmin) { ?>
                                        <option value="<?php echo $userCompany->id; ?>"><?php echo $userCompany->name; ?></option>
                                    <?php } else {
                                        ?>

                                        <?php
                                        $companyTools = new CompanyTools();
                                        $companyArray = $companyTools->getAllPremiumCompanies();
                                        $company = new Company(null);
                                        foreach ($companyArray as $company) {
                                            ?>
                                            <option value="<?php echo $company->id; ?>"><?php echo $company->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="estimatedTimeTxt">Estimation(hours)</label>
                            </td>
                            <td class="formInput">
                                <input name="estimatedTime" type="text" id="estimatedTimeTxt">
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <label for="leadCombo">Contact Person</label>
                            </td>
                            <td class="formInput">

                                <select name="leadCombo" id="leadCombo">
                                    <?php
                                    $userTools = new UserTools();
                                    $users = $userTools->getAllLeads();
                                    $user = new User();

                                    foreach ($users as $user) {
                                        echo "<option value='$user->id'>$user->name</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contact No</label>
                            </td>
                            <td class="formInput">
                                <input name="resp_contact" type="text" id="contactNo">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="technologyTxt">Technology</label>
                            </td>
                            <td class="formInput">
                                <input type="hidden" name="technology" id="technologyVals">
                                <input name="technology" type="text" id="technologyTxt" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="descriptionTxt">Description</label>
                            </td>
                            <td class="formInput">
                                <textarea id="descriptionTxt" name="description"></textarea>
                            </td>
                        </tr>
                    </table>

                </div>
                <div id="formControls" class="clearfix">
                	<button type="button" onclick="submit()">Add</button>
                </div>
            </div>
        </div>


        <?php include_once 'scripts.inc.php'; ?>

        <script src="js/research.js" type="text/javascript"></script>
        <script>
                                    //loading batches till technologies ae implemented:dummy
                                    var json = '<?php echo json_encode($arr); ?>';
                                    tempArray = new Array();
                                    tempArray = JSON.parse(json);
                                    for (i = 0; i < tempArray.length; i++) {
                                        technologies.push({value: "" + tempArray[i].id.toString(), label: "" + tempArray[i].name.toString()});
                                    }
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