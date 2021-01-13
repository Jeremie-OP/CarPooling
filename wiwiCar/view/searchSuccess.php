<br><h5>Vous cherchez un voyage ? Saisissez votre trajet !</h5>
<form id="form_search" method="get">
    <input id="action" type="hidden" name="action" value="result">
    <div class="form-group">
        <label for="depart">Départ</label>
        <select class="form-control" id="depart" name="depart">
            <?php
            if ($context->tableData) {
                foreach ($context->tableData as $ville) {
                    echo "<option>".$ville['depart']."</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="arrivee">Arrivée</label>
        <select class="form-control" id="arrivee" name="arrivee">
            <?php
                if ($context->tableData) {
                    foreach ($context->tableData as $ville) {
                        echo "<option>".$ville['depart']."</option>";
                    }
                }
            ?>
        </select>
    </div>
    <button id="submit_search" type="submit" class="btn btn-primary" method="get">Submit</button>
</form>
<br>


