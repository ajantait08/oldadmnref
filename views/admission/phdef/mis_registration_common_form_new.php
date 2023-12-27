<link rel="stylesheet" href="<?php echo base_url() . "assets/css/multi_step.css" ?>">

<style>
  #error_form_val p {
    font-size: 12px;
    color: red !important;
  }

  /* #content{
    display:block;
  } */


  #overlay {
    display: none;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: rgba(0, 0, 0, 0.85);

  }

  #overlay #loading {
    z-index: 9999;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 300px;
    background-size: 100% 100%;
    opacity: 1;
  }

  @-webkit-keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  #overlay1 {
    display: none;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: rgba(0, 0, 0, 0.85);

  }

  #overlay1 #loading1 {
    z-index: 9999;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 300px;
    background-size: 100% 100%;
    opacity: 1;
  }

  @-webkit-keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .loading:after {
    content: ' .';
    animation: dots 1s steps(5, end) infinite;
  }

  @keyframes dots {

    0%,
    20% {
      color: rgba(0, 0, 0, 0);
      text-shadow:
        .25em 0 0 rgba(0, 0, 0, 0),
        .5em 0 0 rgba(0, 0, 0, 0);
    }

    40% {
      color: white;
      text-shadow:
        .25em 0 0 rgba(0, 0, 0, 0),
        .5em 0 0 rgba(0, 0, 0, 0);
    }

    60% {
      text-shadow:
        .25em 0 0 white,
        .5em 0 0 rgba(0, 0, 0, 0);
    }

    80%,
    100% {
      text-shadow:
        .25em 0 0 white,
        .5em 0 0 white;
    }
  }
</style>

<!-- <script src="<?= base_url() ?>assets/js/multi_step.js"></script> -->



<!-- HINDI TYPING API -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-36681383-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-36681383-3');
</script>

