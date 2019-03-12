<?php ob_start(); ?>

<h1>Mon super blog ! Ou pas...</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="post">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['commentDateFr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<div class="comments">

	<h3>Commentaires : </h3>

	<?php
	while ($comment = $comments->fetch())
	{
	?>
	    <p><strong><?= htmlspecialchars($comment['author']) ?> le <?= $comment['commentDateFr'] ?></strong></p>
	    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
	<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>