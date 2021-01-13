<br>
    <h5>Créons votre voyage !</h5>
    <form id="voyage_create" method="post">
        <input id="action" type="hidden" name="action" value="createVoyage">
        <div class="row">
            <div class="form-group col">
                <label for="depart">Départ</label>
                <input class="form-control" type="text" list="depart_create" name="depart_create" placeholder="votre ville de depart..." required>
                <datalist id="depart_create">
                    <?php foreach ($context->tableData as $data): ?>
                        <option><?php echo $data["depart"];?></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="form-group col">
                <label for="arrivee">Arrivée</label>
                <input class="form-control" type="text" list="arrivee_create" name="arrivee_create" placeholder="votre ville d'arrivée..." required>
                <datalist id="arrivee_create">
                    <?php foreach ($context->tableData as $data): ?>
                        <option><?php echo $data["depart"];?></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
        </div>
        <div class="row">
            <div class="form-group col ">
                <label for="nb_voyageur">Nombre de passagés que vous souhaitez prendre</label>
                <input class="form-control" type="number" id="nb_voyageur" name="nb_voyageur" min="1" max="6" required>
            </div>
            <div class="form-group col">
                <label for="nb_voyageur">Tarif par kilometre et par voyageur</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">€</span>
                    </div>
                <input class="currency form-control" type="number" id="tarif" name="tarif" min="0" max="200" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="heure">Heure de depart</label>
                <input class="form-control" type="number" id="heure" name="heure" min="0" max="23" required>
            </div>
            <div class="form-group col">
                <label for="contraintes">Contraintes</label>
                <input class="form-control" type="text" rows="3" id="contraintes" name="contraintes">
            </div>
        </div>
        <button id="submit_search" type="submit" class="btn btn-primary" method="get">Créer mon voyage</button>
    </form><br>
