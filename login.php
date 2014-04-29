<?php

require_once('global.inc.php');

try {
    // include the LinkedIn class
    require_once('linkedin_3.2.0.class.php');

    // start the session
    if (!session_start()) {
        throw new LinkedInException('This script requires session support, which appears to be disabled according to session_start().');
    }

    // display constants
    $API_CONFIG = array(
        'appKey' => '75d6pivzxrsxbo',
        'appSecret' => 'EglOAOQCTzy7pVLI',
        'callbackUrl' => NULL
    );

    // set index
    $_REQUEST[LINKEDIN::_GET_TYPE] = (isset($_REQUEST[LINKEDIN::_GET_TYPE])) ? $_REQUEST[LINKEDIN::_GET_TYPE] : '';
    switch ($_REQUEST[LINKEDIN::_GET_TYPE]) {
        case 'initiate':
            /**
             * Handle user initiated LinkedIn connection, create the LinkedIn object.
             */
            // check for the correct http protocol (i.e. is this script being served via http or https)
            if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https';
            } else {
                $protocol = 'http';
            }

            // set the callback url
            $API_CONFIG['callbackUrl'] = $protocol . '://' . $_SERVER['SERVER_NAME'] . ((isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] != 'PORT_HTTP') || ($_SERVER['SERVER_PORT'] != PORT_HTTP_SSL)) ? ':' . $_SERVER['SERVER_PORT'] : '') . $_SERVER['PHP_SELF'] . '?' . LINKEDIN::_GET_TYPE . '=initiate&' . LINKEDIN::_GET_RESPONSE . '=1';
            $OBJ_linkedin = new LinkedIn($API_CONFIG);

            // check for response from LinkedIn
            $_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
            if (!$_GET[LINKEDIN::_GET_RESPONSE]) {
                // LinkedIn hasn't sent us a response, the user is initiating the connection
                // send a request for a LinkedIn access token
                $response = $OBJ_linkedin->retrieveTokenRequest();
                if ($response['success'] === TRUE) {
                    // store the request token
                    $_SESSION['oauth']['linkedin']['request'] = $response['linkedin'];

                    // redirect the user to the LinkedIn authentication/authorisation page to initiate validation.
                    header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
                } else {
                    // bad token request
                    echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
                }
            } else {
                // LinkedIn has sent a response, user has granted permission, take the temp access token, the user's secret and the verifier to request the user's real secret key
                $response = $OBJ_linkedin->retrieveTokenAccess($_SESSION['oauth']['linkedin']['request']['oauth_token'], $_SESSION['oauth']['linkedin']['request']['oauth_token_secret'], $_GET['oauth_verifier']);
                if ($response['success'] === TRUE) {
                    // the request went through without an error, gather user's 'access' tokens
                    $_SESSION['oauth']['linkedin']['access'] = $response['linkedin'];

                    // set the user as authorized for future quick reference
                    $_SESSION['oauth']['linkedin']['authorized'] = TRUE;

                    $OBJ_linkedin = new LinkedIn($API_CONFIG);
                    $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
                    $OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
                    $response = $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url,skills,summary,languages,public-profile-url)');

                    $result = new SimpleXMLElement($response['linkedin']);
                    
                    if (Student::getStudent($result->{'public-profile-url'}) !== null) {
                        //User is a student
                        if (!User::checkUserExists($result->{'id'})) {
                            $user = new User();
                            $user->name = $result->{'first-name'} . " " . $result->{'last-name'};
                            $user->linkedin_id = $result->{'id'};
                            $user->pic_url = $result->{'picture-url'};
                            $user->profile_url = $result->{'public-profile-url'};
                            $user->company_id = Company::getStudentCompanyId();
                            $user->save(TRUE);
                        }
                        //adding the student skills and description
                        $student = Student::getStudent($result->{'public-profile-url'});
                        $student->description = $result->{'summary'};
                        $student->linkedin_id = $result->{'id'};
                        $student->oauth_token = $_SESSION['oauth']['linkedin']['access']['oauth_token'];
                        $student->oauth_token_secret = $_SESSION['oauth']['linkedin']['access']['oauth_token_secret'];
                        $student->save();
                    
                        $tech_count = intval($result->{'skills'}->attributes()->total);
                        for($i=0;$i<$tech_count;$i++){                            
                            $tech = $result->{'skills'}->{'skill'}[$i]->{'skill'}->{'name'} . "";
                            if(!Technology::checkTechnologyExists($tech)){
                                $technology = new Technology();
                                $technology->name = $tech;
                                $technology->save(TRUE);
                            }
                            $technology = Technology::getByName($tech);
                            if(!Endorsement::checkEndorsementExists($technology->id, $student->id)){
                                $endorsement = new Endorsement();
                                $endorsement->student_id = $student->id;
                                $endorsement->technology_id = $technology->id;
                                $endorsement->count = 1;
                                $endorsement->save(TRUE);
                            }
                        }            
                    } else {
                        if (!User::checkUserExists($result->{'id'})) {                            
                            //User is a new visitor
                            $user = new User();
                            $user->name = $result->{'first-name'} . " " . $result->{'last-name'};
                            $user->linkedin_id = $result->{'id'};
                            $user->pic_url = $result->{'picture-url'};
                            $user->company_id = Company::getPublicUserCompanyId();
                            $user->save(TRUE);
                        }
                    }                    
                    User::login($result->{'id'});
                    // redirect the user back to the demo page
                    header('Location: ./landing.php');
                } else {
                    // bad token access
                    echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
                }
            }
            break;

        case 'revoke':
            /**
             * Handle authorization revocation.
             */
            // check the session
            if (!oauth_session_exists()) {
                throw new LinkedInException('This script requires session support, which doesn\'t appear to be working correctly.');
            }

            $OBJ_linkedin = new LinkedIn($API_CONFIG);
            $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
            $response = $OBJ_linkedin->revoke();
            if ($response['success'] === TRUE) {
                // revocation successful, clear session
                session_unset();
                $_SESSION = array();
                if (session_destroy()) {
                    // session destroyed
                    header('Location: ' . $_SERVER['PHP_SELF']);
                } else {
                    // session not destroyed
                    echo "Error clearing user's session";
                }
            } else {
                // revocation failed
                echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
            }
            break;
        default:
            // nothing being passed back, display index page
            header('Location: ./');
            exit;
    }
} catch (LinkedInException $e) {
    // exception raised by library call
    echo $e->getMessage();
}
?>