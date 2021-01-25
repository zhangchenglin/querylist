<?php

use QL\QueryList;

global $url;
$mcaUrl = $url;

$find_tr = 'tr:gt(2)';

$ql = new QueryList;

$data = $ql
    ->get($mcaUrl)
    ->find($find_tr)
    ->texts()
    ->all();

$ql->destruct();
