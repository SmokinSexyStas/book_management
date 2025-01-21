<?php require_once 'blocks/header.php' ?>
    <main>
      <ul class="list-group">
        <?php foreach($arr as $book) : ?>
        <li class="list-group-item"><?php echo '\''.$book[0].'\' '.$book[1].', '.$book[2].' '.$book[3] ?></li>
        <?php endforeach;?>
      </ul>
    </main>
<?php require_once 'blocks/footer.php' ?>