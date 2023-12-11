<h3>新增最新消息資料
    <!-- <?= $_GET['table']; ?> 可以用此方法確認是否有收到來源網頁傳來的值-->
</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息資料</td>
            <td>
                <!-- textarea這個tag，不要有斷行，若斷行會造成不必要的空白 -->
                <textarea type="text" name="text" style="width:300px;height:150px;"></textarea>
            </td>
        </tr>
    </table>

    <div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>