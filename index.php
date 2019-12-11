<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .mark {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        height: 3.8rem;
        line-height: 3.8rem;
        width: 30%;
        text-align: center;
        font-size: 0.28rem;
        color: #fff;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 1.1rem;
    }
</style>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<body>
<div>
    <button id="test">点击</button>
</div>
<script>
    function myalert(str) {
        var div = '<div class="mark"></div>';
        $('body').append(div)
        $('.mark').html(str);
        $('.mark').show();
        setTimeout(function() {
            $('.mark').hide();
            $('.mark').remove();
        }, 2000)
    }
    $('#test').click(function () {
        myalert('Good');
    })
</script>
</body>
</html>