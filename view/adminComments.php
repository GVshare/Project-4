<?php ob_start(); ?>

<h2>Administrate your comments !</h2>

<h3>Reported comments</h3>

<?php
while ($reportedComment = $reportedComments->fetch())
{
?>
	<div class="newComment">
    <p><strong><?= htmlspecialchars($reportedComment['author']) ?> le <?= $reportedComment['commentDateFr'] ?></strong></p>
    <p><?= nl2br(htmlspecialchars($reportedComment['comment'])) ?></p>
    </div>

	<?php

	// <!-- Add the commands to delete a comment if loged as Admin-->
    if (isset($_SESSION['status'])) {
    ?>

    <p><a href="index.php?action=adminComments" class="deleteComment"><i class="fas fa-trash-alt"></i> Supprimer</a></p>

    <?php
    }  
}
?>

<h3>Latests comments</h3>

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

    <p><a href="index.php?action=adminComments" class="deleteComment"><i class="fas fa-trash-alt"></i> Supprimer</a></p>

    <?php
    }  
}
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>