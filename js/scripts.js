$('#alerteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var titre = button.data('titrealerte');
    var message = button.data('messagealerte');
    var dalerte = button.data('datealerte');
    var localisation = button.data('localisationalerte');
    var modal = $(this);
    modal.find('.modal-title').text('Alerte ' + titre);
    modal.find('#message-alerte').text(message);
    modal.find('#date-alerte').text(dalerte);
    modal.find('#localisation-alerte').text(localisation);
    alert(dalerte);
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

$("#plus-events").click(function(){
    $.ajax({url: "ajax-event.php?event=" + $("#plus-events").attr("data-nb") +1, success: function(result){
        var data = JSON && JSON.parse(result) || $.parseJSON(result);
        var res = "";
        for (i = 0; i < data.length; i++) {
            switch(data[i].){
                case "1" :
            }
            res = res + "<a href=\"#\" type=\"button\" class=\"list-group-item\" data-toggle=\"modal\" data-target=\"#alerteModal\" data-titrealerte=\"" + data[i].titre_alerte + "\" data-messagealerte='" + data[i].message_alerte + "'><h4 class='list-group-item-heading'>"+ data[i].titre_alerte +"</h4><p class='list-group-item-text'>" + data[i].titre_alerte + "</p></a>";
        }
        $(".list-group").html(res);
    }});

    $("#plus-events").attr("data-nb", $("#plus-events").attr("data-nb") + 1);
});