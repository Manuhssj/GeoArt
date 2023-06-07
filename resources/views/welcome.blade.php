<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <div class="main-container">
            <div class="fullscreen-bg d-flex flex-column h-100">
                <!-- NAVBAR -->
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{asset('img/art.png')}}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top me-2"/>
                        <a class="navbar-brand geoArtLetter" href="{{ route('home') }}">GeoArt</a>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"  aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav"></div>
                    </div>
                </nav>

                <main class="container d-flex justify-content-center align-items-center h-100">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-5">
                            Iniciar sesion
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">
                            Registrarse
                        </a>
                    </div>
                </main>
            </div>
        </div>
    </div>

    @include('layouts.scripts')
    <!-- VUE -->
    <script>
        const { createApp } = Vue;
        createApp({
            data() {
                return {
                }
            },
            methods: {},
            mounted() {},
        }).mount("#app");
    </script>
</body>
</html>