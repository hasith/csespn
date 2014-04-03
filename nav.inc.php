        <div id="header">
            <div class="container clearfix">
                
                <div id="logo">
                    <a href="./index.php"><img src="img/logo.jpg" /></a>
                </div>
                
                <div id="nav">
                    <ul class="clearfix">
                        <li class="<?php if($pageName=='students'){echo 'active';}?>"><a href="./students.php">Students</a></li>
                        <li class="<?php if($pageName=='sessions'){echo 'active';}?>"><a href="./sessions.php">Sessions</a></li>
                        <li class="<?php if($pageName=='research'){echo 'active';}?>"><a href="./research.php">Research</a></li>
                        <li class="<?php if($pageName=='events'){echo 'active';}?>"><a href="./events.php">Events</a></li>
                        <?php
                           if(isset($_SESSION['user'])){
                                $user = $_SESSION['user'];
                                echo '<li><a href="">' . $user->display_name . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>                
            </div>
        </div>