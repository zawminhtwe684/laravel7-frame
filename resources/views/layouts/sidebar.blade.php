<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                <i class="feather-shopping-bag text-white h4 mb-0"></i>
            </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>

            <x-menu-spacer></x-menu-spacer>


            <x-menu-item name="Home" class="fas fa-home" link="{{route('home')}}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

            <x-menu-title title="My Test Title"></x-menu-title>

            <x-menu-item name="Create List" class="fas fa-plus-circle"></x-menu-item>
            <x-menu-item name="Item List" class="fas fa-list" counter=50></x-menu-item>


            <x-menu-spacer></x-menu-spacer>

            <x-menu-title title="User Info:"></x-menu-title>
            <x-menu-item name="User Profile" class="fas fa-user" link="{{route('profile')}}"></x-menu-item>
            <x-menu-item name="User Pthto Edit" class="fas fa-edit" link="{{route('profile.edit.photo')}}"></x-menu-item>
            <x-menu-item name="Change Passsword" class="feather-refresh-cw" link="{{route('profile.edit.password')}}"></x-menu-item>
            <x-menu-item name="Change Name & Mail" class="fas fa-edit" link="{{route('profile.edit.name.email')}}"></x-menu-item>


            <x-menu-spacer></x-menu-spacer>

            <a class="btn btn-primary text-center w-100" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>


            <li class="menu-title">
        </ul>
    </div>
</div>
