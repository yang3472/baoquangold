webpackJsonp([5],{"05aj":function(t,e){},CIrT:function(t,e){},MHGk:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("fFmM"),s=a("PI0u"),o=a("wf1y"),r=a("Q96i"),c=a("9vrH"),n={data:function(){return{id:1,detail:{},URL_BASE:"",picList:[]}},created:function(){this.URL_BASE=s.a,this.$route.query.id&&(this.id=this.$route.query.id),this.getDetail()},methods:{getDetail:function(){var t=this;Object(o.a)(s.a+"/index.php/api/product/getDetail",{id:this.id,device:"mobile"}).then(function(e){0===e.return_code?(t.detail=e.data,t.picList=e.data.marque):Object(i.a)(e.return_message)})}},updated:function(){var t=new Swiper(".gallery-top",{spaceBetween:10,loop:!0,loopedSlides:4}),e=new Swiper(".gallery-thumbs",{spaceBetween:5,slidesPerView:4,touchRatio:.2,loop:!0,loopedSlides:4,slideToClickedSlide:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}});t.controller.control=e,e.controller.control=t},mounted:function(){document.documentElement.scrollTop=document.body.scrollTop=0},components:{Message:r.a,CaseMore:c.a}},l={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"detail"},[a("div",{staticClass:"box-top"},[a("div",{staticClass:"box-desc"},[a("h2",[t._v(t._s(t.detail.product_name))]),t._v(" "),a("div",{staticClass:"pro-list"},[a("ul",[a("li",[t._v("材质："+t._s(t.detail.material))]),t._v(" "),a("li",[t._v("克重："+t._s(t.detail.weight))]),t._v(" "),a("li",[t._v("规格："+t._s(t.detail.spec))])])])]),t._v(" "),a("div",{staticClass:"box-pic"},[a("div",{staticClass:"swiper-container gallery-top",staticStyle:{"margin-bottom":"10px"}},[a("div",{staticClass:"swiper-wrapper"},t._l(t.picList,function(e){return a("div",{staticClass:"swiper-slide"},[a("div",{staticClass:"detail-pic-large"},[a("img",{attrs:{src:t.URL_BASE+"/"+e}})])])}))]),t._v(" "),a("div",{staticStyle:{width:"320px",position:"relative"}},[a("div",{staticClass:"swiper-container gallery-thumbs",staticStyle:{width:"277px",margin:"0 auto"}},[a("div",{staticClass:"swiper-wrapper"},t._l(t.picList,function(e){return a("div",{staticClass:"swiper-slide"},[a("div",{staticClass:"detail-pic-s"},[a("img",{attrs:{src:t.URL_BASE+"/"+e}})])])}))]),t._v(" "),a("div",{staticClass:"swiper-button-next"}),t._v(" "),a("div",{staticClass:"swiper-button-prev "})])])]),t._v(" "),a("div",{staticClass:"clearfix"}),t._v(" "),t._m(0),t._v(" "),a("div",{staticClass:"detail-container-wrap"},[a("div",{staticClass:"detail-container",domProps:{innerHTML:t._s(t.detail.detail)}})]),t._v(" "),t._m(1),t._v(" "),t._m(2),t._v(" "),a("div",{staticClass:"clearfix"})])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"box-line"},[e("img",{attrs:{src:a("dKzf")}})])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"pro-look"},[e("h2",[this._v("国家权威检测")]),this._v(" "),e("h3",[this._v("国家金银制品质量监督检验中心出具检测报告，足金足银保证。")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"pro-pics"},[e("img",{attrs:{src:a("ylTs")}})])}]};var m=a("vSla")(n,l,!1,function(t){a("CIrT")},"data-v-67e079ca",null);e.default=m.exports},Q96i:function(t,e,a){"use strict";var i=a("fFmM"),s=a("PI0u"),o=a("wf1y"),r={data:function(){return{URL_BASE:"",formData:{userName:"",mobile:"",companyName:"",content:""}}},created:function(){this.URL_BASE=s.a},methods:{_submit:function(){Object(o.a)(s.a+"/index.php/api/leaveword/addLeaveword",{name:this.formData.userName,tel:this.formData.mobile,company:this.formData.companyName,content:this.formData.content}).then(function(t){0===t.return_code?Object(i.a)("信息提交成功！"):Object(i.a)(t.return_message)})},submit:function(){return""===this.formData.userName?(Object(i.a)("请输入姓名！"),!1):""===this.formData.mobile?(Object(i.a)("请输入联系电话！"),!1):""===this.formData.companyName?(Object(i.a)("请输人公司名称！"),!1):""===this.formData.content?(Object(i.a)("请输人设计需求！"),!1):void this._submit()},reset:function(){this.formData.userName="",this.formData.mobile="",this.formData.companyName="",this.formData.content=""}}},c={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"message"},[a("div",{staticClass:"width-common"},[t._m(0),t._v(" "),a("h2",[t._v("为了更好的为您服务，请您回答以下问题：")]),t._v(" "),a("div",{staticClass:"form"},[a("div",{staticClass:"box"},[a("label",[t._v("*姓名 ")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.userName,expression:"formData.userName"}],attrs:{type:"text"},domProps:{value:t.formData.userName},on:{input:function(e){e.target.composing||t.$set(t.formData,"userName",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"box"},[a("label",[t._v("*联系电话 ")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.mobile,expression:"formData.mobile"}],attrs:{type:"text",maxlength:"11"},domProps:{value:t.formData.mobile},on:{input:function(e){e.target.composing||t.$set(t.formData,"mobile",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"clearfix"}),t._v(" "),a("label",[t._v("*公司名称 ")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.formData.companyName,expression:"formData.companyName"}],attrs:{type:"text"},domProps:{value:t.formData.companyName},on:{input:function(e){e.target.composing||t.$set(t.formData,"companyName",e.target.value)}}}),t._v(" "),a("label",[t._v("*设计需求 ")]),t._v(" "),a("textarea",{directives:[{name:"model",rawName:"v-model",value:t.formData.content,expression:"formData.content"}],domProps:{value:t.formData.content},on:{input:function(e){e.target.composing||t.$set(t.formData,"content",e.target.value)}}}),t._v(" "),a("div",{staticClass:"box-button"},[a("button",{staticClass:"reset",on:{click:t.reset}},[t._v("重置")]),t._v(" "),a("button",{staticClass:"submit",on:{click:t.submit}},[t._v("提交")])])])])])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"box-line"},[e("img",{attrs:{src:a("v9ro")}})])}]};var n=a("vSla")(r,c,!1,function(t){a("05aj")},"data-v-25f829e8",null);e.a=n.exports},v9ro:function(t,e){t.exports="data:image/gif;base64,R0lGODlhsAQIAMQAABkZGdXV1ff39/Pz8xwcHJ6envb29oyMjMLCwgAAALi4uD09PfX19dbW1nFxce3t7fr6+v///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDAgNzkuMTYwNDUxLCAyMDE3LzA1LzA2LTAxOjA4OjIxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjRmMTlmMTZhLTc1MjYtNDg0ZC1hZGI3LTJmNDg5MWY4NzQ5ZiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3NTJDRTNBOTUxQ0ExMUU4OTQwM0FENjQzMDkxOEVEQyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3NTJDRTNBODUxQ0ExMUU4OTQwM0FENjQzMDkxOEVEQyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNSAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmM1NTZkYTc4LWZjZGYtNDZiOC1iYTM1LTQ2ZDlmNWE5NTNiMyIgc3RSZWY6ZG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOmY3YjBmMGZlLTg2N2UtMTE3Yi1iNjgwLThjODBkYjQzM2EwNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAACwBAgAAAX/YCSOZGmeaKqubOu+cCzPdG3feK7vfO//wKBwSCwaj8ikcslsOp/QqHRKrVqv2KxWBBkwvuCweEwum8/otHrNbrvLA8h2Tq/b7/i8DfLg+/uAf4KBhIOGhYiHiomMi46NkI+SkZSTlpWYl5qZnJuenaCfoqGko58CBicFBAutrq+wsbKztLW2t7i5uru8swQFJwYCpcSmxcfGycjLys3Mz87R0NPS1X0jDQ7Z29rd3N/e4eDj4uXk590B5uvo7ezv7vHw8/L19Pf2+fj79urg/vwC6hsocB5AggjTvUOg4MSBBAAiSpxIsaLFixgzatzIsaPHjyAvJjhwQgGCgglTg6J0cPBdS5UwV8ZU+VKmzZk3c+LcqbPnzBHWglIbKrQo0aNGkyJdqrQpJVSqWPWaSrWq1atYcf0KNsypV6Zgv4oNS3as2bJoHelZy7at27dwdXR5Q7eu3bt4866JE7ev37+AAwseTLiw4cOIEytezLix48eQI0ueTLmy5cuYM2verCUEADs="},ylTs:function(t,e,a){t.exports=a.p+"static/img/d4.f2cc4ee.jpg"}});