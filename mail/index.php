<?php
require_once ("vendor/Mail.class.php");
$obj = new Mail();
$result = $obj->sendMail("这是一个标题","这是一个内容",'邮箱地址');
var_dump($result);