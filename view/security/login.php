<h1>Connexion</h1>

<form action="../../index.php?ctrl=security&action=connexion" method="POST">
    <p>
        <label>Identifiant :<br>
            <input type="email" name="email" value="" required/>
        </label>
    </p>

    <p>
        <label>Mot de passe :<br>
            <input type="password" name="mdp" value="" required/>
        </label>
    </p>

    <p>
        <label>
            <input type="submit" name="submit" value="Valider"/>
        </label>
    </p>
</form>