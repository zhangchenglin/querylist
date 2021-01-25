<?php

use QL\QueryList;

global $url;
$mcaUrl = $url;

$tr = 'tr:gt(2)';

$ql = new QueryList;

$find = $ql->get($mcaUrl)
    ->find($tr);

$all = $find->texts()
    ->all();

$data = $all;

$ql->destruct();

