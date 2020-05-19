<?php if (!empty($posts)): ?>
    <div id="answer"></div>
    <button class="btn btn-success" id="send">Кнопка</button><br>
    <?php new \fw\widgets\menu\Menu([
            'tpl'=> WWW. '/menu/select.php',
            'container' => 'select',
            'class'=>'mymenu',
            'table' => 'categories',
            'cache'=>3600,
            'cacheKey'=>'menu_select'
    ]);?>
    <?php new \fw\widgets\menu\Menu([
           'tpl'=> WWW. '/menu/mymenu.php',
            'container' => 'ul',
            'class'=>'mymenu',
            'table' => 'categories',
            'cache'=>3600,
           'cacheKey'=>'menu_menu'

    ]);?>
    <?php  foreach ($posts as $post): ?>
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
                   // var data = JSON.parse(res);
                   // $('#answer').html('<p> Ответ: ' +data.answer + ' | Код: '  + data.code +'</p>');
                    $('#answer').html(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        });
    });

</script>
