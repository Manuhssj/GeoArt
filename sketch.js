function setup() {
  var cnv = createCanvas(1100, 600);
  var x = (windowWidth - width) / 1.4;
  var y = (windowHeight - height) / 0.9;
  cnv.position(x, y);
  background(255);
}

function draw() {
  if (mouseIsPressed) {
    fill(0);
  } else {
    fill(255);
  }
  ellipse(mouseX, mouseY, 80, 80);
}
