import setScore from './setScore';

let canvas = document.getElementById("snake");
let context = canvas.getContext("2d");
let box = 32;
let score = 0;
let snake = [];
let food = {
    x: Math.floor(Math.random() * 15 + 1) * box,
    y: Math.floor(Math.random() * 15 + 1) * box
}

snake[0] = {
    x: 8 * box,
    y: 8 * box
}

let direction = "right";

function createBG() {
    context.fillStyle = "MediumSeaGreen";
    context.fillRect(0, 0, 16 * box, 16 * box);
    //        coord  x, y, width, height
}

function createSnake() {
    for (let x = 0; x < snake.length; x++) {
        context.fillStyle = "DarkGreen";
        context.fillRect(snake[x].x, snake[x].y, box, box);
    }
}

function drawFood() {
    context.fillStyle = "red";
    context.fillRect(food.x, food.y, box, box);
}

document.addEventListener('keydown', update);

function update(event) {
    if(event.keyCode == 37 && direction != "right") direction = "left";
    if(event.keyCode == 38 && direction != "down") direction = "up";
    if(event.keyCode == 39 && direction != "left") direction = "right";
    if(event.keyCode == 40 && direction != "up") direction = "down";
}

function viewScore(score) {
    let scoreElement = document.body.querySelector('#score');
    scoreElement.textContent = "Score: " + score;
}


function startGame () {
    if(snake[0].x > 15 * box && direction == "right") snake[0].x = 0;
    if(snake[0].x < 0 && direction == "left") snake[0].x = 16 * box;
    if(snake[0].y > 15 * box && direction == "down") snake[0].y = 0;
    if(snake[0].y < 0 && direction == "up") snake[0].y = 16 * box;
    
    for(let i = 1; i < snake.length; i++) {
        if(snake[0].x == snake[i].x && snake[0].y == snake[i].y) {
            clearInterval(game);
            // Adds the last score to the 'game-over' element
            let lastScore = document.querySelector('#last-score');
            lastScore.textContent = "Your Score: " + score;
            // change the display of the 'game-over' element to be shown
            game_over.style.display = 'table';
            setScore(score);
            gameOver();
        }
    }
    
    createBG();
    createSnake();
    drawFood();
    viewScore(score);
    
    let snakeX = snake[0].x;
    let snakeY = snake[0].y;
    
    if(direction == "right") snakeX += box;
    if(direction == "left") snakeX -= box;
    if(direction == "up") snakeY -= box;
    if(direction == "down") snakeY += box;
    
    if(snakeX != food.x || snakeY != food.y) {
        snake.pop();
    }else {
        food.x = Math.floor(Math.random() * 15 + 1) * box;
        food.y = Math.floor(Math.random() * 15 + 1) * box;
        score++;
    }
    
    let newHead = {
        x: snakeX,
        y: snakeY
    }
    
    snake.unshift(newHead);
}

function reset() {
    while(snake.pop()){}
    snake[0] = {
        x: 8 * box,
        y: 8 * box
    }
    direction = "right";
    score = 0;
}

function gameOver() {
    let btnTryAgain = document.querySelector('#try-again');
    btnTryAgain.addEventListener('click', function() {setTimeout(leadOff, 1500)});
}

let menu = document.querySelector('#menu');
let game_over = document.querySelector('#game-over');
let ranking = document.querySelector('#ranking');

function leadOff() {
    clearInterval(game);
    reset();
    menu.style.display = 'none';
    game_over.style.display = 'none';
    game = setInterval(startGame, dificulty);
}

let game;
let dificulty;

const btnPlay = document.querySelector('#play');
btnPlay.addEventListener('click', function() {
    dificulty = document.querySelector("input[name='dificulty']:checked").value;
    ranking.style.display = 'flex';
    ranking.style.opacity = '1';
    leadOff();
});

const btnHome = document.querySelector('#home');
btnHome.addEventListener('click', function() {
    game_over.style.display = 'none';
    ranking.style.display = 'none';
    menu.style.display = 'flex';
});