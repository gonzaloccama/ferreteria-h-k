<div class="menu">
    <?php
    $menus = \App\Models\SettingMenu::orderBy('order')->with('children', function ($query) {
        $query->orderBy('order');
    })->where('type', 'admin')->where('parent', 0)->get();
    ?>
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                @foreach($menus as $menu)
                    <?php
                    $children = [];
                    foreach (json_decode($menu->children) as $child) {
                        $children[] = $child->route;
                    }
                    ?>
                    <li class="{{ in_array(Route::currentRouteName(), $children) || Route::currentRouteName() == $menu->route  ? 'active' : '' }} text-center">
                        <a href="{{ (int)$menu->is_route ? route($menu->route) : '#'.$menu->route }}">
                            <i class="{{ $menu->menu_icon }}"></i> {{ $menu->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            @foreach($menus as $menu)
                <?php
                $smenus = \App\Models\SettingMenu::orderBy('order')->where('type', 'admin')->where('parent', $menu->id)->get();
                ?>
                <ul class="list-unstyled" data-link="{{ $menu->route }}">
                    @foreach($smenus as $smenu)
                        <li class="{{ Route::currentRouteName() == $smenu->route ? 'active' : '' }}">
                            <a href="{{ route($smenu->route) }}">
                                <i class="iconsminds-voice"></i>
                                <span class="d-inline-block">{{ $smenu->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
            {{--            --}}

        </div>
    </div>
</div>
