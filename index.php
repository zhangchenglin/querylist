<?php
ini_set('max_execution_time', 100);

use McaSpider\AreaSpider;

require_once dirname(__FILE__) . '/vendor/autoload.php';

$url = 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html';

$xxx = new AreaSpider($url);

$rules = [];
//$rules['code'] = [''];
//$rules['name'] = [''];
$rules['code'] = ['tr[height="19"]:nth-of-type(n+4) td:nth-of-type(2)', 'text','-td:empty'];
$rules['name'] = ['tr[height="19"]:nth-of-type(n+4) td:nth-of-type(3)', 'text'];
$rules['parent'] = ['td','text'];

echo '<br>';
echo $url;
echo '<hr>';
echo '<br>';
echo json_encode($xxx->SpiderMcaAreaArrayResult($rules), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo '<br><br>';
