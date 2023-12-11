<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php"> <!-- ?表示是當前的檔案 -->
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="70%">動畫圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td>更換動畫</td>
                </tr>
                <!-- 將資料顯示在畫面上 -->
                <?php
                // $DB=${ucfirst($do)};
                $rows = $DB->all(); //直接使用DB這個物件中的all方法，撈取資料。
                foreach ($rows as $row) {   //逐筆呈現所有的資料。

                ?>
                    <tr>
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:150px;height:100px;"> <!-- 動畫圖片資料欄 -->
                        </td>

                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>"> <!-- id欄位，但不顯示在畫面上 -->

                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>> <!-- 顯示資料與否，顯示=1，不顯示=0 -->
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>"> <!-- 此欄位帶id，之後會使用在刪除資料上 -->
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更換動畫"> <!-- 將do這個變數的值和id的值傳至edit.php -->
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動畫圖片">    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>