// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(  //hover：mouseover(滑進來)+mouseout(滑出去)
		function()
		{
			$(this).children(".mw").stop().show()	//滑鼠移進來時，這個的下一個，會呈現
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
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}