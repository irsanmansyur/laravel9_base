<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ '/'}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <x-dashboard-component />
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<script>
    let collapItem = document.querySelectorAll(".nav-link,.collapse-item");
    collapItem.forEach(item => {
        if (item.classList.contains("active")) {
            console.log(item);
            if (item.closest(".collapse")) {
                item.closest(".collapse").classList.add("show")
            }
            if (item.closest(".nav-item")) {
                item.closest(".nav-item").classList.add("active")
            }
        }
    })
</script>
