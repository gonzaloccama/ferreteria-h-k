<div class="d-flex flex-column flex-shrink-0 bg-light vh-100" style="width: 100%;">
    <?php
    $menus = \App\Models\SettingMenu::orderBy('order')->where('type', 'user')->where('parent', 0)->get();
    ?>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        @foreach($menus as $menu)
            <li class="nav-item">
                <a href="{{ route($menu->route) }}"
                   class="nav-link py-3 border-bottom {{ $menu->name == $title ? 'active-1':'' }}">
                    <i class="animation {{ $menu->menu_icon }}" style="font-size: 24px"></i>
                    <small><b>{{ $menu->name }}</b></small>
                </a>
            </li>
        @endforeach
    </ul>
{{--    <div class="dropdown border-top">--}}
{{--        <a href="#"--}}
{{--           class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle"--}}
{{--           id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--            <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24"--}}
{{--                 class="rounded-circle"> </a>--}}
{{--        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">--}}
{{--            <li><a class="dropdown-item" href="#">Settings</a></li>--}}
{{--            <li><a class="dropdown-item" href="#">Profile</a></li>--}}
{{--            <li>--}}
{{--                <hr class="dropdown-divider">--}}
{{--            </li>--}}
{{--            <li><a class="dropdown-item" href="#">Sign out</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
</div>
