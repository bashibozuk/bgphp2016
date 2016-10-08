/**
 * Created by vasil on 08.10.16.
 */

class Game {
    constructor(ctx) {
        this.ctx = ctx;
    }
    start() {

    }
}

class ImageLoader {
    constructor(images, onLoadFn) {
        this.images = {};
        this.loadImages(images);
        this.onLoadCallback = onLoadFn;
        this.imagesCount = 0;
    }
    loadImages(images) {
        var _this = this;
        for (var i in images) {
            this.images[i] = new Image();
            this.images[i].src = images[i];
            this.images.onload = function () {
                _this.imagesCount--;
                if (_this.imagesCount <= 0) {
                    _this.onLoadCallback();
                }
            }
        }
    }


}


(function(canvasContext) {
    var game = new Game(canvasContext);
    var imageLoader = new ImageLoader({
        'plane' : '/images/v2.png'
    }, function () {
        game.start();
    });

    
}(document.querySelector('canvas').getContext('2d')));

