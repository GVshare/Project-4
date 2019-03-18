<?php ob_start(); ?>

<h2>Billet simple pour l'Alaska</h2>

<?php
while ($data = $post->fetch())
{
?>
<div class="posts">
    <h3>
        <p><a href="Chapitre-<?php echo $data['id']?>"><?php echo $data['title']?></a></p>
    </h3>
    
    <p><?php echo nl2br(substr($data['content'], 0, 400)) . '...';?></p><br>
    <em><?php echo '<i class="fas fa-pen-fancy"></i> ' . $data['author'] . "&emsp;" . ' <i class="fas fa-calendar-alt"></i> ' . $data['commentDateFr']; ?></em>
</div>
<?php
}
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>