<?php
error_reporting(E_ALL);

if ( !$_POST ) exit;

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$secretKey	 = '6LelmzAUAAAAAKmKMoLgOgen0QxzqQi0PjyTHcJ6';
$ip		 = $_SERVER['REMOTE_ADDR'];


// Email address verification, do not edit.
function isEmail( $email ) {
    return(preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email ));
}

function curlSubmit( $url, $params ) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                http_build_query( $params ) );

    // in real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);

    if ( $httpcode == 200 ) {
        return $server_output;
    }

    return false;
}

if ( !defined( "PHP_EOL" ) ) define( "PHP_EOL", "\r\n" );

$name		 = $_POST['name'];
$email		 = $_POST['email'];
$comments	 = $_POST['comments'];
$captcha	 = (isset( $_POST['captcha'] )) ? $_POST['captcha'] : '';


if ( trim( $name ) == '' ) {
    echo '<div class="error_message alert alert-danger">Attention! You must enter your name.</div>';
    exit();
} else if ( trim( $email ) == '' ) {
    echo '<div class="error_message alert alert-danger">Attention! Please enter a valid email address.</div>';
    exit();
} else if ( !isEmail( $email ) ) {
    echo '<div class="error_message alert alert-danger">Attention! You have enter an invalid e-mail address, try again.</div>';
    exit();
} else if ( trim( $comments ) == '' ) {
    echo '<div class="error_message alert alert-danger">Attention! Please enter your message.</div>';
    exit();
}

if ( get_magic_quotes_gpc() ) {
    $comments = stripslashes( $comments );
}

$address = "sugotech@gmail.com";

$e_subject		 = 'You\'ve been contacted by ' . $name . '.';
$e_body			 = "You have been contacted by $name, their additional message is as follows." . PHP_EOL . PHP_EOL;
$e_content		 = "\"$comments\"" . PHP_EOL . PHP_EOL;
$e_reply		 = "You can contact $name via email, $email";

//echo 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . "&response=" . $captcha;exit;
$response		 =  curlSubmit( $protocol . "www.google.com/recaptcha/api/siteverify", array( 'secret' => $secretKey, 'response' => $captcha, 'remoteip' => $ip ) ); //file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip );
//$response        = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . "&response=" . $captcha );

if ( ! $response ) {
    echo '<div class="error_message alert alert-danger">Attention! An empty responsse from Re-Captcha.</div>';
    exit();
}
$decoded_response	 = json_decode( $response, true );
if ( intval( $decoded_response['success'] ) !== 1 ) {
    echo '<div class="error_message alert alert-danger">Attention! Invalid Captcha. Please select valid Image.</div>';
    exit();
}
$msg	 = wordwrap( $e_body . $e_content . $e_reply, 70 );
$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if ( mail( $address, $e_subject, $msg, $headers ) ) {
    echo "<fieldset>";
    echo "<div class='success_page alert alert-success'>";
    echo "<h1 class='alert-link'>Email Sent Successfully.</h1>";
    echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
    echo "</div>";
    echo "</fieldset>";
} else {
    echo "<fieldset>";
    echo "<div class='success_page alert alert-success'>";
    echo "<h1>Email Sent Successfully.</h1>";
    echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
    echo "</div>";
    echo "</fieldset>";
}