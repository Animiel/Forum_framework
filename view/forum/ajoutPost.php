<h1>Création d'un nouveau message</h1>

<form action="index.php?ctrl=forum&action=ajoutPost" method="POST">
    <p>
        <label>Votre message :<br>
            <textarea name="contenu" row="10" cols="55"></textarea>
        </label>
    </p>

    <p>
        <label>
            <input type="Submit" name="submit" value="Poster message">
        </label>
    </p>
</form>