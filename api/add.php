<?php
include_once "db.php";
// $_POST
// 有沒有上傳檔案
// 把？？table存進去
$DB=${ucfirst($_POST['table'])};
$table=$_POST['table'];
switch($table){
    case "admin":
        unset($_POST['pw2']);
        break;
}
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}
if($table != 'admin'){
    $_POST['table']=($table=='title')?0:1;
}
unset($_POST['table']);// 從post來有多了一個欄位！會與資料表對不上，故要將hidden的table的這個欄位刪除(unset)。
$DB->save($_POST);
// echo "test";
// exit();
to("../back.php?do=$table");
?>