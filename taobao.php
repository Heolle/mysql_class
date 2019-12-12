<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
<div>
    <input type="text" id="Search_for_goods">
    <input type="button" value="搜索" onclick="Search()">
    <ol id="Goods" style="list-style-type:decimal;">
    <li>商品列表</li>
    </ol>
</div>

<script>
function Search(){
    var goods=$('#Search_for_goods').val();
    $.get("http://suggest.taobao.com/sug?code=utf-8&q="+goods+"&callback=cb",function(res){
        $("#Goods").empty();
        for (var i=0;i<res.result.length;i++){
            $('#Goods').append('<li>'+res.result[i][0]+'</li>')
        }
    },'JSONP');
}
</script>
</body>
</html>