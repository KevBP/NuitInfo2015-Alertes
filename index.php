<?php require("header.php"); ?>
<div class="container">
    <h1>Equipe Daddy Staline</h1>
    <h2>Une anomalie, une urgence, un danger imminent ? Partagez-le pour le bien de tous !</h2>
    <div class="row">
        <div class="col-lg-6">
            <form class="form" action="form.php" method="post">
                <fieldset>
                <legend>Lancer une alerte !</legend>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <input type="text" class="form-control" id="message" name="message" placeholder="Message">
                        <label for="alerte">Localisation</label>
                        <input type="text" class="form-control" id="localisation" name="localisation" placeholder="Localisation">
                        <label for="date-evenement">Date d'évènement</label>
                        <input type="datetime" class="form-control" id="date-evenement" name="date-evenement" placeholder="Date d'évènement">
                        <label for="niveau">Niveau</label>
                        <select id="niveau" name="niveau">
                            <option value="1">Volvo</option>
                            <option value="2">Saab</option>
                            <option value="3">Mercedes</option>
                            <option value="4">Audi</option>
                            <option value="5">5</option>
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Send alerte!</button>
                        </span>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-lg-6">
            <form class="form-inline" action="form.php" method="post">
                <div class="form-group">
                    <label for="signalement">Name</label>
                    <input type="text" class="form-control" id="signalement" placeholder="Jane Doe">
                    <button type="submit" class="btn btn-default">Send invitation</button>
                </div>
            </form>
        </div>
    </div>
    <?php require("footer.php"); ?>
