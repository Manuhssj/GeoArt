<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark pt-3">
            <div class="container">
                <div class="text-end"></div>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> {{Auth::user()->username}}
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="nav-link text-start w-100">
                                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="text-dark text-start py-5">
            <div class="container">
                <h2 class="text-center">Bienvenido a tus proyectos GeoArt</h2>
                <div class="row">
                    <div class="col-4 text-start">
                        <h4 class="mt-2">Proyectos Creados</h4>
                    </div>
                    <div class="col-8 text-end">
                        <a href="{{route('sketch.create')}}" class="btn btn-secondary mt-1">Crear Proyecto</a>
                    </div>
                </div>
                <hr />
            </div>
        </section>
        <!-- Projects Section -->
        <section>
            <div class="container">
                <div class="row">
                    @if (count($sketches)>0)
                        @foreach ($sketches as $sketch)
                            <div class="col-md-3 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{$sketch->img_preview}}" class="card-img-top img-fluid" />
                                        <h5 class="card-title text-center mt-2">{{$sketch->name}}</h5>
                                        <div class="text-center">
                                            <a href="{{url('/sketch/'.$sketch->id)}}" class="btn btn-secondary w-100 mb-3">Abrir</a>
                                            <form id="destroySketch{{$sketch->id}}" action="{{route('sketch.delete', $sketch->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="text" name="id{{$sketch->id}}" value="{{$sketch->id}}" hidden>
                                            </form>
                                            <button type="button" @click="destroy({{$sketch->id}})"  class="btn btn-danger w-100">
                                                ELIMINAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center">
                            <h2>No hay ningún sketch para mostrar.</h2>
                        </div> 
                    @endif
                </div>
            </div>
        </section>
    </div>

    @include('layouts.scripts')
    <script>
        const { createApp } = Vue;
        createApp({
            data() {
                return {
                    sketches: @json($sketches),
                }
            },
            methods: {
                destroy(id){
                    Swal.fire({
                        title: '¿Estas seguro?',
                        text: "Confirme esta acción para eliminar",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '##27b22a',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, ¡Eliminar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("destroySketch" + id).submit();
                        }
                    })
                }
            },
            mounted() {
            },
        }).mount("#app");
    </script>
</body>

</html>