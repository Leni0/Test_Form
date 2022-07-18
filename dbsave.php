
<?php
/* Попытка подключения к серверу MySQL. Предполагая, что вы используете MySQL
 сервер с настройкой по умолчанию (пользователь root без пароля) */
$link = mysqli_connect("localhost", "c951848e_12345aa", "12345Aa_", "c951848e_12345aa");
 
// Проверьте подключение
if($link === false){
    die("ERROR: Нет подключения. " . mysqli_connect_error());
}
 
//  экранирует специальные символы в строке
$name = mysqli_real_escape_string($link, $_REQUEST['username']);
$phone = mysqli_real_escape_string($link, $_REQUEST['pho']);

$date = date("Y-m-d"); 
// Попытка выполнения запроса вставки
$sql = "INSERT INTO phones (name, phone,date) VALUES ('$name', '$phone','$date')";
if(mysqli_query($link, $sql)){
    echo "Succses.";
} else{
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
}
    echo "<a href=\"index.php\">Go Back</a>";
 
// Закрыть соединение
mysqli_close($link);
?>