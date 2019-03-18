<?php ob_start(); ?>

<h2>Modifier le chapitre !</h2>

<form method="POST" action="index.php?action=modifyPost&postId=<?= $post['id'] ?>">

    <input type="submit" value="Sauvegarder" id="updateButton"><br>

    <label class="title" >Nouveau Titre : </label>
    <input class="title" type="text" name="updatePostTitle" value="<?= $post['title']?>"><br><br>

    <textarea id="test" name="updatePostContent">
        <?= $post['content'];  ?>
    </textarea>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>