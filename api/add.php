<?php
include_once "db.php";
// $_POST
// 有沒有上傳檔案
// 把？？table存進去
$DB=${ucfirst($_POST['table'])};    //當'table'這個參數吃到的值時，將第一個字母轉轉換成大寫。
$table=$_POST['table']; //將$_POST['table']的值，存到table這個變數中。
switch($table){
    case "admin":   //當table=admin時，將pw2這個欄位刪除。
        unset($_POST['pw2']);
        break;
        
}
if(isset($_FILES['img']['tmp_name'])){  //當有檔案時，則往下執行。
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);    //將檔案移到../img/這個資料夾
    $_POST['img']=$_FILES['img']['name'];   //將檔案名稱assign給$_POST['img']。
}else{
    $_POST['pw']=md5($_POST['pw']);
}

if($table != 'admin'){  //當table不等於'admin'時，才往下執行。
    $_POST['table']=($table=='title')?0:1;  //當table=title時，預設不顯示(0)。
}
unset($_POST['table']);// 從post來有多了一個欄位叫'table'！會與資料表對不上，故要將hidden的table的這個欄位刪除(unset)。
// echo print_r($_POST);  // 可印出陣列中的[text]欄位輸入的值。
// exit();
$DB->save($_POST);
// echo $DB->save($_POST);
// exit();
// echo "test";
// exit();
to("../back.php?do=$table");
?>