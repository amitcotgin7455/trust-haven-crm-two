<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(!empty($title)) {echo $title;}else{echo 'Error 404';}?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/logo (1).svg">
</head>
<style>
    .center{
        text-align:center;
        font-size: 32px;
    
    }
  #space-invaders {
  margin: 0 auto;
  display: block;
  background: white
}
.error-link {
      text-decoration: none;
      color: #fff;
      background-color: #B31942;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    .error {
      text-align: center;
    }

   
    .error-message {
      font-size: 2rem;
      color: #555;
    }
    .error-messages {
      font-size: 1rem;
      color: #555;
    }

    

    @keyframes shake {
      0% {
        transform: translateX(-5px);
      }

      100% {
        transform: translateX(5px);
      }
    }

    @media only screen and (max-width: 768px) {
      .error-code {
        font-size: 8rem;
      }

      .error-message {
        font-size: 1.5rem;
      }
    }
    .btn-group button {
  background-color: #b31942; 
  border: 1px solid #b31942; 
  color: white; 
  padding: 10px 24px; 
  cursor: pointer; 
  float: left;
  margin-left:12px;
  
}

.btn-group{
    display: flex;
    justify-content: center;
}
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; 
}


.btn-group button:hover {
  background-color: #b31942;}

</style>
<body>
    <div class="error">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! Page not found.</p>
        <div class="btn-group">
          <a href="<?php echo base_url();?>Lead/listLead/">
           <button>Go Back</button>
          </a>
        <button id="restart"> Start or Restart Game</button>
       </div>
        <p class="error-messages">Use space to shoot and Left Right Arrow for Move </p>
        <!-- <a href="#" id="restart" class="error-link">Restart</a>  -->
        <!-- <br/> Use <span class="label label-danger" >Space</span> to shoot and <span class="label label-danger">←</span>&#160;<span class="label label-danger">→</span> to move!&#160;&#160;&#160;<button class="btn btn-default btn-xs" id="restart">Restart</button></p> -->
      </div>

  
  <canvas id="space-invaders"></canvas> 
  
      

</body>
<script>
    ;(function() {
  "use strict";

  // General
  var canvas,
    screen,
    gameSize,
    game;

  // Assets
  var invaderCanvas,
    invaderMultiplier,
    invaderSize = 20,
    initialOffsetInvader,
    invaderAttackRate,
    invaderSpeed,
    invaderSpawnDelay = 250;

  // Counter
  var i = 0,
    kills = 0,
    spawnDelayCounter = invaderSpawnDelay;

  var invaderDownTimer;

  // Text
  var blocks = [
    [3, 4, 8, 9, 10, 15, 16],
    [2, 4, 7, 11, 14, 16],
    [1, 4, 7, 11, 13, 16],
    [1, 2, 3, 4, 5, 7, 11, 13, 14, 15, 16, 17],
    [4, 7, 11, 16],
    [4, 8, 9, 10, 16]
  ];

  // Game Controller
  // ---------------
  var Game = function() {

    this.level = -1;
    this.lost = false;

    this.player = new Player();
    this.invaders = [];
    this.invaderShots = [];

    if (invaderDownTimer === undefined) {
      invaderDownTimer = setInterval(function() {
        for (i = 0; i < game.invaders.length; i++) game.invaders[i].move();
      }, 1000 - (this.level * 1.8));

    };
  }

  Game.prototype = {
    update: function() {

      // Next level
      if (game.invaders.length === 0) {

        spawnDelayCounter += 1;
        if (spawnDelayCounter < invaderSpawnDelay) return;

        this.level += 1;

        invaderAttackRate -= 0.002;
        invaderSpeed += 10;

        game.invaders = createInvaders();

        spawnDelayCounter = 0;
      }

      if (!this.lost) {

        // Collision
        game.player.projectile.forEach(function(projectile) {
          game.invaders.forEach(function(invader) {
            if (collides(projectile, invader)) {
              invader.destroy();
              projectile.active = false;
            }
          });
        });

        this.invaderShots.forEach(function(invaderShots) {
          if (collides(invaderShots, game.player)) {
            game.player.destroy();
          }
        });

        for (i = 0; i < game.invaders.length; i++) game.invaders[i].update();

      }

      // Don't stop player & projectiles.. they look nice
      game.player.update();
      for (i = 0; i < game.invaderShots.length; i++) game.invaderShots[i].update();

      this.invaders = game.invaders.filter(function(invader) {
        return invader.active;
      });

    },

    draw: function() {

      if (this.lost) {
        screen.fillStyle = "rgba(0, 0, 0, 0.03)";
        screen.fillRect(0, 0, gameSize.width, gameSize.height);

        screen.font = "55px Lucida Console";
        screen.textAlign = "center";
        screen.fillStyle = "white";
        screen.fillText("You lost", gameSize.width / 2, gameSize.height / 2);
        screen.font = "20px Lucida Console";
        screen.fillText("Points: " + kills, gameSize.width / 2, gameSize.height / 2 + 30);

      } else {
        screen.clearRect(0, 0, gameSize.width, gameSize.height);

        screen.font = "10px Lucida Console";
        screen.textAlign = "right";
        screen.fillText("Points: " + kills, gameSize.width, gameSize.height - 12);
      }

      screen.beginPath();

      var i;
      this.player.draw();
      if (!this.lost)
        for (i = 0; i < this.invaders.length; i++) this.invaders[i].draw();
      for (i = 0; i < this.invaderShots.length; i++) this.invaderShots[i].draw();

      screen.fill();

    },

    invadersBelow: function(invader) {
      return this.invaders.filter(function(b) {
        return Math.abs(invader.coordinates.x - b.coordinates.x) === 0 &&
          b.coordinates.y > invader.coordinates.y;
      }).length > 0;
    }

  };

  // Invaders
  // --------
  var Invader = function(coordinates) {
    this.active = true;
    this.coordinates = coordinates;
    this.size = {
      width: invaderSize,
      height: invaderSize
    };

    this.patrolX = 0;
    this.speedX = invaderSpeed;

  };

  Invader.prototype = {
    update: function() {

      if (Math.random() > invaderAttackRate && !game.invadersBelow(this)) {
        var projectile = new Projectile({
          x: this.coordinates.x + this.size.width / 2,
          y: this.coordinates.y + this.size.height - 5
        }, {
          x: 0,
          y: 2
        });
        game.invaderShots.push(projectile);
      }

    },
    draw: function() {
      if (this.active) screen.drawImage(invaderCanvas, this.coordinates.x, this.coordinates.y);

    },
    move: function() {
      if (this.patrolX < 0 || this.patrolX > 100) {
        this.speedX = -this.speedX;
        this.patrolX += this.speedX;
        this.coordinates.y += this.size.height;

        if (this.coordinates.y + this.size.height * 2 > gameSize.height) game.lost = true;

      } else {
        this.coordinates.x += this.speedX;
        this.patrolX += this.speedX;
      }

    },
    destroy: function() {
      this.active = false;
      kills += 1;

    }

  };

  // Player
  // ------
  var Player = function() {
    this.active = true;
    this.size = {
      width: 16,
      height: 8
    };
    this.shooterHeat = -3;
    this.coordinates = {
      x: gameSize.width / 2 - (this.size.width / 2) | 0,
      y: gameSize.height - this.size.height * 2
    };

    this.projectile = [];
    this.keyboarder = new KeyController();
  };

  Player.prototype = {
    update: function() {

      for (var i = 0; i < this.projectile.length; i++) this.projectile[i].update();

      this.projectile = this.projectile.filter(function(projectile) {
        return projectile.active;
      });

      if (!this.active) return;

      if (this.keyboarder.isDown(this.keyboarder.KEYS.LEFT) && this.coordinates.x > 0) this.coordinates.x -= 2;
      else if (this.keyboarder.isDown(this.keyboarder.KEYS.RIGHT) && this.coordinates.x < gameSize.width - this.size.width) this.coordinates.x += 2;

      if (this.keyboarder.isDown(this.keyboarder.KEYS.Space)) {
        this.shooterHeat += 1;
        if (this.shooterHeat < 0) {
          var projectile = new Projectile({
            x: this.coordinates.x + this.size.width / 2 - 1,
            y: this.coordinates.y - 1
          }, {
            x: 0,
            y: -7
          });
          this.projectile.push(projectile);
        } else if (this.shooterHeat > 12) this.shooterHeat = -3;
      } else {
        this.shooterHeat = -3;
      }

    },
    draw: function() {
      if (this.active) {
        screen.rect(this.coordinates.x, this.coordinates.y, this.size.width, this.size.height);
        screen.rect(this.coordinates.x - 2, this.coordinates.y + 2, 20, 6);
        screen.rect(this.coordinates.x + 6, this.coordinates.y - 4, 4, 4);
      }

      for (var i = 0; i < this.projectile.length; i++) this.projectile[i].draw();

    },
    destroy: function() {
      this.active = false;
      game.lost = true;
    }
  };

  // Projectile
  // ------
  var Projectile = function(coordinates, velocity) {
    this.active = true;
    this.coordinates = coordinates;
    this.size = {
      width: 3,
      height: 3
    };
    this.velocity = velocity;
  };

  Projectile.prototype = {
    update: function() {
      this.coordinates.x += this.velocity.x;
      this.coordinates.y += this.velocity.y;

      if (this.coordinates.y > gameSize.height || this.coordinates.y < 0) this.active = false;

    },
    draw: function() {
      if (this.active) screen.rect(this.coordinates.x, this.coordinates.y, this.size.width, this.size.height);

    }
  };

  // Keyboard input tracking
  // -----------------------
  var KeyController = function() {
    this.KEYS = {
      LEFT: 37,
      RIGHT: 39,
      Space: 32
    };
    var keyCode = [37, 39, 32];
    var keyState = {};

    var counter;
    window.addEventListener('keydown', function(e) {
      for (counter = 0; counter < keyCode.length; counter++)
        if (keyCode[counter] == e.keyCode) {
          keyState[e.keyCode] = true;
          e.preventDefault();
        }

    });

    window.addEventListener('keyup', function(e) {
      for (counter = 0; counter < keyCode.length; counter++)
        if (keyCode[counter] == e.keyCode) {
          keyState[e.keyCode] = false;
          e.preventDefault();
        }
    });

    this.isDown = function(keyCode) {
      return keyState[keyCode] === true;
    };

  };

  // Other functions
  // ---------------
  function collides(a, b) {
    return a.coordinates.x < b.coordinates.x + b.size.width &&
      a.coordinates.x + a.size.width > b.coordinates.x &&
      a.coordinates.y < b.coordinates.y + b.size.height &&
      a.coordinates.y + a.size.height > b.coordinates.y;
  }

  function getPixelRow(rowRaw) {
    var textRow = [],
      placer = 0,
      row = Math.floor(rowRaw / invaderMultiplier);
    if (row >= blocks.length) return [];
    for (var i = 0; i < blocks[row].length; i++) {
      var tmpContent = blocks[row][i] * invaderMultiplier;
      for (var j = 0; j < invaderMultiplier; j++) textRow[placer + j] = tmpContent + j;
      placer += invaderMultiplier;
    }
    return textRow;
  }

  // Write Text
  // -----------
  function createInvaders() {
    var invaders = [];

    var i = blocks.length * invaderMultiplier;
    while (i--) {
      var j = getPixelRow(i);
      for (var k = 0; k < j.length; k++) {
        invaders.push(new Invader({
          x: j[k] * invaderSize,
          y: i * invaderSize
        }));
      }
    }
    return invaders;
  }

  // Start game
  // ----------
  window.addEventListener('load', function() {

    var invaderAsset = new Image;
    invaderAsset.onload = function() {

      invaderCanvas = document.createElement('canvas');
      invaderCanvas.width = invaderSize;
      invaderCanvas.height = invaderSize;
      invaderCanvas.getContext("2d").drawImage(invaderAsset, 0, 0);

      // Game Creation
      canvas = document.getElementById("space-invaders");
      screen = canvas.getContext('2d');

      initGameStart();
      loop();

    };
    invaderAsset.src = "//stillh.art/project/spaceInvaders/invader.gif";

  });

  window.addEventListener('resize', function() {
    initGameStart();
  });
  document.getElementById('restart').addEventListener('click', function() {
    initGameStart();
  });

  function initGameStart() {
    if (window.innerWidth > 1200) {
      screen.canvas.width = 1200;
      screen.canvas.height = 500;
      gameSize = {
        width: 1200,
        height: 500
      };
      invaderMultiplier = 3;
      initialOffsetInvader = 420;
    } else if (window.innerWidth > 800) {
      screen.canvas.width = 900;
      screen.canvas.height = 600;
      gameSize = {
        width: 900,
        height: 600
      };
      invaderMultiplier = 2;
      initialOffsetInvader = 280;
    } else {
      screen.canvas.width = 600;
      screen.canvas.height = 300;
      gameSize = {
        width: 600,
        height: 300
      };
      invaderMultiplier = 1;
      initialOffsetInvader = 140;
    }

    kills = 0;
    invaderAttackRate = 0.999;
    invaderSpeed = 20;
    spawnDelayCounter = invaderSpawnDelay;
    
    game = new Game();
  }

  function loop() {
    game.update();
    game.draw();

    requestAnimationFrame(loop);
  }

})();
</script>
</html>