@include('admin.layouts.header')

<div id="app" class="wrapper">

    @auth
        @include('admin.layouts.sidebar')
    @endauth

    <div class="content @auth auth @endauth">
        <div class="container-fluid">

            @if (session('status'))
                <div class="alert alert-primary" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-danger" role="alert">
                    {{ session('warning') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

</div>

@include('admin.layouts.footer')
