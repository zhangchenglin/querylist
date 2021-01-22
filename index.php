<?php
ini_set('max_execution_time', 100);

use QL\QueryList;

require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$find_tr = 'tr:gt(2)';
$find_code = 'tr:gt(2) td:eq(1)';
$find_name = 'tr:gt(2) td:eq(2)';
$find_parent = 'tr:gt(2) td:eq(3)';

$data = (new QueryList)
    ->get($url)
    ->find($find_tr)
    ->map(function ($row) {
        return $row->find('td:eq(1)')->texts()->all();
    })
    ->all();


// ---------------------------------------------------------------------------------------------------------------------

echo '<br>';
echo $url;
echo '<hr><br>';
//echo print_r($data, true);
//echo '<hr>';
echo json_encode($data, JSON_UNESCAPED_UNICODE);
echo '<hr>';
