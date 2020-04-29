<?php if (!empty($posts)): ?>
    <button class="btn btn-success" id="send">Кнопка</button>
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
<script src="/js/test.js" defer></script>
<script>
    $(function () {
        $('#send').click(function () {
            $.ajax({
                url: '/main/test',
                type: 'post',
                data: {'id': 2},
                success: function (res) {
                    console.log(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        });
    });

</script>
