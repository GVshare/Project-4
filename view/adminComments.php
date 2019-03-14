<?php ob_start(); ?>

<h2>Administrate your comments !</h2>

<h3 id="reportedCommentTitle"><i class="fas fa-exclamation-triangle"></i> Reported comments <i class="fas fa-exclamation-triangle"></i></h3>

<?php
while ($reportedComment = $reportedComments->fetch())
{
?>
	<div class="commentsAdminList">
    <p><strong><?= htmlspecialchars($reportedComment['author']) ?> le <?= $reportedComment['commentDateFr'] ?></strong></p>
    <p><?= nl2br(htmlspecialchars($reportedComment['comment'])) ?></p>
    

	<?php

	// <!-- Add the commands to delete a comment if loged as Admin-->
    if (isset($_SESSION['status'])) {
    ?>

    <p>
        <a class="deleteComments" href="index.php?action=adminDeleteComment&commentId=<?= $reportedComment['id'] ?>" class="deleteComment"><i class="fas fa-trash-alt"></i> Supprimer</a>
         || 
        <a class='approveComments' href="index.php?action=adminApproveComment&commentId=<?= $reportedComment['id'] ?>" class="approveComment"><i class="fas fa-thumbs-up"></i> Approuver</a>
     </p>

    </div>

    <?php
    }  
}
?>
    

<h3 id="latestCommentTitle"><i class="fas fa-comments"></i> Latests comments <i class="fas fa-comments"></i></h3>

<?php
while ($comment = $comments->fetch())
{
?>
	<div class="commentsAdminList">
    <p><strong><?= htmlspecialchars($comment['author']) ?> le <?= $comment['commentDateFr'] ?></strong></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    

	<?php

	// <!-- Add the commands to delete a comment if loged as Admin-->
    if (isset($_SESSION['status'])) {
    ?>

    <p><a href="index.php?action=adminDeleteComment&commentId=<?= $comment['id'] ?>" class="deleteComment"><i class="fas fa-trash-alt"></i> Supprimer</a></p>
    </div>

    <?php
    }  
}
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>