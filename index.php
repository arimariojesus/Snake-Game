<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="./js/script.js" type="module"></script>
    <script src="./js/getNick.js" type="module"></script>
    <script src="./js/updateRanking.js"></script>

    <title>Snake Game</title>
</head>
<body>
    <h1>SNAKE GAME</h1>
    <p><small style="font-size: 10px;">By <a href="https://www.linkedin.com/in/arimario-jesus/">Arimário Jesus</a></small></p>

    <div id="wrapper-game">
        <p id="score"></p>

        <canvas id="snake" width="512" height="512"></canvas>

        <div id="menu">
            <div id="play">
                <button id="play" type="button">Play</button>
            </div>

            <div class="div-nickname">
                <input id="nickname" type="text" placeholder="Nickname" maxlength="15" style="width: 220px; height: 24px;" spellcheck="false">
            </div>
            
            <div id="dificulty">
                <fieldset>
                    <legend>Dificulty</legend>
                    <div id="dificulty-radios">
                        <input id="easy" type="radio" name="dificulty" value="100">
                        <label for="easy">Easy</label>
                        <input id="medium" type="radio" name="dificulty" value="70" checked="checked">
                        <label for="medium">Medium</label>
                        <input id="hard" type="radio" name="dificulty" value="60">
                        <label for="hard">Hard</label>
                    </div>
                </fieldset>
            </div>
        </div>

        <!-- Ranking -->
        <div id="ranking"></div>
        
        <!-- Modal Game-Over -->
        <div id="game-over" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-container">
                    <div class="container">
                        <h2>Game Over</h2>
                    </div>
                    <div class="container">
                        <p id="last-score"></p>
                    </div>
                    <footer>
                        <button id="try-again" type="button">Try Again</button>
                        <button id="home">Home</button>
                    </footer>
                </div>
            </div>
        </div>
        
    </div>

    <a href="#game-over"></a>
</body>
</html>