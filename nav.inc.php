<div id="header">
    <div class="container clearfix">

        <div id="logo">
            <a href="./index.php"><img src="img/logo.jpg" /></a>
        </div>
        <div id="nav">
            <ul class="clearfix">
                <?php
                    if(oauth_session_exists()){ 
                ?>
                        <li class="<?php if($pageName=='students'){echo 'active';}?>"><a href="./students.php">Students</a></li>
                        <li class="<?php if($pageName=='sessions'){echo 'active';}?>"><a href="./sessions.php">Sessions</a></li>
                        <li class="<?php if($pageName=='research'){echo 'active';}?>"><a href="./research.php">Research</a></li>
                        <li class="<?php if($pageName=='events'){echo 'active';}?>"><a href="./events.php">Events</a></li>  
                        <li class="<?php if($pageName== 'admin') {echo 'active';}?>"><a href="./admin.users.php">Admin</a></li>                     
                <?php     
                		$user = User::currentUser();                   
                        echo '<li title="'.$user->name.' as '.$user->getOrganization()->name.'"><a href=' . "./logout.php" . ">Logout</a></li>";
                    }else{
                    	
                        echo '<li><a href=' . "./login.php?lType=initiate" . ">Connect with LinkedIn</a></li>";
                    }
                ?>
            </ul>
        </div>                
    </div>
</div>