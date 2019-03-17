<?php ob_start(); ?>

<h2> Mes brouillons en cours !</h2>

<a href="index.php?action=addDraft"><button id="newDraft">NOUVEAU BROUILLON</button></a>

<?php

while ($draft = $drafts->fetch())
{
?>

<div class="adminChaptersList">
    <h3>
        <p><?php echo $draft['title']; ?></p>
    </h3>
    
    <em><?php echo '<i class="fas fa-user"></i> ' . $draft['author'] . "&emsp;" . ' <i class="fas fa-calendar-alt"></i> ' . $draft['draftDateFr']; ?></em>

    <p>
        <a href="index.php?action=publishDraft&draftId=<?= $draft['id'] ?>" class="readChapter"><i class="fas fa-upload"></i> Publier</a> 
        || 
        <a href="index.php?action=adminEditDraft&draftId=<?= $draft['id'] ?>" class="modifyChapter"><i class="fas fa-pen-fancy"></i> Editer</a> 
        || 
        <a href="index.php?action=deleteDraft&draftId=<?= $draft['id'] ?>" class="deleteChapter"><i class="fas fa-trash-alt"></i> Supprimer</a>
    </p>
</div>

<?php
}
$drafts->closeCursor();
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>