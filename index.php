<?php require("header.php"); ?>
<div class="container">
  <h1>Equipe Daddy Staline</h1>
   <div class="row">
       <div class="col-lg-6">
           <form class="form-inline" action="form.php" method="post">
               <div class="form-group">
                   <label for="alerte">Name</label>
                   <input type="text" class="form-control" id="alerte" placeholder="Jane Doe">
                   <button type="submit" class="btn btn-default">Send invitation</button>
               </div>
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
