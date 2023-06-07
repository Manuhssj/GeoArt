<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.head')
</head>

<body>
    <!-- Navbar -->
    <div id="app">

        <div class="main-container">
            <div class="d-flex flex-column h-100">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand ms-5 my-3" href="{{ route('home') }}">
                        <img src="{{asset('img/art.png')}}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top me-2  ">
                        <a class="navbar-brand geoArtLetter" href="{{ route('home') }}">GeoArt</a>
                    </a>
                </nav>

                <main class="container d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-4">
                        <div class="card cardColor form-card">
                            <div class="mt-4 text-center">
                                <h2 class="">Registro</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="POST">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success text-center text-uppercase" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger text-center text-uppercase" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif
                                    <!-- USERNAME -->
                                    <div class="mb-3 text-start ms-5 me-5">
                                        <label for="username" class="form-label">Nombre de usuario</label>
                                        <input type="text" name="username" class="form-control" value="{{old('username')}}" placeholder="Ingresa tu usuario" required>
                                        @error('username')
                                            <div>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- EMAIL -->
                                    <div class="mb-3 text-start ms-5 me-5">
                                        <label for="email" class="form-label text-center">Correo electronico</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Ingresa tu correo electronico" required>
                                        @error('email')
                                            <div>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- PASSWORD -->
                                    <div class="mb-3 text-start ms-5 me-5">
                                        <label for="contraseña" class="form-label ">Contraseña</label>
                                        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" minlength="8" required>
                                        @error('password')
                                            <div>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- SUBMIT -->
                                    <div class="d-grid gap-2 me-5 ms-5">
                                        <button type="submit" class="btn btn-dark mb-1">Registrarse</button>
                                    </div>
                                    <!-- REDIRECT TO LOGIN -->
                                    <div class="d-flex justify-content-center align-items-center my-2">
                                        <small>¿Ya posees una cuenta? <a href="{{ route('login') }}" class="ms-2">Login</a></small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    @include('layouts.scripts')
    <script>
        const { createApp } = Vue
        createApp({
            data() {
                return {
                }
            },
            methods: {
            },
            mounted() {
            }
        }).mount('#app')
    </script>
</body>
</html>