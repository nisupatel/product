<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/all.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app" class="page-container">
        <header>
            <div class="logoPart">
                <div class="logoImg">
                    <img src="{{ asset('assets/images/wb-logo-en.gif') }}">
                </div>
                <div class="backBtn">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/home.png') }}"></a>
                    @yield('backBtn')
                </div>
                
            </div>
        </header>
        <div id="top-container">
            <div class="main-container container">
                <header role="banner" id="page-header">
                    <div class="innertoplink header-second">
                        <span class="topbannertxt">
                            <a href="{{ route('home') }}">Climate & Disaster Risk Screening Tools
                                @if(Session::has('project'))
                                    {{ ' - '.Session::get('project')->tool_name }}
                                @endif
                            </a>
                        </span> 
                        @if(Session::has('project'))
                            <div id="projId" title="{{ Session::get('project')->project_name }}">Project: {{ ((strlen(Session::get('project')->project_name) > 25) ? substr(Session::get('project')->project_name, 0, 25).'..' : Session::get('project')->project_name) }}</div>
                        @endif                    
                    </div>
                    
                </header>
            </div>
            <main class="py-4">
                <?php
                // /print_r(Session::get('project'));
                ?>
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.tooltipster.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.tooltipster.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/decisionTree.js') }}"></script>
    <script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    </script>
    @yield('scripts')
</body>
</html>
