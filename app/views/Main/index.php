<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="card ">
            <div class="card-heading">
                <h3 class="card-title"><?= $post['title'] ?></h3>
            </div>
            <div class="card-body">
                <?= $post['text'] ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
