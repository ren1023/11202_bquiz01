<?php
include_once "db.php";
$table=$_POST['table'];//取得資料表名稱

$DB=${(ucfirst($table))};//將資料表名稱轉成首字大寫的資料表物件變數

$data=$DB->find(1);//撈取id為1的這筆資料

$data[$table]=$_POST[$table];//將資料中對應的欄位修改為POST過來的值

$DB->save($data);//使用save更新至資料表

to("../back.php?do=$table");
?>