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
                <h2>Register</h2>

                <form
                        id="register-form"
                        method="POST"
                        action="<?php echo URL_ROOT; ?>/login/create"
                >
                    <input type="text" placeholder="Nom *" name="lastname">
                    <span class="invalidFeedback">
                <?php echo $data['lastnameError']; ?>
            </span>

                    <input type="text" placeholder="Prénom *" name="firstname">
                    <span class="invalidFeedback">
                <?php echo $data['firstnameError']; ?>
            </span>

                    <input type="email" placeholder="Email *" name="email">
                    <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

                    <input type="password" placeholder="Password *" name="password">
                    <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

                    <input type="password" placeholder="Confirm Password *" name="confirmPassword">
                    <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

                    <button id="submit" type="submit" value="submit">Submit</button>

                    <p class="options">Not registered yet? <a href="<?php echo URL_ROOT; ?>/login">Ce connecter</a></p>
                </form>
            </div>
        </div>
    </main>
    <?php
        require APP_ROOT . '/views/inc/footer.php';
    ?>
</body>
