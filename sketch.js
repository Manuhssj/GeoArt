function setup() {
  var cnv = createCanvas(1100, 600);
  var x = (windowWidth - width) / 1.4;
  var y = (windowHeight - height) / 0.9;
  cnv.position(x, y);
  background(255);
}

function drawRectangle() {
  fill(255, 0, 0);
  rect(50, 50, 100, 100);
}
function drawEllipse() {
  fill(0, 255, 0);
  ellipse(200, 200, 100, 100);
}

function drawLine() {
  stroke(0, 0, 255);
  line(300, 300, 350, 350);
}

function drawText() {
  fill(0);
  textSize(24);
  text("Hola, soy un texto", 100, 100);
}
