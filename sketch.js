let figName = "";

class Figure {
  constructor(posX, posY, w, h, color, name) {
    this.posX = posX;
    this.posY = posY;
    this.w = w;
    this.h = h;
    this.color = color;
    this.name = name;
    this.posX = posX;
    this.selected = false;
  }
}

const array = [];

function setup() {
  var cnv = createCanvas(1100, 600);
  var x = (windowWidth - width) / 1.4;
  var y = (windowHeight - height) / 0.9;
  cnv.position(x, y);
  background(255);
}

function draw() {
  //   if (mouseIsPressed) {
  //     console.log("hizo clic");
  //   }
}

function mouseClicked() {
  console.log(mouseX, mouseY);
}

function setFig(fig) {
  figName = fig;
}

function mouseReleased() {
  if (mouseButton === LEFT) {
    if (
      !!figName &&
      mouseX >= 0 &&
      mouseX <= width &&
      mouseY >= 0 &&
      mouseY <= height
    ) {
      array.push(new Figure(mouseX, mouseY, 80, 80, 255, figName));

      console.log(array);
    }
    switch (figName) {
      case "rect":
        drawRectangle();
        break;
      case "circle":
        drawEllipse();
        break;
      case "line":
        drawLine();
        break;
      case "text":
        drawText();
        break;
      default:
        break;
    }
  }
  return false;
}

function checkFigureClick(figure) {
  if (
    mouseX >= figure.x &&
    mouseX <= figure.x + figure.width &&
    mouseY >= figure.y &&
    mouseY <= figure.y + figure.height
  ) {
    figure.selected = true;
  } else {
    figure.selected = false;
  }
}

function drawRectangle() {
  fill(255);
  rect(mouseX, mouseY, 80, 80);
}
function drawEllipse() {
  fill(255);
  ellipse(mouseX, mouseY, 80, 80);
}

function drawLine() {
  stroke(0);
  line(mouseX, mouseY, mouseX + 80, mouseY);
}

function drawText() {
  fill(0);
  textSize(24);
  text("Hola, soy un texto", mouseX, mouseY);
}
