<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<form action="" method="post">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="email" name="user_email" class="form-control" value="<?= (isset($userRegister_post)) ? $userRegister_post['user_email']: ""; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
            <input type="password" name="user_password" class="form-control" value="<?= (isset($userRegister_post)) ? $userRegister_post['user_password'] : ""; ?>">
        </div>
    </div>
    <input type="submit" value="Se connecter">
</form>