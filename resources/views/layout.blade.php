<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <?php
        use App\Models\Faculty;
        $rankCounts = Faculty::countRank();
    ?>
    <!-- passing data from model to javascript [data for charts] -->
    <div id="permaCount" data-count="{{ Faculty::countPermanentfaculty() }}" style="display: none;"></div>
    <div id="casCount" data-count="{{ Faculty::countCasualfaculty() }}" style="display: none;"></div>
    <div id="joCount" data-count="{{ Faculty::countJoborderfaculty() }}" style="display: none;"></div>

    <div id="profCount" data-count="{{ $rankCounts['profRanks'] }}" style="display: none;"></div>
    <div id="astproCount" data-count="{{ $rankCounts['astproRanks'] }}" style="display: none;"></div>
    <div id="asoproCount" data-count="{{ $rankCounts['asoproRanks'] }}" style="display: none;"></div>
    <div id="instCount" data-count="{{ $rankCounts['instRanks'] }}" style="display: none;"></div>
    <div id="lectCount" data-count="{{ $rankCounts['lectRanks'] }}" style="display: none;"></div>
    
    @include('includes.top_bar')
    @include('includes.navigation')
    @include('includes.search')
    @include('includes.chart')
    @yield('content')
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
