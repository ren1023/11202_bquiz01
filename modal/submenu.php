<?php include_once "../api/db.php";?>
<h3>編輯次選單
    <!-- <?=$_GET['table'];?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table class="cent" id="sub">
        <tr>
            <td>次選單名稱：</td>
            <td>次選單連結網址：</td>
            <td>刪除</td>
        </tr>
        <?php
        $subs=$Menu->all(['menu_id'=>$_GET['id']]);
        foreach($subs as $sub){
        ?>
        <tr>
            <td><input type="text" name="text[]" value="<?=$sub['text'];?>"></td>
            <td><input type="text" name="href[]" value="<?=$sub['href'];?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$sub['id'];?>"></td>
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
        </tr>
        <?php
        }
        ?>

    </table>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="hidden" name="menu_id" value="<?=$_GET['id'];?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">   <!-- 當點下去後，新增次選單欄位出來給使用者填 -->
    </div>
</form>
<script>
function more(){
    let item=`<tr>
            <td><input type="text" name="add_text[]" id=""></td>
            <td><input type="text" name="add_href[]" id=""></td>
        </tr>`
    $("#sub").append(item); //當id=sub時，就去執行 let item，新增 td的欄位給使用者填，新增次選單的內容

}
</script>