<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/nav.php';
    ?>
    <main>

        <h1><?= $data['title'] ?></h1>
        <h1 class="profileFirstName"><?= $data['profileFirstName'] ?></h1>
        <h1 class="profileLastName"><?= $data['profileLastName'] ?></h1>
        <h1 class="profileEmail"><?= $data['profileEmail'] ?></hh1>
        <h1><?= $data['profileRole'] ?></h1>

        <?php if($data['profileID'] === $_SESSION['profile_id']): ?>
            <div class="editSection">
                <button type="submit" name="showEditForm">Editer le profile</button>
            </div>
        <?php endif; ?>

    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>

    <?php
    require APP_ROOT . '/views/profile/ajax/edit.ajax.php';
    ?>
</body>
