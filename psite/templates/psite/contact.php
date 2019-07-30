<?php
/*
 * CONFIGURING EVERYTHING
 */
 // an email address that will be in the From field of the email.
$from = 'Demo contact form <memail20@protonmail.com>';

// an email address that will receive the email with the output of the form
$sendTo = 'Demo contact form <gutenfair@gmail.com>';

// subject of the email
$subject = 'Message from RwandAg';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Name', 'lastname' => 'Lastname', 'email' => 'Email', 'phone' => 'Phone', 'activity' => 'Activity', 'district' => 'District', 'message' => 'Message');

// message that will be displayed when everything is OK :)
$okMessage = 'Message sent successfully! RwandAg team member will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');

    $emailText = "You have a message from RwandAg\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // All the neccessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );

    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
