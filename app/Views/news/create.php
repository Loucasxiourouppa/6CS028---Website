<!-- View file -->

<!-- Add a viewport meta tag to enable responsive design -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add a style tag to include the custom CSS styles -->
<style>
  /* Styles for screens with a maximum width of 767px */
  @media (max-width: 767px) {
    label {
      width: 100%;
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"], textarea {
      width: 100%;
      box-sizing: border-box;
    }
    
    input[type="file"] {
      width: auto;
      margin-top: 10px;
    }
  }
</style>

<!-- Add the HTML markup for the form -->
<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?=base_url()?>/news/create" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title"  value="<?= set_value('title') ?>">
    <br>

    <label for="body">Text</label>
    <textarea name="body" cols="75" rows="10"><?= set_value('body') ?></textarea>
    <br>

    <label for="image">Image</label>
    <input type="file" name="image">
    <br>

    <input class="btn btn-primary" type="submit" name="submit" value="Create Blog">
</form>
