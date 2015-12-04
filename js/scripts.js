$('#alerteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var titre = button.data('titrealerte');
    var message = button.data('messagealerte');
    var dalerte = button.data('datealerte');
    var modal = $(this);
    modal.find('.modal-title').text('Alerte ' + titre);
    modal.find('#message-alerte').text(message);
    modal.find('#date-alerte').text(dalerte);
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
}, 20000);