<script type="text/javascript">
  var _____WB$wombat$assign$function_____ = function(name) {
    return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name];
  };
  if (!self.__WB_pmw) {
    self.__WB_pmw = function(obj) {
      this.__WB_source = obj;
      return this;
    }
  } {
    let window = _____WB$wombat$assign$function_____("window");
    let self = _____WB$wombat$assign$function_____("self");
    let document = _____WB$wombat$assign$function_____("document");
    let location = _____WB$wombat$assign$function_____("location");
    let top = _____WB$wombat$assign$function_____("top");
    let parent = _____WB$wombat$assign$function_____("parent");
    let frames = _____WB$wombat$assign$function_____("frames");
    let opener = _____WB$wombat$assign$function_____("opener");

    if (!window['googleLT_']) {
      window['googleLT_'] = (new Date()).getTime();
    }
    if (!window['google']) {
      window['google'] = {};
    }
    if (!window['google']['loader']) {
      window['google']['loader'] = {};
      google.loader.ServiceBase = 'https://web.archive.org/web/20170906052436/https://www.google.com/uds';
      google.loader.GoogleApisBase = 'https://web.archive.org/web/20170906052436/https://ajax.googleapis.com/ajax';
      google.loader.ApiKey = 'notsupplied';
      google.loader.KeyVerified = true;
      google.loader.LoadFailure = false;
      google.loader.Secure = true;
      google.loader.GoogleLocale = 'www.google.com';
      google.loader.ClientLocation = null;
      google.loader.AdditionalParams = '';
      (function() {
        var g = this,
          l = function(a, b, c) {
            a = a.split(".");
            c = c || g;
            a[0] in c || !c.execScript || c.execScript("var " + a[0]);
            for (var d; a.length && (d = a.shift());) a.length || void 0 === b ? c = c[d] && c[d] !== Object
              .prototype[d] ? c[d] : c[d] = {} : c[d] = b
          },
          m = function(a, b, c) {
            a[b] = c
          };
        var w = function(a, b) {
            if (b) a = a.replace(n, "&amp;").replace(p, "&lt;").replace(q, "&gt;").replace(r, "&quot;")
              .replace(t, "&#39;").replace(u, "&#0;");
            else {
              if (!v.test(a)) return a; - 1 != a.indexOf("&") && (a = a.replace(n, "&amp;")); - 1 != a
                .indexOf("<") && (a = a.replace(p, "&lt;")); - 1 != a.indexOf(">") && (a = a.replace(q,
                "&gt;")); - 1 != a.indexOf('"') && (a = a.replace(r, "&quot;")); - 1 != a.indexOf(
                "'") && (a = a.replace(t, "&#39;")); - 1 != a.indexOf("\x00") && (a = a.replace(u,
                "&#0;"))
            }
            return a
          },
          n = /&/g,
          p = /</g,
          q = />/g,
          r = /"/g,
          t = /'/g,
          u = /\x00/g,
          v = /[\x00&<>"']/;
        var x = /^[\w+/]+[=]{0,2}$/,
          y = function(a) {
            if ((a = (a || g).document.querySelector("script[nonce]")) && (a = a.nonce || a.getAttribute(
                "nonce")) && x.test(a)) return a
          };

        function z(a) {
          return a in A ? A[a] : A[a] = -1 != navigator.userAgent.toLowerCase().indexOf(a)
        }
        var A = {};

        function C(a, b) {
          var c = function() {};
          c.prototype = b.prototype;
          a.da = b.prototype;
          a.prototype = new c
        }

        function D(a, b, c) {
          var d = Array.prototype.slice.call(arguments, 2) || [];
          return function() {
            return a.apply(b, d.concat(Array.prototype.slice.call(arguments)))
          }
        }

        function E(a) {
          a = Error(a);
          a.toString = function() {
            return this.message
          };
          return a
        }

        function F(a, b) {
          a = a.split(/\./);
          for (var c = window, d = 0; d < a.length - 1; d++) c[a[d]] || (c[a[d]] = {}), c = c[a[d]];
          c[a[a.length - 1]] = b
        }

        function G(a, b, c) {
          a[b] = c
        }
        window.Y || (window.Y = {});
        l || (l = F);
        m || (m = G);
        google.loader.F = {};
        l("google.loader.callbacks", google.loader.F);
        var H = {},
          I = {};
        google.loader.eval = {};
        l("google.loader.eval", google.loader.eval);
        google.load = function(a, b, c) {
          function d(a) {
            var b = a.split(".");
            if (2 < b.length) throw E("Module: '" + a + "' not found!");
            "undefined" != typeof b[1] && (e = b[0], c.packages = c.packages || [], c.packages.push(b[
              1]))
          }
          var e = a;
          c = c || {};
          if (a instanceof Array || a && "object" == typeof a && "function" == typeof a.join &&
            "function" == typeof a.reverse)
            for (var f = 0; f < a.length; f++) d(a[f]);
          else d(a);
          if (a = H[":" + e]) {
            c && !c.language && c.locale && (c.language = c.locale);
            c && "string" == typeof c.callback && (f = c.callback, f.match(/^[[\]A-Za-z0-9._]+$/) && (
              f =
              window.eval(f), c.callback = f));
            if ((f = c && null != c.callback) && !a.D(b)) throw E("Module: '" + e +
              "' must be loaded before DOM onLoad!");
            f ? a.u(b, c) ? window.setTimeout(c.callback, 0) : a.load(b, c) : a.u(b, c) || a.load(b, c)
          } else throw E("Module: '" + e + "' not found!");
        };
        l("google.load", google.load);
        google.ca = function(a, b) {
          b ? (0 == J.length && (K(window, "load", L), !z("msie") && !z("safari") && !z("konqueror") && z(
            "mozilla") || window.opera ? window.addEventListener("DOMContentLoaded", L, !
            1) : z("msie") ? document.write(
            "<script defer onreadystatechange='google.loader.domReady()' src=//:>\x3c/script>"
          ) : (z("safari") || z("konqueror")) && window.setTimeout(M, 10)), J.push(a)) : K(
            window, "load", a)
        };
        l("google.setOnLoadCallback", google.ca);

        function K(a, b, c) {
          if (a.addEventListener) a.addEventListener(b, c, !1);
          else if (a.attachEvent) a.attachEvent("on" + b, c);
          else {
            var d = a["on" + b];
            a["on" + b] = null != d ? N([c, d]) : c
          }
        }

        function N(a) {
          return function() {
            for (var b = 0; b < a.length; b++) a[b]()
          }
        }
        var J = [];
        google.loader.W = function() {
          var a = window.event.srcElement;
          "complete" == a.readyState && (a.onreadystatechange = null, a.parentNode.removeChild(a), L())
        };
        l("google.loader.domReady", google.loader.W);
        var aa = {
          loaded: !0,
          complete: !0
        };

        function M() {
          aa[document.readyState] ? L() : 0 < J.length && window.setTimeout(M, 10)
        }

        function L() {
          for (var a = 0; a < J.length; a++) J[a]();
          J.length = 0
        }
        google.loader.f = function(a, b, c) {
          if (c) {
            if ("script" == a) {
              var d = document.createElement("script");
              d.type = "text/javascript";
              d.src = b
            } else "css" == a && (d = document.createElement("link"), d.type = "text/css", d.href = b, d
              .rel = "stylesheet");
            (a = document.getElementsByTagName("head")[0]) || (a = document.body.parentNode.appendChild(
              document.createElement("head")));
            a.appendChild(d)
          } else "script" == a ? (a = '<script src="' + w(b) + '" type="text/javascript"', (d = y()) && (
              a += ' nonce="' + w(d) + '"'), document.write(a + ">\x3c/script>")) : "css" == a &&
            (a = '<link href="' + w(b) + '" type="text/css" rel="stylesheet"', (d = y()) && (a +=
              ' nonce="' + w(d) + '"'), document.write(a + "></link>"))
        };
        l("google.loader.writeLoadTag", google.loader.f);
        google.loader.$ = function(a) {
          I = a
        };
        l("google.loader.rfm", google.loader.$);
        google.loader.ba = function(a) {
          for (var b in a) "string" == typeof b && b && ":" == b.charAt(0) && !H[b] && (H[b] = new O(b
            .substring(1), a[b]))
        };
        l("google.loader.rpl", google.loader.ba);
        google.loader.aa = function(a) {
          if ((a = a.specs) && a.length)
            for (var b = 0; b < a.length; ++b) {
              var c = a[b];
              "string" == typeof c ? H[":" + c] = new P(c) : (c = new Q(c.name, c.baseSpec, c
                .customSpecs), H[":" + c.name] = c)
            }
        };
        l("google.loader.rm", google.loader.aa);
        google.loader.loaded = function(a) {
          H[":" + a.module].o(a)
        };
        l("google.loader.loaded", google.loader.loaded);
        google.loader.V = function() {
          return "qid=" + ((new Date).getTime().toString(16) + Math.floor(1E7 * Math.random()).toString(
            16))
        };
        l("google.loader.createGuidArg_", google.loader.V);
        F("google_exportSymbol", F);
        F("google_exportProperty", G);
        google.loader.a = {};
        l("google.loader.themes", google.loader.a);
        google.loader.a.K =
          "//web.archive.org/web/20170906052436/https://www.google.com/cse/static/style/look/bubblegum.css";
        m(google.loader.a, "BUBBLEGUM", google.loader.a.K);
        google.loader.a.M =
          "//web.archive.org/web/20170906052436/https://www.google.com/cse/static/style/look/greensky.css";
        m(google.loader.a, "GREENSKY", google.loader.a.M);
        google.loader.a.L =
          "//web.archive.org/web/20170906052436/https://www.google.com/cse/static/style/look/espresso.css";
        m(google.loader.a, "ESPRESSO", google.loader.a.L);
        google.loader.a.O =
          "//web.archive.org/web/20170906052436/https://www.google.com/cse/static/style/look/shiny.css";
        m(google.loader.a, "SHINY", google.loader.a.O);
        google.loader.a.N =
          "//web.archive.org/web/20170906052436/https://www.google.com/cse/static/style/look/minimalist.css";
        m(google.loader.a, "MINIMALIST", google.loader.a.N);
        google.loader.a.P =
          "//web.archive.org/web/20170906052436/https://www.google.com/cse/static/style/look/v2/default.css";
        m(google.loader.a, "V2_DEFAULT", google.loader.a.P);

        function P(a) {
          this.b = a;
          this.B = [];
          this.A = {};
          this.l = {};
          this.g = {};
          this.s = !0;
          this.c = -1
        }
        P.prototype.i = function(a, b) {
          var c = "";
          void 0 != b && (void 0 != b.language && (c += "&hl=" + encodeURIComponent(b.language)),
            void 0 != b.nocss && (c += "&output=" + encodeURIComponent("nocss=" + b.nocss)),
            void 0 != b.nooldnames && (c += "&nooldnames=" + encodeURIComponent(b.nooldnames)),
            void 0 != b.packages && (c += "&packages=" + encodeURIComponent(b.packages)), null != b
            .callback && (c += "&async=2"), void 0 != b.style && (c += "&style=" +
              encodeURIComponent(b.style)), void 0 != b.noexp && (c += "&noexp=true"), void 0 != b
            .other_params && (c += "&" + b.other_params));
          if (!this.s) {
            google[this.b] && google[this.b].JSHash && (c += "&sig=" + encodeURIComponent(google[this.b]
              .JSHash));
            b = [];
            for (var d in this.A) ":" == d.charAt(0) && b.push(d.substring(1));
            for (d in this.l) ":" == d.charAt(0) && this.l[d] && b.push(d.substring(1));
            c += "&have=" + encodeURIComponent(b.join(","))
          }
          return google.loader.ServiceBase + "/?file=" + this.b + "&v=" + a + google.loader
            .AdditionalParams + c
        };
        P.prototype.H = function(a) {
          var b = null;
          a && (b = a.packages);
          var c = null;
          if (b)
            if ("string" == typeof b) c = [a.packages];
            else if (b.length)
            for (c = [], a = 0; a < b.length; a++) "string" == typeof b[a] && c.push(b[a].replace(
              /^\s*|\s*$/, "").toLowerCase());
          c || (c = ["default"]);
          b = [];
          for (a = 0; a < c.length; a++) this.A[":" + c[a]] || b.push(c[a]);
          return b
        };
        P.prototype.load = function(a, b) {
          var c, d = this.H(b),
            e = b && null != b.callback;
          e && (c = new R(b.callback));
          for (var f = [], h = d.length - 1; 0 <= h; h--) {
            var k = d[h];
            e && c.R(k);
            this.l[":" + k] ? (d.splice(h, 1), e && this.g[":" + k].push(c)) : f.push(k)
          }
          if (d.length) {
            b && b.packages && (b.packages = d.sort().join(","));
            for (h = 0; h < f.length; h++) k = f[h], this.g[":" + k] = [], e && this.g[":" + k].push(c);
            if (b || null == I[":" + this.b] || null == I[":" + this.b].versions[":" + a] || google
              .loader.AdditionalParams || !this.s) b && b.autoloaded || google.loader.f("script", this
              .i(a,
                b), e);
            else {
              a = I[":" + this.b];
              google[this.b] = google[this.b] || {};
              for (var B in a.properties) B && ":" == B.charAt(0) && (google[this.b][B.substring(1)] =
                a.properties[B]);
              google.loader.f("script", google.loader.ServiceBase + a.path + a.js, e);
              a.css && google.loader.f("css", google.loader.ServiceBase + a.path + a.css, e)
            }
            this.s && (this.s = !1, this.c = (new Date).getTime(), 1 != this.c % 100 && (this.c = -1));
            for (h = 0; h < f.length; h++) k = f[h], this.l[":" + k] = !0
          }
        };
        P.prototype.o = function(a) {
          -1 != this.c && (S("al_" + this.b, "jl." + ((new Date).getTime() - this.c), !0), this.c = -1);
          this.B = this.B.concat(a.components);
          google.loader[this.b] || (google.loader[this.b] = {});
          google.loader[this.b].packages = this.B.slice(0);
          for (var b = 0; b < a.components.length; b++) {
            this.A[":" + a.components[b]] = !0;
            this.l[":" + a.components[b]] = !1;
            var c = this.g[":" + a.components[b]];
            if (c) {
              for (var d = 0; d < c.length; d++) c[d].U(a.components[b]);
              delete this.g[":" + a.components[b]]
            }
          }
        };
        P.prototype.u = function(a, b) {
          return 0 == this.H(b).length
        };
        P.prototype.D = function() {
          return !0
        };

        function R(a) {
          this.T = a;
          this.v = {};
          this.C = 0
        }
        R.prototype.R = function(a) {
          this.C++;
          this.v[":" + a] = !0
        };
        R.prototype.U = function(a) {
          this.v[":" + a] && (this.v[":" + a] = !1, this.C--, 0 == this.C && window.setTimeout(this.T, 0))
        };

        function Q(a, b, c) {
          this.name = a;
          this.S = b;
          this.w = c;
          this.G = this.j = !1;
          this.m = [];
          google.loader.F[this.name] = D(this.o, this)
        }
        C(Q, P);
        Q.prototype.load = function(a, b) {
          var c = b && null != b.callback;
          c ? (this.m.push(b.callback), b.callback = "google.loader.callbacks." + this.name) : this.j = !
            0;
          b && b.autoloaded || google.loader.f("script", this.i(a, b), c)
        };
        Q.prototype.u = function(a, b) {
          return b && null != b.callback ? this.G : this.j
        };
        Q.prototype.o = function() {
          this.G = !0;
          for (var a = 0; a < this.m.length; a++) window.setTimeout(this.m[a], 0);
          this.m = []
        };
        var T = function(a, b) {
          return a.string ? encodeURIComponent(a.string) + "=" + encodeURIComponent(b) : a.regex ? b
            .replace(/(^.*$)/, a.regex) : ""
        };
        Q.prototype.i = function(a, b) {
          return this.X(this.I(a), a, b)
        };
        Q.prototype.X = function(a, b, c) {
          var d = "";
          a.key && (d += "&" + T(a.key, google.loader.ApiKey));
          a.version && (d += "&" + T(a.version, b));
          b = google.loader.Secure && a.ssl ? a.ssl : a.uri;
          if (null != c)
            for (var e in c) a.params[e] ? d += "&" + T(a.params[e], c[e]) : "other_params" == e ? d +=
              "&" + c[e] : "base_domain" == e && (b = "http://" + c[e] + a.uri.substring(a.uri
                .indexOf("/", 7)));
          google[this.name] = {}; - 1 == b.indexOf("?") && d && (d = "?" + d.substring(1));
          return b + d
        };
        Q.prototype.D = function(a) {
          return this.I(a).deferred
        };
        Q.prototype.I = function(a) {
          if (this.w)
            for (var b = 0; b < this.w.length; ++b) {
              var c = this.w[b];
              if ((new RegExp(c.pattern)).test(a)) return c
            }
          return this.S
        };

        function O(a, b) {
          this.b = a;
          this.h = b;
          this.j = !1
        }
        C(O, P);
        O.prototype.load = function(a, b) {
          this.j = !0;
          google.loader.f("script", this.i(a, b), !1)
        };
        O.prototype.u = function() {
          return this.j
        };
        O.prototype.o = function() {};
        O.prototype.i = function(a, b) {
          if (!this.h.versions[":" + a]) {
            if (this.h.aliases) {
              var c = this.h.aliases[":" + a];
              c && (a = c)
            }
            if (!this.h.versions[":" + a]) throw E("Module: '" + this.b + "' with version '" + a +
              "' not found!");
          }
          return google.loader.GoogleApisBase + "/libs/" + this.b + "/" + a + "/" + this.h.versions[":" +
            a][b && b.uncompressed ? "uncompressed" : "compressed"]
        };
        O.prototype.D = function() {
          return !1
        };
        var U = !1,
          V = [],
          ba = (new Date).getTime(),
          X = function() {
            U || (K(window, "unload", W), U = !0)
          },
          Z = function(a, b) {
            X();
            if (!(google.loader.Secure || google.loader.Options && !1 !== google.loader.Options.csi)) {
              for (var c = 0; c < a.length; c++) a[c] = encodeURIComponent(a[c].toLowerCase().replace(
                /[^a-z0-9_.]+/g, "_"));
              for (c = 0; c < b.length; c++) b[c] = encodeURIComponent(b[c].toLowerCase().replace(
                /[^a-z0-9_.]+/g, "_"));
              window.setTimeout(D(Y, null,
                "//web.archive.org/web/20170906052436/https://gg.google.com/csi?s=uds&v=2&action=" +
                a.join(",") + "&it=" + b.join(",")), 1E4)
            }
          },
          S = function(a,
            b, c) {
            c ? Z([a], [b]) : (X(), V.push("r" + V.length + "=" + encodeURIComponent(a + (b ? "|" + b :
              ""))), window.setTimeout(W, 5 < V.length ? 0 : 15E3))
          },
          W = function() {
            if (V.length) {
              var a = google.loader.ServiceBase;
              0 == a.indexOf("http:") && (a = a.replace(/^http:/, "https:"));
              Y(a + "/stats?" + V.join("&") + "&nc=" + (new Date).getTime() + "_" + ((new Date)
                .getTime() - ba));
              V.length = 0
            }
          },
          Y = function(a) {
            var b = new Image,
              c = Y.Z++;
            Y.J[c] = b;
            b.onload = b.onerror = function() {
              delete Y.J[c]
            };
            b.src = a;
            b = null
          };
        Y.J = {};
        Y.Z = 0;
        F("google.loader.recordCsiStat", Z);
        F("google.loader.recordStat", S);
        F("google.loader.createImageForLogging", Y);

      })();
      google.loader.rm({
        "specs": ["visualization", "payments", {
            "name": "annotations",
            "baseSpec": {
              "uri": "https://web.archive.org/web/20170906052436/http://www.google.com/reviews/scripts/annotations_bootstrap.js",
              "ssl": null,
              "key": {
                "string": "key"
              },
              "version": {
                "string": "v"
              },
              "deferred": true,
              "params": {
                "country": {
                  "string": "gl"
                },
                "callback": {
                  "string": "callback"
                },
                "language": {
                  "string": "hl"
                }
              }
            }
          }, "language", "gdata", "wave", "spreadsheets", "search", "orkut", "feeds",
          "annotations_v2", "picker", "identitytoolkit", {
            "name": "maps",
            "baseSpec": {
              "uri": "https://web.archive.org/web/20170906052436/http://maps.google.com/maps?file\u003dgoogleapi",
              "ssl": "https://web.archive.org/web/20170906052436/https://maps-api-ssl.google.com/maps?file\u003dgoogleapi",
              "key": {
                "string": "key"
              },
              "version": {
                "string": "v"
              },
              "deferred": true,
              "params": {
                "callback": {
                  "regex": "callback\u003d$1\u0026async\u003d2"
                },
                "language": {
                  "string": "hl"
                }
              }
            },
            "customSpecs": [{
              "uri": "https://web.archive.org/web/20170906052436/http://maps.googleapis.com/maps/api/js",
              "ssl": "https://web.archive.org/web/20170906052436/https://maps.googleapis.com/maps/api/js",
              "version": {
                "string": "v"
              },
              "deferred": true,
              "params": {
                "callback": {
                  "string": "callback"
                },
                "language": {
                  "string": "hl"
                }
              },
              "pattern": "^(3|3..*)$"
            }]
          }, {
            "name": "friendconnect",
            "baseSpec": {
              "uri": "https://web.archive.org/web/20170906052436/http://www.google.com/friendconnect/script/friendconnect.js",
              "ssl": "https://web.archive.org/web/20170906052436/https://www.google.com/friendconnect/script/friendconnect.js",
              "key": {
                "string": "key"
              },
              "version": {
                "string": "v"
              },
              "deferred": false,
              "params": {}
            }
          }, {
            "name": "sharing",
            "baseSpec": {
              "uri": "https://web.archive.org/web/20170906052436/http://www.google.com/s2/sharing/js",
              "ssl": null,
              "key": {
                "string": "key"
              },
              "version": {
                "string": "v"
              },
              "deferred": false,
              "params": {
                "language": {
                  "string": "hl"
                }
              }
            }
          }, "ads", {
            "name": "books",
            "baseSpec": {
              "uri": "https://web.archive.org/web/20170906052436/http://books.google.com/books/api.js",
              "ssl": "https://web.archive.org/web/20170906052436/https://encrypted.google.com/books/api.js",
              "key": {
                "string": "key"
              },
              "version": {
                "string": "v"
              },
              "deferred": true,
              "params": {
                "callback": {
                  "string": "callback"
                },
                "language": {
                  "string": "hl"
                }
              }
            }
          }, "elements", "earth", "ima"
        ]
      });
      google.loader.rfm({
        ":search": {
          "versions": {
            ":1": "1",
            ":1.0": "1"
          },
          "path": "/api/search/1.0/01d3e4019d02927b30f1da06094837dc/",
          "js": "default+en.I.js",
          "css": "default+en.css",
          "properties": {
            ":Version": "1.0",
            ":NoOldNames": false,
            ":JSHash": "01d3e4019d02927b30f1da06094837dc"
          }
        },
        ":language": {
          "versions": {
            ":1": "1",
            ":1.0": "1"
          },
          "path": "/api/language/1.0/777c339fbf96071a10c88d71b8d19085/",
          "js": "default+en.I.js",
          "properties": {
            ":Version": "1.0",
            ":JSHash": "777c339fbf96071a10c88d71b8d19085"
          }
        },
        ":annotations": {
          "versions": {
            ":1": "1",
            ":1.0": "1"
          },
          "path": "/api/annotations/1.0/3b0f18d6e7bf8cf053640179ef6d98d1/",
          "js": "default+en.I.js",
          "properties": {
            ":Version": "1.0",
            ":JSHash": "3b0f18d6e7bf8cf053640179ef6d98d1"
          }
        },
        ":wave": {
          "versions": {
            ":1": "1",
            ":1.0": "1"
          },
          "path": "/api/wave/1.0/3b6f7573ff78da6602dda5e09c9025bf/",
          "js": "default.I.js",
          "properties": {
            ":Version": "1.0",
            ":JSHash": "3b6f7573ff78da6602dda5e09c9025bf"
          }
        },
        ":picker": {
          "versions": {
            ":1": "1",
            ":1.0": "1"
          },
          "path": "/api/picker/1.0/1c635e91b9d0c082c660a42091913907/",
          "js": "default.I.js",
          "css": "default.css",
          "properties": {
            ":Version": "1.0",
            ":JSHash": "1c635e91b9d0c082c660a42091913907"
          }
        },
        ":ima": {
          "versions": {
            ":3": "1",
            ":3.0": "1"
          },
          "path": "/api/ima/3.0/28a914332232c9a8ac0ae8da68b1006e/",
          "js": "default.I.js",
          "properties": {
            ":Version": "3.0",
            ":JSHash": "28a914332232c9a8ac0ae8da68b1006e"
          }
        }
      });
      google.loader.rpl({
        ":chrome-frame": {
          "versions": {
            ":1.0.0": {
              "uncompressed": "CFInstall.js",
              "compressed": "CFInstall.min.js"
            },
            ":1.0.1": {
              "uncompressed": "CFInstall.js",
              "compressed": "CFInstall.min.js"
            },
            ":1.0.2": {
              "uncompressed": "CFInstall.js",
              "compressed": "CFInstall.min.js"
            }
          },
          "aliases": {
            ":1": "1.0.2",
            ":1.0": "1.0.2"
          }
        },
        ":swfobject": {
          "versions": {
            ":2.1": {
              "uncompressed": "swfobject_src.js",
              "compressed": "swfobject.js"
            },
            ":2.2": {
              "uncompressed": "swfobject_src.js",
              "compressed": "swfobject.js"
            }
          },
          "aliases": {
            ":2": "2.2"
          }
        },
        ":ext-core": {
          "versions": {
            ":3.1.0": {
              "uncompressed": "ext-core-debug.js",
              "compressed": "ext-core.js"
            },
            ":3.0.0": {
              "uncompressed": "ext-core-debug.js",
              "compressed": "ext-core.js"
            }
          },
          "aliases": {
            ":3": "3.1.0",
            ":3.0": "3.0.0",
            ":3.1": "3.1.0"
          }
        },
        ":scriptaculous": {
          "versions": {
            ":1.8.3": {
              "uncompressed": "scriptaculous.js",
              "compressed": "scriptaculous.js"
            },
            ":1.9.0": {
              "uncompressed": "scriptaculous.js",
              "compressed": "scriptaculous.js"
            },
            ":1.8.1": {
              "uncompressed": "scriptaculous.js",
              "compressed": "scriptaculous.js"
            },
            ":1.8.2": {
              "uncompressed": "scriptaculous.js",
              "compressed": "scriptaculous.js"
            }
          },
          "aliases": {
            ":1": "1.9.0",
            ":1.8": "1.8.3",
            ":1.9": "1.9.0"
          }
        },
        ":webfont": {
          "versions": {
            ":1.0.12": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.13": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.14": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.15": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.10": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.11": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.27": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.28": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.29": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.23": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.24": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.25": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.26": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.21": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.22": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.3": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.4": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.5": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.6": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.9": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.16": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.17": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.0": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.18": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.1": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.19": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            },
            ":1.0.2": {
              "uncompressed": "webfont_debug.js",
              "compressed": "webfont.js"
            }
          },
          "aliases": {
            ":1": "1.0.29",
            ":1.0": "1.0.29"
          }
        },
        ":jqueryui": {
          "versions": {
            ":1.8.17": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.16": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.15": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.14": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.4": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.13": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.5": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.12": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.6": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.11": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.7": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.10": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.8": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.9": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.6.0": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.7.0": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.5.2": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.0": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.7.1": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.5.3": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.1": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.7.2": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.8.2": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            },
            ":1.7.3": {
              "uncompressed": "jquery-ui.js",
              "compressed": "jquery-ui.min.js"
            }
          },
          "aliases": {
            ":1": "1.8.17",
            ":1.8.3": "1.8.4",
            ":1.5": "1.5.3",
            ":1.6": "1.6.0",
            ":1.7": "1.7.3",
            ":1.8": "1.8.17"
          }
        },
        ":mootools": {
          "versions": {
            ":1.3.0": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.2.1": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.1.2": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.4.0": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.3.1": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.2.2": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.4.1": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.3.2": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.2.3": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.4.2": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.2.4": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.2.5": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            },
            ":1.1.1": {
              "uncompressed": "mootools.js",
              "compressed": "mootools-yui-compressed.js"
            }
          },
          "aliases": {
            ":1": "1.1.2",
            ":1.1": "1.1.2",
            ":1.2": "1.2.5",
            ":1.3": "1.3.2",
            ":1.4": "1.4.2",
            ":1.11": "1.1.1"
          }
        },
        ":yui": {
          "versions": {
            ":2.8.0r4": {
              "uncompressed": "build/yuiloader/yuiloader.js",
              "compressed": "build/yuiloader/yuiloader-min.js"
            },
            ":2.9.0": {
              "uncompressed": "build/yuiloader/yuiloader.js",
              "compressed": "build/yuiloader/yuiloader-min.js"
            },
            ":2.8.1": {
              "uncompressed": "build/yuiloader/yuiloader.js",
              "compressed": "build/yuiloader/yuiloader-min.js"
            },
            ":2.6.0": {
              "uncompressed": "build/yuiloader/yuiloader.js",
              "compressed": "build/yuiloader/yuiloader-min.js"
            },
            ":2.7.0": {
              "uncompressed": "build/yuiloader/yuiloader.js",
              "compressed": "build/yuiloader/yuiloader-min.js"
            },
            ":3.3.0": {
              "uncompressed": "build/yui/yui.js",
              "compressed": "build/yui/yui-min.js"
            },
            ":2.8.2r1": {
              "uncompressed": "build/yuiloader/yuiloader.js",
              "compressed": "build/yuiloader/yuiloader-min.js"
            }
          },
          "aliases": {
            ":2": "2.9.0",
            ":3": "3.3.0",
            ":2.8.2": "2.8.2r1",
            ":2.8.0": "2.8.0r4",
            ":3.3": "3.3.0",
            ":2.6": "2.6.0",
            ":2.7": "2.7.0",
            ":2.8": "2.8.2r1",
            ":2.9": "2.9.0"
          }
        },
        ":prototype": {
          "versions": {
            ":1.6.1.0": {
              "uncompressed": "prototype.js",
              "compressed": "prototype.js"
            },
            ":1.6.0.2": {
              "uncompressed": "prototype.js",
              "compressed": "prototype.js"
            },
            ":1.7.0.0": {
              "uncompressed": "prototype.js",
              "compressed": "prototype.js"
            },
            ":1.6.0.3": {
              "uncompressed": "prototype.js",
              "compressed": "prototype.js"
            }
          },
          "aliases": {
            ":1": "1.7.0.0",
            ":1.6.0": "1.6.0.3",
            ":1.6.1": "1.6.1.0",
            ":1.7.0": "1.7.0.0",
            ":1.6": "1.6.1.0",
            ":1.7": "1.7.0.0"
          }
        },
        ":jquery": {
          "versions": {
            ":1.3.0": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.4.0": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.3.1": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.5.0": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.4.1": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.3.2": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.2.3": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.6.0": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.5.1": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.4.2": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.7.0": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.6.1": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.5.2": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.4.3": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.7.1": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.6.2": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.4.4": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.2.6": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.6.3": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            },
            ":1.6.4": {
              "uncompressed": "jquery.js",
              "compressed": "jquery.min.js"
            }
          },
          "aliases": {
            ":1": "1.7.1",
            ":1.2": "1.2.6",
            ":1.3": "1.3.2",
            ":1.4": "1.4.4",
            ":1.5": "1.5.2",
            ":1.6": "1.6.4",
            ":1.7": "1.7.1"
          }
        },
        ":dojo": {
          "versions": {
            ":1.3.0": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.4.0": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.3.1": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.5.0": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.4.1": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.3.2": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.2.3": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.6.0": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.5.1": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.7.0": {
              "uncompressed": "dojo/dojo.js.uncompressed.js",
              "compressed": "dojo/dojo.js"
            },
            ":1.6.1": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.4.3": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.7.1": {
              "uncompressed": "dojo/dojo.js.uncompressed.js",
              "compressed": "dojo/dojo.js"
            },
            ":1.7.2": {
              "uncompressed": "dojo/dojo.js.uncompressed.js",
              "compressed": "dojo/dojo.js"
            },
            ":1.2.0": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            },
            ":1.1.1": {
              "uncompressed": "dojo/dojo.xd.js.uncompressed.js",
              "compressed": "dojo/dojo.xd.js"
            }
          },
          "aliases": {
            ":1": "1.6.1",
            ":1.1": "1.1.1",
            ":1.2": "1.2.3",
            ":1.3": "1.3.2",
            ":1.4": "1.4.3",
            ":1.5": "1.5.1",
            ":1.6": "1.6.1",
            ":1.7": "1.7.2"
          }
        }
      });
    }

  }

  jQuery(window).on('load', function() {
    new JCaption('img.caption');
  });
