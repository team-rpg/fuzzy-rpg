<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<form action="" method="post">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Nom du personnage :</label>
        <div class="col-sm-8">
            <input type="text" name="character_nickname" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label>Classe du personnage :</label>
        <div>
            <select name="character_class_id" id="character_class_id">
                <option value="null" selected>- Selectionnez une classe -</option>
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?=$class['class_id'] ?>"><?= $class['class_name']?></option>
                    <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <input type="submit" value="Créer personnage">
</form>