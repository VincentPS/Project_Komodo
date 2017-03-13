<!DOCTYPE html>
<head>
    <link type="style.css" href="" />
</head>
<body>
    <main class="overall">

        <!-- message div -->
        <div class="message">
            <?php foreach ($APP->messages as $massage): ?>
                <p><?=$massage?></p>
            <?php endforeach ?>
        </div>

        <!-- login div -->
        <div class="loginDiv">
            <form method="post" action="index.php" name="loginform">
                <label for="login_input_username">Username</label>
                <input id="login_input_username" class="login_input" type="text" name="user_name" required /><br>
                <label for="login_input_password">Password</label>
                <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required /><br>
                <input type="submit"  name="login" value="Log in" /><br><br>
            </form>
        </div>

        <!-- register div -->
        <div class="registerDiv">
            <form method="post" action="index.php" name="registerform">

                <!-- the user name input field uses a HTML5 pattern check -->
                <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
                <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required /><br>

                <!-- the email input field uses a HTML5 email type check -->
                <label for="login_input_email">User's email</label>
                <input id="login_input_email" class="login_input" type="email" name="user_email" required /><br>

                <!-- the password input field -->
                <label for="login_input_password_new">Password (min. 6 characters)</label>
                <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br>

                <!-- the password input check field -->
                <label for="login_input_password_repeat">Repeat password</label>
                <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br>
                <input type="submit"  name="register" value="Register" />
            </form>
        </div>
    </main>
</body>
