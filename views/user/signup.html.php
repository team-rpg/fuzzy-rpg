<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); 

?>

<form action="" method="post">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Firstname</label>
        <div class="col-sm-8">
            <input type="text" name="user_firstname" class="form-control" value="<?= (isset($user)) ? $user->getUserFirstname() : ""; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Lastname</label>
        <div class="col-sm-8">
            <input type="text" name="user_lastname" class="form-control" value="<?= (isset($user)) ? $user->getUserLastname() : ""; ?>">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="email" name="user_email" class="form-control" value="<?= (isset($user)) ? $user->getUserEmail() : ""; ?>">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
            <input type="password" name="user_password" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Confirm Password</label>
        <div class="col-sm-8">
            <input type="password" name="user_confirm_password" class="form-control">
        </div>
    </div>
    <input type="submit" value="Envoyer">
    
</form>