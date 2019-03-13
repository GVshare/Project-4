<?php ob_start(); ?>

<h1>Mon super blog ! Ou pas...</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="post">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['commentDateFr'] ?></em>
    </h3>
    
    <p class="textPost">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<div class="comments">

	<h3>Laisser un commentaire</h3>

	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
	    <div>
	        <textarea id="comment" name="comment" placeholder="Entrez votre commentaire..."></textarea>
	    </div>
	    <div>
	        <input type="text" id="author" name="author" placeholder="Pseudo" />
	        <input type="submit" id="buttonSubmit" value="Envoyer" /> <br><br><br>
	    </div>
	</form>
	<?php
	while ($comment = $comments->fetch())
	{
	?>
		<div class="newComment">
	    <p><strong><?= htmlspecialchars($comment['author']) ?> le <?= $comment['commentDateFr'] ?></strong></p>
	    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
	    </div>
	
		<?php

		// <!-- Add the commands to delete a comment if loged as Admin-->
	    if (isset($_SESSION['status'])) {
	    ?>

	    <p><a href="index.php?action=deleteComment&commentId=<?= $comment['id'] ?>" class="deleteComment">Suprimer</a></p>

	    <?php
	    }  
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>