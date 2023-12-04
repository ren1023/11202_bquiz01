// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()
	if (y)// 如果 Y 有值，則 fadeIn 淡入
	$(y).fadeIn()
	if (y&&url)// 如果 Y 和 url 有值，則載入 url 網址 view.php
	$(y).load(url)
}
// close, 
function cl(x)
{
	$(x).fadeOut ();//$ 相當於 jquery，fadeout => 淡出
}