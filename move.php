<?php
require_once('config.php');

$params = getopt(null, ['from:', 'to:']);

if (!isset($params['from'])) {
    die('--from is missing');
}

if (!isset($params['to'])) {
    die('--to is missing');
}

// set up basic connection
$conn_id = ftp_connect(FTP_HOST);

// login with username and password
$login_result = ftp_login($conn_id, FTP_USER, FTP_PASSWORD);

// try to rename $old_file to $new_file
if (ftp_rename($conn_id, $params['from'], $params['to'])) {
    echo 'Successfully renamed ' . $params['from'] . ' to ' . $params['to'];
} else {
    echo 'There was a problem while renaming ' . $params['from'] . ' to ' . $params['to'];
}

// close the connection
ftp_close($conn_id);
