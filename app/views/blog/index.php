<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/nav.php';
    ?>
    <main>

        <h1><?= $data['title'] ?></h1>

        <div>
            <?php foreach($data['articles_content'] as $article): ?>
                <a href="<?= URL_ROOT ?>/blog/<?= $article->post_id ?>"><h1><?= $article->title ?></h1></a>
                <p>Crée le <?= $article->created_at ?></p>
                <img src="<?= $article->image ?>">
                <p><?= $article->body ?></p>
            <?php endforeach; ?>
        </div>
        
    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
