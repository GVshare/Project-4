<?php ob_start(); ?>

<h2>Modify your chapter</h2>

<form method="POST" action="index.php?action=modifyPost&postId=<?= $post['id'] ?>">

    <input type="submit" value="Update" id="updateButton">

    <textarea id="test" name="updatePostContent">
        <?= $post['content'];  ?>
    </textarea>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>