<?php

use QL\QueryList;

global $url;
$verifyUrl = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$find_tr = 'tr:gt(2)';

$ql = (new QueryList)->get($url);

$data = $ql->find($find_tr)->texts()->all();

$ql->destruct();
