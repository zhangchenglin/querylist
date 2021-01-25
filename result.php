<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

global $errorCode;


if ($_GET) $errorCode = -1;
if (empty($_POST)) $errorCode = -2;

if (!isset($_POST['method'])) $errorCode = -3;
if (!isset($_POST['url'])) $errorCode = -4;

if (empty($_POST['method'])) $errorCode = -5;
if (empty($_POST['url'])) $errorCode = -6;

if ($errorCode < 0) {
    $data_result = [
        'code' => $errorCode
    ];
    exit(json_encode($data_result, JSON_UNESCAPED_UNICODE));
}

$method = $_POST['method'];
$url = $_POST['url'];

switch ($method) {
    case 'queryList':
        require_once dirname(__FILE__) . '/functions/queryList.php';
        break;
    default:
        $errorCode = [
            'code' => -7,
            'msg' => 'method参数错误，文件不存在。',
        ];

        exit(json_encode($errorCode, JSON_UNESCAPED_UNICODE));
}

global $data;

// ---------------------------------------------------------------------------------------------------------------------
//$data_result = ['result' => $data];
//$data_result = json_encode($data_result, JSON_UNESCAPED_UNICODE);
//
//$data_result = str_replace('\r\n', '', $data_result);
//$data_result = str_replace(' ', '', $data_result);
//$data_result = str_replace(' ', '', $data_result);
//
//echo $data_result;

// ---------------------------------------------------------------------------------------------------------------------

$data = json_encode($data, JSON_UNESCAPED_UNICODE);

$data = str_replace('\r\n', '', $data);
$data = str_replace(' ', '', $data);
$data = str_replace(' ', '', $data);

echo $data;

// ---------------------------------------------------------------------------------------------------------------------
