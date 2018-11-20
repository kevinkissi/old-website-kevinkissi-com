(function() {

    var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

    // Main
    initHeader();
    initAnimation();
    addListeners();

    function initHeader() {
        width = window.innerWidth;
        height = window.innerHeight;
        target = {x: width/2, y: height/2};

        largeHeader = document.getElementById('large-header');
        largeHeader.style.height = height+'px';

        canvas = document.getElementById('demo-canvas');
        canvas.width = width;
        canvas.height = height;
        ctx = canvas.getContext('2d');

        // create points
        points = [];
        for(var x = 0; x < width; x = x + width/7) {
            for(var y = 0; y < height; y = y + height/7) {
                var px = x + Math.random()*width/7;
                var py = y + Math.random()*height/7;
                var p = {x: px, originX: px, y: py, originY: py };
                points.push(p);
            }
        }

        // for each point find the 5 closest points
        for(var i = 0; i < points.length; i++) {
            var closest = [];
            var p1 = points[i];
            for(var j = 0; j < points.length; j++) {
                var p2 = points[j]
                if(!(p1 == p2)) {
                    var placed = false;
                    for(var k = 0; k < 5; k++) {
                        if(!placed) {
                            if(closest[k] == undefined) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }

                    for(var k = 0; k < 5; k++) {
                        if(!placed) {
                            if(getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                }
            }
            p1.closest = closest;
        }

        // assign a circle to each point
        for(var i in points) {
//            ============================
            var ngons = Array(new Pentagon(points[i], 10+Math.random()*10, 'rgba(255,255,255,0.3)'),
                              new Hexagon(points[i], 10+Math.random()*10, 'rgba(255,255,255,0.3)'),
                              new Heptagon(points[i], 10+Math.random()*10, 'rgba(255,255,255,0.3)'));
            
            var c = ngons[Math.floor(Math.random()*ngons.length)];
            
            points[i].circle = c;
        }
    }

    // Event handling
    function addListeners() {
        if(!('ontouchstart' in window)) {
            window.addEventListener('mousemove', mouseMove);
        }
        window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

    function mouseMove(e) {
        var posx = posy = 0;
        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        }
        else if (e.clientX || e.clientY)    {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }
        target.x = posx;
        target.y = posy;
    }

    function scrollCheck() {
        if(document.body.scrollTop > height) animateHeader = false;
        else animateHeader = true;
    }

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        largeHeader.style.height = height+'px';
        canvas.width = width;
        canvas.height = height;
    }

    // animation
    function initAnimation() {
        animate();
        for(var i in points) {
            shiftPoint(points[i]);
        }
    }

    function animate() {
        if(animateHeader) {
            ctx.clearRect(0,0,width,height);
            for(var i in points) {
                // detect points in range
                if(Math.abs(getDistance(target, points[i])) < 700) {
                    points[i].active = 0.3;
                    points[i].circle.active = 0.6;
                } else if(Math.abs(getDistance(target, points[i])) < 14000) {
                    points[i].active = 0.1;
                    points[i].circle.active = 0.3;
                } else if(Math.abs(getDistance(target, points[i])) < 28000) {
                    points[i].active = 0.02;
                    points[i].circle.active = 0.1;
                } else {
                    points[i].active = 0;
                    points[i].circle.active = 0;
                }

                drawLines(points[i]);
                points[i].circle.draw();
            }
        }
        requestAnimationFrame(animate);
    }

    function shiftPoint(p) {
        TweenLite.to(p, 1+1*Math.random(), {x:p.originX-50+Math.random()*100,
            y: p.originY-50+Math.random()*100, ease:Circ.easeInOut,
            onComplete: function() {
                shiftPoint(p);
            }});
    }
//-----------------------------------------------
    // Canvas manipulation
    function drawLines(p) {
        if(!p.active) return;
        
        for(var i in p.closest) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            
//            ctx.bezierCurveTo(p.x, (p.closest[i].x)/2,
//                              p.closest[i].x, (p.closest[i].x)/2,
//                              p.closest[i].x, (p.closest[i].y) );
            ctx.lineTo(p.closest[i].x, p.closest[i].y);
            ctx.strokeStyle = 'rgba(68,62,60,'+ p.active+')';
//            ctx.strokeStyle = 'rgba(68,68,68,'+ p.active+')';
            ctx.stroke();
        }
    }


  //--------------------------------------
// pentagon
function Pentagon (pos,size,color) {

    var _this = this;

    // constructor
    (function() {
        _this.pos = pos || null;
        _this.size = size || null;
        _this.color = color || null;
    })();

     this.draw = function() {
        if(!_this.active) return;
             
ctx.beginPath();        
 
ctx.moveTo (_this.pos.x +  size * Math.cos(0), _this.pos.y +  size *  Math.sin(0), false); 
 
var numberOfSides = 5;
             
for (var i = 1; i <= numberOfSides; i += 1) {
    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos(i * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin(i * 2 * Math.PI / numberOfSides));

     ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+2) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+2) * 2 * Math.PI / numberOfSides));
    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+3) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+3) * 2 * Math.PI / numberOfSides));
