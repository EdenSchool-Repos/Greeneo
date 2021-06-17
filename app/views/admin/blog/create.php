<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/nav.php';
    ?>
    <main>

        <h1><?= $data['title'] ?></h1>

        <form method="post" action="<?= URL_ROOT ?>/admin/blog/create">
            <input type="text" name="title" placeholder="Titre de l'article">
            <input type="text" name="slug" placeholder="Slug de l'article">
            <input type="text" name="image" placeholder="Lien vers une image">
            <textarea name="body" placeholder="Contenu de votre Article"></textarea>
            <input type="submit" name="submit" value="Creer mon Article">
        </form>

    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
