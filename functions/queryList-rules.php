<?php
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', 100);

use QL\QueryList;

global $url;
$verifyUrl = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$find_code = 'tr:gt(12) td:eq(1)';
$find_name = 'tr:gt(12) td:eq(2)';
$find_parent = 'tr:gt(2) td:eq(3)';
$rules = [
    'code' => [$find_code, 'text'],
    'name' => [$find_name, 'text', '-span'],
    'parent' => [$find_parent, 'text', '', function () {
        return '0000';
    }],
];

$ql = (new QueryList)->get($url);

$data = $ql->rules($rules)->range('')->queryData();

$ql->destruct();