//    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+4) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+4) * 2 * Math.PI / numberOfSides));
 
      ctx.font = "1.2em serif";

    ctx.fillText('K₅', _this.pos.x +20, _this.pos.y +20);
//    ctx.fillText('normalText0123₀₁₂₃₄₅₆₇₈₉', 50, 50)
}
                        
ctx.fillStyle = 'rgba(38,32,30,'+ _this.active+')';
ctx.fill();
//ctx.lineWidth = 1;
ctx.strokeStyle = 'rgba(48,42,40,'+ _this.active+')';
ctx.stroke();
         
//ctx.fillStyle = 'rgba(38,38,38,'+ _this.active+')';
//ctx.fill();
//ctx.strokeStyle = 'rgba(48,48,48,'+ _this.active+')';
//ctx.stroke();    

    };
}
    //--------------------------------------
// hexagon
function Hexagon (pos,size,color) {

    var _this = this;

    // constructor
    (function() {
        _this.pos = pos || null;
        _this.size = size || null;
        _this.color = color || null;
    })();

     this.draw = function() {
        if(!_this.active) return;
             
ctx.beginPath();        
 
ctx.moveTo (_this.pos.x +  size * Math.cos(0), _this.pos.y +  size *  Math.sin(0), false); 
 
var numberOfSides = 6;
             
for (var i = 1; i <= numberOfSides; i += 1) {
    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos(i * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin(i * 2 * Math.PI / numberOfSides));

     ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+2) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+2) * 2 * Math.PI / numberOfSides));
    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+3) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+3) * 2 * Math.PI / numberOfSides));
//    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+4) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+4) * 2 * Math.PI / numberOfSides));
 
      ctx.font = "1.2em serif";

    ctx.fillText('K₆', _this.pos.x +20, _this.pos.y +20);
}
                        
ctx.fillStyle = 'rgba(38,32,30,'+ _this.active+')';
ctx.fill();
//ctx.lineWidth = 1;
ctx.strokeStyle = 'rgba(48,42,40,'+ _this.active+')';
ctx.stroke();

//ctx.fillStyle = 'rgba(38,38,38,'+ _this.active+')';
//ctx.fill();
//ctx.strokeStyle = 'rgba(48,48,48,'+ _this.active+')';
//ctx.stroke();             
         
    };
}
//--------------------------------------
  //--------------------------------------
// heptagon
function Heptagon (pos,size,color) {

    var _this = this;

    // constructor
    (function() {
        _this.pos = pos || null;
        _this.size = size || null;
        _this.color = color || null;
    })();

     this.draw = function() {
        if(!_this.active) return;
             
ctx.beginPath();        
 
ctx.moveTo (_this.pos.x +  size * Math.cos(0), _this.pos.y +  size *  Math.sin(0), false); 
 
var numberOfSides = 7;
             
for (var i = 1; i <= numberOfSides; i += 1) {
    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos(i * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin(i * 2 * Math.PI / numberOfSides));

     ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+2) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+2) * 2 * Math.PI / numberOfSides));
    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+3) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+3) * 2 * Math.PI / numberOfSides));
//    
    ctx.lineTo (_this.pos.x + _this.size * Math.cos((i+4) * 2 * Math.PI / numberOfSides),
                _this.pos.y + _this.size * Math.sin((i+4) * 2 * Math.PI / numberOfSides));
 
      ctx.font = "1.2em serif";

    ctx.fillText('K₇', _this.pos.x +20, _this.pos.y +20);
}
                        
ctx.fillStyle = 'rgba(38,32,30,'+ _this.active+')';
ctx.fill();
//ctx.lineWidth = 1;
ctx.strokeStyle = 'rgba(48,42,40,'+ _this.active+')';
ctx.stroke();
         
//ctx.fillStyle = 'rgba(38,38,38,'+ _this.active+')';
//ctx.fill();
//ctx.strokeStyle = 'rgba(48,48,48,'+ _this.active+')';
//ctx.stroke();         

    };
}

//--------------------------------------       
//};
    
// Util
    function getDistance(p1, p2) {
        return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
    }
    
})();