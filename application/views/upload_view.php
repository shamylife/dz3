<?php
$filename = $data['filename'];
$error = $data['error'];
$alert = $data['alert'];
$message = $data['message'];
?>

<h4>Загрузите свой файл в формате <i><b>.txt</b></i></h4>

<p style="color: #777;"><i>Максимальный размер файла 2Мб</i></p>

<form enctype="multipart/form-data" action="/upload/transfer" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>

    <div class="form-group">
        <input type="file" id="userFile" name="uploadfile">
    </div>

    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp Upload file
    </button>
</form>

<div class="alert alert-<?= $alert; ?>" role="alert">
    <?= $message; ?>
</div>