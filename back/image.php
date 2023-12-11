<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">  <!-- ?表示是當前的檔案 -->
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td>更換動畫</td>
                </tr>
                <?php
                // $DB=${ucfirst($do)};改寫在db.php裡
                // $rows = $DB->all();
                /*處理分頁問題 _start*/
                $total = $DB->count(); // 計算資料庫的總筆數
                $div = 3;   //每一頁要放3筆資料
                $pages = ceil($total / $div);   // 總共需要幾頁
                $now = $_GET['p'] ?? 1; //目前頁面，透過$_GET[]的方式傳值=1
                $start = ($now - 1) * $div; //開始的值
                $rows = $DB->all("limit $start,$div");
                /*處理分頁問題 _end*/  
                 foreach ($rows as $row) {  /* <!-- 將資料顯示在畫面上 --> */

                ?>
                    <tr>
                        <td >
                            <img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px;">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                       
                        <td >
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td >
                            <input type="checkbox" name="del[]" value="<?=$row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?=$row['id']; ?>')" value="更換動畫">
                        </td>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="cent">
            <?php
            if($now>1){
                $prev=$now-1;
                echo " <a href='?do=$do&p=$prev'><</a> ";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? '24px' : '16px';
                echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i <a/>";
            }
            if($now<$pages){
                $next=$now+1;
                echo " <a href='?do=$do&p=$next'> > </a> ";
            }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!--  經由click事件，開啟 ./modal/"$do的網頁，並將值(table=$do)傳出去後，由_GET接收 -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>