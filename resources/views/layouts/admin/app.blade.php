<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Start CSS --}}
    @include('layouts.admin.css')
    {{-- End CSS --}}
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        {{-- Start header --}}
        @include('layouts.admin.header')
        {{-- End header --}}

        {{-- Start sidebar --}}
        @include('layouts.admin.sidebar')
        {{-- End sidebar --}}

        {{-- Start main content --}}
        <main class="app-main">
            <div class="app-content p-4">
                @yield('content')
            </div>
        </main>
        {{-- End main content --}}

        {{-- Start  Footer --}}
        @include('layouts.admin.footer')
        {{-- End footer --}}

    </div>

    {{-- Start JS --}}
    @include('layouts.admin.js')
    {{-- End JS --}}
</body>

</html>
