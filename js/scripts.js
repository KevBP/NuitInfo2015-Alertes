$('#alerteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var titre = button.data('titrealerte');
    var message = button.data('messagealerte');
    var dalerte = button.data('datealerte');
    var localisation = button.data('localisationalerte');
    var niveau = button.data('niveaualerte');
    var modal = $(this);
    modal.find('.modal-title').text('Alerte ' + titre);
    modal.find('#message-alerte').text(message);
    modal.find('#date-alerte').text(dalerte);
    modal.find('#localisation-alerte').text(localisation);
    modal.find('#niveau-alerte').text(niveau);
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

function escapeHtmlEntities (str) {
    if (typeof jQuery !== 'undefined') {
        // Create an empty div to use as a container,
        // then put the raw text in and get the HTML
        // equivalent out.
        return jQuery('<div/>').text(str).html();
    }

    // No jQuery, so use string replace.
    return str
        .replace(/&/g, '&amp;')
        .replace(/>/g, '&gt;')
        .replace(/</g, '&lt;')
        .replace(/"/g, '&quot;');
}

$("#plus-events").click(function(){
    var parameter = $("#plus-events").attr("data-nb") + 1;
    $.ajax({url: "ajax-event.php?event=" + parameter, success: function(result){
        var data = JSON && JSON.parse(result) || $.parseJSON(result);
        var res = "";
        for (i = 0; i < data.length; i++) {
            switch(data[i].niveau_alerte){
                case "1" : res = res + "<a href=\"#\" type=\"button\" class=\"list-group-item\" data-toggle=\"modal\" data-target=\"#alerteModal\" data-titrealerte=\"" + data[i].titre_alerte + "\" data-messagealerte='" + data[i].message_alerte + "'><h4 class='list-group-item-heading'>"+ data[i].titre_alerte +"</h4><p class='list-group-item-text'>" + data[i].message_alerte + "</p></a>"; break;
                case "2" : res = res + "<a href=\"#\" type=\"button\" class=\"list-group-item list-group-item-success\" data-toggle=\"modal\" data-target=\"#alerteModal\" data-titrealerte=\"" + data[i].titre_alerte + "\" data-messagealerte='" + data[i].message_alerte + "'><h4 class='list-group-item-heading'>"+ data[i].titre_alerte +"</h4><p class='list-group-item-text'>" + data[i].message_alerte + "</p></a>"; break;
                case "3" : res = res + "<a href=\"#\" type=\"button\" class=\"list-group-item list-group-item-info\" data-toggle=\"modal\" data-target=\"#alerteModal\" data-titrealerte=\"" + data[i].titre_alerte + "\" data-messagealerte='" + data[i].message_alerte + "'><h4 class='list-group-item-heading'>"+ data[i].titre_alerte +"</h4><p class='list-group-item-text'>" + data[i].message_alerte + "</p></a>"; break;
                case "4" : res = res + "<a href=\"#\" type=\"button\" class=\"list-group-item list-group-item-warning\" data-toggle=\"modal\" data-target=\"#alerteModal\" data-titrealerte=\"" + data[i].titre_alerte + "\" data-messagealerte='" + data[i].message_alerte + "'><h4 class='list-group-item-heading'>"+ data[i].titre_alerte +"</h4><p class='list-group-item-text'>" + data[i].message_alerte + "</p></a>"; break;
                case "5" : res = res + "<a href=\"#\" type=\"button\" class=\"list-group-item list-group-item-danger\" data-toggle=\"modal\" data-target=\"#alerteModal\" data-titrealerte=\"" + data[i].titre_alerte + "\" data-messagealerte='" + data[i].message_alerte + "'><h4 class='list-group-item-heading'>"+ data[i].titre_alerte +"</h4><p class='list-group-item-text'>" + data[i].message_alerte + "</p></a>"; break;
            }
        }
        $(".list-group").html(escapeHtmlEntities(res));
    }});

    $("#plus-events").attr("data-nb", parameter);
});