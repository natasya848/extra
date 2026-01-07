<?php

$uri = service('uri');

$db = \Config\Database::connect();
$builder = $db->table('website');
$logo = $builder->select('logo_website')
  ->where('deleted_at', null)
  ->get()
  ->getRow();

?>
<script src="<?= base_url('assets/static/js/initTheme.js') ?>"></script>
<div id="app">
  <div id="sidebar">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
          <div class="logo">
            <a href="<?= base_url('agendapkl/dashboard') ?>"><img src="<?= base_url('logo/logo_website/' . $logo->logo_website) ?>" alt="Logo" /></a>
          </div>
          <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
              <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                <g transform="translate(-210 -1)">
                  <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                  <circle cx="220.5" cy="11.5" r="4"></circle>
                  <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                </g>
              </g>
            </svg>
            <div class="form-check form-switch fs-6">
              <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
              <label class="form-check-label"></label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
              <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
            </svg>
          </div>
          <div class="sidebar-toggler x">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
          </div>
        </div>
      </div>

      <!-- Menu Superadmin & Admin  --------------------------------------------------------------------------------------->

      <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item <?php if ($uri->getSegment(2) == "dashboard") {
                                      echo "active";
                                    } ?>">
              <a href="<?= base_url('agendapkl/dashboard') ?>" class='sidebar-link'>
                <i class="fa-solid fa-grid-2"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li class="sidebar-title">Master Data</li>

            <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_absensi_sekolah") {
                                      echo "active";
                                    } ?>">
              <a href="<?= base_url('agendapkl/data_absensi_sekolah') ?>" class='sidebar-link'>
                <i class="fa-regular fa-file-chart-column"></i>
                <span>Data Absensi Sekolah</span>
              </a>
            </li>
            <li class="sidebar-item <?php if (
                                $uri->getSegment(2) == "data_agenda_all" && $uri->getTotalSegments() == 4
                                ||
                                $uri->getSegment(2) == "data_agenda_all" && strlen($uri->getSegment(3)) == 3
                              ) {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_all') ?>" class='sidebar-link'>
          <i class="fa-regular fa-book-bookmark"></i>
          <span>Data Agenda</span>
        </a>
      </li>
            </li>

            </li>
            </li>
          </ul>
        </div>
    </div>
  </div>

  <!-- Menu Kesiswaan  -------------------------------------------------------------------------------------------->

<?php } else if (session()->get('level') == 3 && session()->get('jabatan') == 9) { ?>
  <div class="sidebar-menu">
    <ul class="menu">
      <li class="sidebar-title">Menu</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "dashboard") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/dashboard') ?>" class='sidebar-link'>
          <i class="fa-solid fa-grid-2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sidebar-title">Absensi</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_absensi_sekolah" && $uri->getSegment(3) !== "menu_print_absensi_sekolah" && $uri->getSegment(3) !== "menu_print_rpl" && $uri->getSegment(3) !== "menu_print_bdp" && $uri->getSegment(3) !== "menu_print_akl") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_sekolah') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Absensi Sekolah</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(3) == "menu_print_absensi_sekolah" || $uri->getSegment(3) == "menu_print_rpl" || $uri->getSegment(3) == "menu_print_bdp" || $uri->getSegment(3) == "menu_print_akl") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_sekolah/menu_print_absensi_sekolah') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Print Absensi Sekolah</span>
        </a>
      </li>
      
      
      </li>
      </li>

      </li>
      </li>
    </ul>
  </div>
</div>
</div>

<!-- Menu Kajur  -------------------------------------------------------------------------------------------->

