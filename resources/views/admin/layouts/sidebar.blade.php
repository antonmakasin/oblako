<div class="sidebar">
    <a href="{{ route('admin.index') }}" class="logo">{{ config('app.name') }}</a>

    <div id="accordion">
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">{{ __('messages.menu_users') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.files.index') }}">{{ __('messages.menu_files') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}">{{ __('messages.menu_logout') }}</a>
            </li>
        </ul>
    </div>
</div>