</script>

<!--	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
<meta charset="utf-8" />
<title>User &nbsp;</title>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript">
  // Load the Google Transliterate API
  google.load("elements", "1", {
    packages: "transliteration"
  });

  function onLoad() {
    var options = {
      sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
      destinationLanguage: [google.elements.transliteration.LanguageCode.HINDI],
      shortcutKey: 'ctrl+g',
      transliterationEnabled: true
    };

    // Create an instance on TransliterationControl with the required
    // options.
    var control =
      new google.elements.transliteration.TransliterationControl(options);

    // Enable transliteration in the textbox with id
    // 'transliterateTextarea'.
    control.makeTransliteratable(['name_in_hindi']);
    control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
  }
  google.setOnLoadCallback(onLoad);
</script>

<script type="text/javascript">
  function go(converter) {
    window.location.href = converter;
  }
</script>
<!-- END HINDI TYPING API -->
<div id="content">
  <div class="container-fluid">
    <div class="row ">


    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="info">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">


                            <div class="row" style="margin-top:5px;">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_mba_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                    <!-- <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdef/Adm_phdef_applicant_home'" value="Back to Applicant Home"/> -->
                                    <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdef/Adm_phdef_registration/logout'" value="Logout"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



      <div class="col-md-8 text-center p-0 mt-3 mb-2">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
          <h2 id="heading">Registration Form</h2>
          <!-- <p>Fill all form field to go to next step</p> -->

          <!-- progressbar -->

          <ul id="progressbar">
            <li class="active" id="personal"><strong>Personal Details</strong></li>
            <li id="education"><strong>Education Details</strong></li>
            <li id="parent"><strong>Parent Account Details</strong></li>
            <li id="parent"><strong>Student Other Important Details</strong></li>
            <li id="personal"><strong>Form Preview</strong></li>
          </ul>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div> <br> <!-- fieldsets -->
          <fieldset>
            <form id="msform" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_mis_registration/mis_registration_save_personal_details" onsubmit="return submitForm(this);">
              <div class="form-card">
                <div class="row">
                  <!-- <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div> -->
                  <!-- <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div> -->
                </div>
                <h3 align="center">Personal Details </h3>
                <p align="center"><b>Please do not use Autofill.</p>
                <!-- Pl read the instructions carefully before filling the form</b><a href="<?= base_url() ?>assets/FAQ.pdf" target="_blank" style="color: #673AB7;font-size:16px;">&nbsp;Click Here</a></p> -->
                <?php
                if ($this->session->flashdata('flashError')) {
                  $message = $this->session->flashdata('flashError');
                  //echo $message['success'];
                ?>
                  <center>
                    <div class="alert alert-danger alert-dismissible" style="width:65%;" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error!</strong>
                      <?php echo $message; ?>
                    </div>
                  </center>
                <?php
                }
                ?>
                <div class="panel panel-default">
                  <div class="panel-heading" id="disabledbutton">


                    <div class="form-group row required">
                      <?php if ($admn_type == 'jee') { ?>
                        <label class="control-label col-md-2" for="reg_id">JEE Main App No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'msc') { ?>
                        <label class="control-label col-md-2" for="reg_id">Registration No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'msctech') { ?>
                        <label class="control-label col-md-2" for="reg_id">Registration No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'mba') { ?>
                        <label class="control-label col-md-2" for="reg_id">Registration No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'jrf') { ?>
                        <label class="control-label col-md-2" for="reg_id">Registration No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'mtech') { ?>
                        <label class="control-label col-md-2" for="reg_id">IITISM Registration
                          No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'mtech_3yr') { ?>
                        <label class="control-label col-md-2" for="reg_id">Registration No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'foreign') { ?>
                        <label class="control-label col-md-2" for="reg_id">Passport No:<strong style="color: red;">*</strong></label>
                      <?php } ?>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="reg_id" value='<?php echo $reg_id ?>' readonly>
                      </div>

                      <?php if ($admn_type == 'jee') { ?>
                        <label class="control-label col-md-2" for="reg_id">Institute Name:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'msc') { ?>
                        <label class="control-label col-md-2" for="reg_id">Enrollment No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'msctech') { ?>
                        <label class="control-label col-md-2" for="reg_id">Enrollment No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'mba') { ?>
                        <label class="control-label col-md-2" for="reg_id">Institute Name:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'jrf') { ?>
                        <label class="control-label col-md-2" for="reg_id">Institute Name:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'mtech') { ?>
                        <label class="control-label col-md-2" for="reg_id">Application Id:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'mtech_3yr') { ?>
                        <label class="control-label col-md-2" for="reg_id">Enrollment No:<strong style="color: red;">*</strong></label>
                      <?php } else if ($admn_type == 'foreign') { ?>
                        <label class="control-label col-md-2" for="reg_id">Enrollment No:<strong style="color: red;">*</strong></label>
                      <?php } ?>
                      <div class="col-md-4">
                        <?php if ($admn_type == 'jee' || $admn_type == 'mba' || $admn_type == 'jrf') { ?>
                          <input type="hidden" name="auth1" value='<?php echo $auth1; ?>'>
                          <input type="text" class="form-control" name="institute_name" value='IIT(ISM) DHANBAD' readonly>
                        <?php } else { ?>
                          <input type="hidden" class="form-control" name="institute_name" value='IIT(ISM) DHANBAD' readonly>
                          <input type="text" class="form-control" name="auth1" value='<?php echo ucwords($auth1); ?>' readonly>
                        <?php } ?>
                      </div>
                    </div>

                    <input type="hidden" name="admn_no" value=<?php echo $admn_no; ?>>


                    <div class="form-group row required">

                      <label class="control-label col-md-2" for="name">Name:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <?php if (!isset($name)) $name = $first_name . " " . $middle_name . " " . $last_name; ?>
                        <input type="text" class="form-control" name="name" value='<?php echo $name; ?>' readonly>
                      </div>
                      <?php echo form_error('name'); ?>



                      <label class="control-label col-md-2" for="email">Email:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="email" class="form-control" name="email" value='<?php echo $email ?>' readonly>
                      </div>

                      <?php echo form_error('email'); ?>

                    </div>

                    <div class="form-group row required">
                      <label class="control-label col-md-2" for="contact_no">Contact
                        Number:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="contact_no" value='<?php echo $contact_no ?>' readonly>
                      </div>

                      <label class="control-label col-md-2" for="sex">Gender:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <label class="radio-inline"><input type="radio" name="sex_new" disabled <?php echo ($sex == 'm') ?  "checked" : "" ?> readonly>Male</label>
                        <label class="radio-inline"><input type="radio" name="sex_new" disabled <?php echo ($sex == 'f') ? "checked" : "" ?> readonly>Female</label>
                        <label class="radio-inline"><input type="radio" name="sex_new" disabled <?php echo ($sex == 'o') ? "checked" : "" ?> readonly>Transgender</label>
                      </div>

                    </div>

                    <input type="hidden" name="sex" value="<?php if ($sex == 'm') {
                                                              echo 'm';
                                                            } elseif ($sex == 'f') {
                                                              echo 'f';
                                                            } else {
                                                              echo 'o';
                                                            } ?>" />

                    <div class="form-group row required">
                      <label class="control-label col-md-2" for="category">Category:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="category" value='<?php echo $category; ?>' readonly>
                      </div>


                      <?php if ($admn_type == 'jee') { ?>
                        <label class="control-label col-md-2" for="is_prep">Preparatory:</label>
                        <div class="col-md-4">

                          <label class="radio-inline"><input type="radio" name="is_prep" <?php echo ($is_prep == 'yes') ?  "checked" : "" ?>>Yes</label>
                          <label class="radio-inline"><input type="radio" name="is_prep" <?php echo ($is_prep == 'no') ? "checked" : "" ?>>No</label>

                        </div>
                      <?php } ?>
                    </div>


                    <input type="hidden" class="form-control" name="allocated_category" value='<?php echo $allocated_category; ?>' readonly>

                  </div>
                  <!-- End div tag for readonly section  -->

                  <input type="hidden" name="sex_new" value="<?php echo $sex; ?>">


                  <div class="panel-body">

                    <div class="form-group row required">
                      <label class="control-label col-md-2" for="nationality">Nationality:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">

                        <input type="text" class="form-control" name="nationality" value='<?php if (!empty($get_prev_personal_details[0]['nationality'])) {
                                                                                            echo $get_prev_personal_details[0]['nationality'];
                                                                                          } elseif (!empty($nationality)) {
                                                                                            echo ucwords($nationality);
                                                                                          } else {
                                                                                            echo " ";
                                                                                          } ?>' required>
                        <?php echo form_error('nationality'); ?>
                      </div>

                      <label class="control-label col-md-2" for="pd_status">Divyang:</label>
                      <div class="col-md-4">

                        <label class="radio-inline"><input type="radio" name="pd_status_new" disabled <?php echo ($pd_status == 'yes') ?  "checked" : "" ?>>Yes</label>
                        <label class="radio-inline"><input type="radio" name="pd_status_new" disabled <?php echo ($pd_status == 'no') ? "checked" : "" ?>>No</label>
                      </div>
                    </div>

                    <input type="hidden" name="pd_status" value="<?php if ($pd_status == 'yes') {
                                                                    echo 'Yes';
                                                                  } else {
                                                                    echo 'No';
                                                                  } ?>">

                    <?php if ($admn_type == 'mba' || $admn_type == 'mtech' || $admn_type == 'jrf') { ?>
                      <div class="form-group row required">
                        <label class="control-label col-md-2" for="permanent_address_line1">Permanent Address:<strong style="color: red;">*</strong></label>
                        <div class="col-md-4">
                          <textarea class="form-control" name="permanent_address_line1" required> <?php if (!empty($get_prev_personal_details[0]['permanent_address'])) {
                                                                                                    echo $get_prev_personal_details[0]['permanent_address'];
                                                                                                  } elseif (!empty($permanent_address_line1)) {
                                                                                                    echo ucwords($permanent_address_line1);
                                                                                                  } else {
                                                                                                    echo set_value('permanent_address_line1');
                                                                                                  } ?></textarea>
                          <span id="error_form_val"><?php echo form_error('permanent_address_line1'); ?></span>
                        </div>
                        <label class="control-label col-md-2" for="permanent_address_line2">Street/Locality:<strong style="color: red;">*</strong></label>
                        <div class="col-md-4">
                          <textarea class="form-control" name="permanent_address_line2" required> <?php if (!empty($get_prev_personal_details[0]['street_locality'])) {
                                                                                                    echo $get_prev_personal_details[0]['street_locality'];
                                                                                                  } elseif (!empty($permanent_address_line2)) {
                                                                                                    echo ucwords($permanent_address_line2);
                                                                                                  } else {
                                                                                                    echo set_value('permanent_address_line2');
                                                                                                  } ?></textarea>
                          <span id="error_form_val"><?php echo form_error('permanent_address_line2'); ?></span>
                        </div>
                      </div>
                      <div class="form-group row required">

                        <label class="control-label col-md-2" for="permanent_address_city">City:<strong style="color: red;">*</strong></label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="permanent_address_city" value='<?php if (!empty($get_prev_personal_details[0]['city'])) {
                                                                                                          echo $get_prev_personal_details[0]['city'];
                                                                                                        } elseif (!empty($permanent_address_city)) {
                                                                                                          echo ucwords($permanent_address_city);
                                                                                                        } else {
                                                                                                          echo set_value('permanent_address_city');
                                                                                                        } ?>' required>
                          <span id="error_form_val"><?php echo form_error('permanent_address_city'); ?></span>
                        </div>

                        <label class="control-label col-md-2" for="permanent_address_state">State:<strong style="color: red;">*</strong></label>
                        <div class="col-md-4">
                          <!-- <input type="text" class="form-control" name="permanent_address_state" value=''> -->
                          <select class="form-control" name="permanent_address_state" required>
                            <option value="">select</option>
                            <?php

                            foreach ($state_list as $key => $list) {
                            ?>
                              <option value="<?php echo $list['state_name']; ?>" <?php echo set_select('permanent_address_state', $list['state_name']); ?> <?php if (!empty($get_prev_personal_details[0]['state'])) {
                                                                                                                                                              if ($get_prev_personal_details[0]['state'] == $list['state_name']) {
                                                                                                                                                                echo 'selected';
                                                                                                                                                              }
                                                                                                                                                            } ?>>
                                <?php echo $list['state_name']; ?></option>
                            <?php
                            }

                            ?>

                            <option value="Other" <?php if (!empty($get_prev_personal_details[0]['state'])) {
                                                    if ($get_prev_personal_details[0]['state'] == 'Other') {
                                                      echo 'selected';
                                                    }
                                                  } ?> <?php echo set_select('permanent_address_state', 'Other'); ?>>
                              Other</option>
                          </select>
                          <span id="error_form_val"><?php echo form_error('permanent_address_state'); ?></span>
                        </div>
                      </div>
                      <div class="form-group row required">
                        <label class="control-label col-md-2" for="permanent_address_pincode">Pincode:<strong style="color: red;">*</strong></label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="permanent_address_pincode" value='<?php if (!empty($get_prev_personal_details[0]['pincode'])) {
                                                                                                            echo $get_prev_personal_details[0]['pincode'];
                                                                                                          } elseif (!empty($permanent_address_pincode)) {
                                                                                                            echo $permanent_address_pincode;
                                                                                                          } else {
                                                                                                            echo set_value('permanent_address_pincode');
                                                                                                          } ?>' required>
                          <span id="error_form_val"><?php echo form_error('permanent_address_pincode'); ?></span>
                        </div>
                        <label class="control-label col-md-2" for="country">Country:<strong style="color: red;">*</strong></label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="country" value='<?php if (!empty($get_prev_personal_details[0]['country'])) {
                                                                                          echo $get_prev_personal_details[0]['country'];
                                                                                        } elseif (!empty($country)) {
                                                                                          echo ucwords($country);
                                                                                        } else {
                                                                                          echo "India";
                                                                                        } ?>' required>
                          <span id="error_form_val"><?php echo form_error('country'); ?></span>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="form-group row required">

                      <label class="control-label col-md-2" for="dob"> Date of Birth:<strong style="color: red;">*</strong></label>

                      <div class="col-md-2">
                        <select name='month' class='form-control' id='month' style='padding: 0px 0px;' readonly>
                          <option value="<?php if (!empty($get_prev_personal_details[0]['date_of_birth'])) {
                                            echo date('m', strtotime($get_prev_personal_details[0]['date_of_birth']));
                                          } else {
                                            echo date('m', strtotime($dob));
                                          } ?>"><?php if (!empty($get_prev_personal_details[0]['date_of_birth'])) {
                                                        echo date('F', strtotime($get_prev_personal_details[0]['date_of_birth']));
                                                      } else {
                                                        echo date('F', strtotime($dob));
                                                      } ?>
                          </option>
                        </select>
                      </div>

                      <div class="col-md-1">
                        <select class='form-control' name='day' id='day' style='padding: 0px 0px;' readonly>
                          <option value='<?php if (!empty($get_prev_personal_details[0]['date_of_birth'])) {
                                            echo date('d', strtotime($get_prev_personal_details[0]['date_of_birth']));
                                          } else {
                                            echo date('d', strtotime($dob));
                                          } ?>'>
                            <?php if (!empty($get_prev_personal_details[0]['date_of_birth'])) {
                              echo date('d', strtotime($get_prev_personal_details[0]['date_of_birth']));
                            } else {
                              echo date('d', strtotime($dob));
                            } ?>
                          </option>
                        </select>
                      </div>

                      <div class="col-md-1">
                        <select class='form-control' name='dob_year' id='dob_year' style='padding: 5px 1px;' readonly>
                          <option value='<?php echo date('Y', strtotime($dob)); ?>'>
                            <?php if (!empty($get_prev_personal_details[0]['date_of_birth'])) {
                              echo date('Y', strtotime($get_prev_personal_details[0]['date_of_birth']));
                            } else {
                              echo date('Y', strtotime($dob));
                            } ?>
                          </option>
                        </select>
                      </div>


                      <?php /* if($admn_type=='jee'){ ?>
                                            <label class="control-label col-md-2" for="is_prep">Preparatory:</label>
                                            <div class="col-md-4">

                                                <label class="radio-inline"><input type="radio" name="is_prep"
                                                        <?php echo ($is_prep== 'yes') ?  "checked" : ""?>>Yes</label>
                                                <label class="radio-inline"><input type="radio" name="is_prep"
                                                        <?php echo ($is_prep== 'no') ? "checked" : ""?>>No</label>

                                            </div>
                                            <?php } */ ?>

                    </div>

                    <!--------------------------------------------------                                           --------------------------------->


                    <div class="form-group row required">

                      <label class="control-label col-md-2" for="marital_status">Marital
                        Status:</label>
                      <div class="col-md-4">
                        <!-- IF not given by JEE -->

                        <label class="radio-inline"><input type="radio" name="marital_status" value="married" <?php if (!empty($get_prev_personal_details[0]['marital_status'])) {
                                                                                                                echo $get_prev_personal_details[0]['marital_status'];
                                                                                                              } elseif (isset($marital_status)) echo ($marital_status == 'married') ?  "checked" : ""; ?>>Married</label>
                        <label class="radio-inline"><input type="radio" name="marital_status" value="unmarried" <?php if (!empty($get_prev_personal_details[0]['marital_status'])) {
                                                                                                                  echo $get_prev_personal_details[0]['marital_status'];
                                                                                                                } elseif (isset($marital_status)) echo ($marital_status == 'unmarried') ?  "checked" : "";
                                                                                                                else echo "checked"; ?>>Unmarried</label>

                        <span id="error_form_val"><?php echo form_error('marital_status'); ?></span>
                      </div>


                      <!-- <input type="hidden" name="marital_status" value="<?php if (!empty($get_prev_personal_details[0]['marital_status'])) {
                                                                                echo $get_prev_personal_details[0]['marital_status'];
                                                                              } elseif (isset($marital_status)) echo $marital_status;
                                                                              else {
                                                                              } ?>"> -->


                      <label class="control-label col-md-2" for="religion">Religion:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">

                        <select class="form-control" name="religion" required>
                          <option value="">select</option>
                          <option value="HINDU" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                  if ($get_prev_personal_details[0]['religion'] == 'HINDU') {
                                                    echo 'selected';
                                                  }
                                                } elseif (strtoupper($religion) == 'HINDU') {
                                                  echo 'selected';
                                                } else {
                                                  echo set_select('religion', 'HINDU');
                                                } ?>>
                            HINDU</option>
                          <option value="MUSLIM" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                    if ($get_prev_personal_details[0]['religion'] == 'MUSLIM') {
                                                      echo 'selected';
                                                    }
                                                  } elseif (strtoupper($religion) == 'MUSLIM') {
                                                    echo 'selected';
                                                  } else {
                                                    echo set_select('religion', 'MUSLIM');
                                                  } ?>>
                            MUSLIM</option>
                          <option value="CHRISTIAN" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                      if ($get_prev_personal_details[0]['religion'] == 'CHRISTIAN') {
                                                        echo 'selected';
                                                      }
                                                    } elseif (strtoupper($religion) == 'CHRISTIAN') {
                                                      echo 'selected';
                                                    } else {
                                                      echo set_select('religion', 'CHRISTIAN');
                                                    } ?>>
                            CHRISTIAN</option>
                          <option value="SIKH" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                  if ($get_prev_personal_details[0]['religion'] == 'SIKH') {
                                                    echo 'selected';
                                                  }
                                                } elseif (strtoupper($religion) == 'SIKH') {
                                                  echo 'selected';
                                                } else {
                                                  echo set_select('religion', 'SIKH');
                                                } ?>>
                            SIKH</option>
                          <option value="BAUDHH" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                    if ($get_prev_personal_details[0]['religion'] == 'BAUDHH') {
                                                      echo 'selected';
                                                    }
                                                  } elseif (strtoupper($religion) == 'BAUDHH') {
                                                    echo 'selected';
                                                  } else {
                                                    echo set_select('religion', 'BAUDHH');
                                                  } ?>>
                            BAUDDHIST</option>
                          <option value="JAIN" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                  if ($get_prev_personal_details[0]['religion'] == 'JAIN') {
                                                    echo 'selected';
                                                  }
                                                } elseif (strtoupper($religion) == 'JAIN') {
                                                  echo 'selected';
                                                } else {
                                                  echo set_select('religion', 'JAIN');
                                                } ?>>
                            JAIN</option>
                          <option value="PARSI" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                  if ($get_prev_personal_details[0]['religion'] == 'PARSI') {
                                                    echo 'selected';
                                                  }
                                                } elseif (strtoupper($religion) == 'PARSI') {
                                                  echo 'selected';
                                                } else {
                                                  echo set_select('religion', 'PARSI');
                                                } ?>>
                            PARSI</option>
                          <option value="YAHUDI" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                    if ($get_prev_personal_details[0]['religion'] == 'YAHUDI') {
                                                      echo 'selected';
                                                    }
                                                  } elseif (strtoupper($religion) == 'YAHUDI') {
                                                    echo 'selected';
                                                  } else {
                                                    echo set_select('religion', 'YAHUDI');
                                                  } ?>>
                            YAHUDI</option>
                          <option value="OTHERS" <?php if (!empty($get_prev_personal_details[0]['religion'])) {
                                                    if ($get_prev_personal_details[0]['religion'] == 'OTHERS') {
                                                      echo 'selected';
                                                    }
                                                  } elseif (strtoupper($religion) == 'OTHERS') {
                                                    echo 'selected';
                                                  } else {
                                                    echo set_select('religion', 'OTHERS');
                                                  } ?>>
                            OTHERS</option>
                        </select>
                        <span id="error_form_val"><?php echo form_error('religion'); ?></span>
                      </div>

                    </div>


                    <div class="form-group row required">

                      <label class="control-label col-md-2" for="blood_group">Blood Group:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <select class="form-control" name="blood_group" required>
                          <option value="">select</option>
                          <option value="A+" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'A+') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'A+');
                                              } ?>>
                            A+</option>
                          <option value="B+" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'B+') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'B+');
                                              } ?>>
                            B+</option>
                          <option value="AB+" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'AB+') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'AB+');
                                              } ?>>
                            AB+</option>
                          <option value="O+" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'O+') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'O+');
                                              } ?>>
                            O+</option>
                          <option value="A-" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'A-') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'A-');
                                              } ?>>
                            A-</option>
                          <option value="B-" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'B-') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'B-');
                                              } ?>>
                            B-</option>
                          <option value="AB-" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'AB-') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'AB-');
                                              } ?>>
                            AB-</option>
                          <option value="O-" <?php if (!empty($get_prev_personal_details[0]['blood_group'])) {
                                                if ($get_prev_personal_details[0]['blood_group'] == 'O-') {
                                                  echo 'selected';
                                                }
                                              } else {
                                                echo set_select('blood_group', 'O-');
                                              } ?>>
                            O-</option>
                        </select>
                        <span id="error_form_val"><?php echo form_error('blood_group'); ?></span>
                      </div>

                      <label class="control-label col-md-2" for="kashmiri_immigrant">Kashmiri
                        Immigrant:</label>
                      <div class="col-md-4">

                        <label class="radio-inline"><input type="radio" name="kashmiri_immigrant" value="yes" <?php if (!empty($get_prev_personal_details[0]['kashmiri_immigrant'])) {
                                                                                                                if ($get_prev_personal_details[0]['kashmiri_immigrant'] == 'yes') {
                                                                                                                  echo 'checked';
                                                                                                                } else {
                                                                                                                  echo '';
                                                                                                                }
                                                                                                              } elseif (isset($kashmiri_immigrant)) {
                                                                                                                echo ($kashmiri_immigrant == 'yes') ?  "checked" : "";
                                                                                                              } else {
                                                                                                              } ?>>Yes</label>
                        <label class="radio-inline"><input type="radio" name="kashmiri_immigrant" value="no" <?php if (!empty($get_prev_personal_details[0]['kashmiri_immigrant'])) {
                                                                                                                if ($get_prev_personal_details[0]['kashmiri_immigrant'] == 'no') {
                                                                                                                  echo 'checked';
                                                                                                                } else {
                                                                                                                  echo '';
                                                                                                                }
                                                                                                              } elseif (isset($kashmiri_immigrant)) {
                                                                                                                echo ($kashmiri_immigrant == 'no') ?  "checked" : "";
                                                                                                              } else {
                                                                                                                echo "checked";
                                                                                                              } ?>>No</label>
                      </div>
                    </div>

                    <!-- <input type="hidden" name="kashmiri_immigrant" value="<?php if (!empty($get_prev_personal_details[0]['kashmiri_immigrant'])) {
                                                                                  echo $get_prev_personal_details[0]['kashmiri_immigrant'];
                                                                                } elseif (isset($kashmiri_immigrant)) echo $kashmiri_immigrant;
                                                                                else {
                                                                                } ?>"> -->



                    <div class="form-group row required">

                      <label class="control-label col-md-2" for="name_in_hindi">पूरा नाम हिन्दी
                        में:<strong style="color: red;">*</strong><span>
                          <!-- <a href="https://translate.google.com/#view=home&op=translate&sl=en&tl=hi&text=<?php //echo $first_name.' '.$middle_name.' '.$last_name;
                                                                                                              ?>" target="_blank">Translate</a> -->
                          <br>Enter word and Space it will convert into hindi.
                        </span></label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="name_in_hindi" id="name_in_hindi" value="<?php if (!empty($get_prev_personal_details[0]['name_in_hindi'])) {
                                                                                                                  echo $get_prev_personal_details[0]['name_in_hindi'];
                                                                                                                } else {
                                                                                                                  echo set_value('name_in_hindi');
                                                                                                                } ?>" required>
                        <span id="error_form_val"><?php echo form_error('name_in_hindi'); ?></span>
                      </div>

                      <label class="control-label col-md-2" for="birth_place">Birth Place:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="birth_place" value="<?php if (!empty($get_prev_personal_details[0]['birth_place'])) {
                                                                                            echo $get_prev_personal_details[0]['birth_place'];
                                                                                          } else {
                                                                                            echo set_value('birth_place');
                                                                                          } ?>" required>
                        <span id="error_form_val"><?php echo form_error('birth_place'); ?></span>
                      </div>

                    </div>
                    <div class="form-group row required">

                      <label class="control-label col-md-2">Identification Mark:<strong style="color: red;">*</strong></label>

                      <div class="col-md-4">
                        <textarea name="identification_mark" class="form-control " rows="3" required><?php if (!empty($get_prev_personal_details[0]['identification_mark'])) {
                                                                                                        echo $get_prev_personal_details[0]['identification_mark'];
                                                                                                      } else {
                                                                                                        echo set_value('identification_mark');
                                                                                                      } ?></textarea>

                        <span id="error_form_val"><?php echo form_error('identification_mark'); ?></span>
                      </div>
                      <label class="control-label col-md-2" for="hobbies">Hobbies:</label>
                      <div class="col-md-4">
                        <textarea name="hobbies" class="form-control " rows="3"><?php if (!empty($get_prev_personal_details[0]['hobbies'])) {
                                                                                  echo $get_prev_personal_details[0]['hobbies'];
                                                                                } else {
                                                                                  echo set_value('hobbies');
                                                                                } ?></textarea>

                        <span id="error_form_val"><?php echo form_error('hobbies'); ?></span>
                      </div>
                    </div>



                    <div class="form-group row">

                      <label class="control-label col-md-2" for="extra_curricular_activity">Extra
                        Curricular Activities:</label>
                      <div class="col-md-4">

                        <textarea name="extra_curricular_activity" class="form-control " rows="3"><?php if (!empty($get_prev_personal_details[0]['extra_curriculam_activities'])) {
                                                                                                    echo $get_prev_personal_details[0]['extra_curriculam_activities'];
                                                                                                  } else {
                                                                                                    echo set_value('extra_curricular_activity');
                                                                                                  } ?></textarea>

                        <span id="error_form_val"><?php echo form_error('extra_curricular_activity'); ?></span>
                      </div>
                      <label class="control-label col-md-2" for="fav_past_time">Other Relevent
                        Info:</label>
                      <div class="col-md-4">
                        <textarea name="other_relavant_info" class="form-control " rows="3"><?php if (!empty($get_prev_personal_details[0]['other_relevant_info'])) {
                                                                                              echo $get_prev_personal_details[0]['other_relevant_info'];
                                                                                            } else {
                                                                                              echo set_value('other_relavant_info');
                                                                                            } ?></textarea>
                        <span id="error_form_val"><?php echo form_error('other_relavant_info'); ?></span>
                      </div>
                    </div>
                    <br>
                    <h4 style="color:#2562c2;font-weight:bold;">
                      <center>Parent's Bank Details</center>
                    </h4>
                    <br>

                    <div class="form-group row required">
                      <label class="control-label col-md-2" for="bank_name">Parent's Bank
                        Name:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="bank_name" value="<?php if (!empty($get_prev_personal_details[0]['parent_bank_name'])) {
                                                                                          echo $get_prev_personal_details[0]['parent_bank_name'];
                                                                                        } else {
                                                                                          echo set_value('bank_name');
                                                                                        } ?>" required>
                        <span id="error_form_val"><?php echo form_error('bank_name'); ?></span>
                      </div>

                      <label class="control-label col-md-2" for="account_no">Parent's Account
                        Number:( Will be used for parent portal also)<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="account_no" value="<?php if (!empty($get_prev_personal_details[0]['parent_account_number'])) {
                                                                                            echo $get_prev_personal_details[0]['parent_account_number'];
                                                                                          } else {
                                                                                            echo set_value('account_no');
                                                                                          } ?>" required>
                        <span id="error_form_val"><?php echo form_error('account_no'); ?></span>
                      </div>
                    </div>

                    <div class="form-group row required">

                      <label class="control-label col-md-2" for="ifsc">Parent's IFSC Code:<strong style="color: red;">*</strong></label>

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="ifsc" value="<?php if (!empty($get_prev_personal_details[0]['parent_bank_ifsc_code'])) {
                                                                                      echo $get_prev_personal_details[0]['parent_bank_ifsc_code'];
                                                                                    } else {
                                                                                      echo set_value('ifsc');
                                                                                    } ?>" required>
                        <span id="error_form_val"><?php echo form_error('ifsc'); ?></span>

                      </div>
                      <label class="control-label col-md-2" for="other_relavant_info">Candidate's
                        Favourite
                        Past time:</label>
                      <div class="col-md-4">
                        <textarea name="fav_past_time" class="form-control " rows="3"><?php if (!empty($get_prev_personal_details[0]['fav_past_time'])) {
                                                                                        echo $get_prev_personal_details[0]['fav_past_time'];
                                                                                      } else {
                                                                                        echo set_value('fav_past_time');
                                                                                      } ?></textarea>
                        <span id="error_form_val"><?php echo form_error('fav_past_time'); ?></span>

                      </div>


                    </div>

                    <!-- <div class="form-group row required">
    <label class="control-label col-md-2" for="aadhar_no">Student Aadhar Number:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="aadhar_no" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if (!empty($get_prev_personal_details[0]['stu_aadhar_no'])) {
                                                                                                                                                    echo $get_prev_personal_details[0]['stu_aadhar_no'];
                                                                                                                                                  } else {
                                                                                                                                                    echo set_value('aadhar_no');
                                                                                                                                                  } ?>">
        <span id="error_form_val"><?php echo form_error('aadhar_no'); ?></span>
      </div> -->


                    <div class="form-group row required">
                      <label class="control-label col-md-2" for="sel_passport_aadhar">Please
                        Select :</label>
                      <div class="col-md-4">
                        <input type="radio" name="sel_passport_aadhar" <?php if (!empty($get_prev_personal_details[0]['stu_aadhar_no'])) {
                                                                          echo 'checked';
                                                                        } ?> value="aadhar" required>
                        <label class="radio-container m-r-45">Aadhar Number
                        </label>

                        &nbsp;&nbsp;
                        <input type="radio" name="sel_passport_aadhar" <?php if (!empty($get_prev_personal_details[0]['stu_passport_no'])) {
                                                                          echo 'checked';
                                                                        } ?> value="passport" required>
                        <label class="radio-container m-r-45">Passport Number
                        </label>
                        <!-- <input type="text" class="form-control" name="passport_no" maxlength="12" value="<?php if (!empty($get_prev_personal_details[0]['stu_passport_no'])) {
                                                                                                                echo $get_prev_personal_details[0]['stu_passport_no'];
                                                                                                              } else {
                                                                                                                echo set_value('passport_no');
                                                                                                              } ?>">
        <span id="error_form_val"><?php echo form_error('passport_no'); ?></span> -->
                      </div>


                      <label class="control-label col-md-2">Migration Certificate No.:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="migration_cert1" value="<?php if (!empty($get_prev_personal_details[0]['migration_cert1'])) {
                                                                                                echo $get_prev_personal_details[0]['migration_cert1'];
                                                                                              } else {
                                                                                                echo "NA-" . $reg_id;
                                                                                              } ?>" required>
                        <span id="error_form_val"><?php echo form_error('migration_cert1'); ?></span>
                      </div>


                    </div>

                    <div id="show_hide_aadhar_no">
                      <label class="control-label col-md-2">Candidate's Aadhar Number:<strong style="color: red;">*</strong></label>
                      <div class="form-group row required">
                        <div class="col-md-4">
                          <input type="text" name="aadhar_no" value="<?php if (!empty($get_prev_personal_details[0]['stu_aadhar_no'])) {
                                                                        echo $get_prev_personal_details[0]['stu_aadhar_no'];
                                                                      } ?>" class="form-control" placeholder="Please Enter Aadhar Number">
                          <span id="error_form_val"><?php echo form_error('aadhar_no'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div id="show_hide_passport_no">
                      <label class="control-label col-md-2">Candidate's Passport Number:<strong style="color: red;">*</strong></label>
                      <div class="form-group row required">
                        <div class="col-md-4">
                          <input type="text" name="passport_no" class="form-control" value="<?php if (!empty($get_prev_personal_details[0]['stu_passport_no'])) {
                                                                                              echo $get_prev_personal_details[0]['stu_passport_no'];
                                                                                            } ?>" placeholder="Please Enter Passport Number">
                          <span id="error_form_val"><?php echo form_error('passport_no'); ?></span>
                        </div>
                      </div>
                    </div>

                    <p align="center" style="color: black;"><strong>*Incase of Non-Availabilty of
                        Current Migration Certificate Number of Graduation, you need to fill
                        "NA-Registration No" in that field </strong> </p>
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="photo">Photo:<strong style="color: red;">*</strong><br>
                        <p style="color:#FF0000;font-size:12px;">Same as Per Application Form
                        </p>
                      </label>
                      <div class="col-md-4">
                        <?php if (!empty($photo_signature[0]['doc_id'])) { ?>
                          <input type="hidden" name="photo" value="<?php if (!empty($get_prev_personal_details[0]['photo_path'])) {
                                                                      echo $get_prev_personal_details[0]['photo_path'];
                                                                    } else {
                                                                      echo 'https://admission.iitism.ac.in/' . $photo_signature[0]['doc_path'];
                                                                    } ?>">
                          <div id="imageBox" style="height: 120px; width: 100px;">
                            <img id="stu_img" class="img-thumbnail" src="<?php echo 'https://admission.iitism.ac.in/' . $photo_signature[0]['doc_path']; ?>" alt="your image" />
                          </div>
                        <?php } else { ?>
                          <input type="file" name="photo" value="<?php echo set_value('photo'); ?>" onchange="previewImg(this);" required>
                          <!-- preview image -->
                          <div id="imageBox" style="display: none;">
                            <img id="stu_img" class="img-thumbnail" src="#" alt="your image" />
                          </div>
                        <?php } ?>

                        <!-- <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be jpg , jpeg or png.</p> -->
                        <?php if (isset($photo_error)) echo '<p style="color:red;font-size:12px;">' . $photo_error . '</p>'; ?>
                      </div>
                      <label class="control-label col-md-2">Signature:<strong style="color: red;">*</strong></label>
                      <div class="col-md-4">
                        <?php if (!empty($photo_signature[1]['doc_id'])) { ?>
                          <input type="hidden" name="sign" value="<?php if (!empty($get_prev_personal_details[0]['signature_path'])) {
                                                                    echo $get_prev_personal_details[0]['signature_path'];
                                                                  } else {
                                                                    echo 'https://admission.iitism.ac.in/' . $photo_signature[1]['doc_path'];
                                                                  } ?>">
                          <div id="imageBox" style="height: 120px; width: 100px;">
                            <img id="stu_sign" class="img-thumbnail" src="<?php echo 'https://admission.iitism.ac.in/' . $photo_signature[1]['doc_path']; ?>" alt="your image" />
                          </div>
                        <?php } else { ?>
                          <input type="file" name="sign" value="<?php echo set_value('sign'); ?>" onchange="previewSign(this);" required>
                          <!-- sign image -->
                          <div id="signBox" style="display: none;width: 100px;">
                            <img id="stu_sign" class="img-thumbnail" src="#" alt="your image" />
                          </div>
                        <?php } ?>

                        <!-- <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be jpg , jpeg or png.</p> -->
                        <?php if (isset($sign_error)) echo '<p style="color:red;font-size:12px;">' . $sign_error . '</p>'; ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <input type="submit" id="next_submit" name="next" class="next action-button" value="Next" />

                    <br><br><br><br>
            </form>

          </fieldset>
          <fieldset></fieldset>
          <fieldset></fieldset>
          <fieldset></fieldset>

        </div>
      </div>
    </div>
  </div>
