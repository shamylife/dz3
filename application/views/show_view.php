<?php

$filename = $data['filename'];
$content = $data['content'];

?>

<a href="edit.php?name=<?= $filename; ?>">
    <button type="button" class="btn btn-primary">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp Edit file
    </button>
</a>

<a href="download.php?name=<?= $filename; ?>">
    <button type="button" class="btn btn-primary">
        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp Download
    </button>
</a>

<a href="remove.php?name=<?= $filename; ?>">
    <button type="button" class="btn btn-primary">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp Remove
    </button>
</a>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><b> <?= $filename; ?> </b></h3>
    </div>
    <div class="panel-body">
        <?= (!empty($content)) ? $content : "<h4>Файл пуст!</h4>"; ?>
    </div>
</div>
