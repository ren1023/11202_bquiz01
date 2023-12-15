<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

    <?php include "marquee.php"; ?>

    <div style="height:32px; display:block;"></div>
    <!--正中央-->

    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">
                沒有資料(放動畫圖片)
                <!-- <img src="./img/01C01.gif" alt=""> -->
            </div>
            <!-- <embed loop=true src='"./img/01C01.gif" + lin[now] + "' style='width:99%; height:100%;'></embed> -->

        </div>
    </div>
    <script>
        // ##輪播照片的程式_start
        var lin = new Array();
        // <?php
            // $lins = $Mvim->all(['sh' => 1]); //撈出有被顯示的所有動畫圖片
            // foreach ($lins as $lin) {
            //     echo "lin.push('{$lin['img']}');";
            // }
            // 
            ?>

        <?php
        $lins = $Mvim->all(['sh' => 1]);
        foreach ($lins as $lin) {
            echo "lin.push('{$lin['img']}');";
        }
        ?>

        var now = 0;
        ww();
        if (lin.length > 1) {
            setInterval("ww()", 3000); //讀到此行後，3秒後再執行，再每隔3秒，執行ww()方法一次。
            now = 1;
        }

        function ww() { //用Jquery寫的function
            $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>") //要將一個html字串放到mwww裡
            //$("#mwww").attr("src",lin[now])
            now++; // now這個值，+1之後
            if (now >= lin.length) //now大於、等於 lin這個陣列的長度，now>=6 為true，就歸零
                now = 0; //歸零
        }
        // ##輪播照片的程式_end
    </script>

    <div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
            <?php
            if($News->count(['sh'=> 1])>5){
               echo "<a href='' style='float: right;'>More...</a>;";
            }

            ?>

           
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
            <?php
            $news = $News->all(['sh' => 1], ' limit 5');
            foreach ($news as $n) {
                echo "<li>";
                echo mb_substr($n['text'], 0, 20);
                echo "<div class='all' style='display:none'>";
                echo $n['text'];
                echo "</div>";
                echo "...</li>";
            }
            ?>
        </ul>
        <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">

    </div>
        <script>
            $(".ssaa li").hover( //.ssaa下一層li發生mouse移上去時去執行以下
                function() {
                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")   //this指的是hover這個事件，當下的這個元件<li>的下一層的容器，.html(), 表示呈現此元素的所有內容
                    $("#altt").show() //這是舊版才要寫的
                }
            )
            $(".ssaa li").mouseout( //當我mouse移出的時侯隱藏
                function() {
                    $("#altt").hide()
                }
            )
        </script>
    </div>
</div>