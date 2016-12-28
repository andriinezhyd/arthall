<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>форма обратной связи</title>
<meta http-equiv="Refresh" content="4; URL=<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/fashion.html'; ?>"> <!-- редирект на нужную страицу через 4 секунды-->
</head>
<body>

<?php
 
$sendto   = "anastasiia.seredniia@gmail.com"; // почта, на которую будет приходить письмо !!! Измените на свою!!!  anastasiia.seredniia@gmail.com
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['telephone']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = $_POST['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
// проверяем наличие данных в радиокнопке  и сохраняем их
$group = '';
if (empty($_POST["group"]))
{
    $group = "Ваш курс Fashion не интересен";
}
elseif (!empty($_POST["group"]) && is_array($_POST["group"]))
{
    $group = implode(" ", $_POST["group"]);
}

// проверяем наличие данных в радиокнопке  и сохраняем их
$special = '';
if (empty($_POST["special"]))
{
    $special = "Индивидуально заниматься не требуется";
}
elseif (!empty($_POST["special"]) && is_array($_POST["special"]))
{
    $special = implode(" ", $_POST["special"]);
}

// $tPlan =$_POST ['tPlan']; // сохраняем данные из выподающего списка

// Формирование заголовка письма
$subject  = "Новое сообщение";
$headers  = "From: " . strip_tags($usermail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
 
// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "<p><strong>Дополнительные параметры:<br/> </strong> ".$group."</p>\r\n";
$msg .= "<p>".$special."</p>\r\n";
// $msg .= "<p>".$tPlan."</p>\r\n";
$msg .= "</body></html>";
 
// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
    echo "<center><img src='images/spasibo.png'></center>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
} else {
    echo "<center><img src='images/ne-tpravleno.png'></center>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
}
 
?>

</body>
</html>