<?php

require("library.php");
$conn = connectToDatabase();
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT titre_alerte, niveau_alerte,message_alerte FROM ALERTE ORDER BY date_alerte DESC";
$result = $conn->query($sql);

$conn->close();



?>

<?php require("header.php"); ?>
<div class="container">
    <h2>Une anomalie, une urgence, un danger imminent ? Partagez-le pour le bien de tous !</h2>
    <div class="alert alert-success" role="alert" id="tips">JEzifohzeofih zeofij oezifj </div>
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
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    switch($row['niveau_alerte']){
                        case "1" : echo "<a href='#' class=\"gomodal list-group-item\" data-toggle=\"modal\" data-target='#signalementModal'><h4 class='list-group-item-heading' data-titrealerte=\"" .$row["titre_alerte"]."\">" . $row["titre_alerte"] . "</h4><p class='list-group-item-text'>" . $row["message_alerte"] . "</p></a>"; break;
                        case "2" : echo "<a href='#' class=\"gomodal list-group-item list-group-item-success\" data-toggle=\"modal\" data-target='#signalementModal'><h4 class='list-group-item-heading' data-titrealerte=\"" .$row["titre_alerte"]."\">" . $row["titre_alerte"] . "</h4><p class='list-group-item-text'>" . $row["message_alerte"] . "</p></a>"; break;
                        case "3" : echo "<a href='#' class=\"gomodal list-group-item list-group-item-info\" data-toggle=\"modal\" data-target='#signalementModal'><h4 class='list-group-item-heading' data-titrealerte=\"" .$row["titre_alerte"]."\">" . $row["titre_alerte"] . "</h4><p class='list-group-item-text'>" . $row["message_alerte"] . "</p></a>"; break;
                        case "4" : echo "<a href='#' class=\"gomodal list-group-item list-group-item-warning\" data-toggle=\"modal\" data-target='#signalementModal'><h4 class='list-group-item-heading' data-titrealerte=\"" .$row["titre_alerte"]."\">" . $row["titre_alerte"] . "</h4><p class='list-group-item-text'>" . $row["message_alerte"] . "</p></a>"; break;
                        case "5" : echo "<a href='#' class=\"gomodal list-group-item list-group-item-danger\" data-toggle=\"modal\" data-target='#signalementModal'><h4 class='list-group-item-heading' data-titrealerte=\"" .$row["titre_alerte"]."\">" . $row["titre_alerte"] . "</h4><p class='list-group-item-text'>" . $row["message_alerte"] . "</p></a>"; break;
                    }
                }
                echo "</div>";
            } else {
                echo "0 results";
            }
            ?>
            <div class="modal fade" id="signalementModal" tabindex="-1" role="dialog" aria-labelledby="signalementModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require("footer.php"); ?>
