<?php
ini_set('max_execution_time', 100);

use QL\QueryList;

require_once dirname(__FILE__) . '/vendor/autoload.php';

//获取每个li里面的h3标签内容，和class为item的元素内容

$html = <<<STR
    <div id="demo">
        <ul>
            <li>
                <h3>xxx</h3>
                <div class="list">
                    <div class="item">item1</div>
                    <div class="item">item2</div>
                </div>
            </li>
            <li>
                <h3>xxx2</h3>
                <div class="list">
                    <div class="item">item12</div>
                    <div class="item">item22</div>
                </div>
            </li>
        </ul>
    </div>
STR;

$data = QueryList::html($html)
    ->rules(
        [
            'title' => ['h3', 'text'],
            'list' => ['.list', 'html']
        ]
    )
    ->range('#demo li')
    ->queryData(function ($item) {
        // 注意这里的QueryList对象与上面的QueryList对象是同一个对象
        // 所以这里要重置range()参数，否则会共用前面的range()参数，导致出现采集不到结果的诡异现象
        $item['list'] = QueryList::html($item['list'])
            ->rules(
                [
                    'item' => ['.item', 'text']
                ]
            )
            ->range('')
            ->queryData();
        return $item;
    });


echo '<br>';
echo $html;
echo '<hr>';
echo '<br>';
echo print_r($data);
echo '<br>';
echo '<hr>';
echo json_encode($data);
//echo '<br><br>';
