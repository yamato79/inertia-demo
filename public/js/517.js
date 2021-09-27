"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[517],{4339:(e,t,r)=>{r.d(t,{Z:()=>f});var n=r(5166),o={class:"w-full min-h-full bg-gray-100 overflow-hidden"},l={class:"max-w-7xl mx-auto p-4 sm:p-6 lg:p-8"},c={class:"max-w-3xl mx-auto space-y-8"},a=(0,n.createElementVNode)("img",{class:"h-12",src:"/images/logo.svg"},null,-1),s=(0,n.createTextVNode)(" You may manage this data by visiting the admin area "),u=(0,n.createTextVNode)("here"),i=(0,n.createTextVNode)(". ");const d={},f=(0,r(3744).Z)(d,[["render",function(e,t){var r=(0,n.resolveComponent)("v-link"),d=(0,n.resolveComponent)("v-text"),f=(0,n.resolveComponent)("v-section-group");return(0,n.openBlock)(),(0,n.createElementBlock)("div",o,[(0,n.createElementVNode)("div",l,[(0,n.createElementVNode)("div",c,[a,(0,n.renderSlot)(e.$slots,"default"),(0,n.createVNode)(f,null,{default:(0,n.withCtx)((function(){return[(0,n.createVNode)(d,{color:"muted",class:"text-center"},{default:(0,n.withCtx)((function(){return[s,(0,n.createVNode)(r,{href:"/admin/resources"},{default:(0,n.withCtx)((function(){return[u]})),_:1}),i]})),_:1})]})),_:1})])])])}]])},9517:(e,t,r)=>{r.r(t),r.d(t,{default:()=>i});var n=r(5166),o=(0,n.createTextVNode)(" Resources "),l=(0,n.createTextVNode)(" View publicly available resources by clicking a resource type below. "),c={class:"min-w-0 w-full flex items-center"},a={class:"w-full flex flex-col"},s=(0,n.createElementVNode)("div",{class:"flex-shrink-0"},[(0,n.createElementVNode)("svg",{class:"h-5 w-5 text-gray-400",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[(0,n.createElementVNode)("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})])],-1);const u={layout:r(4339).Z,props:{resourceTypes:{type:Object,required:!1,default:function(){return null}}}};const i=(0,r(3744).Z)(u,[["render",function(e,t,r,u,i,d){var f=(0,n.resolveComponent)("v-section-heading"),m=(0,n.resolveComponent)("v-text"),p=(0,n.resolveComponent)("v-card-content"),v=(0,n.resolveComponent)("v-link"),x=(0,n.resolveComponent)("v-card"),h=(0,n.resolveComponent)("v-section");return(0,n.openBlock)(),(0,n.createBlock)(h,null,{default:(0,n.withCtx)((function(){return[(0,n.createVNode)(f,null,{title:(0,n.withCtx)((function(){return[o]})),description:(0,n.withCtx)((function(){return[l]})),_:1}),(0,n.createVNode)(x,null,{default:(0,n.withCtx)((function(){return[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(r.resourceTypes.data,(function(e,t){return(0,n.openBlock)(),(0,n.createBlock)(v,{key:"resourceType_"+t,href:"/resources/".concat(e.slug),class:"block hover:bg-gray-50"},{default:(0,n.withCtx)((function(){return[(0,n.createVNode)(p,{class:"flex items-center justify-between space-x-0 sm:space-x-md"},{default:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",c,[(0,n.createElementVNode)("div",a,[(0,n.createVNode)(m,{color:"primary",class:"font-medium truncate"},{default:(0,n.withCtx)((function(){return[(0,n.createTextVNode)((0,n.toDisplayString)(e.name),1)]})),_:2},1024),(0,n.createVNode)(m,{color:"muted",class:"truncate"},{default:(0,n.withCtx)((function(){return[(0,n.createTextVNode)((0,n.toDisplayString)(e.description),1)]})),_:2},1024)])]),s]})),_:2},1024)]})),_:2},1032,["href"])})),128))]})),_:1})]})),_:1})}]])}}]);