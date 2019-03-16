<?php ob_start(); ?>

<h2>Modify your chapter</h2>

<form method="POST" action="index.php?action=modifyPost&postId=<?= $post['id'] ?>">

    <input type="submit" value="Update" id="updateButton"><br>

    <label class="title" >New Title : </label>
    <input class="title" type="text" name="updatePostTitle" value="<?= $post['title']?>"><br><br>

    <textarea id="test" name="updatePostContent">
        <?= $post['content'];  ?>
    </textarea>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>