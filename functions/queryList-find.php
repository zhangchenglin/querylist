<?php
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', 100);

use QL\QueryList;

global $url;
$verifyUrl = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$find_tr = 'tr:gt(2)';

$ql = (new QueryList)->get($url);

$data = $ql->find($find_tr)
    ->map(function ($row) {
        $find_code = 'td:eq(1)';
        $find_name = 'td:eq(2)';
        $find_parent = 'td:eq(3)';


// ---------------------------------------------------------------------------------------------------------------------
        $array = [];

//        array_push($array, $row->find($find_code)->texts()->all(), $row->find($find_name)->texts()->all(), $row->find($find_parent)->texts()->all());
// -----------------------------------------------------------------------------
        $array['code'] = $row->find($find_code)->texts()->all();
        $array['name'] = $row->find($find_name)->texts()->all();
        $array['parent'] = $row->find($find_parent)->texts()->all();
// -----------------------------------------------------------------------------
//        $array = [
//            $row->find($find_code)->texts()->all(),
//            $row->find($find_name)->texts()->all(),
//            $row->find($find_parent)->texts()->all(),
//        ];
// -----------------------------------------------------------------------------
        return $array;

        // todo:下面的本意是想过滤掉名称中的span元素里的空格，失败
//        return $row->find('span')->texts()->remove()->find($find_name)->texts()->all();
    })
    ->all();

$ql->destruct();
