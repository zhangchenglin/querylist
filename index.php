<?php
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', 100);

global $data_result;

?>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QueryList</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="d-flex flex-column align-items-center ">
        <div class="fs-4">待整理数据地址</div>
        <a class="fs-5 text-decoration-none" target="_blank"
           href="http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html">
            www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html
        </a>
    </div>
    <div class="d-flex justify-content-center" id="ql_methods">
        <div class="mt-5 row-cols-2 gx-1">
            <button class="col-auto btn btn-outline-success" type="button" id="find">按find方式查看</button>
            <button class="col-auto btn btn-outline-success" type="button" id="rules">按rules方式查看</button>
        </div>
    </div>
</div>
<div class="container" id="dataResult"></div>

<div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</div>
<script>
    $().ready(function () {
        let ql_methods = document.querySelector('#ql_methods');
        [].slice.call(ql_methods.querySelectorAll('button')).forEach(function (currentBtn) {
            currentBtn.addEventListener('click', function () {
                getResult(currentBtn.id);
            })
        })
    });

    function getResult(Method) {
        $.ajax({
            method: 'post',
            url: './result.php',
            cache: false,
            dataType: 'json',
            timeout: 100e3,
            data: {
                method: Method,
                url: 'http://www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html'
            },
            success: function (successData) {
                console.log(successData);
                document.querySelector('#dataResult').innerHTML = successData;
            },
            error: function (errorData) {
                console.log(errorData);
            }
        });
    }
</script>
</body>
</html>
