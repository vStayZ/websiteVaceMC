function animateValue(obj, start = 0, end = null, duration = 1550) {
    if (obj) {

        var textStarting = obj.innerHTML;

        end = end || parseInt(textStarting.replace(/\D/g, ""));

        var range = end - start;

        var minTimer = 10;

        var stepTime = Math.abs(Math.floor(duration / range));

        stepTime = Math.max(stepTime, minTimer);

        var startTime = new Date().getTime();
        var endTime = startTime + duration;
        var timer;

        function run() {
            var now = new Date().getTime();
            var remaining = Math.max((endTime - now) / duration, 0);
            var value = Math.round(end - (remaining * range));
            obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
            if (value == end) {
                clearInterval(timer);
            }
        }

        timer = setInterval(run, stepTime);
        run();
    }
}

animateValue(document.getElementById('value'));
