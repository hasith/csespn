<?php
require_once './global.inc.php';
verify_oauth_session_exists();

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

            <div id="bannerArea" class="clearfix signInArea">
                
                <div style="padding-bottom: 30px;color: #888;">
					If you are a CSE Student of any of the below batches, you may register yourself into the portal by entering your
					CSE email address. We will send a new key you you by email, which you need to enter below to confirm your
					CSE studentship.<br/> <br/>
					
					<h4>STEP 1: Request for a Key </h4>
					<form action="" method="POST" id="sendKey">
						<input type="text" id="emailname" required>
						<select id="emailbatch">
							<?php
							$batchtools = new BatchTools();
							$batches = $batchtools->getAllBatches();
							foreach($batches as $batch) {
								print '<option value="'.$batch->id.'">.'.$batch->id.'</option>';
							}
							?>
						</select>@cse.mrt.ac.lk 
						<label style="font-style: italic;" id="emaillbl"></label>
					
                    
                        <input name="email" type="hidden" id="emailHiddenInput" value="">
						<input name="batch" type="hidden" id="batchHiddenInput" value=""><br/>
						<button type="submit" style="margin-top:5px;">Send me a key</button>                      
                    </form>
					
					<?php
		
					if(isset($_POST['email'])) {
						 $email = $_POST['email'];
						 $batch = $_POST['batch'];
						 // for testing purposes this code is added to production
						 if(strrpos($email, 'hasith@gmail.com') !== false) {
						 	$email = 'hasith@gmail.com';
						 }
						 if (HttpSession::currentUser()->createAlumniReg($email, $batch) > 0) {
							 echo "<p style='color: #7E1313;font-size: 14px;'> An email is sent to '".$email."' 
							 with a key which is valid for next 24 hours. 
							 Please use that key below to complete the alumni registration. </p>";
						 }
			 
					}
		
					?>
					
					
					<br/><br/>
					<h4>STEP 2: Register by entering the recieved key</h4>
					<form action="" method="POST" id="confirm">
						Registration Key: <input type="text" name="regkey" size="50px" placeholder="Sent to you by Email" required>
						Your Student Id: <input type="text" name="studentid" size="20px" placeholder="(eg. 110005F)" required><br/>
						<button type="submit" style="margin-top:5px;">Complete Registration</button>
					</form>
					
					
					<?php
		
					if(isset($_POST['regkey'])) {
						
						 $key = $_POST['regkey'];
						 $studentid = $_POST['studentid'];
						 if (HttpSession::currentUser()->isAlumniRegComplete($key, $studentid)) {
							 // update linkedin information
							 $student = Student::getByUserId(HttpSession::currentUser()->id);
							 $student->extractFromLinkedin();
							 
						 	 echo "<p style='color: #7E1313;font-size: 14px;'> You are successfully registered as a student of CSE department. 
							 We will continuously extract your details from the linkedin profile, therefore please keep your 
							 Linkedin profile uptodate.</p>";
						 } else {
							 echo "<p style='color: #7E1313;font-size: 14px;'> Invalid key. Registration aborted.</p>";
						 }
								 
					}
					?>
                </div>
          
            </div>

        </div>


        <?php include_once 'scripts.inc.php'; ?>
        <script type="text/javascript" src="js/event.js"></script>
        <script type="text/javascript" src="js/student_reg.js"></script>
		
    </body>
</html>
