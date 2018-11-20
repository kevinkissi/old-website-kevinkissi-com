/*! modernizr 3.1.0 (Custom Build) | MIT *
 * http://modernizr.com/download/?-canvas-canvastext !*/
! function(e, n, t) {
    function a(e) {
        var n = f.className,
            t = Modernizr._config.classPrefix || "";
        if (u && (n = n.baseVal), Modernizr._config.enableJSClass) {
            var a = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");
            n = n.replace(a, "$1" + t + "js$2")
        }
        Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t),
            u ? f.className.baseVal = n : f.className = n)
    }

    function s(e, n) {
        return typeof e === n
    }

    function o() {
        var e, n, t, a, o, i, c;
        for (var f in l)
            if (l.hasOwnProperty(f)) {
                if (e = [], n = l[f], n.name && (e.push(n.name.toLowerCase()),
                    n.options && n.options.aliases && n.options.aliases
                    .length))
                    for (t = 0; t < n.options.aliases.length; t++) e.push(n
                        .options.aliases[t].toLowerCase());
                for (a = s(n.fn, "function") ? n.fn() : n.fn, o = 0; o < e.length; o++)
                    i = e[o], c = i.split("."), 1 === c.length ? Modernizr[
                        c[0]] = a : (!Modernizr[c[0]] || Modernizr[c[0]] instanceof Boolean ||
                        (Modernizr[c[0]] = new Boolean(Modernizr[c[0]])),
                        Modernizr[c[0]][c[1]] = a), r.push((a ? "" : "no-") +
                        c.join("-"))
            }
    }

    function i() {
        return "function" != typeof n.createElement ? n.createElement(
                arguments[0]) : u ? n.createElementNS.call(n,
                "http://www.w3.org/2000/svg", arguments[0]) : n.createElement
            .apply(n, arguments)
    }
    var r = [],
        l = [],
        c = {
            _version: "3.1.0",
            _config: {
                classPrefix: "",
                enableClasses: !0,
                enableJSClass: !0,
                usePrefixes: !0
            },
            _q: [],
            on: function(e, n) {
                var t = this;
                setTimeout(function() {
                    n(t[e])
                }, 0)
            },
            addTest: function(e, n, t) {
                l.push({
                    name: e,
                    fn: n,
                    options: t
                })
            },
            addAsyncTest: function(e) {
                l.push({
                    name: null,
                    fn: e
                })
            }
        },
        Modernizr = function() {};
    Modernizr.prototype = c, Modernizr = new Modernizr;
    var f = n.documentElement,
        u = "svg" === f.nodeName.toLowerCase();
    Modernizr.addTest("canvas", function() {
        var e = i("canvas");
        return !(!e.getContext || !e.getContext("2d"))
    }), Modernizr.addTest("canvastext", function() {
        return Modernizr.canvas === !1 ? !1 : "function" == typeof i(
            "canvas").getContext("2d").fillText
    }), o(), a(r), delete c.addTest, delete c.addAsyncTest;
    for (var d = 0; d < Modernizr._q.length; d++) Modernizr._q[d]();
    e.Modernizr = Modernizr
}(window, document);