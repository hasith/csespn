<?php
require_once './global.inc.php';
require_once ROOT_DIR . '/classes/DB.class.php';
require_once ROOT_DIR . '/classes/Session.class.php';

verify_oauth_session_exists();
$partnerships = (new SponsorshipTools())->getAllSponsorships();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php require_once './head.inc.php'; ?>
	<head> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
        <style>
            #example-two ul {
                list-style: square !important;
            }
            #example-two ul > li > ul {
                margin-left: 20px;
                list-style: circle !important;
            }
            #contact-hod {
                background-color: #f3f3f3;
                padding: 10px;
                font-size: 14px;
                line-height: 1.5;
                border: #ddd solid 1px;
            }
            #contact-hod p {
                text-align: justify;
            }
        </style>

</head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php require_once './nav.inc.php'; ?>

        <div class="container clearfix">

            <div id="bannerArea" class="clearfix">

                <p class="page-title">
                   <!--Partnership page description-->
                </p>
                <div id="bannerLeft">
                    <div id="example-two">
                        <div class="list-wrap noborder">
                            <div id="featured2">
                                <div id="partnershipList">
                                    <?php
                                    if (count($partnerships) > 0) {
                                        echo '<div id="accordion" class="student-page">';
                                        foreach($partnerships as $partnership) {
                                            echo getHtmlForPartnership($partnership);
                                        }
                                        echo '</div>';
                                    } else {
                                        echo '<p class="message-text">-- No Partnership opportunities available at the moment --</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div> <!-- END List Wrap -->
                    </div>
                </div>
                <div id="rightSide">
                    <div id="contact-hod">
                        <p>
                            If your company is interested in any of the partnership opportunities,
                            please contact the Head of the Department.
                        </p>
                        <p>
                            <img src="img/phone-icon.png"/>
                            <span>0112640381</span>
                        </p>
                        <p style="margin-top: -5px;">
                        <img src="img/email-icon.png"/>
                        <span><a href="mailto:chathura@cse.mrt.ac.lk">chathura@cse.mrt.ac.lk</a></span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <?php require_once './footer.php'; ?>
        <?php include_once 'scripts.inc.php'; ?>
        <?php require_once './common.inc.php'; ?>
        <script type="text/javascript">
            $("#accordion").accordion({
                autoHeight: true,
                navigation: true,
                collapsible: true,
                active: false,
                heightStyle: "content"
            });
            $("#accordion").click(function() {
                var href = $(this).attr("href");
                if(href && href !== '') {
                    window.open(href, '_blank');
                } else {
                    //premiumFeature();
                }
                return false;
            });

        </script>

    </body>
</html>

<?php
function getHtmlForPartnership($partnership) {
    $color = 'orangeColor';
    $html = '<h3 class="'.$color.' clearfix">';
    $html = $html . '<div class="descriptionArea" style="height:90px;">';
    $html = $html . '<img style="margin-top:10px;height: 80px;width: 80px;" src="img/partnership.png"/>';
    $html = $html . '<div style="margin-left:100px;margin-top:-80px;"><span class="title" style="font-weight: bold;">' . $partnership->name.'</span>';
    $html = $html . '<p style="font-size: 14px; margin-top: 5px !important;">'. $partnership->short_desc .'</p>';
    $html = $html . '</div></div>';
    $html = $html . '</h3>';
    $html = $html . '<div class="contentData clearfix">';
    $html = $html . '<p>';
    $html = $html .  $partnership -> description ;
    $html = $html . '</p>';
    $html = $html . '</div>';

    return $html;
}
?>
