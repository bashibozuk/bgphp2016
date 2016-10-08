/**
 * Created by vasil on 08.10.16.
 */
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
            this.images[i].onload = function () {
                _this.imagesCount--;
                _this.onLoadCallback();
            }
        }
    }

    getImage(key) {
        return this.images[key];
    }


}
