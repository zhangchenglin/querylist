<?php
ini_set('max_execution_time', 100);

use QL\QueryList;

require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$find_code = 'tr:eq(3) td:eq(1)';
$find_name = 'tr:eq(3) td:eq(2)';
$find_parent = 'tr:eq(3) td:eq(3)';
$rules = [
    'code' => [$find_code, 'text'],
    'name' => [$find_name, 'text'],
    'parent' => [$find_parent, 'text'],
];

$data = (new QueryList)
    ->get($url)
    ->rules($rules)
    ->range('')
    ->queryData();

// ---------------------------------------------------------------------------------------------------------------------

echo '<br>';
echo $url;
echo '<hr><br>';
echo print_r($data);
echo '<hr>';
echo json_encode($data, JSON_UNESCAPED_UNICODE);
echo '<hr>';
