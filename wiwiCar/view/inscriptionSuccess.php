<form>
    <div class="row">
        <div class="col">
            <input type="hidden" name="action" value="signup">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="col">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="login">Identifiant</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="col">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required minlength="8">
        </div>
    </div>
    <button type="submit" method="POST" class="btn btn-primary" style="margin: 20px;">Submit</button>
</form>
