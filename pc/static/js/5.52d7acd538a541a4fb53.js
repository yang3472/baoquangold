webpackJsonp([5],{B5BC:function(t,s,i){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var a=i("fFmM"),e=i("PI0u"),c=i("wf1y"),l=i("Q96i"),r=i("9vrH"),o={data:function(){return{add_class_status:!1,pics:[],URL_BASE:e.a,href_url01:"",href_url02:"",href_url03:"",img_url01:"",img_url02:"",img_url03:""}},watch:{add_class_status:function(t,s){}},created:function(){this.getPicsList()},mounted:function(){var t=this;window.addEventListener("scroll",function(){if(window.location.href.indexOf("exclusive")>-1){var s=document.getElementById("two_price").offsetHeight,i=document.documentElement.scrollTop||document.body.scrollTop;t.add_class_status=i>s}}),document.documentElement.scrollTop=document.body.scrollTop=0},methods:{getPicsList:function(){var t=this;Object(c.a)(e.a+"/index.php/api/adver/getlist",{position:"pc.handtailor.leaveword.above"}).then(function(s){0==s.return_code?(t.pics=s.data,t.href_url01=t.pics[0].href_url,t.href_url02=t.pics[1].href_url,t.href_url03=t.pics[2].href_url,t.img_url01=t.pics[0].img_url,t.img_url02=t.pics[1].img_url,t.img_url03=t.pics[2].img_url):Object(a.a)(s.return_message)})}},components:{Message:l.a,CaseMore:r.a}},n={render:function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{staticClass:"exclusive"},[t._m(0),t._v(" "),t._m(1),t._v(" "),i("div",{staticClass:"two-price clearfix",attrs:{id:"two_price"}},[i("div",{staticClass:"left-img",class:{"none-animate":t.add_class_status}},[i("a",{attrs:{href:t.href_url01}},[i("img",{attrs:{src:t.URL_BASE+t.img_url01}})])]),t._v(" "),i("div",{staticClass:"right-img",class:{"none-animate":t.add_class_status}},[i("a",{attrs:{href:t.href_url02}},[i("img",{attrs:{src:t.URL_BASE+t.img_url02}})])])]),t._v(" "),i("div",{staticClass:"box-999"},[i("a",{attrs:{href:t.href_url03}},[i("img",{attrs:{src:t.URL_BASE+t.img_url03}})])]),t._v(" "),i("Message"),t._v(" "),i("CaseMore",{attrs:{titleShow:!0}})],1)},staticRenderFns:[function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"banner"},[s("img",{attrs:{src:i("DoOT")}})])},function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("div",{staticClass:"box-exclusive"},[a("div",{staticClass:"width-common"},[a("div",{staticClass:"title-box-common"},[a("div",{staticClass:"title-common"},[t._v("造币工艺 专属定制")]),t._v(" "),a("div",{staticClass:"title-desc",staticStyle:{"font-size":"30px"}},[t._v("以金银文化诠释意义  每一枚纪念币都是一个故事")])]),t._v(" "),a("div",{staticClass:"box-container"},[a("div",{staticClass:"box-left"},[a("img",{attrs:{src:i("CXm0")}})]),t._v(" "),a("div",{staticClass:"box-sort"},[a("ul",[a("li",{staticClass:"sort01"},[a("p",{staticClass:"title"},[t._v("周年纪念")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Anniversaries")])]),t._v(" "),a("li",{staticClass:"sort02"},[a("p",{staticClass:"title"},[t._v("项目纪念")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Project commemoration")])]),t._v(" "),a("li",{staticClass:"sort03"},[a("p",{staticClass:"title"},[t._v("员工奖励")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Employee reward")])]),t._v(" "),a("li",{staticClass:"sort04"},[a("p",{staticClass:"title"},[t._v("竣工庆典")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Completion ceremony")])]),t._v(" "),a("li",{staticClass:"sort05"},[a("p",{staticClass:"title"},[t._v("答谢客户")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("acknowledging")])]),t._v(" "),a("li",{staticClass:"sort06"},[a("p",{staticClass:"title"},[t._v("企业上市")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Enterprise listing")])]),t._v(" "),a("li",{staticClass:"sort07"},[a("p",{staticClass:"title"},[t._v("开业庆典")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("The opening ceremony")])]),t._v(" "),a("li",{staticClass:"sort08"},[a("p",{staticClass:"title"},[t._v("企业年会")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Annual meeting of enterprises")])]),t._v(" "),a("li",{staticClass:"sort09"},[a("p",{staticClass:"title"},[t._v("结婚周岁")]),t._v(" "),a("p",{staticClass:"desc"},[t._v("Marriage")])])])])])])])}]};var _=i("vSla")(o,n,!1,function(t){i("J/I7")},"data-v-10f168ea",null);s.default=_.exports},CXm0:function(t,s,i){t.exports=i.p+"static/img/ico-pic.7dac608.jpg"},DoOT:function(t,s,i){t.exports=i.p+"static/img/zs-banner.8c7d384.jpg"},"J/I7":function(t,s){}});