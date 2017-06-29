<?php

if( !empty($_POST) ){

    //--YOUR OTHER CODING--
    //...........

    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    //$redirect_url = 'https://example.com/forms/thank-you/'; //-->MUST BE 'https://';

    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: *.ampproject.org");
    header("AMP-Access-Control-Allow-Source-Origin: ".$domain_url);

    if( $_POST['email'] == 'email@test.com' ){ //-->SAMPLE Valiation!
        //-->Any 40X status code! 
        //Reference-1: https://github.com/ampproject/amphtml/issues/6058
        //Reference-2: http://php.net/manual/pt_BR/function.http-response-code.php
        header("HTTP/1.0 412 Precondition Failed", true, 412);
        echo json_encode(array('errmsg'=>'This email already exist!'));
        die();
    }else{
        //--Assuming all validations are good here--
       /* if( empty($redirect_url) ){
            header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
        }
		else{
            header("AMP-Redirect-To: ".$redirect_url);
            header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
        }*/
		
		header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
		
        echo json_encode(
				array(
				'successmsg' =>	'My success message. [It will be displayed shortly(!) if with redirect]',
				'name' => $_POST['name']
				)
			);
        die();
    }
}