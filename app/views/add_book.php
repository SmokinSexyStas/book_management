<?php require_once 'blocks/header.php'; ?>

<div class="mx-auto mt-5 flex-fill" style="width: 400px;">
  <form method="POST" action="<?=$formAction?>">
    <input type="number" name="book_id" value="<?=isset($id) ? $id : '' ?>" hidden>
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="<?=$title?>" required />
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" class="form-control" id="author" name="author" value="<?=$author?>" required />
    </div>
    <div class="mb-3">
      <label for="releaseYear" class="form-label">Release year</label>
      <input
        type="number"
        class="form-control"
        id="releaseYear"
        name="releaseYear"
        min="1"
        max="<?=date('Y');?>"
        value="<?=$release_year?>"
      />
    </div>
    <div class="mb-3">
      <label for="genre" class="form-label">Genre</label><br>
      <select class="form-select" name="genre" id="genre">
        <?php foreach($genres as $item) : ?>
          <option value="<?=$item['genre']?>" <?= ($genre ?? '') === $item['genre'] ? 'selected' : ''; ?>><?=$item['genre']?></option>
        <?php endforeach;?>
      </select>
    </div>
    <div class="text-center">
      <p class="text-danger"><?=$errorMsg?></p>
      <button type="submit" class="btn btn-dark"><?=$action?></button>
    </div>
  </form>
</div>

<?php require_once 'blocks/footer.php';