<?php
require('components/header.php');
?>

<main>
<div class="bg-blues"></div>

    <div class="form-box register box">
        <h1>Register</h1>
        <form action="/php/register.php" method="post">
            <label for="text">Name</label>
            <input type="text" name="name" id="name" autocomplete="name" placeholder="Your Name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="email" placeholder="your@email.com" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>
            <input type="submit" value="Register">
        </form>
        <div>
            <a href="/login.php">Already registered</a>
        </div>
    </div>
</main>

<?php require('components/footer.php'); ?>
