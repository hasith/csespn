<div id="header">
    <div class="container clearfix">

        <div id="logo">
            <a href="./index.php"><img src="img/logo.jpg" /></a>
        </div>

        <div id="nav">
            <ul class="clearfix">
                <li><a href="#benefit_bookmark">Partner Benefits</a></li>
                <li><a href="http://www.cse.mrt.ac.lk/" target="_blank">Department Website</a></li>
                         <?php
                             if(oauth_session_exists()){
                                 //echo '<li><a href="./events.php">' . 'Portal' . '</a></li>';
                                 //echo '<li><a href=' . "./logout.php" . ">Logout</a></li>";
                                 echo '<li><a href=' . "./landing.php" . ">Access the Portal</a></li>";
                             }else{
                                 echo '<li><a href=' . "./login.php?lType=initiate" . ">Connect with LinkedIn</a></li>";
                             }
                         ?>
            </ul>
        </div>                
    </div>
</div>