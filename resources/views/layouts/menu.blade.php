<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="text-center card-header">
                <img width="" height="75"
                src="{{ asset('images/family.png') }}">
                <div class="line_nav"></div>
            </div>
            
            <div class="nav">
                <!-- Dashboard -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ $nav == 'visualisasi' ?'active':'' }}" href="{{ route('silsilah.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dashboard"></i></div>
                    Visualisasi
                </a>
                <a class="nav-link {{ $nav == 'silsilah' ?'active':'' }}" href="{{ route('silsilah.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-dashboard"></i></div>
                    Data Keluarga
                </a>
            </div>
        </div>
    </nav>
</div>