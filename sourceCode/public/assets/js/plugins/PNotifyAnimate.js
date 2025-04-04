!(function (t, n) {
    "object" == typeof exports && "undefined" != typeof module ? n(exports) : "function" == typeof define && define.amd ? define(["exports"], n) : n(((t = "undefined" != typeof globalThis ? globalThis : t || self).PNotifyAnimate = {}));
})(this, function (t) {
    "use strict";
    function n(t) {
        return (n =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (t) {
                      return typeof t;
                  }
                : function (t) {
                      return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t;
                  })(t);
    }
    function e(t, n) {
        if (!(t instanceof n)) throw new TypeError("Cannot call a class as a function");
    }
    function o(t, n) {
        for (var e = 0; e < n.length; e++) {
            var o = n[e];
            (o.enumerable = o.enumerable || !1), (o.configurable = !0), "value" in o && (o.writable = !0), Object.defineProperty(t, o.key, o);
        }
    }
    function r(t) {
        return (r = Object.setPrototypeOf
            ? Object.getPrototypeOf
            : function (t) {
                  return t.__proto__ || Object.getPrototypeOf(t);
              })(t);
    }
    function i(t, n) {
        return (i =
            Object.setPrototypeOf ||
            function (t, n) {
                return (t.__proto__ = n), t;
            })(t, n);
    }
    function a(t) {
        if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return t;
    }
    function u(t, n) {
        return !n || ("object" != typeof n && "function" != typeof n) ? a(t) : n;
    }
    function f(t) {
        var n = (function () {
            if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
            if (Reflect.construct.sham) return !1;
            if ("function" == typeof Proxy) return !0;
            try {
                return Date.prototype.toString.call(Reflect.construct(Date, [], function () {})), !0;
            } catch (t) {
                return !1;
            }
        })();
        return function () {
            var e,
                o = r(t);
            if (n) {
                var i = r(this).constructor;
                e = Reflect.construct(o, arguments, i);
            } else e = o.apply(this, arguments);
            return u(this, e);
        };
    }
    function c(t) {
        return (
            (function (t) {
                if (Array.isArray(t)) return l(t);
            })(t) ||
            (function (t) {
                if ("undefined" != typeof Symbol && Symbol.iterator in Object(t)) return Array.from(t);
            })(t) ||
            (function (t, n) {
                if (!t) return;
                if ("string" == typeof t) return l(t, n);
                var e = Object.prototype.toString.call(t).slice(8, -1);
                "Object" === e && t.constructor && (e = t.constructor.name);
                if ("Map" === e || "Set" === e) return Array.from(t);
                if ("Arguments" === e || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e)) return l(t, n);
            })(t) ||
            (function () {
                throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
            })()
        );
    }
    function l(t, n) {
        (null == n || n > t.length) && (n = t.length);
        for (var e = 0, o = new Array(n); e < n; e++) o[e] = t[e];
        return o;
    }
    function s() {}
    function p(t) {
        return t();
    }
    function d() {
        return Object.create(null);
    }
    function m(t) {
        t.forEach(p);
    }
    function y(t) {
        return "function" == typeof t;
    }
    function h(t, e) {
        return t != t ? e == e : t !== e || (t && "object" === n(t)) || "function" == typeof t;
    }
    function v(t) {
        t.parentNode.removeChild(t);
    }
    function g(t) {
        return Array.from(t.childNodes);
    }
    var b;
    function $(t) {
        b = t;
    }
    function _(t) {
        (function () {
            if (!b) throw new Error("Function called outside component initialization");
            return b;
        })().$$.on_destroy.push(t);
    }
    var C = [],
        O = [],
        w = [],
        A = [],
        S = Promise.resolve(),
        j = !1;
    function x(t) {
        w.push(t);
    }
    var k = !1,
        P = new Set();
    function E() {
        if (!k) {
            k = !0;
            do {
                for (var t = 0; t < C.length; t += 1) {
                    var n = C[t];
                    $(n), I(n.$$);
                }
                for ($(null), C.length = 0; O.length; ) O.pop()();
                for (var e = 0; e < w.length; e += 1) {
                    var o = w[e];
                    P.has(o) || (P.add(o), o());
                }
                w.length = 0;
            } while (C.length);
            for (; A.length; ) A.pop()();
            (j = !1), (k = !1), P.clear();
        }
    }
    function I(t) {
        if (null !== t.fragment) {
            t.update(), m(t.before_update);
            var n = t.dirty;
            (t.dirty = [-1]), t.fragment && t.fragment.p(t.ctx, n), t.after_update.forEach(x);
        }
    }
    var R = new Set();
    function M(t, n) {
        t && t.i && (R.delete(t), t.i(n));
    }
    function T(t, n, e) {
        var o = t.$$,
            r = o.fragment,
            i = o.on_mount,
            a = o.on_destroy,
            u = o.after_update;
        r && r.m(n, e),
            x(function () {
                var n = i.map(p).filter(y);
                a ? a.push.apply(a, c(n)) : m(n), (t.$$.on_mount = []);
            }),
            u.forEach(x);
    }
    function D(t, n) {
        -1 === t.$$.dirty[0] && (C.push(t), j || ((j = !0), S.then(E)), t.$$.dirty.fill(0)), (t.$$.dirty[(n / 31) | 0] |= 1 << n % 31);
    }
    var N = { inClass: null, outClass: null };
    function q(t, n, e) {
        var o = n.self,
            r = void 0 === o ? null : o,
            i = n.inClass,
            a = void 0 === i ? N.inClass : i,
            u = n.outClass,
            f = void 0 === u ? N.outClass : u,
            c = r.animation,
            l = r.animateIn,
            s = r.animateOut;
        function p(t, n) {
            var e;
            r.setAnimating("in");
            var o = function (n) {
                (n && r.refs.elem && n.target !== r.refs.elem) || (e(), r.setAnimatingClass("pnotify-in animated"), t && t.call(), r.setAnimating(!1));
            };
            (e = r.on("animationend", o)), n ? o() : r.setAnimatingClass("pnotify-in animated ".concat(a || f));
        }
        function d(t, n) {
            var e;
            r.setAnimating("out");
            var o = function (n) {
                (n && r.refs.elem && n.target !== r.refs.elem) || (e(), r.setAnimatingClass("animated"), t && t.call(), r.setAnimating && r.setAnimating(!1));
            };
            (e = r.on("animationend", o)), n ? o() : r.setAnimatingClass("pnotify-in animated ".concat(f || a));
        }
        return (
            _(function () {
                r.$set({ animation: c, animateIn: l, animateOut: s });
            }),
            r.on("pnotify:update", function () {
                if (r.refs.elem) {
                    var t = 250;
                    "slow" === r.animateSpeed ? (t = 400) : "fast" === r.animateSpeed ? (t = 100) : r.animateSpeed > 0 && (t = r.animateSpeed),
                        (t /= 1e3),
                        r.refs.elem.style.animationDuration !== "".concat(t, "s") && e(0, (r.refs.elem.style.animationDuration = "".concat(t, "s")), r);
                }
            }),
            (r.attention = function (t, n) {
                var e;
                (e = r.on("animationend", function () {
                    e(), r.removeModuleClass("container", "animated", t), n && n.call(r);
                })),
                    r.addModuleClass("container", "animated", t);
            }),
            (t.$$set = function (t) {
                "self" in t && e(0, (r = t.self)), "inClass" in t && e(1, (a = t.inClass)), "outClass" in t && e(2, (f = t.outClass));
            }),
            (t.$$.update = function () {
                7 & t.$$.dirty && (a || f ? r.$set({ animation: "none", animateIn: p, animateOut: d }) : r.$set({ animation: c, animateIn: l, animateOut: s }));
            }),
            [r, a, f]
        );
    }
    var z = (function (t) {
        !(function (t, n) {
            if ("function" != typeof n && null !== n) throw new TypeError("Super expression must either be null or a function");
            (t.prototype = Object.create(n && n.prototype, { constructor: { value: t, writable: !0, configurable: !0 } })), n && i(t, n);
        })(o, t);
        var n = f(o);
        function o(t) {
            var r;
            return (
                e(this, o),
                (function (t, n, e, o, r, i) {
                    var a = arguments.length > 6 && void 0 !== arguments[6] ? arguments[6] : [-1],
                        u = b;
                    $(t);
                    var f = n.props || {},
                        c = (t.$$ = {
                            fragment: null,
                            ctx: null,
                            props: i,
                            update: s,
                            not_equal: r,
                            bound: d(),
                            on_mount: [],
                            on_destroy: [],
                            before_update: [],
                            after_update: [],
                            context: new Map(u ? u.$$.context : []),
                            callbacks: d(),
                            dirty: a,
                            skip_bound: !1,
                        }),
                        l = !1;
                    if (
                        ((c.ctx = e
                            ? e(t, f, function (n, e) {
                                  var o = !(arguments.length <= 2) && arguments.length - 2 ? (arguments.length <= 2 ? void 0 : arguments[2]) : e;
                                  return c.ctx && r(c.ctx[n], (c.ctx[n] = o)) && (!c.skip_bound && c.bound[n] && c.bound[n](o), l && D(t, n)), e;
                              })
                            : []),
                        c.update(),
                        (l = !0),
                        m(c.before_update),
                        (c.fragment = !!o && o(c.ctx)),
                        n.target)
                    ) {
                        if (n.hydrate) {
                            var p = g(n.target);
                            c.fragment && c.fragment.l(p), p.forEach(v);
                        } else c.fragment && c.fragment.c();
                        n.intro && M(t.$$.fragment), T(t, n.target, n.anchor), E();
                    }
                    $(u);
                })(a((r = n.call(this))), t, q, null, h, { self: 0, inClass: 1, outClass: 2 }),
                r
            );
        }
        return o;
    })(
        (function () {
            function t() {
                e(this, t);
            }
            var n, r, i;
            return (
                (n = t),
                (r = [
                    {
                        key: "$destroy",
                        value: function () {
                            var t, n;
                            (t = 1), null !== (n = this.$$).fragment && (m(n.on_destroy), n.fragment && n.fragment.d(t), (n.on_destroy = n.fragment = null), (n.ctx = [])), (this.$destroy = s);
                        },
                    },
                    {
                        key: "$on",
                        value: function (t, n) {
                            var e = this.$$.callbacks[t] || (this.$$.callbacks[t] = []);
                            return (
                                e.push(n),
                                function () {
                                    var t = e.indexOf(n);
                                    -1 !== t && e.splice(t, 1);
                                }
                            );
                        },
                    },
                    {
                        key: "$set",
                        value: function (t) {
                            var n;
                            this.$$set && ((n = t), 0 !== Object.keys(n).length) && ((this.$$.skip_bound = !0), this.$$set(t), (this.$$.skip_bound = !1));
                        },
                    },
                ]) && o(n.prototype, r),
                i && o(n, i),
                t
            );
        })()
    );
    (t.default = z), (t.defaults = N), (t.position = "PrependContainer"), Object.defineProperty(t, "__esModule", { value: !0 });
});
