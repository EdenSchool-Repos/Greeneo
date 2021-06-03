<?php
	require APP_ROOT . '/views/inc/head.php';
?>
<body>
    <?php
        require APP_ROOT . '/views/inc/nav.php';
    ?>
    <main>

        <h1><?= $data['title'] ?></h1>

        <div class="container-login">
            <div class="wrapper-login">
                <h2>Signin</h2>
                <form method="post" action="<?= URL_ROOT ?>/login">
                    <input type="email" name="email" placeholder="Email">
                    <span class="invalidFeedback">
                <?= $data['emailError'] ?>
            </span>

                    <input type="password" name="password" placeholder="Password">
                    <span class="invalidFeedback">
                <?= $data['passwordError'] ?>
            </span>

                    <button type="submit" id="submit" value="submit">Sign In</button>

                    <p class="options">Not registered yet? <a href="<?= URL_ROOT ?>/login/create">Create an profile</a></p>
                </form>
            </div>
        </div>
    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
