<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.head')
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark px-5 justify-content-end">
            <div class="btn-group mb-0">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{Auth::user()->username}}
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('panel') }}">
                            <i class="fa-solid fa-house"></i> Inicio
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                            @csrf
                            <button type="submit" class="nav-link text-start w-100">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- BARRA SUPERIOR FIGURAS -->

        <div class="d-flex container-fluid px-4 mt-3 ">
            <form action="{{ route('sketch.store') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-between align-items-center w-100 bgTopbar" id="sketchF"  @keydown.enter="preventFormSubmit">
                @csrf
                <input type="text" id="user_id" name="user_id" value="{{auth()->id()}}" hidden>
                <input type="text" id="figuras" name="json" hidden>
                <input type="text" id="img_preview" name="img_preview" hidden>

                <!-- FIGURES -->
                <ul class="navbar-nav d-flex flex-row">
                    <!-- BTN MOUSE -->
                    <li class="nav-item">
                        <button type="button" class="btn btn-secondary btn-lg ms-1" @click="setFig('')">
                            <i class="fa-sharp fa-solid fa-arrow-pointer"></i>
                        </button>
                    </li>
                    <!-- BTN RECT -->
                    <li class="nav-item">
                        <button type="button" class="btn btn-secondary btn-lg ms-1" @click="setFig('rect')">
                            <i class="fa-regular fa-square"></i>
                        </button>
                    </li>
                    <!-- BTN LINE -->
                    <li class="nav-item">
                        <button type="button" class="btn btn-secondary btn-lg ms-1" @click="setFig('line')">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                    </li>
                    <!-- BTN ELLIPSE -->
                    <li class="nav-item">
                        <button type="button" class="btn btn-secondary btn-lg ms-1" @click="setFig('ellipse')">
                            <i class="fa-regular fa-circle"></i>
                        </button>
                    </li>
                    <!-- BTN TEXT -->
                    <li class="nav-item">
                        <button type="button" class="btn btn-secondary btn-lg ms-1" @click="setFig('text')">
                            <i class="fa-solid fa-t"></i>
                        </button>
                    </li>
                </ul>
                <!-- TITLE -->
                <div class="d-flex">
                    <input type="text" name="name" id="name" value="Project name" class="text-center" required>
                </div>
                <!-- BTN SAVE -->
                <div class="d-flex">
                    <button type="button" @click="guardar()" class="btn btn-dark btn-lg me-2">Guardar</button>
                </div>
            </form>
        </div>

        <!-- SIDE BAR -->
        <div class="mt-3 d-flex px-4">
            <div class="workstation-sidebar d-flex flex-column me-4">
                <div class="bg-white px-3 mb-3">

                    <!-- PROPERTIES -->
                    <h3 class="mt-2">Propiedades</h3>
                    <hr class="my-3">
                    <div class="row properties">
                        <!-- INPUT X -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-sharp fa-solid fa-x me-2"></i>
                                <input type="number" name="x" id="x" min="0" />
                            </div>
                        </div>
                        <!-- INPUT Y -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-sharp fa-solid fa-y me-2"></i>
                                <input type="number" name="x" id="y" min="0" />
                            </div>
                        </div>
                        <!-- INPUT W -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-sharp fa-solid fa-w me-2"></i>
                                <input type="number" name="x" id="w" min="0" />
                            </div>
                        </div>
                        <!-- INPUT H -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-sharp fa-solid fa-h me-2"></i>
                                <input type="number" name="x" id="h" min="0" />
                            </div>
                        </div>
                        <!-- INPUT FILL -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-palette"></i>
                                <input type="color" name="fill_color" id="fill_color" />
                            </div>
                        </div>
                        <!-- INPUT CORNER -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-regular fa-circle"></i>
                                <input type="number" name="corner" id="corner" min="0" />
                            </div>
                        </div>
                        <!-- INPUT OPACITY FILL -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-palette me-2" style="color: #acadaf"></i>
                                <input type="number" name="fill_opacity" id="fill_opacity" min="0" max="255" />
                            </div>
                        </div>
                        <!-- INPUT TEXT SIZE -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-text-height"></i>
                                <input type="number" name="text_size" id="text_size" min="0" />
                            </div>
                        </div>
                    </div>

                    <!-- STROKE -->
                    <h3 class="mt-2">Stroke</h3>
                    <hr class="my-3">
                    <div class="row stroke">
                        <!-- INPUT FILL STROKE -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-palette"></i>
                                <input type="color" name="stroke_color" id="stroke_color" />
                            </div>
                        </div>
                        <!-- INPUT STROKE THICKNESS -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-minus"></i>
                                <input type="number" name="corner" id="corner" min="0" />
                            </div>
                        </div>
                        <!-- INPUT OPACITY STROKE -->
                        <div class="col-6 mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-palette me-2" style="color: #acadaf"></i>
                                <input type="number" name="stroke_opacity" id="stroke_opacity" min="0" max="255" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar bg-white text-dark">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mt-2 float-start">Capas</h3>
                        </div>
                        <hr class="my-2" />
                    </div>
                    <div class="layers px-2">
                        <!-- CAPA -->
                        <div v-for="(figure, index) in figures" class="layer text-dark d-flex justify-content-between">
                            <h5 class="m-0">@{{figure.name}}</h5>
                            <div class="d-flex">
                                <button type="button" @click="backLayer(index)" :key="'backLayer'+index">
                                    <i class="fa-sharp fa-solid fa-arrow-up"></i>
                                </button>
                                <button type="button" @click="nextLayer(index)" :key="'nextLayer'+index">
                                    <i class="fa-sharp fa-solid fa-arrow-down"></i>
                                </button>
                                <button type="button" @click="hiddenFigure(index)" :key="'hiddenFigure'+index">
                                    <i :class="figure.hidden ? 'fa-eye-slash' : 'fa-eye'" class="fa-solid"></i>
                                </button>
                                <button type="button" @click="deleteFigure(index)" :key="'deleteFigure'+index">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="canva" class=""></div>
        </div>
    </div>

    @include('layouts.scripts')
    <!-- P5 -->
    <script src="{{asset('js/p5.min.js')}}"></script>
    <!-- FIGURE -->
    <script src="{{asset('js/figura.js')}}"></script>
    <script>
        const { createApp } = Vue;
        createApp({
            data() {
                return {
                    figures: [],
                    figure: null,
                    figureSelected: false,
                    figureSelectedIndex: null,
                    figureType: '',
                    inicioX: null,
                    inicioY: null,
                    finalX: null,
                    finalY: null,
                }
            },
            methods: {
                setFig(figura) {
                    this.figureType = figura;
                },
                addNewFig(name, x, y, w, h) {
                    this.figures.unshift(new Figura(name, x, y, w, h));
                },
                nextLayer(index) {
                    if(!(index<0||index>=this.figures.length-1)) {
                        let respaldo = this.figures[index];
                        this.figures[index] = this.figures[index+1];
                        this.figures[index+1] = respaldo;
                    }
                },
                backLayer(index) {
                    if(!(index<=0||index>this.figures.length)) {
                        let respaldo = this.figures[index];
                        this.figures[index] = this.figures[index-1];
                        this.figures[index-1] = respaldo;
                    }
                },
                hiddenFigure(index) {
                    this.figures[index].hidden = this.figures[index].hidden ? false : true;
                },
                deleteFigure(index) {
                    this.figures = this.figures.filter((_, i) => i !== index);
                },
                preventFormSubmit(event) {
                    event.preventDefault();
                },
                guardar() {
                    document.getElementById("figuras").value = JSON.stringify(this.figures);
                    var sketch = document.getElementById("defaultCanvas0");
                    var image = sketch.toDataURL('image/png');
                    document.getElementById("img_preview").value = image;
                    document.getElementById("sketchF").submit();
                },
            },
            mounted() {
                new p5((p5) => {

                    p5.setup = () => {
                        var containerCanvas = document.getElementById("canva");
                        p5.createCanvas(containerCanvas.offsetWidth, containerCanvas.offsetHeight);
                    };
                    p5.draw = () => {
                        p5.background('#FFFFFF');

                        p5.strokeWeight(2);
                        p5.fill(0,0,0,0);
                        for (let i = this.figures.length - 1; i >= 0; i--) {
                            this.figures[i].drawFigura(p5);
                            if(!this.figures[i].hidden) {
                                this.figures[i].drawFigura(p5);
                            }
                        }

                        //DRAW FIGURES WITH MOUSE
                        if(this.figureType!==''&&this.inicioX!==null&&this.inicioY!==null) {
                            p5.stroke(0);
                            p5.fill(255,255,255,0);
                            p5.strokeWeight(2);
                            switch (this.figureType) {
                                case 'rect':
                                    p5.rect(this.inicioX, this.inicioY, p5.mouseX-this.inicioX, p5.mouseY-this.inicioY);
                                    break;
                                case 'line':
                                    p5.line(this.inicioX, this.inicioY, p5.mouseX, p5.mouseY);
                                    break;
                                case 'ellipse':
                                    p5.ellipse(this.inicioX+((p5.mouseX-this.inicioX)/2), this.inicioY+((p5.mouseY-this.inicioY)/2), (p5.mouseX-this.inicioX), (p5.mouseY-this.inicioY));
                                    break;
                            }
                        }

                        //HITBOX (FIGURE SELECTED FRAME)
                        if (this.figureSelected !== false) {
                          p5.noFill();
                          p5.stroke(255, 0, 0);
                          p5.strokeWeight(2);
                          let minX = Math.min(this.figure.x, this.figure.x + this.figure.w);
                          let maxX = Math.max(this.figure.x, this.figure.x + this.figure.w);
                          let minY = Math.min(this.figure.y, this.figure.y + this.figure.h);
                          let maxY = Math.max(this.figure.y, this.figure.y + this.figure.h);

                          switch (this.figure.name) {
                              case 'text':
                                  p5.rect(minX, minY - (maxY-minY) + 5, maxX-minX, maxY - minY);
                                  break;
                              case 'line':
                                  let rectX = Math.min(this.figure.x1, this.figure.x2);
                                  let rectY = Math.min(this.figure.y1, this.figure.y2);
                                  let rectWidth = Math.abs(this.figure.x2 - this.figure.x1);
                                  let rectHeight = Math.abs(this.figure.y2 - this.figure.y1); 
                                  p5.rect(rectX, rectY, rectWidth, rectHeight);
                                  break;
                              default:
                                  p5.rect(minX-10, minY-10, maxX - minX + 20, maxY - minY + 20);
                                  break;
                          }                          
                      }

                    };

                    p5.mouseClicked = () => {
                        if (p5.mouseX > 0 && p5.mouseX < p5.width && p5.mouseY > 0 && p5.mouseY < p5.height) {
                            if(this.figureSelected===false) {
                                this.figureSelectedIndex = this.figures.findIndex((figure) => {
                                    let minX = Math.min(figure.x, figure.x + figure.w);
                                    let maxX = Math.max(figure.x, figure.x + figure.w);
                                    let minY = Math.min(figure.y, figure.y + figure.h);
                                    let maxY = Math.max(figure.y, figure.y + figure.h);

                                    if(figure.name === 'line') {
                                        let rectX = Math.min(figure.x1, figure.x2);
                                        let rectY = Math.min(figure.y1, figure.y2);
                                        let rectWidth = Math.abs(figure.x2 - figure.x1);
                                        let rectHeight = Math.abs(figure.y2 - figure.y1); 
                                        return p5.mouseX >= rectX && p5.mouseX <= rectX + rectWidth && p5.mouseY >= rectY && p5.mouseY <= rectY + rectHeight;
                                    }
                                    return p5.mouseX >= minX && p5.mouseX <= maxX && p5.mouseY >= minY && p5.mouseY <= maxY;
                                });
                                console.log(this.figureSelectedIndex);
                                if(this.figureSelectedIndex>-1){
                                    this.figure = this.figures[this.figureSelectedIndex];
                                    console.log(this.figure);
                                    this.figureSelected = true;
                                }
                            }
                            
                        }
                    }

                    p5.mousePressed = () => {
                        if(p5.mouseX > 0 && p5.mouseX < p5.width && p5.mouseY > 0 && p5.mouseY < p5.height) {
                            if(this.figureType!=='') {
                                if(this.figureType==='text') {
                                    this.addNewFig(this.figureType, p5.mouseX, p5.mouseY, 0, 0);
                                    this.figures[0].updateFill('#000000', 100);
                                } else {
                                    if(this.inicioX == null && this.inicioY == null) {
                                        this.inicioX = p5.mouseX;
                                        this.inicioY = p5.mouseY;
                                    } else {
                                        this.finalX = p5.mouseX;
                                        this.finalY = p5.mouseY;
                                        if(this.figureType!=='line')
                                            this.addNewFig(this.figureType, this.inicioX, this.inicioY, this.finalX-this.inicioX, this.finalY-this.inicioY);
                                        else
                                            this.addNewFig(this.figureType, this.inicioX, this.inicioY, this.finalX, this.finalY);
                                        this.inicioX = null;
                                        this.inicioY = null;
                                        this.finalX = null;
                                        this.finalY = null;
                                    }
                                }
                            }
                        }
                    }
                    
                }, "canva");
            },
        }).mount("#app");
    </script>
</body>
</html>