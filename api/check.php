<?php
include_once "db.php";

// " ' or 1=1; "=> SQL injection;
// 解決 sql injection，將由表單接收來的資料，進行編碼後
$acc=htmlspecialchars($_POST['acc']);
$pw=htmlspecialchars($_POST['pw']);
if($Admin->count(['acc'=>$acc,'pw'=>$pw])>0){
    $_SESSION['login']=$acc;
    to("../back.php");

}else{
    to("../index.php?do=login&error=帳號或密碼錯誤");
}




?>