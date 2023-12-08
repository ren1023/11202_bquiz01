<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動態文字廣告管理</p>
    <form method="post" action="./api/edit.php">  <!-- ?表示是當前的檔案 -->
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="80%" style="text-align: left;">動態文字廣告</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                  <!-- 將資料顯示在畫面上 -->
                  <?php
                $rows = $Ad->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td >
                            <input type="text" name="text[<?=$row['id'];?>]" style="width:90%;" value="<?= $row['text'];?>">
                        </td>
                        <td >
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td >
                            <input type="checkbox" name="del[]" value="<?=$row['id']; ?>">
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動態文字廣告"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>