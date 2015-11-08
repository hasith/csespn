<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52213235-1', 'auto');
  ga('send', 'pageview');
<?php
    if(oauth_session_exists()){ 
        $user = HttpSession::currentUser();  
        if($user && is_object($user)) {
			echo "ga(‘set’, ‘&uid’, {{".$user->id."}});";
	  	}
	}
?>
</script>
<div id="header">
    <div class="container clearfix">

        <div id="logo">
            <a href="./index.php"><img src="img/logo.jpg" /></a>
        </div>
        <div id="nav">
            <ul class="clearfix">
                <?php
                    if(oauth_session_exists()){ 
                        $user = HttpSession::currentUser();  
                        if($user && is_object($user)) {
                ?>
                        <li class="<?php if($pageName=='students'){echo 'active';}?>"><a href="./students.php">Students</a></li>
                        <li class="<?php if($pageName=='sessions'){echo 'active';}?>"><a href="./sessions.php">Sessions</a></li>
                        <li class="<?php if($pageName=='projects'){echo 'active';}?>"><a href="./projects.php">Research</a></li>
                        <li class="<?php if($pageName=='events'){echo 'active';}?>"><a href="./events.php">Events</a></li>
                        <li class="<?php if($pageName=='partnerships'){echo 'active';}?>"><a href="./partnerships.php">Partnerships</a></li>
                        <?php if ($user->getOrganization()->access_level > 4) { ?>
                        <li class="<?php if($pageName== 'admin') {echo 'active';}?>"><a href="./admin.users.php">Admin</a></li> 
                        <?php } ?>
                <?php     
                		
                        
                            echo '<li title="'.$user->name.' as '.$user->getOrganization()->name.'"><a href=' . "./logout.php" . ">[Logout]</a></li>";
                        } else {
                            echo '<li><a href=' . "./logout.php" . ">Logout</a></li>";
                        }
                        
                    }else{
                    	
                        echo '<li><a href=' . "./login.php?lType=initiate" . ">Connect with LinkedIn</a></li>";
                    }
                ?>
            </ul>
        </div>                
    </div>
</div>