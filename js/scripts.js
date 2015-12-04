
$(document).ready(function(){
    $(".gomodal").click(function(){
        $("#myModal").modal('show');
    })});


$("#tips").click(function(){
	var tips = showTips();
	$("#tips").innerHTML = tips;
	alert(showTips());
});