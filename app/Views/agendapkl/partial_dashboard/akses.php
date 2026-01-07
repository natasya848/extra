<?php
function renderMenuTree($menus, $level = 0) {
    foreach ($menus as $menu) {
        echo '<div style="margin-left: ' . ($level * 30) . 'px">';
        echo '<label>';
        echo '<input type="checkbox" name="menus[]" value="' . esc($menu->id_menuagenda) . '" ' .
             (!empty($menu->has_access) ? 'checked' : '') . '>' ;
        echo esc($menu->title);
        echo '</label>';
        echo '</div>';

        // Jika ada children, panggil lagi secara rekursif
        if (!empty($menu->children)) {
            renderMenuTree($menu->children, $level + 1);
        }
    }
} 
?>
<!-- <h3>Kelola Akses Menu untuk Level: <?= esc($group->nama_level) ?></h3> -->
<h3>Kelola Akses Menu untuk Level: <?= esc($group->nama_level) ?> 
<?php if (!empty($jabatan_nama) && $jabatan_nama !== '-'): ?>
    | Jabatan: <?= esc($jabatan_nama) ?>
<?php endif; ?>
</h3>

<form action="<?= site_url('agendapkl/dashboard/save') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id_level" value="<?= esc($group->id_level) ?>">
<input type="hidden" name="id_jabatan" value="<?= esc($jabatan) ?>">

    <?php foreach ($menusAkses as $menu): ?>

        <div style="margin-left: <?= $menu->parent_id == 0 ? '0px' : '30px' ?>;">
            <label> 
                <input type="checkbox" 
                       name="menus[]" 
                       value="<?= esc($menu->id_menuagenda) ?>" 
                       <?= $menu->has_access ? 'checked' : '' ?>>
                <?= esc($menu->title) ?>
            </label>
        </div>
    <?php endforeach; ?>

    <br>
    <button type="submit">Simpan Akses</button>
</form>
