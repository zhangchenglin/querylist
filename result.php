<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

global $errorCode;


if ($_GET) $errorCode = -1;
if (empty($_POST)) $errorCode = -2;

if (!isset($_POST['url'])) $errorCode = -4;

if (empty($_POST['url'])) $errorCode = -6;

if ($errorCode < 0) {
    $data_result = [
        'code' => $errorCode
    ];
    exit(json_encode($data_result, JSON_UNESCAPED_UNICODE));
}

$url = $_POST['url'];
require_once dirname(__FILE__) . '/functions/queryList.php';
global $data;

$data = json_encode($data, JSON_UNESCAPED_UNICODE);

$data = str_replace('\r\n', '', $data);
$data = str_replace(' ', '', $data);
$data = str_replace(' ', '', $data);

echo $data;
