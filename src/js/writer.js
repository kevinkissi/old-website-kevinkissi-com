//
//    $(function(){
//
//        $("#typed").typed({
//            strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
//            typeSpeed: 30,
//            backDelay: 500,
//            loop: false,
//            contentType: 'html', // or text
//            // defaults to false for infinite loop
//            loopCount: false,
//            callback: function(){ foo(); },
//            resetCallback: function() { newTyped(); }
//        });
//
//        $(".reset").click(function(){
//            $("#typed").typed('reset');
//        });
//
//    });
//
//    function newTyped(){ /* A new typed object */ }
//
//    function foo(){ console.log("Callback"); }

//$(document).ready( function() {

$(function(){
        $("#typed").typed({
//             strings: ["Hi, my name is Kevin.", "I solve problems with code.", "Navigate the site as usual.", "Or query a robotic impression.", 'Click <button id="herep" class="log" onclick="return pFunction();" >here</button> to interact'],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,

        });

    });


$(function(){
        $("#typed1").typed({
             strings: ["Hi, my name is Kevin.", "I solve problems with code.", "Navigate the site as usual.", "Or query a robotic impression.", 'Click <button id="herep" class="log" onclick="return pFunction();" >here</button> to interact'],
//            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
        });

    });