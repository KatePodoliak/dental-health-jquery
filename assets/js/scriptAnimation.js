function deltaAccel(progress) {
    return Math.pow(progress, 2);
}

function animation() {
    var element = document.getElementById("anim-img");
    var from = -160;
    var to = 190;
    var duration = 1500;
    var fps = 100;
    var fps_tick = (1000 / fps);
    var start = new Date().getTime();
    setTimeout(function() {
        var now = (new Date().getTime()) - start;
        var progress = now / duration;
        if (progress > 1)
            progress = 1;
        var delta = deltaAccel(progress);
        var result = (to - from) * delta + from;
        element.style.left = result + "px";
        if (progress < 1)
            setTimeout(arguments.callee, fps_tick);
    }, 10)
}