
$(document).ready(function(){
    $(".gomodal").click(function(){
        $("#myModal").modal('show');
    })});


$("#tips").click(function(){
    alert("blah");
	var tips = showTips();
	$("#tips").innerHTML = tips;
});