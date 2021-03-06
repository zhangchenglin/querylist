<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

// 简单判断客户端来的内容，无实际意义
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

// 仅使用QueryList采集数据，采集回来单独进行数据整理，这样速度能控制在几秒内完成
$url = $_POST['url'];
require_once dirname(__FILE__) . '/functions/queryList.php';
global $data;

// 整理数据，去掉无用字符
$data = json_encode($data, JSON_UNESCAPED_UNICODE);

$data = str_replace('\r\n', '', $data);
$data = str_replace(' ', '', $data);
$data = str_replace(' ', '', $data);

// 重构数据结果的格式
$data = json_decode($data, true, 512, JSON_FORCE_OBJECT);

$newData = [];
foreach ($data as $index => $key) {
    $id = mb_substr($key, 0, 6);
//    echo $id . "<br>\r\n";

    $name = mb_substr($key, 6);
//    echo $name . "<br>\r\n";// todo:好奇怪，取消这类注释，就能顺利输出最后一组循环，无论最后一组循环是谁。否则不能顺利收尾JSON字符串

    $parent = '';
    $parentX = mb_substr($id, 2);
    if (mb_substr($id, 2) === '0000') {
        $level = '省级';
        $parent = '0';
    } elseif (mb_substr($id, 4) === '00') {
        $level = '市级';
        $parent = mb_substr($id, 0, 2) . '0000';
    } else {
        $level = '区级';
        $parent = mb_substr($id, 0, 4) . '00';
    }

    $newData[$index] = [
        "name" => (string)$name,
        "id" => (string)$id,
        "parent" => (string)$parent,
        "level" => (string)$level,
    ];
}


// 输出结果
echo json_encode($newData, JSON_UNESCAPED_UNICODE);
