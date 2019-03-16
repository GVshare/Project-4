<?php ob_start(); ?>

<h2>Administrate your chapters !</h2>

<?php
while ($data = $post->fetch())
{
?>
<div class="adminChaptersList">
    <h3>
        <p><?php echo $data['title']; ?></p>
    </h3>
    
    <em><?php echo '<i class="fas fa-user"></i> ' . $data['author'] . "&emsp;" . ' <i class="fas fa-calendar-alt"></i> ' . $data['commentDateFr']; ?></em>

    <p>
        <a href="index.php?action=post&id=<?= $data['id']?>" class="readChapter"><i class="far fa-eye"></i> Voir</a> 
        || 
        <a href="index.php?action=adminModifyChapter&postId=<?= $data['id'] ?>" class="modifyChapter"><i class="fas fa-pen-fancy"></i> Modifier</a> 
        || 
        <a href="index.php?action=adminDeleteChapter&postId=<?= $data['id'] ?>" class="deleteChapter"><i class="fas fa-trash-alt"></i> Supprimer</a>
    </p>
</div>



<?php
}
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>