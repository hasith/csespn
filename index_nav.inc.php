<div id="header">
    <div class="container clearfix">

        <div id="logo">
            <a href="./index.php"><img src="img/logo.jpg" /></a>
        </div>

        <div id="nav">
            <ul class="clearfix">
                <li><a href="">Partner Benefits</a></li>
                         <li><a href="">Current Partners</a></li>
                         <?php
                             if(oauth_session_exists()){
                                 echo '<li><a href="./events.php">' . 'Portal' . '</a></li>';
                                 echo '<li><a href=' . "./login.php?lType=revoke" . ">Logout</a></li>";
                             }else{
                                 echo '<li><a href=' . "./login.php?lType=initiate" . ">Connect with LinkedIn</a></li>";
                             }
                         ?>
            </ul>
        </div>                
    </div>
</div>