<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full font-sans antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1280">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ \Laravel\Nova\Nova::name() }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">

    <!-- Tool Styles -->
    @foreach(\Laravel\Nova\Nova::availableStyles(request()) as $name => $path)
        <link rel="stylesheet" href="/nova-api/styles/{{ $name }}">
    @endforeach

<!-- Custom Meta Data -->
    @include('nova::partials.meta')

<!-- Theme Styles -->
    @foreach(\Laravel\Nova\Nova::themeStyles() as $publicPath)
        <link rel="stylesheet" href="{{ $publicPath }}">
    @endforeach
</head>
<body class="min-w-site bg-40 text-black min-h-full">
<div id="nova">
    <div v-cloak class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="min-h-screen flex-none min-h-screen w-sidebar bg-grad-sidebar">
            <div class="sidebar-top">
                <a href="{{ \Laravel\Nova\Nova::path() }}" class="sidebar-logo">
                    <div class="pin-t pin-l pin-r bg-logo flex items-center w-sidebar h-header px-6 text-white">
                        @include('nova::partials.logo')
                    </div>
                </a>
            </div>
            <div class="sidebar-main px-6">
                <div class="display mb-6">
                    <label class="display-check flex cursor-pointer">
                        <input class="display-input" id="display-input" type="checkbox">
                        <label class="display-btn cursor-pointer" for="display-input"></label>
                        <p class="display-check-title text-white sidebar-label">Display mode</p>
                    </label>
                </div>
                @foreach (\Laravel\Nova\Nova::availableTools(request()) as $tool)
                    {!! $tool->renderNavigation() !!}
                @endforeach
            </div>



            <div class="sidebar-main px-6">
                <div class="display mb-6">
                    <label class="display-check flex cursor-pointer">

                        <a class="display-check-title text-white sidebar-label" href="/">Back To Front</a>
                    </label>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="flex items-center relative shadow h-header bg-white z-20 px-view">
                <a v-if="@json(\Laravel\Nova\Nova::name() !== null)"
                   href="{{ \Illuminate\Support\Facades\Config::get('nova.url') }}"
                   class="no-underline dim font-bold text-90 mr-6">
                    {{ \Laravel\Nova\Nova::name() }}
                </a>

                @if (count(\Laravel\Nova\Nova::globallySearchableResources(request())) > 0)
                    <global-search dusk="global-search-component"></global-search>
                @endif

                <dropdown class="ml-auto h-9 flex items-center dropdown-right">
                    @include('nova::partials.user')
                </dropdown>
            </div>

            <div data-testid="content" class="px-view py-view mx-auto main-content">
                @yield('content')

                @include('nova::partials.footer')
            </div>
        </div>
    </div>
</div>

<script>
    window.config = @json(\Laravel\Nova\Nova::jsonVariables(request()));
</script>

<!-- Scripts -->
<!-- Custom Scripts start -->
<script src="{{ mix('displayMode.js', 'vendor/nova') }}"></script>
<!-- Custom Scripts end -->
<script src="{{ mix('manifest.js', 'vendor/nova') }}"></script>
<script src="{{ mix('vendor.js', 'vendor/nova') }}"></script>
<script src="{{ mix('app.js', 'vendor/nova') }}"></script>

<!-- Build Nova Instance -->
<script>
    window.Nova = new CreateNova(config)
</script>

<!-- Tool Scripts -->
@foreach (\Laravel\Nova\Nova::availableScripts(request()) as $name => $path)
    @if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://']))
        <script src="{!! $path !!}"></script>
    @else
        <script src="/nova-api/scripts/{{ $name }}"></script>
    @endif
@endforeach

<!-- Start Nova -->
<script>
    Nova.liftOff()
</script>
<script src="{{ mix('allowChangeMaster.js', 'vendor/nova') }}"></script>
@if (\Illuminate\Support\Str::contains(Request::url(), 'track-list-resources') && Session::get('trackListAction') )
    <script src="{{ mix('trackExportRedirect.js', 'vendor/nova') }}"></script>
@endif
</body>
</html>
