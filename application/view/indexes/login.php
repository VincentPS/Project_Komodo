<!-- here the messages will be displayed -->
<div class="message">
    <?php foreach ($this->messages as $massage) { ?>
        <p><?=$massage?></p>
    <?php } foreach ($this->errors as $error) { ?>
        <p><?=$error?></p>
    <?php } ?>
</div>

<!-- here the user can fill their account details -->
<div class="loginDiv">
    <form method="post" action="index.php" name="loginform">
        <label for="login_input_username">Username</label>
        <input id="login_input_username" class="login_input" type="text" name="user_name" required /><br>
        <label for="login_input_password">Password</label>
        <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required /><br>
        <input type="submit"  name="login" value="Log in" /><br><br>
    </form>
</div>
