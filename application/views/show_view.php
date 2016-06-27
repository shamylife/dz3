<?php
$filename = mb_convert_encoding($data['filename'], "UTF-8", "Windows-1251");
$content = $data['content'];
$alert = $data['alert'];
$message = $data['message'];

echo $filename;
?>

<div <?= ($alert) ? 'style="display: block"' : 'style="display: none"' ?>>
    <div class="alert alert-<?= $alert; ?>" role="alert">
        <h4><?= $message; ?></h4>
    </div>

    <a href="/add/">
        <button type='button' class='btn btn-primary'>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp Add file
        </button>
    </a>

    <a href="/upload/">
        <button type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp Upload file
        </button>
    </a>
</div>

<div <?= (!$alert) ? 'style="display: block"' : 'style="display: none"' ?>>
    <a href="/edit/change/<?= $linkname = urlencode($filename)?>">
        <button type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp Edit file
        </button>
    </a>

    <a href="/download/index/<?= $linkname ?>">
        <button type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp Download
        </button>
    </a>

    <a href="/remove/delete/<?= $linkname ?>">
        <button type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp Remove
        </button>
    </a>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b> <?= $filename; ?> </b></h3>
        </div>
        <div class="panel-body">
            <?= (!empty($content)) ? $content = nl2br(htmlspecialchars($content)) : "<h4>Файл пуст!</h4>"; ?>
        </div>
    </div>
</div>
