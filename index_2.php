<?php

use QL\QueryList;

ini_set('max_execution_time', 100);


require_once dirname(__FILE__) . '/vendor/autoload.php';

$html = <<<STR
    <div>
        <table>
            <tr>
                <td>姓名</td>
                <td>年龄</td>
                <td>职位</td>
            </tr>
            <tr>
                <td>Rae</td>
                <td>29</td>
                <td>医生</td>
            </tr>
            <tr>
                <td>Marsh</td>
                <td>56</td>
                <td>牧师</td>
            </tr>
            <tr>
                <td>Solomon</td>
                <td>18</td>
                <td>作家</td>
            </tr>
        </table>
    </div>
STR;

$table = QueryList::html($html)->find('table');

// 采集表头
$tableHeader = $table->find('tr:eq(0)')->find('td')->texts();
// 采集表的每行内容
$tableRows = $table->find('tr:gt(0)')->map(function ($row) {
    return $row->find('td')->texts()->all();
});


echo '<br>';
echo $html;
echo '<hr>';
echo '<br>';
echo '<br><br>';

print_r($tableHeader->all());
echo '<br><br><hr><br>';
print_r($tableRows->all());
echo '<br><br><hr><br>';
print_r(json_encode($tableHeader->all(), JSON_UNESCAPED_UNICODE));
echo '<br><br><hr><br>';
print_r(json_encode($tableRows->all(), JSON_UNESCAPED_UNICODE));
