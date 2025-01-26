<?php require_once 'blocks/header.php' ?>
    
    <?php if ($success_message) : ?>
      <div class="alert alert-success" role="alert" id="success-message" style="width: 600px; margin: auto;">
        <?=$success_message?>
      </div>
    <?php endif; ?>

    <main class="flex-fill my-3">
      <?php 
      if (isset($_SESSION['admin_id'])) {
        echo 
        "<div class=\"text-center mb-3\">
          <button type=\"button\" class=\"btn btn-success\" onclick=\"window.location.href='/add_book'\">Add new book</button>
        </div>";
      }
      ?>
      <div class="container" style="width: 800px;">
        <ul class="list-group">
          <?php foreach($books as $book) : ?>
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <?php echo "<b>'" . $book['title'] . "'</b> " . $book['author'] . " - " . 
              $book['release_year'] . " (" . ($book['genre']) . ")"; ?>
            </div>
            <?php 
              if (isset($_SESSION['admin_id'])) { 
              echo "<div class=\"btn-group\" role=\"group\">
                <button type=\"button\" class=\"btn btn-outline-warning\" onclick=\"window.location.href='/update_book?book_id=" . $book['id'] . "'\">Update</button>
                <button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"confirmDeletion(" . $book['id'] . ")\">Delete</button>
              </div>";
            }
              ?>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </main>
    <script>
      function confirmDeletion(bookId) {
        if(confirm("Delete selected book?")) {
          window.location.href='/delete_book?book_id=' + bookId;
        }
      }

      document.addEventListener('DOMContentLoaded', (event) => {
        const successMessageDiv = document.getElementById('success-message');
        if (successMessageDiv) {
          setTimeout(() => {
            successMessageDiv.style.display = 'none';
          }, 5000);
        }
      });
    </script>
<?php require_once 'blocks/footer.php' ?>