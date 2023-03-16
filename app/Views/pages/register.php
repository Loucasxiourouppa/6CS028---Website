<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <?php echo validation_errors(); ?>
    <?php echo form_open('register/register_user'); ?>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo set_value('username'); ?>" />
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" />
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" />
        </div>
        <div>
            <input type="submit" value="Register" />
        </div>
    </form>
</body>
</html>
