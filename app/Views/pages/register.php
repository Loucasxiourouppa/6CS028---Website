<!-- templates/header.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>

<!-- templates/footer.php -->
</body>
</html>

<!-- register.php -->
<h1><?= $title ?></h1>
<?= validation_errors() ?>
<?= form_open('register/register_user') ?>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username"><br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email"><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password"><br>

    <input type="submit" value="Register">
<?= form_close() ?>