</div>

<div id="overlay">
  <br><br><br><br>
  <div id="loading" class="text-center" style="color:white;">
    <i class="fa fa-spinner fa-spin" style="font-size: 70px;"></i>
    <br>
    <h3>Please wait<br>while loading MIS Registration </h3>
  </div>
</div>

<div id="overlay1">
  <br><br><br><br>
  <div id="loading" class="text-center" style="color:white;">
    <i class="fa fa-spinner fa-spin" style="font-size: 70px;"></i>
    <br>
    <h3>Please wait<br>Getting Payment Sink Details</h3>
  </div>
</div>





<script>
  $(document).ready(function() {
    var aadhar = "<?php echo $get_prev_personal_details[0]['stu_aadhar_no']; ?>";
    var passport = "<?php echo $get_prev_personal_details[0]['stu_passport_no']; ?>";
    if (aadhar != '') {
      $('#show_hide_aadhar_no').css('display', 'block');
    } else {
      $('#show_hide_aadhar_no').css('display', 'none');
    }
    if (passport != '') {
      $('#show_hide_passport_no').css('display', 'block');
    } else {
      $('#show_hide_passport_no').css('display', 'none');
    }
    $('input[name="sel_passport_aadhar"]').click(function() {
      var radiovalue = $(this).val();
      if (radiovalue == 'aadhar') {
        $('#show_hide_aadhar_no').css('display', 'block');
        $('#show_hide_passport_no').css('display', 'none');
        $('input[name="passport_no"]').val('');

      } else {
        $('#show_hide_passport_no').css('display', 'block');
        $('#show_hide_aadhar_no').css('display', 'none');
        $('input[name="aadhar_no"]').val('');

      }
    });

  });
  //})
