<h3>新增動畫圖片
    <!-- <?= $_GET['table']; ?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>動畫圖片：</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
      
       
    </table>

    <div>
        <input type="hidden" name="table" value="<?= $_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>