<?php } else if (session()->get('level') == 3 && session()->get('jabatan') == 10) { ?>
  <div class="sidebar-menu">
    <ul class="menu">
      <li class="sidebar-title">Menu</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "dashboard") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/dashboard') ?>" class='sidebar-link'>
          <i class="fa-solid fa-grid-2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- <li class="sidebar-title">Master Data</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_siswa_all") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_siswa_all') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Siswa</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_instruktur") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_instruktur') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Instruktur</span>
        </a>
      </li> -->

      <li class="sidebar-title">Absensi</li>

      <li class="sidebar-item <?php if (
                                $uri->getSegment(2) == "data_absensi_sekolah_all" && $uri->getTotalSegments() == 4
                                ||
                                $uri->getSegment(2) == "data_absensi_sekolah_all" && strlen($uri->getSegment(3)) == 3
                              ) {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_sekolah_all') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Absensi Sekolah</span>
        </a>
      </li>

      <li class="sidebar-item <?php if (
                                $uri->getSegment(2) == "data_absensi_sekolah_all" && strstr($uri->getSegment(3), "menu_print")
                              ) {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_sekolah_all/menu_print_absensi_sekolah') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Print Absensi Sekolah</span>
        </a>
      </li>


      <li class="sidebar-title">Agenda</li>

      <li class="sidebar-item <?php if (
                                $uri->getSegment(2) == "data_agenda_all" && $uri->getTotalSegments() == 4
                                ||
                                $uri->getSegment(2) == "data_agenda_all" && strlen($uri->getSegment(3)) == 3
                              ) {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_all') ?>" class='sidebar-link'>
          <i class="fa-regular fa-book-bookmark"></i>
          <span>Data Agenda</span>
        </a>
      </li>
      </li>

      <li class="sidebar-item <?php if (
                                $uri->getSegment(2) == "data_agenda_all" && strstr($uri->getSegment(3), "menu_print")
                              ) {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_all/menu_print_agenda_all') ?>" class='sidebar-link'>
          <i class="fa-regular fa-book-bookmark"></i>
          <span>Print Agenda</span>
        </a>
      </li>
      </li>

      </li>
      </li>

      </li>
      </li>
    </ul>
  </div>
  </div>
  </div>

  <!-- Menu Guru  -------------------------------------------------------------------------------------------->

<?php } else if (session()->get('level') == 3 && session()->get('jabatan') == 11) { ?>
  <div class="sidebar-menu">
    <ul class="menu">
      <li class="sidebar-title">Menu</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "dashboard") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/dashboard') ?>" class='sidebar-link'>
          <i class="fa-solid fa-grid-2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sidebar-title">Absensi</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_absensi_guru" && $uri->getSegment(3) !== "menu_print" || $uri->getSegment(2) == "data_absensi_sekolah") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_guru') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Absensi Sekolah</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(3) == "menu_print" && $uri->getSegment(2) !== "data_agenda_guru") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_guru/menu_print') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Print Data Absensi Sekolah</span>
        </a>
      </li>
      </li>
      </li>

      <li class="sidebar-title">Agenda</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_agenda_guru" && $uri->getSegment(3) !== "menu_print") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_guru') ?>" class='sidebar-link'>
          <i class="fa-solid fa-file-invoice"></i>
          <span>Data Agenda</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(3) == "menu_print" && $uri->getSegment(2) !== "data_absensi_guru") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_guru/menu_print') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Print Data Agenda</span>
        </a>
      </li>
      </li>
      </li>
    </ul>
  </div>
  </div>
  </div>

  <!-- Menu Instruktur  -------------------------------------------------------------------------------------------->

<?php } else if (session()->get('level') == 6) { ?>
  <div class="sidebar-menu">
    <ul class="menu">
      <li class="sidebar-title">Menu</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "dashboard") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/dashboard') ?>" class='sidebar-link'>
          <i class="fa-solid fa-grid-2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sidebar-title">Absensi</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_absensi_kantor" && $uri->getSegment(3) !== "menu_print_absensi_kantor") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_kantor') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Absensi Kantor</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(3) == "menu_print_absensi_kantor") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_kantor/menu_print_absensi_kantor') ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Print Absensi Kantor</span>
        </a>
      </li>
      </li>
      </li>

      <li class="sidebar-title">Agenda</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_agenda_instruktur" && $uri->getSegment(3) !== "menu_print_agenda") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_instruktur') ?>" class='sidebar-link'>
          <i class="fa-regular fa-book-bookmark"></i>
          <span>Data Agenda</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(3) == "menu_print_agenda") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda_instruktur/menu_print_agenda') ?>" class='sidebar-link'>
          <i class="fa-regular fa-book-bookmark"></i>
          <span>Print Agenda</span>
        </a>
      </li>
      </li>
      </li>
    </ul>
  </div>
  </div>
  </div>

  <!-- Menu Siswa  ------------------------------------------------------------------------------------------->

<?php } else if (session()->get('level') == 4 || session()->get('level') == 5) { ?>
  <div class="sidebar-menu">
    <ul class="menu">
      <li class="sidebar-title">Menu</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "dashboard") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/dashboard') ?>" class='sidebar-link'>
          <i class="fa-solid fa-grid-2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="sidebar-title">Absensi</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_absensi_sekolah") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_sekolah/detail/' . session()->get('id')) ?>" class='sidebar-link'>
          <i class="fa-solid fa-clipboard-user"></i>
          <span>Data Absensi Sekolah</span>
        </a>
      </li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_absensi_kantor") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_absensi_kantor/detail/' . session()->get('id')) ?>" class='sidebar-link'>
          <i class="fa-regular fa-file-chart-column"></i>
          <span>Data Absensi Kantor</span>
        </a>
      </li>
      </li>
      </li>

      <li class="sidebar-title">Agenda</li>

      <li class="sidebar-item <?php if ($uri->getSegment(2) == "data_agenda" || $uri->getSegment(2) == "data_agenda_all") {
                                echo "active";
                              } ?>">
        <a href="<?= base_url('agendapkl/data_agenda/index/' . session()->get('id')) ?>" class='sidebar-link'>
          <i class="fa-regular fa-book-bookmark"></i>
          <span>Data Agenda</span>
        </a>
      </li>

      </li>
      </li>
    </ul>
  </div>
  </div>
  </div>
<?php } ?>