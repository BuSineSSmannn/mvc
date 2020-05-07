<option value="<?= $id?>">
    <?= $tab. $category['title']?>
</option>
<?php if(isset($category['childs'])): ?>
    <?= $this->getMenuHTML($category['childs'],'&nbsp;' . $tab . '-')?>
<?php endif; ?>
