$('#alerteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var titre = button.data('titrealerte');
    var message = button.data('messagealerte');
    var dalerte = button.data('datealerte');
    var modal = $(this);
    modal.find('.modal-title').text('Alerte ' + titre);
    alert(message);
    modal.find('#message-alerte').text(message);

});

$(document).ready(function(){
    $.ajax({url: "tips.php", success: function(result){
        $("#tips").html(result);
    }});
});

window.setInterval(function() {
    $.ajax({url: "tips.php", success: function(result){
        $("#tips").html(result);
    }});
}, 10000);
