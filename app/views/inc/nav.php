<nav class="nav-global">
    <a href="<?= URL_ROOT ?>">
        <div class="logo">
            <img src="<?= URL_ROOT ?>/public/img/wave-icon.svg" alt="">
            <h1>Greeneo</h1>
        </div>
    </a>
    <div class="nav-div-container">
        <div class="left-div">
            
            <ul>
                <li>
                    <a href="<?= URL_ROOT ?>">Accueil</a>
                </li>
                <li>
                    <a href="#">Présentation</a>
                </li>
                <li>
                    <a href="#">Projet</a>
                </li>
                <li>
                    <a href="#">Équipe</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
            </ul>
        </div>
        <div class="right-div">
            <ul>
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li>
                        <a href="<?php echo URL_ROOT; ?>/users/profile">Profile</a>
                    </li>
    				<li>
                        <a href="<?php echo URL_ROOT; ?>/users/logout">Log out</a>
                    </li>
    			<?php else : ?>
    				<li>
                        <a href="<?php echo URL_ROOT; ?>/users/login">Login</a>
                    </li>
    			<?php endif; ?>
            </ul>
        </div>
    </div>
    <button class="menu-burger"><i class="fas fa-bars"></i></button>
</nav>