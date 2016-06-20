<form action="add/create" method="POST">
    <div class="form-group">
        <label for="fileName">Add file name:</label>
        <?php $value = (isset($file)) ? $file : ''; ?>
        <input type="text" class="form-control" name="name" placeholder="File name(*.txt)" value="<?= $value; ?>">
    </div>

    <div class="form-group">
        <label for="fileContent">Add content:</label>
        <?php $value = (isset($content)) ? $content : ''; ?>
        <textarea class="form-control" name="content" id="fileContent" rows="10"><?= $value; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp Add file
    </button>
</form>

<div class="alert alert-<?= $alert; ?>" role="alert">
    <?= $message; ?>
</div>