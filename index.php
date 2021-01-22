<?php
ini_set('max_execution_time', 100);

use QL\QueryList;

require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';
$find = 'tr:gt(2) td:eq(1)';

$data = QueryList::get($url)->find($find)->texts();


$rules = [];
//$rules['code'] = [''];
//$rules['name'] = [''];
$rules['code'] = ['tr[height="19"]:nth-of-type(n+4) td:nth-of-type(2)', 'text', '-td:empty'];
$rules['name'] = ['tr[height="19"]:nth-of-type(n+4) td:nth-of-type(3)', 'text'];
$rules['parent'] = ['td', 'text'];

echo '<br>';
echo $url;
echo '<hr>';
echo '<br>';
echo print_r($data->all());
//echo json_encode(print_r($data->all()));
//echo '<br><br>';
