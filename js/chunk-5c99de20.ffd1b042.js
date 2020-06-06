(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5c99de20"],{"0ba6":function(e,r,t){"use strict";t.r(r);var a=function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("b-form",{staticStyle:{"font-weight":"bold"}},[t("b-row",[t("b-col",{attrs:{md:"3"}},[t("b-form-group",{attrs:{label:"Seminar Type"}})],1),t("b-col",{attrs:{md:"3"}},[t("b-form-radio",{attrs:{value:"seminar"},on:{change:e.isWebinar},model:{value:e.form.type,callback:function(r){e.$set(e.form,"type",r)},expression:"form.type"}},[e._v("Seminar\n           ")])],1),t("b-col",{attrs:{md:"3"}},[t("b-form-radio",{attrs:{value:"webinar"},on:{change:e.isWebinar},model:{value:e.form.type,callback:function(r){e.$set(e.form,"type",r)},expression:"form.type"}},[e._v("Webinar\n           ")])],1)],1),t("b-form-group",{attrs:{id:"input-group-1","label-cols-sm":"12","label-cols-lg":"3",label:"Seminar Title:","label-for":"input-horizontal","invalid-feedback":e.errors.first("title")}},[t("b-form-input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:5",expression:"'required|min:5'"}],attrs:{id:"input-1",state:!e.errors.first("title"),name:"title",placeholder:"Seminar Title","invalid-feedback":e.errors.first("title")},model:{value:e.form.title,callback:function(r){e.$set(e.form,"title",r)},expression:"form.title"}})],1),t("b-form-group",{attrs:{"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"Capacity:","label-for":"input-2","invalid-feedback":e.errors.first("capacity")}},[t("b-form-input",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{state:!e.errors.first("capacity"),type:"number",name:"capacity",min:"1",id:"input-2",placeholder:"Enter Capacity"},model:{value:e.form.capacity,callback:function(r){e.$set(e.form,"capacity",r)},expression:"form.capacity"}})],1),t("b-row",[t("b-col",{attrs:{md:"6"}},[t("b-form-group",{attrs:{"label-cols-sm":"12","label-cols-lg":"6","label-cols-md":"6",id:"input-group-2",label:"Seminar Date:","label-for":"input-2","invalid-feedback":e.errors.first("seminar_date")}},[t("date-picker",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],class:[e.error.seminar_date?"error":""],attrs:{id:"input-2",name:"seminar_date",state:!e.errors.first("seminar_date"),placeholder:"Seminar Date",config:e.options},model:{value:e.form.seminar_date,callback:function(r){e.$set(e.form,"seminar_date",r)},expression:"form.seminar_date"}}),e.error.seminar_date?t("div",{staticClass:"divError",attrs:{role:"alert","aria-live":"assertive","aria-atomic":"true"}},[e._v(e._s(e.error.seminar_date[0]))]):e._e()],1)],1),t("b-col",{attrs:{md:"3"}},[t("b-form-group",{attrs:{"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"Start Time:","label-for":"input-2","invalid-feedback":e.errors.first("start_time")}},[t("b-form-input",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],ref:"starttime",attrs:{type:"time",id:"input-2",name:"start_time",state:!e.errors.first("start_time"),placeholder:"Enter Start Time"},model:{value:e.form.start_time,callback:function(r){e.$set(e.form,"start_time",r)},expression:"form.start_time"}})],1)],1),t("b-col",{attrs:{md:"3"}},[t("b-form-group",{attrs:{"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"End Time:","label-for":"input-2","invalid-feedback":e.errors.first("end_time")}},[t("b-form-input",{directives:[{name:"validate",rawName:"v-validate",value:"required|isBigger:starttime",expression:"'required|isBigger:starttime'"}],attrs:{type:"time",id:"input-2",state:!e.errors.first("end_time"),name:"end_time",placeholder:"Enter Capacity"},model:{value:e.form.end_time,callback:function(r){e.$set(e.form,"end_time",r)},expression:"form.end_time"}})],1)],1)],1),e.isWebinarType?t("b-row",[t("b-col",{attrs:{md:"3"}},[t("b-form-group",{attrs:{"label-cols-sm":"6","label-cols-lg":"6","label-cols-md":"6",id:"input-group-2",label:"Webinar Details:","label-for":"input-2"}})],1),t("b-col",{attrs:{md:"9"}},[t("vue-editor",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{state:!e.errors.first("webinarDetails"),name:"webinarDetails",id:"textarea",placeholder:"Enter Webinar Details...","editor-toolbar":e.customToolbar},model:{value:e.form.webinarDetails,callback:function(r){e.$set(e.form,"webinarDetails",r)},expression:"form.webinarDetails"}}),t("br")],1),t("b-col",{attrs:{md:"12"}},[t("b-form-group",{attrs:{"label-cols-sm":"3","label-cols-lg":"3","label-cols-md":"3",id:"input-group-8",label:"Call to action (Zoom Link):","label-for":"input-2","invalid-feedback":e.errors.first("url")}},[t("b-form-input",{directives:[{name:"validate",rawName:"v-validate",value:"required|isUrl",expression:"'required|isUrl'"}],attrs:{state:!e.errors.first("url"),id:"input-url",name:"url",placeholder:"Call To Action (Zoom Link)"},model:{value:e.form.url,callback:function(r){e.$set(e.form,"url",r)},expression:"form.url"}})],1)],1)],1):e._e(),e.isWebinarType?e._e():t("b-row",[t("b-col",{attrs:{md:"6"}},[t("b-form-group",{attrs:{"label-cols-sm":"6","label-cols-lg":"6","label-cols-md":"6",id:"input-group-2",label:"Venue address:","label-for":"input-2","invalid-feedback":e.errors.first("venue_address")}},[t("b-form-textarea",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{id:"textarea",state:!e.errors.first("venue_address"),placeholder:"Enter Venue Address",rows:"8",name:"venue_address","max-rows":"6"},model:{value:e.form.venue_address,callback:function(r){e.$set(e.form,"venue_address",r)},expression:"form.venue_address"}})],1)],1),t("b-col",{attrs:{md:"6"}},[t("GmapMap",{ref:"mapRef",staticStyle:{width:"500px",height:"200px"},attrs:{center:e.currentCroods,zoom:7,"map-type-id":"terrain",options:{zoomControl:!0,mapTypeControl:!1,scaleControl:!1,streetViewControl:!1,rotateControl:!1,fullscreenControl:!0,disableDefaultUi:!1}}},[e.currentCroods?t("gmap-marker",{attrs:{position:e.currentCroods,clickable:!0,draggable:!0},on:{dragend:e.setLocation,click:e.setLocation}}):e._e(),e.currentCroods?t("gmap-info-window",{attrs:{position:e.currentCroods}}):e._e()],1),e.enablelocation?t("span",{staticStyle:{color:"red","margin-top":"10px","font-size":"12px"}},[e._v("Location access disabled.Please allow location access to load Google Map")]):e._e()],1)],1),t("b-form-group",{attrs:{"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"Description:","label-for":"input-2","invalid-feedback":e.errors.first("description")}},[t("vue-editor",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{state:!e.errors.first("description"),name:"description",id:"textarea",placeholder:"Enter description...","editor-toolbar":e.customToolbar},model:{value:e.form.description,callback:function(r){e.$set(e.form,"description",r)},expression:"form.description"}})],1),t("b-form-group",{attrs:{"invalid-feedback":e.errors.first("cost_per_seat"),"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"Cost Per Seat:","label-for":"input-2"}},[t("b-form-input",{directives:[{name:"validate",rawName:"v-validate",value:"required|decimal",expression:"'required|decimal'"}],attrs:{type:"number",min:"1",id:"input-2",name:"cost_per_seat",state:!e.errors.first("cost_per_seat"),placeholder:"Cost Per Seat"},model:{value:e.form.cost_per_seat,callback:function(r){e.$set(e.form,"cost_per_seat",r)},expression:"form.cost_per_seat"}})],1),t("b-form-group",{attrs:{"invalid-feedback":e.errors.first("reminder_numbers"),"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"No. of Reminders:","label-for":"input-2"}},[t("b-form-select",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{state:!e.errors.first("reminder_numbers"),name:"reminder_numbers",placeholder:"No. of Reminders",options:[1,2,3,4]},on:{change:e.reSetschedules},model:{value:e.form.reminder_numbers,callback:function(r){e.$set(e.form,"reminder_numbers",r)},expression:"form.reminder_numbers"}})],1),t("b-form-group",{attrs:{"label-cols-sm":"12","label-cols-lg":"3",id:"input-group-2",label:"Reminder schedule:","label-for":"input-2"}},e._l(e.form.reminder_numbers||0,(function(r){return t("b-form-select",{key:r,staticClass:"mt-3",attrs:{placeholder:"Reminder schedule",size:"sm",options:[{value:1,text:"1 Month Before"},{value:2,text:"1 Week Before"},{value:3,text:"2 Days Before"},{value:4,text:"24 Hours Before"},{value:5,text:"1 Hour Before"}]},model:{value:e.form.schedules[r],callback:function(t){e.$set(e.form.schedules,r,t)},expression:"form.schedules[index]"}})})),1),t("div",{staticClass:"footer_form"},[t("b-button",{attrs:{variant:"success"},on:{click:e.onSubmit}},[e._v("Create Seminar")])],1),e.isProcess?t("Loadder"):e._e()],1)},i=[],o=t("43ca"),s=o["a"],n=(t("5346"),t("2877")),l=Object(n["a"])(s,a,i,!1,null,null,null);r["default"]=l.exports},"1af6":function(e,r,t){var a=t("63b6");a(a.S,"Array",{isArray:t("9003")})},"40c3":function(e,r,t){var a=t("6b4c"),i=t("5168")("toStringTag"),o="Arguments"==a(function(){return arguments}()),s=function(e,r){try{return e[r]}catch(t){}};e.exports=function(e){var r,t,n;return void 0===e?"Undefined":null===e?"Null":"string"==typeof(t=s(r=Object(e),i))?t:o?a(r):"Object"==(n=a(r))&&"function"==typeof r.callee?"Arguments":n}},"43ca":function(e,r,t){"use strict";(function(e){t("8e6e"),t("ac6a"),t("456d");var a=t("bd86"),i=(t("3b2b"),t("768b")),o=(t("ba6a"),t("f9e3"),t("133f")),s=t.n(o),n=(t("ca56"),t("755e")),l=t("84cf"),c=t("7bb1"),u=t("5873");function d(e,r){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);r&&(a=a.filter((function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable}))),t.push.apply(t,a)}return t}function m(e){for(var r=1;r<arguments.length;r++){var t=null!=arguments[r]?arguments[r]:{};r%2?d(Object(t),!0).forEach((function(r){Object(a["a"])(e,r,t[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):d(Object(t)).forEach((function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(t,r))}))}return e}c["a"].extend("isBigger",(function(e,r){var t=Object(i["a"])(r,1),a=t[0];return e>=a}),{hasTarget:!0}),c["a"].extend("isUrl",(function(e){var r=new RegExp("^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$","i");return!!r.test(e)}),{hasTarget:!0});var f={custom:{title:{required:"Title is required"},capacity:{required:"Capacity is required"},description:{required:"Description is required"},venue_address:{required:"Venue address is required"},start_time:{required:"Start Time is required"},end_time:{required:"End Time is required",isBigger:"End time should be greater than start time"},cost_per_seat:{required:"Cost per seat is required"},reminder_numbers:{required:"No. of reminders is required"},url:{required:"URL is required",isUrl:"Enter a valid url including https://"}}};c["a"].localize("en",f),r["a"]={data:function(){return{isWebinarType:!1,enablelocation:!1,customToolbar:[["bold","italic","underline"],[{list:"ordered"},{list:"bullet"}]],isProcess:!1,currentCroods:{},date:new Date,options:{format:"MM/DD/YYYY",useCurrent:!1,minDate:new Date},error:{},form:{start_time:"".concat(e().format("hh:mm")),end_time:"".concat(e().format("hh:mm")),title:null,capacity:50,seminar_date:new Date,description:null,schedules:[],type:"seminar"}}},components:{Loadder:l["a"],datePicker:s.a,VueEditor:u["a"]},mounted:function(){var e=this;navigator.geolocation?navigator.geolocation.getCurrentPosition((function(r){e.currentCroods=m({},r.coords,{lat:parseFloat(r.coords.latitude),lng:parseFloat(r.coords.longitude)}),e.$refs.mapRef.$mapPromise.then((function(e){e.panTo({lat:parseFloat(r.coords.latitude),lng:parseFloat(r.coords.longitude)})})),e.enablelocation=!1}),(function(r){alert(r.message),e.enablelocation=!0}),{enableHighAccuracy:!0,timeout:5e3}):alert("Geolocation is not supported by this browser.")},computed:{google:n["gmapApi"]},methods:{isWebinar:function(e){this.isWebinarType="webinar"==e},setLocation:function(e){new this.google.maps.Geocoder;var r={lat:e.latLng.lat(),lng:parseFloat(e.latLng.lng())};this.currentCroods=r},onSubmit:function(e){var r=this,t=this;this.$validator.validate().then((function(a){if(a&&!t.enablelocation){if(r.form.reminder_numbers&&r.form.reminder_numbers!=r.form.schedules.length-1)return r.$swal({allowOutsideClick:!1,title:"please select all reminders schedules",type:"warning",showCloseButton:!1,showCancelButton:!1,focusConfirm:!1,confirmButtonText:"OK"});e.preventDefault(),r.isProcess=!0,r.form.lat=r.currentCroods.lat,r.form.lng=r.currentCroods.lng,r.$http.post("seminar",r.form).then((function(e){var a=r.form.title;r.isProcess=!1,r.$swal({allowOutsideClick:!1,title:'You have successfully created seminar </span>"'.concat(a,'".'),type:"success",showCloseButton:!1,showCancelButton:!1,focusConfirm:!1,confirmButtonText:"OK"}).then((function(e){r.form={title:"",capacity:45,seminar_date:new Date,description:null,schedules:[]},t.$router.push({name:"seminarscheduled"})}))})).catch((function(e){r.isProcess=!1,r.error=e.errors,console.log(e)}))}else r.$swal({allowOutsideClick:!1,text:"Please fill all required detail",type:"warning"})}))},reSetschedules:function(){this.form.schedules=[]}}}}).call(this,t("c1df"))},"469f":function(e,r,t){t("6c1c"),t("1654"),e.exports=t("7d7b")},5346:function(e,r,t){"use strict";var a=t("795c"),i=t.n(a);i.a},"54a1":function(e,r,t){t("6c1c"),t("1654"),e.exports=t("95d5")},"5d73":function(e,r,t){e.exports=t("469f")},"768b":function(e,r,t){"use strict";var a=t("a745"),i=t.n(a);function o(e){if(i()(e))return e}var s=t("5d73"),n=t.n(s),l=t("c8bb"),c=t.n(l);function u(e,r){if(c()(Object(e))||"[object Arguments]"===Object.prototype.toString.call(e)){var t=[],a=!0,i=!1,o=void 0;try{for(var s,l=n()(e);!(a=(s=l.next()).done);a=!0)if(t.push(s.value),r&&t.length===r)break}catch(u){i=!0,o=u}finally{try{a||null==l["return"]||l["return"]()}finally{if(i)throw o}}return t}}function d(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}function m(e,r){return o(e)||u(e,r)||d()}t.d(r,"a",(function(){return m}))},"795c":function(e,r,t){},"7cd6":function(e,r,t){var a=t("40c3"),i=t("5168")("iterator"),o=t("481b");e.exports=t("584a").getIteratorMethod=function(e){if(void 0!=e)return e[i]||e["@@iterator"]||o[a(e)]}},"7d7b":function(e,r,t){var a=t("e4ae"),i=t("7cd6");e.exports=t("584a").getIterator=function(e){var r=i(e);if("function"!=typeof r)throw TypeError(e+" is not iterable!");return a(r.call(e))}},"95d5":function(e,r,t){var a=t("40c3"),i=t("5168")("iterator"),o=t("481b");e.exports=t("584a").isIterable=function(e){var r=Object(e);return void 0!==r[i]||"@@iterator"in r||o.hasOwnProperty(a(r))}},a745:function(e,r,t){e.exports=t("f410")},c8bb:function(e,r,t){e.exports=t("54a1")},f410:function(e,r,t){t("1af6"),e.exports=t("584a").Array.isArray}}]);
//# sourceMappingURL=chunk-5c99de20.ffd1b042.js.map