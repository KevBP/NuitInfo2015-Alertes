<?php

require("library.php");
$conn = connectToDatabase();
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM ALERTE ORDER BY date_soumission_alerte DESC limit 3";
$result = $conn->query($sql);

$conn->close();



?>

<?php require("header.php"); ?>
<div class="container">
    <h2>Une anomalie, une urgence, un danger imminent ? Partagez-le pour le bien de tous !</h2>
    <form class="form" action="search.php" method="get">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" id="search">Go!</button>
              </span>
        </div><!-- /input-group -->
    </form>
    <div class="alert alert-success" role="alert">Astuce : <span id="tips"></span></span></div>
    <div class="row">
        <div class="col-lg-6">
            <form class="form" action="form.php" method="post">
                <fieldset>
                <legend>Lancer une alerte !</legend>
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
                        <label for="alerte">Localisation</label>
                        <input type="text" class="form-control" id="localisation" name="localisation" placeholder="Localisation">
                        <label for="message">Message</label>
                        <input type="text" class="form-control" id="message" name="message" placeholder="Message">
                        <label for="date-evenement">Date d'évènement</label>
                        <input type="date" class="form-control" id="date-evenement" name="date-evenement" placeholder="Date d'évènement" data-date-format="yyyy-mm-dd">
                        <script>if (screen.width>=768 && navigator.userAgent.toLowerCase().indexOf('firefox') > -1){$('#date-evenement').datepicker()}</script>
                        <label for="heure-evenement">Heure d'évènement</label>
                        <input type="time" class="form-control" id="heure-evenement" name="heure-evenement" placeholder="Heure d'évènement">
                        <label for="niveau">Niveau</label>
                        <select id="niveau" name="niveau">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Envoyer alerte !</button>
                        </span>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-lg-6">
            <h3>Dernières alertes</h3>
            <?php
                if ($result->num_rows > 0) {
                    echo "<div class=\"list-group\">";
                    while($row = $result->fetch_assoc()) {
                        switch($row['niveau_alerte']){
                            case "1" : echo '<a href="#" type="button" class="list-group-item" data-toggle="modal" data-target="#alerteModal" data-titrealerte="'.$row["titre_alerte"].'" data-messagealerte="'.$row["message_alerte"].'" data-datealerte="'.$row["date_alerte"].'" data-localisationalerte="'.$row["localisation_alerte"].'" data-niveaualerte="'.$row["niveau_alerte"].'" data-idalerte="'.$row["id_alerte"].'"><h4 class="list-group-item-heading">'. $row["titre_alerte"] .'</h4><p class="list-group-item-text">' . $row["message_alerte"] . '</p></a>'; break;
                            case "2" : echo '<a href="#" type="button" class="list-group-item list-group-item-success" data-toggle="modal" data-target="#alerteModal" data-titrealerte="'.$row["titre_alerte"].'" data-messagealerte="'.$row["message_alerte"].'" data-datealerte="'.$row["date_alerte"].'" data-localisationalerte="'.$row["localisation_alerte"].'" data-niveaualerte="'.$row["niveau_alerte"].'" data-idalerte="'.$row["id_alerte"].'"><h4 class="list-group-item-heading">'. $row["titre_alerte"] .'</h4><p class="list-group-item-text">' . $row["message_alerte"] . '</p></a>'; break;
                            case "3" : echo '<a href="#" type="button" class="list-group-item list-group-item-info" data-toggle="modal" data-target="#alerteModal" data-titrealerte="'.$row["titre_alerte"].'" data-messagealerte="'.$row["message_alerte"].'" data-datealerte="'.$row["date_alerte"].'" data-localisationalerte="'.$row["localisation_alerte"].'" data-niveaualerte="'.$row["niveau_alerte"].'" data-idalerte="'.$row["id_alerte"].'"><h4 class="list-group-item-heading">'. $row["titre_alerte"] .'</h4><p class="list-group-item-text">' . $row["message_alerte"] . '</p></a>'; break;
                            case "4" : echo '<a href="#" type="button" class="list-group-item list-group-item-warning" data-toggle="modal" data-target="#alerteModal" data-titrealerte="'.$row["titre_alerte"].'" data-messagealerte="'.$row["message_alerte"].'" data-datealerte="'.$row["date_alerte"].'" data-localisationalerte="'.$row["localisation_alerte"].'" data-niveaualerte="'.$row["niveau_alerte"].'" data-idalerte="'.$row["id_alerte"].'"><h4 class="list-group-item-heading" >'. $row["titre_alerte"] .'</h4><p class="list-group-item-text">' . $row["message_alerte"] . '</p></a>'; break;
                            case "5" : echo '<a href="#" type="button" class="list-group-item list-group-item-danger" data-toggle="modal" data-target="#alerteModal" data-titrealerte="'.$row["titre_alerte"].'" data-messagealerte="'.$row["message_alerte"].'" data-datealerte="'.$row["date_alerte"].'" data-localisationalerte="'.$row["localisation_alerte"].'" data-niveaualerte="'.$row["niveau_alerte"].'" data-idalerte="'.$row["id_alerte"].'"><h4 class="list-group-item-heading" >'. $row["titre_alerte"] .'</h4><p class="list-group-item-text">' . $row["message_alerte"] . '</p></a>'; break;
                        }
                    }
                    echo "</div>";
                } else {
                    echo "0 results";
                }
            ?>
            <button type="button" class="btn btn-default" id="plus-events" data-nb="3">Plus.. :)</button>

            <div class="modal fade" id="alerteModal" tabindex="-1" role="dialog" aria-labelledby="alerteModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="alerteModalLabel">New message</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p id="date-alerte"></p>
                                </div>
                                <div class="col-md-4">
                                    <p id="localisation-alerte"></p>
                                </div>
                                <div class="col-md-4">
                                    <p id="niveau-alerte"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p id="message-alerte"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form" action="form_sig.php" method="post">
                                        <fieldset>
                                            <legend>Lancer une signalisation !</legend>
                                            <div class="form-group">
                                                <input type="hidden" id="id-alerte"  name="id_alerte" value="">
                                                <label for="nom_sig">Nom Prénom</label>
                                                <input type="text" class="form-control" id="nom_sig" name="nom_sig" placeholder="Nom Prénom de la personne concernée">
                                                <label for="age_sig">Age</label>
                                                <input type="text" class="form-control" id="age_sig" name="age_sig" placeholder="Age">
                                                <label for="description_sig">Description</label>
                                                <input type="text" class="form-control" id="description_sig" name="description_sig" placeholder="Description">
                                                <label for="sexe_sig">Sexe</label>
                                                <select id="sexe_sig" name="sexe_sig">
                                                    <option value="F">Femme</option>
                                                    <option value="H">Homme</option>
                                                    <option value="A">Autre</option>
                                                </select>
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default">Envoyer signalement !</button>
                                                </span>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require("footer.php"); ?>
