<?php require_once 'blocks/header.php'; ?>

<div class="mx-auto mt-5 flex-fill" style="width: 400px;">
  <form method="POST" action="/login">
    <div class="mb-3">
      <label for="login" class="form-label">Login</label>
      <input
        type="text"
        class="form-control"
        name="login"
        value="<?=$login?>"
        required
      />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" value="<?=$password?>" required />
    </div>
    <div class="text-center">
      <p class="text-danger"><?=$errorMsg?></p>
      <button type="submit" class="btn btn-dark">Submit</button>
    </div>
  </form>
</div>

<?php require_once 'blocks/footer.php'; ?>
