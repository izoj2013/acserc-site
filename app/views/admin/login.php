<?php
    require VIEWS . 'includes/headadmin.php';
?>

<div class="navbar">
    <?php
        require VIEWS . 'includes/navadmin.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Sign In</h2>
        
        <form action="<?php echo URL_ROOT; ?>/admin/login" method="POST">
            <input type="text" placeholder="Admin UserID *" name="adminuserid">
            <span class="invalidFeedback">
                <?php echo 'Admin UserID Error'; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo 'Password Error'; ?>
            </span>

            <button id="submit" type="submit" name="submit">Login</button>
        </form>
    </div>
</div>

<?php
    require VIEWS . 'includes/footadmin.php';
?>
