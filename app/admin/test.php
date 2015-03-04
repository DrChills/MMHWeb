<?php include_once "includes/dbconf.php"; ?>
<?php include_once "includes/productdetailvar.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="description" content="hire price list for marquee hrie">


<!-- CSS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/css.php'); ?>
<!-- CSS -->
<meta property='og:title' content='Marquee hire and equipment price list'/>


</head>

<body class="pull_top">
<!-- NAV
<?php // include( $_SERVER["DOCUMENT_ROOT"].'/template/nav.php'); ?> -->
<!-- NAV -->







<?php

include($_SERVER["DOCUMENT_ROOT"].'/admin/google-api-php-client-master\google-api-php-client-master/autoload.php');

$pdfFile = 'test.pdf';

// API Console: https://code.google.com/apis/console/
// Create an API project ("web applications") and put the client id and client secret in config.ini.
// Set up the Drive SDK in the API console.
// Create a Chrome extension, set the "container" and "api_console_project_id" parameters, and install it.
$config = parse_ini_file('config.ini'); // client_id, client_secret

// initialise the client
$client = new apiClient();
$client->setUseObjects(true);
$client->setAuthClass('apiOAuth2');
$client->setScopes(array('https://www.googleapis.com/auth/drive.file'));
$client->setClientId($config['188405902865-fs8t5n75apottjjjdl6v0e9pro3vkebf.apps.googleusercontent.com']);
$client->setClientSecret($config['yNRDM92CHSfwYlarJ3_MXb20']);
$client->setRedirectUri($config['http://mmh.localhost.app']);
$client->setAccessToken(authenticate($client));

// initialise the Google Drive service
$service = new apiDriveService($client);

// create and upload a new Google Drive file, including the data
try {
  $file = new DriveFile;
  $file->setTitle(basename($pdfFile));
  $file->setMimeType('application/pdf');
  
  $result = $service->files->insert($file, array('data' => file_get_contents($pdfFile), 'mimeType' => 'application/pdf'));
}
catch (Exception $e) {
  print $e->getMessage();
}

print_r($result);

function authenticate($client, $file = 'token.json'){
  if (file_exists($file)) return file_get_contents($file);

  $_GET['code'] = ''; // insert the verification code here

  // print the authentication URL
  if (!$_GET['code']) {
    exit($client->createAuthUrl(array('https://www.googleapis.com/auth/drive.file')) . "\n");
  }

  file_put_contents($file, $client->authenticate());
  exit('Authentication saved to token.json - now run this script again.');
}








?>











</body>
</html>





