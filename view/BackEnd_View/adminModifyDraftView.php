<?php ob_start(); ?>

<h2>Votre nouveau chapitre en Cours !</h2>

<form method="POST" action="index.php?action=editDraft&draftId=<?= $draft['id'] ?>">

    <input type="submit" value="Sauvegarder" id="updateButton"><br>

    <label class="title" >Nouveau Titre : </label>
    <input class="title" type="text" name="updateDraftTitle" value="<?= $draft['title']?>"><br><br>

    <textarea id="test" name="updateDraftContent">
        <?= $draft['content'];  ?>
    </textarea>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>