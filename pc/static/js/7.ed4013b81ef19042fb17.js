webpackJsonp([7],{C9PG:function(t,e){},Gmit:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});s("fFmM");var i=s("PI0u"),n=s("wf1y"),a={data:function(){return{detail:{}}},created:function(){},methods:{getNewsList:function(){var t=this;Object(n.b)(i.a+"/index.php/api/news/getDetail",{id:""}).then(function(e){console.log(e),0===e.return_code&&(t.detail=e.data)})}}},c={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"news"},[s("div",{staticClass:"banner"}),t._v(" "),s("div",{staticClass:"news-box"},[s("h1",[t._v(t._s(t.detail.title))]),t._v(" "),s("div",{staticClass:"news-des"}),t._v(" "),s("div",{staticClass:"new-cont"}),t._v(" "),t._m(0)])])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"news-read"},[e("h2",[this._v("相关阅读")]),this._v(" "),e("ul",[e("li",[this._v("111111")]),this._v(" "),e("li",[this._v("222")])])])}]};var d=s("Z0/y")(a,c,!1,function(t){s("C9PG")},"data-v-77de530c",null);e.default=d.exports}});
//# sourceMappingURL=7.ed4013b81ef19042fb17.js.map