//// tipewriter by roXon //
//
//var $el = $('.writer'),
//    txt = $el.text(),
//    txtLen = txt.length,
//    timeOut,
//    char = 0;
//
//$el.text('|');
//
//(function typeIt() {   
//    var humanize = Math.round(Math.random() * (200 - 30)) + 30;
//    timeOut = setTimeout(function() {
//        char++;
//        var type = txt.substring(0, char);
//        $el.text(type + '|');
//        typeIt();
//
//        if (char == txtLen) {
//            $el.text($el.text().slice(0, -1)); // remove the '|'
//            clearTimeout(timeOut);
//        }
//
//    }, humanize);
//}());



//  ---------------------------   
        //define text
//        var text = document.Eliza.log.value;

        //text is split up to letters
//        $.each(elizaresponse.split(''), function(i, letter){
//
//            //we add 100*i ms delay to each letter 
//            setTimeout(function(){
//
//                //we add the letter to the container
//                $('#textd').html($('#textd').html() + letter);
//            
//            }, 100*i);
//        });








//=======================================================


/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );
