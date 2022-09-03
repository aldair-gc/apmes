<?php
require('php/cache.php');
require('components/header.php');
?>

<main>
    <div class="form-box box">
        <h1>Login</h1>
        <form action="/php/login.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="email" placeholder="your@email.com">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="current-password">
            <button type="submit">Login</button>
        </form>
        <div>
            <a href="/register.php">Register new user</a>
            <a href="#">Forgot the password</a>
        </div>
    </div>
</main>
    
<?php require('components/footer.php'); ?>
