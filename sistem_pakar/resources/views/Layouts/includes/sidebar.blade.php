<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-7">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Sistem Pakar Durian <i class="nav-icon fas fa-trees"></i></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth()->user()->role=='member')
          <li class="nav-item has-treeview {{ Request::is('DiagnosaPenyakit')?'menu-open':'' }} {{ Request::is('DiagnosaHama')?'menu-open':'' }}">
            <a href="" class="nav-link {{ Request::is('DiagnosaPenyakit')?'active':'' }} {{ Request::is('DiagnosaHama')?'active':'' }} ">
              <i class="nav-icon fas fa-laptop-medical"></i>
              <p>
                Diagnosa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/DiagnosaPenyakit" class="nav-link {{ Request::is('DiagnosaPenyakit')?'active':'' }}">
                  <i class="far fa-disease nav-icon"></i>
                  <p>Diagnosa Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/DiagnosaHama" class="nav-link {{ Request::is('DiagnosaHama')?'active':'' }}">
                  <i class="far fa-paw nav-icon"></i>
                  <p>Diagnosa hama</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Request::is('RiwayatDiagnosaPenyakit')?'menu-open':'' }} {{ Request::is('RiwayatDiagnosaHama')?'menu-open':'' }}">
            <a href="" class="nav-link {{ Request::is('RiwayatDiagnosaPenyakit')?'active':'' }} {{ Request::is('RiwayatDiagnosaHama')?'active':'' }}">
              <i class="nav-icon far fa-notes-medical"></i>
              <p>
                Riwayat Diagnosa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/RiwayatDiagnosaPenyakit" class="nav-link {{ Request::is('RiwayatDiagnosaPenyakit')?'active':'' }}">
                  <i class="far fa-disease nav-icon"></i>
                  <p>Riwayat Diagnosa Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/RiwayatDiagnosaHama" class="nav-link {{ Request::is('RiwayatDiagnosaHama')?'active':'' }}">
                  <i class="far fa-paw nav-icon"></i>
                  <p>Riwayat Diagnosa hama</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/InfoPenyakit" class="nav-link {{ Request::is('InfoPenyakit')?'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Info Penyakit
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/InfoHama" class="nav-link {{ Request::is('InfoHama')?'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Info Hama
              </p>
            </a>
          </li>
          @endif
          @if(auth()->user()->role=='admin')
          <li class="nav-item has-treeview {{ Request::is('ManageDataPenyakit')?'menu-open':'' }} {{ Request::is('ManageDataGejalaPenyakit')?'menu-open':'' }} {{ Request::is('ManageDataBasisPengPenyakit')?'menu-open':'' }} {{ Request::is('ManageDataLatihPenyakit')?'menu-open':'' }}">
            <a href="" class="nav-link {{ Request::is('ManageDataPenyakit')?'active':'' }} {{ Request::is('ManageDataGejalaPenyakit')?'active':'' }} {{ Request::is('ManageDataBasisPengPenyakit')?'active':'' }} {{ Request::is('ManageDataLatihPenyakit')?'active':'' }}">
              <i class="nav-icon fas fa-disease"></i>
              <p>
                Manage Data Penyakit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ManageDataPenyakit" class="nav-link {{ Request::is('ManageDataPenyakit')?'active':'' }}">
                  <i class="far fa-disease nav-icon"></i>
                  <p>Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ManageDataGejalaPenyakit" class="nav-link {{ Request::is('ManageDataGejalaPenyakit')?'active':'' }}">
                  <i class="fad fa-viruses nav-icon"></i>
                  <p>Gejala Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ManageDataBasisPengPenyakit" class="nav-link {{ Request::is('ManageDataBasisPengPenyakit')?'active':'' }}">
                  <i class="fas fa-books nav-icon"></i>
                  <p>Basis Pengetahuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ManageDataLatihPenyakit" class="nav-link {{ Request::is('ManageDataLatihPenyakit')?'active':'' }}">
                  <i class="fad fa-analytics nav-icon"></i>
                  <p>Data Latih</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Request::is('ManageDataHama')?'menu-open':'' }} {{ Request::is('ManageDataGejalaHama')?'menu-open':'' }} {{ Request::is('ManageDataBasisPengHama')?'menu-open':'' }} {{ Request::is('ManageDataLatihHama')?'menu-open':'' }}">
            <a href="" class="nav-link {{ Request::is('ManageDataHama')?'active':'' }} {{ Request::is('ManageDataGejalaHama')?'active':'' }} {{ Request::is('ManageDataBasisPengHama')?'active':'' }} {{ Request::is('ManageDataLatihHama')?'active':'' }}">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Manage Data Hama
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="/ManageDataHama" class="nav-link {{ Request::is('ManageDataHama')?'active':'' }}">
                    <i class="far fa-paw nav-icon"></i>
                    <p>Hama</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/ManageDataGejalaHama" class="nav-link {{ Request::is('ManageDataGejalaHama')?'active':'' }}">
                    <i class="fad fa-viruses nav-icon"></i>
                    <p>Gejala Hama</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/ManageDataBasisPengHama" class="nav-link {{ Request::is('ManageDataBasisPengHama')?'active':'' }}">
                    <i class="fas fa-books nav-icon"></i>
                    <p>Basis Pengetahuan</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="/ManageDataLatihHama" class="nav-link {{ Request::is('ManageDataLatihHama')?'active':'' }}">
                  <i class="fad fa-analytics nav-icon"></i>
                  <p>Data Latih</p>
                </a>
              </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="/DataPenyakit" class="nav-link {{ Request::is('DataPenyakit')?'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Penyakit
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/DataHama" class="nav-link {{ Request::is('DataHama')?'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Hama
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>