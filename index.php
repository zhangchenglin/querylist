<?php ?>
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
    <div class="d-flex justify-content-end">
        <a class="text-decoration-none text-muted" href="index.php" target="_blank">新窗口打开本页</a>
    </div>
    <div class="d-flex flex-column align-items-center ">
        <div class="fs-4">待整理数据地址</div>
        <a class="fs-5 text-decoration-none" target="_blank"
           href="http://preview.www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html">
            http://preview.www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html
        </a>
    </div>
    <div class="d-flex flex-column justify-content-center" id="ql_methods">
        <input class="my-4 form-control-lg" type="url" aria-label="url" id="mcaUrl"
               value="http://preview.www.mca.gov.cn/article/sj/xzqh/2020/2020/202101041104.html">
        <div class="mt-5 align-self-center">
            <button class="col-auto btn btn-outline-success" type="button" id="queryList">按queryList方式查看</button>
        </div>
    </div>
</div>
<div class="mt-5 container" id="dataResult"></div>

<div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</div>
<script>
    $().ready(function () {
        [].slice.call(document.querySelectorAll('#ql_methods button')).forEach(function (currentBtn) {
            currentBtn.addEventListener('click', getResult)
        })
    });

    function getResult() {
        $.ajax({
            method: 'post',
            url: './result.php',
            cache: false,
            dataType: 'json',
            timeout: 10e3,
            data: {
                url: document.querySelector('#mcaUrl').value
            },
            success: function (successData) {
                successData = JSON.parse(successData).responseText;
                console.log(successData);
                document.querySelector('#dataResult').innerHTML = successData;
            },
            error: function (errorData) {
                console.log(errorData);
                document.querySelector('#dataResult').innerHTML = errorData;
            }
        });
    }
</script>
</body>
</html>
