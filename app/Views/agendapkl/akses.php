<?php
function renderMenuTree($menus, $level = 0) {
    foreach ($menus as $menu) {
        echo '<div style="margin-left: ' . ($level * 30) . 'px">';
        echo '<label>';
        echo '<input type="checkbox" class="akses-checkbox" data-id="' . esc($menu->id_menuagenda) . '" ' .
            (!empty($menu->has_access) ? 'checked' : '') . '>';
        echo '<span id="status-simpan-' . esc($menu->id_menuagenda) . '" class="ml-2"></span>';
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

<h3>Kelola Akses Menu untuk Level: <?= esc($group->nama_level) ?>
<?php if (!empty($nama_jabatan) && $nama_jabatan !== '-'): ?>
    | Jabatan: <?= esc($nama_jabatan) ?>
<?php endif; ?>
</h3>
    <input type="hidden" id="id_level" value="<?= esc($group->id_level) ?>">
    <input type="hidden" id="id_jabatan" value="<?= esc($group->id_jabatan ?? '') ?>">
    
    <?php foreach ($menusAkses as $menu): ?>
        <div style="margin-left: <?= $menu->parent_id == 0 ? '0px' : '30px' ?>;">
            <label> 
                <input type="checkbox" 
                    class="akses-checkbox"
                    data-id="<?= esc($menu->id_menuagenda) ?>"
                    <?= $menu->has_access ? 'checked' : '' ?>>
                <?= esc($menu->title) ?>
                <span id="status-simpan-<?= esc($menu->id_menuagenda) ?>" class="ml-2"></span>
            </label>
        </div>
    <?php endforeach; ?>
<tr>
    <td>
        <span id="status-simpan-3" class="ml-2"></span>
    </td>
</tr>


<script>
    function showStatus(id, status) {
        const el = $('#status-simpan-' + id);
        if (status === 'loading') {
            el.html('<i class="fa fa-spinner fa-spin text-warning"></i>');
        } else if (status === 'success') {
            el.html('<i class="fa fa-check text-success"></i>');
        } else if (status === 'error') {
            el.html('<i class="fa fa-exclamation-triangle text-danger"></i>');
        } else {
            el.html('');
        }
    }

    $('.akses-checkbox').on('change', function () {
        const checkbox = $(this);
        const id_menu = checkbox.data('id');
        const id_level = $('#id_level').val();
        const id_jabatan = $('#id_jabatan').val();
        const isChecked = checkbox.is(':checked');

        showStatus(id_menu, 'loading');

        fetch("<?= site_url('agendapkl/Dashboard/save_ajax') ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                id_level: id_level,
                id_jabatan: id_jabatan,
                id_menu: id_menu,
                status: isChecked ? 1 : 0
            })
        })
        .then(res => res.json())
        .then(res => {
            if (res.status === 'ok') {
                showStatus(id_menu, 'success');
            } else {
                checkbox.prop('checked', !isChecked);
                showStatus(id_menu, 'error');
                alert('Gagal menyimpan perubahan!');
            }
        })
        .catch(() => {
            checkbox.prop('checked', !isChecked);
            showStatus(id_menu, 'error');
            alert('Terjadi kesalahan saat menyimpan.');
        });
    });
</script>
