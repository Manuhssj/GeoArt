
<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <div class="main-container">
            <div class="d-flex flex-column h-100">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand ms-5 my-3" href="{{ route('home') }}">
                        <img src="{{asset('img/art.png')}}" alt="Logo" width="50" height="50" class="d-inline-block align-text-top me-2" />
                        <a class="navbar-brand geoArtLetter" href="{{ route('home') }}">GeoArt</a>
                    </a>
                </nav>

                <main class="container d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-4">
                        <div class="card cardColor form-card">
                            <div class="mt-4 text-center">
                                <h2 class="">Iniciar sesión</h2>
                            </div>
                            <div class="card-body">
                                <!-- FORM -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <!-- INPUT EMAIL -->
                                    <div class="mb-3 text-start ms-5 me-5">
                                        <label for="email" class="form-label">Correo electrónico</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Ingresa tu email" id="email" required />
                                        @error('email')
                                            <div>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- INPUT PASSWORD -->
                                    <div class="mb-3 text-start ms-5 me-5">
                                        <label for="password" class="form-label text-center">Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña" required />
                                        @error('password')
                                            <div>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- BTN SUBMIT -->
                                    <div class="d-grid gap-2 me-5 ms-5">
                                        <button type="submit" class="btn btn-dark mb-1">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                    <!-- REDIRECT TO REGISTER -->
                                    <div class="d-flex justify-content-center align-items-center my-2">
                                        <small>¿No cuentas con cuenta?<a href="{{ route('register') }}" class="ms-2">Registrate aquí</a></small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div><!-- end main container -->
    </div>

    @include('layouts.scripts')
    <script>
        const { createApp } = Vue;
    
        createApp({
            data() {
                return {
                    email: "",
                    password: "",
                };
            },
            methods: {
                handleLogin() {
                    // Send a POST request
                    let data = JSON.stringify({
                        email: this.email,
                        password: this.password,
                    });
    
                    let config = {
                        method: "post",
                        maxBodyLength: Infinity,
                        url: "https://web-figma-clone-backend-production.up.railway.app/api/auth/login",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        data: data,
                    };
    
                    axios
                    .request(config)
                    .then((response) => {
                        if (response.data.ok) {
                            localStorage.setItem("user", JSON.stringify(response.data.name));
                            localStorage.setItem('token', JSON.stringify(response.data.token));
                            setTimeout(() => {
                                location.href = "landingPage.html";
                            }, 500);
                        }
                    })
                    .catch((error) => {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Correo o contraseña incorrectos",
                        });
                    });
                },
            },
            mounted() {
                if (!!JSON.parse(localStorage.getItem("user"))) {
                    location.href = "workstation.html";
                }
            },
        }).mount("#app");
    </script>
</body>
</html>