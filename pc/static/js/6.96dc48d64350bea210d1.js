webpackJsonp([6],{"5/75":function(t,s){},GMHs:function(t,s,i){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var c=i("fFmM"),e=i("PI0u"),a=i("wf1y"),o={data:function(){return{product_type:1,data_product:""}},created:function(){this.getCaseSort()},methods:{choose:function(t){this.product_type=t,this.getCaseSort()},getCaseSort:function(){var t=this;Object(a.a)(e.a+"/index.php/api/product/getCategoryProductList",{product_type:this.product_type,device:"pc"}).then(function(s){console.log(s),0===s.return_code?t.data_product=s.data:Object(c.a)(s.return_message)})}}},n={render:function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{staticClass:"case"},[i("div",{staticClass:"banner"}),t._v(" "),i("div",{staticClass:"box-pro"},[i("div",{staticClass:"des"},[t._m(0),t._v(" "),i("ul",[i("li",{on:{click:function(s){t.choose(1)}}},[t._v("金银币/章")]),i("li",{on:{click:function(s){t.choose(2)}}},[t._v("金银条/钞")]),i("li",{on:{click:function(s){t.choose(3)}}},[t._v("奖牌/奖章/徽章")]),i("li",{on:{click:function(s){t.choose(4)}}},[t._v("金银摆件")])])]),t._v(" "),i("div",{staticClass:"width-common",staticStyle:{"padding-top":"480px"}},[i("ul",{staticClass:"pro-list"},t._l(t.data_product,function(s){return i("li",[i("img",{attrs:{src:t.URL_BASE+t.data_product.img_url}}),t._v(" "),i("span",{staticClass:"pro-title"},[t._v(t._s(t.data_product.product_name)+" >> ")]),t._v(" "),i("div",{staticClass:"box-cover"},[i("span",{staticClass:"cover-title"},[t._v(t._s(t.data_product.product_name))]),t._v(" "),i("span",{staticClass:"cover-cont"},[t._v("造更高品质的金银文化产品每一枚纪念币 都是一件艺术品，中国黄金品质 国家造币工。造更高品质的金银文化产品每一枚纪念币 都是一件艺术品，中国黄金品质 国家造币工。")])])])}))])]),t._v(" "),t._m(1),t._v(" "),t._m(2)])},staticRenderFns:[function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"title-des-box"},[s("div",{staticClass:"title"},[this._v("铸造更高品质的金银"),s("br"),this._v("文化产品")]),this._v(" "),s("div",{staticClass:"des-cont"},[this._v("每一枚纪念币·都是一件艺术品"),s("br"),this._v("\n          中国黄金品质·国家造币工艺")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"box-center"},[s("img",{attrs:{src:i("Mz8I")}})])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"box-list"},[s("div",{staticClass:"width-common"},[s("ul",[s("li",[s("img",{attrs:{src:i("2soZ")}}),this._v(" "),s("p",{staticClass:"title"},[this._v("产品标题")]),this._v(" "),s("p",{staticClass:"desc"},[this._v("产品描述")])])])])])}]};var r=i("Z0/y")(o,n,!1,function(t){i("5/75")},"data-v-222034c4",null);s.default=r.exports},Mz8I:function(t,s,i){t.exports=i.p+"static/img/c08.c1d3401.jpg"}});
//# sourceMappingURL=6.96dc48d64350bea210d1.js.map