class Figura {
    //CONSTRUCTOR
    constructor(name = '', x = 0, y = 0, w = 0, h = 0) {
        this.name = name;           //TIPO DE FIGURA
        this.hidden = false;        //OCULTA
        this.selected = false;      //SELECCIONADA

        if(name === 'rect' || name === 'ellipse') {
            this.x = x;
            this.y = y;
            this.w = w;
            this.h = h;
        } else if(name === 'text') {
            this.x = x;
            this.y = y;
            this.w = 0;
            this.h = 0;
        } else if(name === 'line') {
            this.x1 = x;
            this.y1 = y;
            this.x2 = w;
            this.y2 = h;
        }
        
        this.fill_color = "#FFFFFF";    //RELLENO COLOR
        this.fill_opacity = 255;        //RELLENO OPACIDAD
        this.stroke = 1;                //GROSOR
        this.stroke_color = "#000000";  //BORDE COLOR
        this.stroke_opacity = 255;      //BORDE OPACIDAD
        this.corner = 0;                //ESQUINA REDONDEADA
        this.font_size = 16;            //TAMAÑO DE LETRA
        this.text = "SOY UN TEXTO";     //TEXTO
    }

    //DIBUJAR FIGURA
    drawFigura(p5) {
        switch (this.name) {
            case 'rect':
                p5.strokeWeight(this.stroke);
                p5.stroke(Figura.hexToR(this.stroke_color), Figura.hexToG(this.stroke_color), Figura.hexToB(this.stroke_color), this.stroke_opacity);
                p5.fill(Figura.hexToR(this.fill_color), Figura.hexToG(this.fill_color), Figura.hexToB(this.fill_color), this.fill_opacity);
                p5.rect(this.x, this.y, this.w, this.h, this.corner);
                break;

            case 'ellipse':
                p5.strokeWeight(this.stroke);
                p5.stroke(Figura.hexToR(this.stroke_color), Figura.hexToG(this.stroke_color), Figura.hexToB(this.stroke_color), this.stroke_opacity);
                p5.fill(Figura.hexToR(this.fill_color), Figura.hexToG(this.fill_color), Figura.hexToB(this.fill_color), this.fill_opacity);
                p5.ellipse(this.x+(this.w/2), this.y+(this.h/2), this.w, this.h);
                break;

            case 'text':
                this.w = p5.textWidth(this.text);
                this.h = p5.textAscent() + p5.textDescent();
                p5.strokeWeight(this.stroke);
                p5.stroke(Figura.hexToR(this.stroke_color), Figura.hexToG(this.stroke_color), Figura.hexToB(this.stroke_color), this.stroke_opacity);
                p5.fill(Figura.hexToR(this.fill_color), Figura.hexToG(this.fill_color), Figura.hexToB(this.fill_color), this.fill_opacity);
                p5.textSize(this.font_size);
                p5.text(this.text, this.x, this.y);
                break;

            case 'line':
                p5.strokeWeight(this.stroke);
                p5.stroke(Figura.hexToR(this.stroke_color), Figura.hexToG(this.stroke_color), Figura.hexToB(this.stroke_color), this.stroke_opacity);
                p5.line(this.x1, this.y1, this.x2, this.y2);
                break;
        
            default:
                console.log("No se pudo dibujar ninguna figura. Name: "+this.name);
                break;
        }
    }
    //CONVERTIR A DECIMAL
    static decimalToHex(decimal) {
        if (decimal < 0 || decimal > 255) {
            return null;
        }
        const hexadecimal = Math.round(decimal).toString(16);
        const paddedHexadecimal = hexadecimal.padStart(2, '0');
        return paddedHexadecimal;
    }
    //HEX TO RGB (R)
    static hexToR(hex) {
        return parseInt(hex.slice(1, 3), 16);
    }
    //HEX TO RGB (G)
    static hexToG(hex) {
        return parseInt(hex.slice(3, 5), 16);
    }
    //HEX TO RGB (B)
    static hexToB(hex) {
        return parseInt(hex.slice(5, 7), 16);
    }
    //ACTUALIZAR RELLENO
    updateFill(color, opacity) {
        this.fill_color = color;
        this.fill_opacity = opacity;
    } 
    //ACTUALIZAR BORDE
    updateBorder(color, opacity, stroke) {
        this.stroke_color = color;
        this.stroke_opacity = opacity;
        this.stroke = stroke;
    } 
    //ACTUALIZAR LINEA 
    updateLine(x1, y1, x2, y2) {
        this.x1 = x1;
        this.y1 = y1;
        this.x2 = x2;
        this.y2 = y2;
    }
    //ACTUALIZAR TEXTO
    updateText(size, text) {
        this.font_size = size;
        this.text = text;
    }
}