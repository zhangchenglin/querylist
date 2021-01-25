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

// 使用QueryList采集数据
$url = $_POST['url'];
require_once dirname(__FILE__) . '/functions/queryList.php';
global $data;

// 整理数据，去掉无用字符
$data = json_encode($data, JSON_UNESCAPED_UNICODE);

$data = str_replace('\r\n', '', $data);
$data = str_replace(' ', '', $data);
$data = str_replace(' ', '', $data);

// 重构数据结果的格式
$data = json_decode($data);

$newData = [];

foreach ($data as $key) {
    $id = substr($key, 0, 6);
//    echo $id . "<br>\r\n";

    $name = substr($key, 6) . '';
//    echo $name . "<br>\r\n";

    if (number_format($id, 0)) {
        $newData[] = [
            'id' => (int)$id,
//            'name' => (string)$name,// todo:不能正常引用，因为其中原页面包含了未知字符（可能是最后注的序号2和3后面的小数点符合引起number_format()的错误），而且不能被substr() 正常截取
        ];
    }

}

// 输出结果
echo json_encode($newData);
