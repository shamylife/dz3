<h4>Редактирование файла <b><?= $filename; ?></b></h4>

<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="POST">
    <div class="form-group">
        <label for="fileContent"></label>
        <textarea class="form-control" name="content" id="fileContent" rows="10"><?= $content; ?></textarea>
    </div>

    <input type="hidden" name="filename" value="<?= $filename; ?>">

    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>&nbsp Save
    </button>
</form>


<div class="alert alert-<?= $alert; ?>" role="alert">
    <?= $message; ?>
</div>