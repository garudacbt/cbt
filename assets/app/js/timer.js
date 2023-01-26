function set_timer(block, time_end, function_result) {
    let timer,
        start,
        end,
        _second = 1000,
        _minute = _second * 60,
        _hour = _minute * 60,
        _day = _hour * 24,
        now,
        set_storage = () => {
            //if (!localStorage.getItem('timer_start_' + set_timer.count)) {
            //    let now = new Date();

            //    localStorage.setItem('timer_start_' + set_timer.count, Math.round(now.getTime() / 1000));
            //}
            let n = new Date();
            now = Math.round(n.getTime() / 1000);
            },
        update_settings = () => {
            //start = end = localStorage.getItem('timer_start_' + set_timer.count);
            start = end = now;

            end = new Date(+end * 1000);
            end.setDate(end.getDate() + time_end[0]);
            end.setHours(end.getHours() + time_end[1]);
            end.setMinutes(end.getMinutes() + time_end[2]);
            end.setSeconds(end.getSeconds() + time_end[3]);
            end = +end;
        },
        get_timer = function (distance) {
            let days = Math.floor(distance / _day),
                hours = Math.floor((distance % _day) / _hour),
                minutes = Math.floor((distance % _hour) / _minute),
                seconds = Math.floor((distance % _minute) / _second);

            if (days < 10) days = '0' + days;
            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;
            if (seconds < 10) seconds = '0' + seconds;

            //return [days, hours, minutes, seconds];
            return [hours, minutes, seconds];
        },
        create_markup = (timer) => {
            let markup = '';

            for (let i = 0; i < timer.length; i++) {
                markup +=  timer[i];
                markup += i != timer.length - 1 ? ':' : '';
            }

            return markup;
        },
        set_values = () => {
            let now = new Date(),
                distance = end - +now;

            if (distance <= 0) {
                function_result(block, true);
                clearInterval(timer);
            } else {
                let timer = get_timer(distance),
                    markup = create_markup(timer);
                block.html(markup);
                function_result(markup, false);
            }
        },
        init = () => {
            set_timer.count = 1;
            //set_timer.count == undefined ? set_timer.count = 1 : set_timer.count++;

            set_storage();
            update_settings();

            timer = setInterval(set_values, 1000);

            return timer;
        };

    return init();
}
