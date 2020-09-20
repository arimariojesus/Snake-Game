let canvas = document.getElementById("snake");
let context = canvas.getContext("2d");
let box = 32;
let snake = [];
snake[0] = {
    x: 8 * box,
    y: 8 * box
}

function createBG() {
    context.fillStyle = "lightgreen";
    context.fillRect(0, 0, 16 * box, 16 * box);
}

function createSnake() {
    for (x = 0; x < snake.length; x++) {
        context.fillStyle = "green";
        context.fillRect(snake[x].x, snake[x].y, box, box);
    }
}

createBG();
createSnake();