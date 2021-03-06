<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}"> {{-- vinculamos los estilos de fotawesome --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

       <!--  Script para trabajar con Sweealert2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>  
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            livewire.on('alert', function(){
                Swal.fire(
                'Registro Satifactorio!',
                'Click para continuar!',
                'success'
                )
            })
        </script>
         <script>
            livewire.on('alert_up', function(){
                Swal.fire(
                'Actualizacion Exitosa!',
                'Click para continuar!',
                'success'
                )
            })
        </script>

        <script>
             livewire.on('loanding', function(){
                Swal.fire({
                title: 'Please Wait !',
                html: 'data uploading',// add html attribute if you want or remove
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
        }
        </script>

    </body>
</html>
