<?php
$filename = $data['filename'];
$alert = $data['alert'];
$message = $data['message'];
?>

<div <?= (!empty($data)) ? 'style="display: block"' : 'style="display: none"' ?>>
    <div class="alert alert-<?= $alert; ?>" role="alert">
        <?= $message; ?>
    </div>

    <a href="/">
        <button type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>&nbsp Home
        </button>
    </a>
</div>
