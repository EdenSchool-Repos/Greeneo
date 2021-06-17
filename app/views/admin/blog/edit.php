<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/nav.php';
    ?>
    <main>

        <h1><?= $data['title'] ?></h1>

        <form method="post" action="<?= URL_ROOT ?>/admin/blog/edit/<?= $data['article_content']->post_id ?>">
            <input type="text" name="title" placeholder="Titre de l'article" value="<?= $data['article_content']->title ?>">
            <input type="text" name="slug" placeholder="Slug de l'article" value="<?= $data['article_content']->slug ?>">
            <input type="text" name="image" placeholder="Lien vers une image" value="<?= $data['article_content']->image ?>">
            <textarea name="body" placeholder="Contenu de votre Article"><?= $data['article_content']->body ?></textarea>
            <input type="submit" name="submit" value="Modifier mon Article">
        </form>

    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
