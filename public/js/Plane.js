/**
 * Created by vasil on 08.10.16.
 */
class Plane {
    constructor(ctx, posX, posY, image, rotation) {
        this.ctx = ctx;
        this.posX = posX || 0;
        this.posY = posY || 0;
        this.image = image;
        this.rotation = rotation;
        this.moving = {
            left: false,
            right: false,
            up: false,
            down: false
        };
    }
    draw () {
        if (this.rotation) {
            this.ctx.save();
            this.ctx.translate(101, 75);
            this.ctx.rotate(Math.PI);
        }

        this.ctx.drawImage(this.image, this.posX, this.posY, 101, 75)

        if (this.rotation) {
            this.ctx.restore();
        }
    }
    move(key, value) {
console.log(124);
        switch (key) {
            case Keys.UP:
                this.moving.up = value;
                break;
            case Keys.DOWN:
                this.moving.down = value;
                break;
            case Keys.LEFT:
                this.moving.left = value;
                break;
            case Keys.RIGHT:
                this.moving.right = value;
                break;
        }
    }
    doMovement() {
        if (this.moving.left) {
            this.posX -= SPEED;
        }

        if (this.moving.right) {
            this.posX += SPEED;
        }

        if (this.moving.up) {
            this.posY -= SPEED;
        }

        if (this.moving.down) {
            this.posY += SPEED;
        }

        if (this.posX < 0) {
            this.posX = 0;
        }

        if (this.posX > 800) {
            this.posX = 800;
        }

        if (this.posY < 0) {
            this.posY = 0;
        }

        if (this.posY > 600) {
            this.posY = 600;
        }
    }
}