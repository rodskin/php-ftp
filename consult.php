<?php
if (!is_file('config.php')) {
    die('config file missing');
}
require_once('config.php');

$params = getopt(null, ['path:']);

if (!isset($params['path'])) {
    die('--path is missing');
}
// set up basic connection
$conn_id = ftp_connect(FTP_HOST);

// login with username and password
$login_result = ftp_login($conn_id, FTP_USER, FTP_PASSWORD);

// get contents of the current directory
$contents = ftp_nlist($conn_id, $params['path']);

// output $contents
print_r($contents);

// close the connection
ftp_close($conn_id);