</script>


<script>
  $(document).ready(function() {
    $("input[name='sex']").each(function(i) {
      $(this).attr('readonly', 'readonly');
    });
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {
    //group add limit
    var maxGroup = 6;

    //add more fields group
    $(".addMore").click(function() {
      if ($('body').find('.fieldGroup').length < maxGroup) {
        var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() +
          '</div>';
        $('body').find('.fieldGroup:last').after(fieldHTML);
      } else {
        alert('Maximum ' + maxGroup + ' groups are allowed.');
      }
    });

    //remove fields group
    $("body").on("click", ".remove", function() {
      $(this).parents(".fieldGroup").remove();
    });
  });
</script>

<script>
  $(document).ready(function() {
    // stop date picker retrieve fee details from table
    // var date_input=$('input[name="fee_date"]'); //our date input has the name "date"
    // var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    // date_input.datepicker({
    //     format: 'dd/mm/yyyy',
    //     container: container,
    //     todayHighlight: true,
    //     autoclose: true,
    //     pickerPosition: 'top-right'
    // });

  });

  /***
  function abc(){
  return $(this).parent().find('input[type=file]').click();
  }
  function abc1()
  {
    return $(this).parent().parent().find( .form-control).html($(this).val().split(/[\\|/]/).pop());
  }


     $(document).ready(function () {
      var counter = 0;


      $("#addrow").on("click", function () {

          var newRow = $("<div>");
          var cols = "";
        cols+='<div class="panel-body"';
        cols+='<div class="container"';

     if(counter==0){
      cols+='<h1 align="center">10th Details</h1>';}
     else{
      cols+='<h1 align="center">12th Details</h1>';

      this.disabled=true;
     }

        cols+='<div class="form-group row required">';
        cols+='<label class="control-label col-md-2" for="exam' + counter + '" >Exam:</label>';
        cols+='<div class="col-md-4">';
        cols+='<input type="text" class="form-control"  placeholder="Exam" name="exam' + counter + '" >';
        cols+='</div>';
        cols+='<label class="control-label col-md-2" for="institute'+ counter + ' ">Institute:</label>';
        cols+='<div class="col-md-4">';
        cols+= '<input type="text" class="form-control" name="institute'+ counter + '" >';
        cols+='</div>';
        cols+='</div>';
        cols+='<div class="form-group row required">';
        cols+='<label class="control-label col-md-2" for="year'+ counter + '">Year:</label>';
        cols+='<div class="col-md-4">';
        cols+='<input type="text" class="form-control" name="year'+ counter + '" placeholder="year of pasing">';
        cols+='</div>';
        cols+='<label class="control-label col-md-2" for="marksheet'+ counter + '">Marksheet:</label>';
        cols+='<div class="col-md-4">';
        cols+='<div class="input-group">';
    cols+='<span class="input-group-btn">';
      cols+='<span class="btn btn-primary" onclick="$(this).parent().find(input[type=file]).click();">Browse</span>';
      cols+='<input name="marksheet'+ counter + '" onchange="$(this).parent().parent().find( .form-control).html($(this).val().split(/[\\|/]/).pop())" style="display: none;" type="file">';
    cols+='</span>';
    cols+='<span class="form-control"></span>';
  cols+='</div>';
        /*
        cols+='<div class="custom-file">';
        cols+='<input type="file" class="custom-file-input" id="marksheet' + counter + '" name="marksheet' + counter + '">';
        cols+='<label class="custom-file-label" for="marksheet' + counter + '">Choose file</label>';
        cols+='</div>';*/
  /***     cols+='</div>';
        cols+='</div>';
        cols+='<div class="form-group row required">';
        cols+='<label class="control-label col-md-2" for="grade'+ counter + '">Grade:</label>';
        cols+='<div class="col-md-4">';
        cols+='<input type="text" class="form-control" name="grade'+ counter + '" placeholder="Grade" >';
        cols+='</div>';
        cols+='<label class="control-label col-md-2" for="certificate' + counter + '">Certificate:</label>';
        cols+='<div class="col-md-4">';
            cols+='<div class="input-group">';
    cols+='<span class="input-group-btn">';
      cols+='<span class="btn btn-primary" onclick="$(this).parent().find(input[type=file]).click();">Browse</span>';
      cols+='<input name="certificate' + counter + '" onchange="$(this).parent().parent().find(".form-control").html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">';
    cols+='</span>';
    cols+='<span class="form-control"></span>';
  cols+='</div>';
        /*cols+='<div class="custom-file">';
        cols+='<input type="file" class="custom-file-input" id="certificate' + counter + '" name="certificate' + counter + '">';
        cols+='<label class="custom-file-label" for="certificate' + counter + '">Choose file</label>';
        cols+='</div>';
        */
  /**      cols+='</div>';
        cols+='</div>';
        cols+='<div class="form-group row required">';
        cols+='<label class="control-label col-md-2" for="division' + counter + '" >Division:</label>';
        cols+='<div class="col-md-4">';
        cols+='<input type="text" class="form-control"  placeholder="Division" name="division' + counter + '" >';
        cols+='</div>';
        cols+='<label class="control-label col-md-2" for="sub'+ counter + ' ">Subject:</label>';
        cols+='<div class="col-md-4">';
        cols+= '<input type="text" class="form-control" name="sub'+ counter + '" >';
        cols+='</div>';
        cols+='</div>';

        if(counter==1)
        {
          cols+='<div class="form-group row required">';
        cols+='<label class="control-label col-md-2" for="migration_cert'+ counter + '">Migration Certificate Number:</label>';
        cols+='<div class="col-md-4">';
        cols+='<input type="text" class="form-control" name="migration_cert'+ counter + '" >';
        cols+='</div>';
        cols+='</div'>;
        }
  cols+='</div>';
    cols+='</div>';



          //cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
          newRow.append(cols);
          $("table.order-list").append(newRow);
          counter++;
      });



      $("table.order-list").on("click", ".ibtnDel", function (event) {
          $(this).closest("div").remove();
          counter -= 1
      });


  });  ***/
</script>

<script>
  function previewImg(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $("#imageBox").show("slow");

      reader.onload = function(e) {
        $('#stu_img')
          .attr('src', e.target.result)
          .width(100)
          .height(120);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script>
  function previewSign(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $("#signBox").show("slow");

      reader.onload = function(e) {
        $('#stu_sign')
          .attr('src', e.target.result)
          .width(180)
          .height(80);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <img src="<?php echo base_url() ?>assets/images/ism/img_sign_format.jpg" style="height: 500px; width: 890px;" />
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-xl-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Receipt View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="iframepdf" width="100%" height="600px" src="<?php echo base_url($receipt_path) ?>"></iframe>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>



<script type="text/javascript">
  let input3 = document.getElementById("name_in_hindi");
  enableTransliteration(input3, "hi");
  var control = new google.elements.transliteration.TransliterationControl(options);
  control.makeTransliteratable(['name_in_hindi']);
  control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
</script>

<script>
  //$("#next_submit").find('[type="submit"]').trigger('click');
  function submitForm(form) {
    if (confirm("Are You Sure , you want to submit Personal Details ?")) {
      form.submit();
    } else {
      event.preventDefault();
      return false;
    }
    //return false;
  }
</script>

<script type="text/javascript">
  document.onreadystatechange = function() {
    //console.log(document.readyState);
    if (document.readyState !== 'complete') {
      $('#content').css('display', 'none');
      $('#overlay').css('display', 'block');
      //alert('Page loading is not complete');
      //                 document.querySelector(
      //                   "body").style.visibility = "hidden";
      //                 document.querySelector(
      //                   "#overlay").style.visibility = "visible";
    } else {
      $('#content').css('display', 'block');
      $('#overlay').css('display', 'none');
      //alert('Page loading complete');
      //                 document.querySelector(
      //                   "#loader").style.display = "none";
      //                 document.querySelector(
      //                   "body").style.visibility = "visible";
    }
  };
</script>
</body>

</html>