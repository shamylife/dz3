<div class="col-md-8">
    <h3>Список файлов:</h3>

    <div class="empty" <?= (empty($data)) ? 'style="display: block"' : 'style="display: none"' ?>>
        <p>Папка пуста</p>
    </div>

    <div <?= (!empty($data)) ? 'style="display: block"' : 'style="display: none"' ?>>
        <table class="table table-stripped">
            <thead>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($data as $key => $filename) :
                $id = $key + 1; ?>
                <tr>
                    <th scope="row"><?= $id ?></th>
                    <td>
                        <form id="button" action="/show/view" method="POST">
                            <input type='hidden' name='filename' value='<?= $filename = mb_convert_encoding($filename, "UTF-8", "Windows-1251");?>'>
                            <input class="button" type="submit" value="<?= $filename; ?>">
                        </form>
                    </td>
                    <td>
                        <a href="edit/change/<?= $filename; ?>" title="Редактировать">
                            <span class="glyphicon glyphicon-edit"></span>&nbsp
                        </a>
                        <a href="download/index/<?= $filename; ?>" title="Скачать">
                            <span class="glyphicon glyphicon-share"></span>&nbsp
                        </a>
                        <a href="remove/delete/<?= $filename = urlencode($filename)?>" title="Удалить">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach;
            echo "</tbody></table>"; ?>
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
