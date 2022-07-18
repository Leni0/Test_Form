<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
    <meta http-equiv="Content-type=text/html;charset=utf-8"/>
    <!-- jQuery -->
    <script type="text/javascript" src="http://code.changer.hk/jquery/1.11.2/jquery.min.js"></script>
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .table{
            width: 1000px;
            text-align: center;
        }
    </style>
    <title>Тест</title>
</head>
<body ng-controller = 'main'>

<form action = "dbsave.php"  id="loginform" method="POST">
	<div>
        Имя:
        <input type="text" name="username" id="username" />
        Телефон:
        <input type="text" name="pho" id="pho" />
        <input type="submit" name="loginBtn" id="loginBtn" value="Отправить" />
    </div>
</form>

    <div class="">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>№</td>
                    <td>Имя</td>
                    <td>Номер телефона</td>
                    <td>дата</td>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>
	
</body>
<script type="text/javascript">

$.ajax({
    type: 'POST',
    url: 'dbconnect.php',
    data:{
    },
    success: function (data) {
        //console.log(data);
        var a = data.split(' ');
        //console.log(a);
        var trStr = '';// Динамическая таблица сшивания
        for (var i = 0; i < a.length-1; i++) {
            trStr += '<tr class="example">';
            trStr += '<td width="15%">' + JSON.parse(a[i]).id + '</td>';
            trStr += '<td width="15%">' + JSON.parse(a[i]).name + '</td>';
            trStr += '<td width="15%">' + JSON.parse(a[i]).phone + '</td>';
            trStr += '<td>' + JSON.parse(a[i]).date + '</td>';
            trStr += '</tr>';  
        } 
        $("#tbody").html(trStr);
    }
});
</script>
</html>