<?php

namespace App\Models\Universal;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menu_absen';
    protected $primaryKey       = 'id_menuabsen';
    protected $allowedFields    = ['title', 'link', 'icon', 'parent_id', 'is_have_child'];
    protected $returnType       = 'object';

    // Get detail group
    public function getGroup($id_group)
    {
        return $this->db->table('level')
                        ->where('id_level', $id_group)
                        ->get()
                        ->getRow();
    }

    public function getGroupp($id_group)
    {
        return $this->db->table('level')
            ->select('level.id_level, level.nama_level, jabatan.id_jabatan, jabatan.nama_jabatan')
            ->join('privileges_absen', 'privileges_absen.id_level = level.id_level', 'left')
            ->join('jabatan', 'jabatan.id_jabatan = privileges_absen.id_jabatan', 'left')
            ->where('level.id_level', $id_group)
            ->get()
            ->getRow();
    }

    public function getMenusWithAccess($id_level)
    {
        $builder = $this->db->query("
            SELECT 
                menu_absen.id_menuabsen,
                menu_absen.title,
                menu_absen.parent_id,
                IF(privileges_absen.id_level IS NULL, 0, 1) AS has_access
            FROM 
                menu_absen
            LEFT JOIN 
                privileges_absen ON menu_absen.id_menuabsen = privileges_absen.id_menu
                AND privileges_absen.id_level = ?
            ORDER BY 
                menu_absen.parent_id, menu_absen.id_menuabsen
        ", [$id_level]);

        return $builder->getResult(); // Mengembalikan sebagai array of object
    }

    public function getChildMenus($parent_id)
    {
        return $this->db->table('menu_absen')
                        ->select('title, link')
                        ->where('parent_id', $parent_id)
                        ->get()
                        ->getResult();
    }

    // Ambil semua menu berdasarkan grup (dengan struktur anak-anak jika ada)
    public function getMenusByGroup($group_id)
    {
        $menus = $this->db->table('menu_absen')
                          ->select('menu_absen.id_menuabsen, menu_absen.title, menu_absen.link, menu_absen.icon, menu_absen.is_have_child')
                          ->join('privileges_absen', 'menu_absen.id_menuabsen = privileges_absen.id_menu')
                          ->where('privileges_absen.id_level', $group_id)
                          ->get()
                          ->getResult();

        $menu_tree = [];

        foreach ($menus as $menu) {
            if ($menu->is_have_child == 0) {
                // cari anak-anaknya berdasarkan parent_id
                $children = array_filter($menus, function ($submenu) use ($menu) {
                    return $submenu->is_have_child == $menu->id_menuabsen;
                });

                $menu->children = array_values($children);
                $menu_tree[] = $menu;
            }
        }

        return $menu_tree;
    }


    public function getJabatanByLevel($level)
    {
        $result = $this->db->table('privileges_absen')
            ->select('id_jabatan')
            ->where('id_level', $level)
            ->limit(1)
            ->get()
            ->getRow();

        return $result ? $result->id_jabatan : null;
    }

    public function getJabatan($id_jabatan)
    {
        return $this->db->table('jabatan')
                        ->where('id_jabatan', $id_jabatan)
                        ->get()
                        ->getRow();
    }

    public function getJabatanFromPrivileges($id_level, $id_jabatan = null)
    {
        $builder = $this->db->table('privileges_absen')
            ->select('jabatan.id_jabatan, jabatan.nama_jabatan')
            ->join('jabatan', 'jabatan.id_jabatan = privileges_absen.id_jabatan')
            ->where('privileges_absen.id_level', $id_level);

        if ($id_jabatan !== null) {
            $builder->where('privileges_absen.id_jabatan', $id_jabatan);
        }

        return $builder->get()->getRow();
    }

    public function getStructuredMenusWithAccess($id_level, $id_jabatan = null)
    {
        $params = [$id_level];
        $whereJabatan = "";

        if ($id_jabatan !== null) {
            $whereJabatan = "AND (privileges_absen.id_jabatan = ? OR privileges_absen.id_jabatan IS NULL)";
            $params[] = $id_jabatan;
        } else {
            $whereJabatan = "AND privileges_absen.id_jabatan IS NULL";
        }

        $sql = "
            SELECT 
                menu_absen.id_menuabsen,
                menu_absen.title,
                menu_absen.parent_id,
                menu_absen.link,
                menu_absen.icon,
                menu_absen.is_have_child,
                IF(privileges_absen.id_menu IS NULL, 0, 1) AS has_access
            FROM 
                menu_absen
            LEFT JOIN 
                privileges_absen 
                ON menu_absen.id_menuabsen = privileges_absen.id_menu
                AND privileges_absen.id_level = ?
                $whereJabatan
            ORDER BY 
                menu_absen.parent_id, menu_absen.id_menuabsen
        ";

        $query = $this->db->query($sql, $params);
        $allMenus = $query->getResult();

        // Strukturisasi menu
        $parents = [];
        $childrenMap = [];

        foreach ($allMenus as $menu) {
            if ((int)$menu->parent_id === 0) {
                $menu->children = [];
                $parents[$menu->id_menuabsen] = $menu;
            } else {
                $childrenMap[$menu->parent_id][] = $menu;
            }
        }

        foreach ($parents as $id => $parent) {
            if (isset($childrenMap[$id])) {
                $parent->children = $childrenMap[$id];
            }
        }

        return array_values($parents);
    }
}
