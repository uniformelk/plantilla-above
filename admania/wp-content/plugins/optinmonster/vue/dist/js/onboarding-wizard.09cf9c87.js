(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["onboarding-wizard"],{"66d5":function(e,t,n){e.exports=n.p+"img/logo-om.8293cc14.png"},"7bdf":function(e,t,n){},d8e0:function(e,t,n){"use strict";n.r(t);var r=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("core-page",{attrs:{title:"OptinMonster Onboarding Wizard"}},[r("div",{staticClass:"omapi-onboarding"},[r("div",{staticClass:"omapi-panel"},[r("header",{staticClass:"omapi-panel-header"},[r("img",{attrs:{src:n("66d5"),alt:"OptinMonster Logo"}})]),e.wizardLoading?r("wizard-screen",{attrs:{completed:!1,panelClass:"omapi-panel__welcome",contentClass:"omapi-text-center",navPrev:!1,navNext:!1}},[r("h2",[e._v("Welcome to the OptinMonster Setup Wizard!")]),r("core-loading")],1):[0===e.step?r("wizard-welcome"):1===e.step?r("wizard-screen1"):2===e.step?r("wizard-screen2"):3===e.step?r("wizard-screen3"):4===e.step?r("wizard-screen4"):5===e.step?r("wizard-screen4-2"):r("wizard-screen5")]],2)])])},i=[],o=(n("8e6e"),n("ac6a"),n("456d"),n("6762"),n("2fdb"),n("bd86")),a=n("2f62");function s(e,t){var n=Object.keys(e);return Object.getOwnPropertySymbols&&n.push.apply(n,Object.getOwnPropertySymbols(e)),t&&(n=n.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable})),n}function c(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?s(n,!0).forEach(function(t){Object(o["a"])(e,t,n[t])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):s(n).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))})}return e}var d={name:"onboarding-wizard",mounted:function(){window.addEventListener("keydown",this.maybeNav),this.$bus.$on("onboardingNextPage",this.nextScreen),this.$bus.$on("onboardingPrevPage",this.prevScreen)},beforeDestroy:function(){window.removeEventListener("keydown",this.maybeNav),this.$bus.$off("onboardingNextPage",this.nextScreen),this.$bus.$off("onboardingPrevPage",this.prevScreen)},watch:{step:function(){this.$store.dispatch("wizard/maybeGoBack")}},computed:c({},Object(a["f"])("wizard",["step"]),{},Object(a["f"])(["apiKey"]),{wizardLoading:function(){return this.apiKey&&this.$store.getters.isLoading("me")&&4>this.step}}),methods:{maybeNav:function(e){e.metaKey||["INPUT","TEXTAREA","SELECT"].includes(document.activeElement.nodeName)||("ArrowRight"===e.code&&this.$bus.$emit("onboardingNextPage"),"ArrowLeft"===e.code&&this.$bus.$emit("onboardingPrevPage"))},nextScreen:function(){var e=this.step+1,t={canProceed:7>e,current:this.step,next:e};this.$bus.$emit("onboardingCanNextPage",t),t.canProceed&&this.$store.commit("wizard/setStep",e)},prevScreen:function(){var e=this.step-1,t={canProceed:0<=e,current:this.step,prev:e};this.$bus.$emit("onboardingCanPrevPage",t),t.canProceed&&this.$store.commit("wizard/setStep",e)}}},p=d,b=(n("eb68"),n("2877")),u=Object(b["a"])(p,r,i,!1,null,null,null);t["default"]=u.exports},eb68:function(e,t,n){"use strict";var r=n("7bdf"),i=n.n(r);i.a}}]);
//# sourceMappingURL=onboarding-wizard.09cf9c87.js.map