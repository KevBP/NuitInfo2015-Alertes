
$('#signalementModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('titrealerte'); // Extract info from data-* attributes
    alert(recipient);
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text('Alerte ' + recipient);
    modal.find('.modal-body input').val(recipient);
});


$(document).ready(function(){
	var tips = showTips();
	$("#tips").innerHTML = tips;
});


$("#tips").click(function(){
    $.ajax({url: "tips.php", success: function(result){
        $("#tips").html(result);
    }});
});
