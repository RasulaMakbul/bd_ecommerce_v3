<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body>

    <x-admin.partials.navbar />

    <div class="container-fluid">
        <div class="row">
            <x-admin.partials.sidebar />


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @if(session('message'))
                <x-admin.partials.successMessage :message="session('message')" />
                @endif

                <x-admin.partials.errorMessage />

                {{ $slot }}

            </main>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @livewireScripts
    @stack('js')
</body>

</html>