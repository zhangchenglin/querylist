<?php
ini_set('max_execution_time', 100);

use QL\QueryList;

require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$find = 'tr:eq(3) td:eq(2)';








$data = (new QueryList)
    ->get($url)
    ->find($find)
    ->texts()
    ->all();

// ---------------------------------------------------------------------------------------------------------------------

echo '<br>';
echo $url;
echo '<hr><br>';
echo print_r($data);
echo '<hr>';
echo json_encode($data, JSON_UNESCAPED_UNICODE);
echo '<hr>';
