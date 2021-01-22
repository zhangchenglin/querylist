<?php

use QL\QueryList;

ini_set('max_execution_time', 100);


require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$table = QueryList::html($url)->find('table');


// 采集表头
//$tableHeader = $table->find('tr:eq(1)')->find('td')->texts();
$tableHeader = $table->find('tr:eq(2) td:eq(1)')->texts();
// 采集表的每行内容
//$tableRows = $table->find('tr:gt(0)')->map(function ($row) {
//    return $row->find('td')->texts()->all();
//});

echo '<br>';
echo $url;
echo '<hr>';
echo '<br>';
echo '<br><br>';

print_r($tableHeader->all());
print_r(json_encode($tableHeader->all()));

//print_r($tableRows->all());
//print_r(json_encode($tableRows->all()));
