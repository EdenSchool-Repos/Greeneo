<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/nav.php';
    ?>
    <main>

        <h1><?= $data['title'] ?></h1>

        <p>Crée le <?= $data['article_content']->created_at ?></p>
        <img src="<?= $data['article_content']->image ?>">
        <p><?= $data['article_content']->body ?></p>
    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
