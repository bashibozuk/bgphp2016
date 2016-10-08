/**
 * Created by vasil on 08.10.16.
 */


class Game {
    constructor(ctx, imageLoader) {
        this.ctx = ctx;
        this.imageLoader = imageLoader;
        this.imageLoader = imageLoader;
        this.planeOne = new Plane(this.ctx, 0, 525, imageLoader.getImage('plane'), false);
        this.planeTwo = new Plane(this.ctx, 0, 0, imageLoader.getImage('plane'), true);
        this.initKeys();
    }
    start() {
        this.drawSky();
        this.planeOne.draw();
        this.planeTwo.draw();
    }
    drawSky() {
        this.ctx.drawImage(this.imageLoader.getImage('sky'), 0, 0, 1280, 1024, 0, 0, 800, 600);
    }
    initKeys() {
        var _this = this;
        document.querySelector('canvas').onkeydown = function (e) {
            e.preventDefault();
            _this.planeOne.move(e.keyCode, true);
        }
        document.querySelector('canvas').onkeyup = function (e) {
            e.preventDefault();
            _this.planeOne.move(e.keyCode, false);
        }
    }
    
    loop() {
        this.planeOne.doMovement()
        this.redraw()
    }
    redraw() {
        this.ctx.clearRect(0, 0, 800, 600);
        this.start();
    }
}





(function(canvasContext) {
    var game;
    var onLoad = function () {
        game.start();
    };
    var imageLoader = new ImageLoader({
        'plane' : '/images/v2_101x75.png',
        'sky' : '/images/sky.jpg'
    }, onLoad);
    game = new Game(canvasContext, imageLoader);
    function play() {
        requestAnimationFrame(function () {
            game.loop();
            play();
        })
    }
    play();


}(document.querySelector('canvas').getContext('2d')));

