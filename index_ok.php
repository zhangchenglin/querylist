<?php
ini_set('max_execution_time', 100);

use McaSpider\AreaSpider;

require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'https://segmentfault.com/';

$xxx = new AreaSpider($url);

$rules = [];
$rules['code'] = ['a[class="active-nav"]', 'text'];
$rules['name'] = ['a[class*="router-box-item"]', 'text'];
$rules['parent'] = ['h4[class="news__item-title mt0"]', 'text'];


echo '<br>';
echo $url;
echo '<hr>';
echo '<br>';
echo json_encode($xxx->SpiderMcaAreaArrayResult($rules), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo '<br><br>';
echo '<hr>';
echo '<br>';
echo print_r($xxx->SpiderMcaAreaArrayResult($rules),true);
echo '<br><br>';
echo '<hr>';
echo '<br>';
dump(json_encode($xxx->SpiderMcaAreaArrayResult($rules), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
echo '<br><br>';
