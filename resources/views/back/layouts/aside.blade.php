
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href=".{{route('panel')}}" class="brand-link"> <!--begin::Brand Image--> 
        {{-- <img src="" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text-->  --}}
        <span class="brand-text fw-light">Site İsmi</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Yönetici</li>
                <li class="nav-item"> <a href="{{route('panel')}}" class="nav-link @if (Request::segment(1) == 'panel') active @endif"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Anasayfa</p>
                    </a> </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-gear"></i>
                        <p>Ayarlar</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{route('logout')}}" class="nav-link"> <i class="nav-icon bi bi-box-arrow-left"></i>
                        <p>Oturumu Kapat</p>
                    </a> </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->