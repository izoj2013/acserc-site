<nav class="top-nav">
    <div class="container-fluid">
        <a href="<? echo URL_ROOT; ?>/home/index" class="brand-logo text-white">
            <img class="img-fluid logo-banner px-2 m-1" src="<?php echo URL_ROOT; ?>/public/logos/acserc_georgia_ad05.svg" alt="Website-Logo">
        </a>
        <ul>
            <h2 class="admin-panel-title">ACS-ERC Site Administration</h2>
            <li><h3>Welcome <?php echo 'Admin'; ?></h3></li>
            <li><a href="<?php echo URL_ROOT; ?>/admin/changepwd">CHANGE PASSWORD</a></li>
            <li class="btn-login">
                <?php if(isset($_SESSION['admin_id'])) : ?>
                    <a href="<?php echo URL_ROOT; ?>/admin/logout">Log out</a>
                <?php else : ?>
                    <a href="<?php echo URL_ROOT; ?>/admin/login">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>