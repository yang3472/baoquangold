webpackJsonp([6],{Ao3q:function(t,i){},MHGk:function(t,i,e){"use strict";Object.defineProperty(i,"__esModule",{value:!0});var s=e("fFmM"),a=e("PI0u"),l=e("wf1y"),r={data:function(){return{id:1,detail:{},URL_BASE:"",picList:[]}},created:function(){this.URL_BASE=a.a,this.$route.query.id&&(this.id=this.$route.query.id),this.getDetail()},methods:{getDetail:function(){var t=this;Object(l.a)(a.a+"/index.php/api/product/getDetail",{id:this.id,device:"mobile"}).then(function(i){0===i.return_code?(t.detail=i.data,t.picList=i.data.marque):Object(s.a)(i.return_message)})}},updated:function(){var t=new Swiper(".gallery-top",{spaceBetween:10,loop:!0,loopedSlides:4}),i=new Swiper(".gallery-thumbs",{spaceBetween:5,slidesPerView:4,touchRatio:.2,loop:!0,loopedSlides:4,slideToClickedSlide:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}});t.controller.control=i,i.controller.control=t},mounted:function(){document.documentElement.scrollTop=document.body.scrollTop=0}},c={render:function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticClass:"detail"},[e("div",{staticClass:"box-top"},[e("div",{staticClass:"box-desc"},[e("h2",[t._v(t._s(t.detail.product_name))]),t._v(" "),e("div",{staticClass:"pro-list"},[e("ul",[e("li",[t._v("材质："+t._s(t.detail.material))]),t._v(" "),e("li",[t._v("克重："+t._s(t.detail.weight))]),t._v(" "),e("li",[t._v("规格："+t._s(t.detail.spec))])])])]),t._v(" "),e("div",{staticClass:"box-pic"},[e("div",{staticClass:"swiper-container gallery-top",staticStyle:{"margin-bottom":"10px"}},[e("div",{staticClass:"swiper-wrapper"},t._l(t.picList,function(i){return e("div",{staticClass:"swiper-slide"},[e("div",{staticClass:"detail-pic-large"},[e("img",{attrs:{src:t.URL_BASE+"/"+i}})])])}))]),t._v(" "),e("div",{staticStyle:{width:"320px",position:"relative"}},[e("div",{staticClass:"swiper-container gallery-thumbs",staticStyle:{width:"277px",margin:"0 auto"}},[e("div",{staticClass:"swiper-wrapper"},t._l(t.picList,function(i){return e("div",{staticClass:"swiper-slide"},[e("div",{staticClass:"detail-pic-s"},[e("img",{attrs:{src:t.URL_BASE+"/"+i}})])])}))]),t._v(" "),e("div",{staticClass:"swiper-button-next"}),t._v(" "),e("div",{staticClass:"swiper-button-prev "})])])]),t._v(" "),e("div",{staticClass:"clearfix"}),t._v(" "),t._m(0),t._v(" "),e("div",{staticClass:"detail-container-wrap"},[e("div",{staticClass:"detail-container",domProps:{innerHTML:t._s(t.detail.detail)}})]),t._v(" "),t._m(1),t._v(" "),t._m(2),t._v(" "),e("div",{staticClass:"clearfix"})])},staticRenderFns:[function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"box-line"},[i("img",{attrs:{src:e("dKzf")}})])},function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"pro-look"},[i("h2",[this._v("国家权威检测")]),this._v(" "),i("h3",[this._v("国家金银制品质量监督检验中心出具检测报告，足金足银保证。")])])},function(){var t=this.$createElement,i=this._self._c||t;return i("div",{staticClass:"pro-pics"},[i("img",{attrs:{src:e("ylTs")}})])}]};var n=e("vSla")(r,c,!1,function(t){e("Ao3q")},"data-v-65e76aa5",null);i.default=n.exports},ylTs:function(t,i,e){t.exports=e.p+"static/img/d4.f2cc4ee.jpg"}});