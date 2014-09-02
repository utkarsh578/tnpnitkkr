$(document).ready(function()
  {
  $("#btn1").click(function(){
	$("#log").animate({width:"110px"});
	$("#change").animate({width:"110px"});
	$("#name").animate({width:"0px"});
  });
  $("#btn2").click(function(){
	$("#name").animate({width:"130px"});
	$("#log").animate({width:"0px"});
	$("#change").animate({width:"0px"});
  });
});

function f5()
{
document.getElementById("name").style.visibility="hidden";
document.getElementById("log").style.visibility="visible";
document.getElementById("change").style.visibility="visible";
document.getElementById("btn1").style.visibility="hidden";
document.getElementById("btn2").style.visibility="visible";
}
function f6()
{
document.getElementById("name").style.visibility="visible";
document.getElementById("log").style.visibility="hidden";
document.getElementById("change").style.visibility="hidden";
document.getElementById("btn2").style.visibility="hidden";
document.getElementById("btn1").style.visibility="visible";
}
