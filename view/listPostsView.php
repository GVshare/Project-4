<?php ob_start(); ?>

<h2>Mon super blog ! Ou pas...</h2>
<p>Derniers billets du blog :</p>

<?php
while ($data = $post->fetch())
{
?>
<div class="posts">
    <h3>
        <p><a href="index.php?action=post&id=<?php echo $data['id']?>"><?php echo htmlspecialchars($data['title']); ?></a></p>
    </h3>
    
    <p><?php echo nl2br(htmlspecialchars(substr($data['content'], 0, 400) . '...'));?></p>
    <em><?php echo '<i class="fas fa-pen-fancy"></i> ' . $data['author'] . "&emsp;" . ' <i class="fas fa-calendar-alt"></i> ' . $data['commentDateFr']; ?></em>
</div>
<?php
}
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>