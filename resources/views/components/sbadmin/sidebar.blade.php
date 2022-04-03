<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard')}}">
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

    @foreach($menus as $menu)
    <!-- Heading -->
    <?php
    $allow = false;
    foreach ($menu->navigations as $i => $nav) {
        if (auth()->user()->can($nav->permission_name)) {
            $allow = true;
        }
    } ?>
    @if($allow)
    <div class="sidebar-heading">
        {{$menu->name}}
    </div>
    @endif

    <!-- Nav Item - Pages Collapse Menu -->
    @foreach($menu->navigations as $navigation)
    @can($navigation->permission_name)
    <li class="nav-item" id="{{$navigation->permission_name}}">

        @if($navigation->url || $navigation->route)
        <a class="nav-link {{request()->is($navigation->url ?? '#')  || request()->is($navigation->url.'/*') || (Route::has($navigation->route?? '#') && request()->routeIs($navigation->route) ) ? ' active' :''}}" href="{{ Route::has($navigation->route ?? '#') ? route($navigation->route) : url($navigation->url?? '#')}}">
            <div class="d-flex">
                <span style="width: 20px;padding-top:2px">
                    <i class="fas fa-fw fa-cog"></i>
                </span>
                <span>{{$navigation->name}}</span>
            </div>
        </a>
        @else
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-{{$navigation->id}}" aria-controls="collapse{{$navigation->permission_name}}">
            <i class="fas fa-fw fa-folder"></i>
            <span> {{$navigation->name}}</span>
        </a>
        <div id="collapse-{{$navigation->id}}" class="collapse" aria-labelledby="headingPermission" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Header {{substr($navigation->name,0,16)}}:</h6>
                @foreach($navigation->children->sortBy("sequence_number") as $child)
                <a class="collapse-item {{request()->is($child->url ?? '#')  || request()->is($child->url.'/*') || (Route::has($child->route?? '#') && request()->routeIs($child->route.'*') ) ? ' active' :''}}" href=" {{  Route::has($child->route ?? '#') ? route($child->route) : url($child->url?? '#')}}">{{$child->name}}</a>
                @endforeach
            </div>
        </div>
        @endif

    </li>
    @endcan
    @endforeach

    @if($allow)
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif
    @endforeach


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
