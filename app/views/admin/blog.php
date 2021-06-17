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
            <?php foreach($data['articles'] as $article): ?>
                <?php if($article->profile_id === $_SESSION['profile_id']): ?>
                    <a href="<?= URL_ROOT ?>/admin/blog/edit/<?= $article->post_id ?>"><h1><?= $article->title ?></h1></a>
                    <p>Crée le <?= $article->created_at ?></p>
                    <img src="<?= $article->image ?>">
                    <p><?= $article->body ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
