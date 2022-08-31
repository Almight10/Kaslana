<form action="CategoryController/edit/<?= $CategoryData->id ?>" method="post">
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" id="nama" name="nama" value="<?= $CategoryData->name ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="parent_id">parent id</label>
        <select id="parent_id" name="parent_id" class="form-control">
            <?php $categories = $data[0] ?>
            <?php foreach ($categories as $category) { ?>
                <?php
                if ($category->id == $CategoryData->parent_id) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                ?>
                <option value="<?= $category->id ?>" <?= $selected ?>><?= $category->name ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <button name="update" type="submit" class="btn-save">save</button>
    </div>
</form>