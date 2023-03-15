<h1>Création d'un nouveau sujet</h1>

<form action="index.php?ctrl=forum&action=ajoutTopic&id=<?= $id ?>" method="POST">
    <p>
        <label>Nom du sujet :<br>
            <input type="text" name="nom_topic" required>
        </label>
    </p>

    <p>
        <label>Votre message :<br>
            <textarea name="contenu" row="10" cols="55"></textarea>
        </label>
    </p>

    <p>
        <label>
            <input type="Submit" name="submit" value="Créer sujet">
        </label>
    </p>
</form>