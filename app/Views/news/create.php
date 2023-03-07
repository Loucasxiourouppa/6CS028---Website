<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?=base_url()?>/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title"  value="<?= set_value('title') ?>">
    <br>

    <label for="body">Text</label>
    <textarea name="body" cols="75" rows="10"><?= set_value('body') ?></textarea>
    <br>

    <input class="btn btn-primary" type="submit" name="submit" value="Create Blog">
</form>