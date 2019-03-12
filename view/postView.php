<?php ob_start(); ?>

<h1>Mon super blog ! Ou pas...</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['commentDateFr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>