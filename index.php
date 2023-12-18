<?php include_once "./api/db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<!-- <link href="./css/css.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" href="./css/css.css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<?php
		$title = $Title->find(['sh' => 1]);  //顯示網站標題管理圖示，撈資料庫中，sh欄位等於1的傎
		?>
		<a title="<?= $title['text']; ?>" href="index.php"> <!-- 顯示替代文字，並超連結回首頁 -->
			<div class="ti" style="background:url(&#39;./img/<?= $title['img']; ?>&#39;); background-size:cover;"></div><!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<?php
					$mainmu = $Menu->all(['sh' => 1, 'menu_id' => 0]);  // 撈出主選單且有顯示的
					foreach ($mainmu as $main) {
					?>

						<div class='mainmu'>
							<a href="<?= $main['href']; ?>" style="color:#000; font-size:13px; text-decoration:none;">
								<?= $main['text']; ?> <!-- 主選單超連結 -->
							</a> 
							<?php
							if ($Menu->count(['menu_id' => $main['id']]) > 0) {  //如果men_id大於0，表示有次選單
								echo "<div class='mw'>";
								$subs = $Menu->all(['menu_id' => $main['id']]); //撈出次選單
								foreach ($subs as $sub) { 
									echo "<a href='{$sub['href']}'>";
									echo "<div class='mainmu2'>";
									echo $sub['text'];
									echo "</div>";
									echo "</a>";
								}
								echo "</div>";
							}
							?>

						</div>
						</a>
					<?php
					}
					?>


				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :
						<?= $Total->find(1)['total']; ?></span> <!-- 去資料庫撈取id=1的total欄位資料 -->
				</div>
			</div>

			<?php

			$do = $_GET['do'] ?? 'main';
			$file = "./front/{$do}.php";
			if (file_exists($file)) {
				include $file;
			} else {
				include "./front/main.php";
			}

			?>

			<!-- 以下這段程式碼會被移到front/news裡___start -->
			<!-- <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script> -->
			<!-- 以下這段程式碼會被移到front/news裡___end -->


			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<?php
				if(isset($_SESSION['login'])){
				?>
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;back.php&#39;)">返回管理</button>
				<?php
				}else{

				
				?>
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=login&#39;)">管理登入</button>
				<?php
				}
				?>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="cent" onclick="pp(1)"><img src="./icon/up.jpg" alt=""></div>

					<?php
					$imgs = $Image->all(['sh' => 1]);
					//  echo print_r($imgs);
					//  exit();

					foreach ($imgs as $idx => $img) {
					?>
						<div id="ssaa<?= $idx; ?>" class='im cent'>
							<img src="./img/<?= $img['img']; ?>" style="width:150px;height:103px;border:3px solid orange;margin:3px">
						</div>

					<?php
					}

					?>
					<div class="cent" onclick="pp(2)"><img src="./icon/dn.jpg" alt=""></div>

					<script>
						//圖片輪播的功能
						var nowpage = 1,
							num = <?= $Image->count(['sh' => 1]); ?>; /* 宣告變數 $nowpage 現在的頁數,$num 是所有的圖片數量 */

						function pp(x) { //function叫pp，帶一個參數x
							var s, t; //宣告變數
							if (x == 1 && (nowpage - 1) >= 0) { //往上翻
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) <= num * 1 - 3) { //如果要換頁的話，一次換三張
								nowpage++;
							}

							$(".im").hide() //.im這個class，畫面上所有的圖片都會隱藏
							for (s = 0; s <= 2; s++) { //此廻圈跑3次(0-2)，s是數字型態。
								t = s * 1 + nowpage * 1; //因為nowpage=1，pp(1)；所以t會是0+1=1,1+1=2,2+1=3。目的是為產生連續三個數字。
								$("#ssaa" + t).show() //id=22aa，t=字串，#ssaa1.show(),#ssaa2.show(),#ssaa3.show()在畫面上呈現3張圖
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom']; ?></span>
		</div>
	</div>

</body>

</html>