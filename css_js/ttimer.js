var timer = new Vue({
    el: '#timer',
    data: {
        time: { h: 0, m: 0, s: 0, ms: 0 },
        timeOn: true,
    },
    computed: {
        bTime: function(){
            var h1 = (this.time.h > 9)?this.time.h.toString()[0]:0;
            var h2 = (this.time.h > 9)?this.time.h.toString()[1]:this.time.h.toString()[0];
            var m1 = (this.time.m > 9)?this.time.m.toString()[0]:0;
            var m2 = (this.time.m > 9)?this.time.m.toString()[1]:this.time.m.toString()[0];
            var s1 = (this.time.s > 9)?this.time.s.toString()[0]:0;
            var s2 = (this.time.s > 9)?this.time.s.toString()[1]:this.time.s.toString()[0];
            var output = {
                h1: parseInt(h1).toString(2),
                h2: parseInt(h2).toString(2),
                m1: parseInt(m1).toString(2),
                m2: parseInt(m2).toString(2),
                s1: parseInt(s1).toString(2),
                s2: parseInt(s2).toString(2),
                ms: this.time.ms.toString(2),
            };
             
            for(var i in output) {
                while(output[i].length < 4) { output[i] = '0'+output[i]; }
            }
            return output;
        }
    },
    methods: {
        ping: function() {
            if(this.timeOn) {
                if(++this.time.ms > 9) { this.time.ms = 0; this.time.s++; }
                if(this.time.s > 59) { this.time.s = 0; this.time.m++; }
                if(this.time.m > 59) { this.time.m = 0; this.time.h++; }
            }
        },
        reset: function() {
            this.time = { h: 0, m: 0, s: 0, ms: 0 };
        }
    }
});
 
setInterval(timer.ping, 100);