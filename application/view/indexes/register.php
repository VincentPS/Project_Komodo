<!-- here the user can create a new account div -->
<div class="registerDiv">
    <form method="post" action="index.php" name="registerform">
        <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
        <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required /><br>
        <label for="login_input_email">User's email</label>
        <input id="login_input_email" class="login_input" type="email" name="user_email" required /><br>
        <label for="login_input_password_new">Password (min. 6 characters)</label>
        <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br>
        <label for="login_input_password_repeat">Repeat password</label>
        <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br>
        <input type="submit"  name="register" value="Register" />
    </form>
</div>
