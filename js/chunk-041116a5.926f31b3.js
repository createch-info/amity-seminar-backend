(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-041116a5"],{"052d":function(e,t,r){"use strict";var a=r("69d3"),n=r.n(a);n.a},"69d3":function(e,t,r){},7138:function(e,t,r){"use strict";r.r(t);var a=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("b-container",[e.isProcess?r("b-row",[r("b-col")],1):e._e(),e.isProcess?e._e():r("b-row",[r("b-col",{staticClass:"calender-root",attrs:{md:"8",sm:"12",lg:"8"}},[r("b-row",[r("b-col",[r("b-button",{attrs:{href:"https://amityhealthcaregroup.com/education/index.html",variant:"primary"}},[e._v("Back To Calendar")])],1)],1),r("b-row",[r("b-col",{staticClass:"label01"},[e._v("\n            Event Type: "),r("label",{domProps:{textContent:e._s(""+(e.currentSeminar.type||""))}})])],1),r("b-row",[r("b-col",{staticClass:"label01"},[r("label",{domProps:{textContent:e._s(""+(e.currentSeminar.title||""))}})])],1),r("b-row",[r("b-col",{staticClass:"label02"},[r("label",{domProps:{textContent:e._s(" "+e.formatedSeminarDate+" "+(e.currentSeminar.seminar_date?e.currentSeminar.seminar_date.split(" - ").pop():"")+" - "+(e.currentSeminar.end_time||""))}})])],1),e.currentSeminar.isFull&&!e.currentSeminar.isPast?r("b-row",[r("span",{staticClass:"full_text col"},[e._v("\n            Event is currently full.\n            "),r("br"),e._v("Please register for the next upcoming Event\n            "),r("br"),e._v("or email the administrator at eg@amityhealthcaregroup.com or call at 303-690-2749 to be waitlisted for the event\n          ")])]):e._e(),r("b-row",{staticStyle:{"margin-bottom":"-20px"}},[r("b-col",[r("b",[r("b-form-group",{attrs:{"label-cols-sm":"6","label-cols-lg":"6","label-cols-md":"6",label:"Description:"}})],1)])],1),r("b-row",{staticClass:"mt-2"},[r("b-col",[r("read-more",{attrs:{"more-str":"read more",text:e.currentSeminar.formated_description,link:"#","less-str":"read less","max-chars":25e4}})],1)],1),e.isSeminar?r("b-row",{staticClass:"mt-2"},[r("b-col",[r("b-row",[r("b-col",[r("b",[r("b-form-group",{staticClass:"venue-address",attrs:{"label-cols-sm":"6","label-cols-lg":"6","label-cols-md":"6",label:"Venue Address:"}})],1)])],1),r("b-row",[r("b-col",[r("read-more",{attrs:{"more-str":"read more",text:e.currentSeminar.venue_address,link:"#","less-str":"read less","max-chars":25e4}}),r("br")],1)],1)],1),r("b-col",{staticStyle:{"padding-top":"38px"}},[e.currentCroods.lat?r("GmapMap",{ref:"mapRef",staticStyle:{width:"250px",height:"157px"},attrs:{center:e.currentCroods,zoom:15,"map-type-id":"terrain",options:{zoomControl:!0,mapTypeControl:!1,scaleControl:!1,streetViewControl:!1,rotateControl:!1,fullscreenControl:!0,disableDefaultUi:!1}}},[e.currentCroods?r("gmap-marker",{attrs:{position:e.currentCroods,clickable:!1,draggable:!1}}):e._e(),e.currentSeminar.venue_address?r("gmap-info-window",{attrs:{position:e.currentCroods}},[e._v(e._s(e.currentSeminar.formated_venue_address))]):e._e()],1):e._e()],1)],1):e._e(),r("br"),r("div",[r("b-row",[r("b-col",{attrs:{sm:"12"}},[r("label",{staticClass:"labelsi col-form-label",attrs:{for:"type"}},[r("b",[e._v("Fee:")])])]),r("b-col",{attrs:{sm:"12"}},[r("span",[e._v(e._s(e.currentSeminar.FormatedCost))])])],1)],1),e.currentSeminar.isFull?e._e():r("b-row",{staticClass:"mt-2"})],1),r("b-col",[r("b-row",{staticClass:"calender"},[e.isProcess?e._e():r("Calendar",{attrs:{issmall:!0,loading:e.loading,"first-day":1,daysync:e.day,monthchanger:!0,"current-date":e.currentSeminar._correct_date,"all-events":e.events,showWeekNumberFlag:!0}})],1)],1)],1),r("b-row",[r("b-col",{attrs:{md:"12",sm:"12",lg:"8"}},[e.currentSeminar.isPast?e._e():r("div",[e.currentSeminar.isFull?e._e():r("b-row",{staticClass:"mt-2"},[e._l(e.registrants,(function(t,a){return r("b-col",{key:a,staticClass:"mt-2",attrs:{md:"12",sm:"12",lg:"12"}},[r("b-card",{staticClass:"mb-1",attrs:{"no-body":""}},[r("b-card-header",{staticClass:"p-1",staticStyle:{"background-color":"#E8ECEF"},attrs:{"header-tag":"header",role:"tab"}},[r("div",{staticClass:"card_header"},[r("div",[r("span",[r("b",[e._v(e._s(t.name?t.name:"Registrant-"+(a+1)))])])]),r("div",[a>0?r("b-button",{staticClass:"trash",attrs:{variant:"danger"},on:{click:function(t){return e.removeReg(a)}}},[r("i",{staticClass:"fa fa-trash",attrs:{"aria-hidden":"true"}})]):e._e(),r("b-button",{directives:[{name:"b-toggle",rawName:"v-b-toggle",value:"collapse-"+a,expression:"'collapse-' + index"}],staticClass:"rotatebtn",attrs:{variant:"primary"}},[r("i",{staticClass:"fa fa-chevron-down",attrs:{"aria-hidden":"true"}})])],1)])]),r("b-collapse",{attrs:{id:"collapse-"+a,visible:"",accordion:"my-accordion",role:"tabpanel"}},[r("b-card-body",[r("b-form-group",{attrs:{"label-cols-sm":"4","label-cols-lg":"3",id:"input-group-2",label:"Name (First Last)","label-for":"input-2","invalid-feedback":e.l_error["registrants."+a+".name"]?e.l_error["registrants."+a+".name"][0]:""}},[r("b-form-input",{attrs:{state:!e.l_error["registrants."+a+".name"],required:"",placeholder:"Enter Name"},model:{value:t.name,callback:function(r){e.$set(t,"name",r)},expression:"item.name"}})],1),r("b-form-group",{attrs:{"label-cols-sm":"4","label-cols-lg":"3",id:"input-group-2",label:"Email","label-for":"input-2","invalid-feedback":e.l_error["registrants."+a+".email"]?e.l_error["registrants."+a+".email"][0]:""}},[r("b-form-input",{attrs:{state:!e.l_error["registrants."+a+".email"],type:"email",required:"",placeholder:"Enter Email"},model:{value:t.email,callback:function(r){e.$set(t,"email",r)},expression:"item.email"}})],1),r("b-form-group",{attrs:{"invalid-feedback":e.l_error["registrants."+a+".phoneNumber"]?e.l_error["registrants."+a+".phoneNumber"][0]:"","label-cols-sm":"4","label-cols-lg":"3",id:"input-group-2",label:"Phone Number","label-for":"input-2"}},[r("the-mask",{staticClass:"form-control",class:{"is-invalid":!!e.l_error["registrants."+a+".phoneNumber"],"is-valid":!e.l_error["registrants."+a+".phoneNumber"]},attrs:{placeholder:"Enter Phone number",label:"US Phone",mask:"+1 (###) ###-####"},model:{value:t.phoneNumber,callback:function(r){e.$set(t,"phoneNumber",r)},expression:"item.phoneNumber"}})],1),r("b-form-group",{attrs:{"label-cols-sm":"4","label-cols-lg":"3",id:"input-group-2",label:"Company Name","label-for":"input-2","invalid-feedback":e.l_error["registrants."+a+".companyName"]?e.l_error["registrants."+a+".companyName"][0]:""}},[r("b-form-input",{attrs:{disabled:"Not Applicable"===String(t.applicable),state:!e.l_error["registrants."+a+".companyName"],required:"",placeholder:"Enter company name"},model:{value:t.companyName,callback:function(r){e.$set(t,"companyName",r)},expression:"item.companyName"}})],1),r("b-form-group",{attrs:{"label-cols-sm":"4","label-cols-lg":"3"}},[r("b-form-checkbox",{attrs:{id:"checkbox-"+a,name:"checkbox-1",value:"Not Applicable","unchecked-value":"Applicable"},on:{change:function(t){return e.checkBoxChange(t,a)}},model:{value:t.applicable,callback:function(r){e.$set(t,"applicable",r)},expression:"item.applicable"}},[e._v("Not Applicable")])],1),r("b-form-group",{attrs:{"label-cols-sm":"4","label-cols-lg":"3",label:"Choice of Communication"}},[r("b-form-radio-group",{attrs:{id:"radio-group-"+a,name:"radio-sub-component-"+a},model:{value:t.choice_of_communication,callback:function(r){e.$set(t,"choice_of_communication",r)},expression:"item.choice_of_communication"}},[r("b-form-radio",{attrs:{value:"Email Only"}},[e._v("Email Only")]),r("b-form-radio",{attrs:{value:"Email & Text"}},[e._v("Email & Text")])],1)],1),e.isSeminar?r("b-form-group",{attrs:{"label-cols-sm":"4","label-cols-lg":"3",id:"input-group-2",label:"Additional Accommodation Request","label-for":"input-2","invalid-feedback":e.l_error["registrants."+a+".companyName"]?e.l_error["registrants."+a+".companyName"][0]:""}},[r("b-form-textarea",{attrs:{id:"textarea",rows:"3","max-rows":"6"},model:{value:t.accommodation,callback:function(r){e.$set(t,"accommodation",r)},expression:"item.accommodation"}})],1):e._e()],1)],1)],1)],1)})),r("b-col",{staticStyle:{"text-align":"right","margin-bottom":"-10px"}},[r("b-button",{attrs:{variant:"success"},on:{click:e.addNewReg}},[r("i",{staticClass:"fa fa-plus",attrs:{"aria-hidden":"true"}},[e._v("  Registrant")])])],1)],2)],1)]),r("b-col",{attrs:{"align-self":"end"}},[r("br"),e.currentSeminar.isPast?e._e():r("div",{staticClass:"detailed-panel"},[e.currentSeminar.isFull?e._e():r("b-row",{staticClass:"mt-2 fee-detail myboxD",staticStyle:{"font-weight":"bold"}},[r("b-row",{staticStyle:{width:"100%"},attrs:{sm:"12",md:"12",lg:"12"}},[r("b-col",{attrs:{sm:"6"}},[e._v("Fee Per Registrant:")]),r("b-col",[r("span",{staticClass:"form-control"},[e._v("$"+e._s(e.formatMoney(e.currentSeminar.cost_per_seat)))])])],1),r("b-row",{staticClass:"mt-2",staticStyle:{width:"100%"},attrs:{sm:"12",md:"12",lg:"12"}},[r("b-col",{attrs:{sm:"6"}},[e._v("Number of registrants:")]),r("b-col",[r("label",{staticClass:"form-control"},[e._v(e._s(e.registrants.length||0))])])],1),r("b-row",{staticClass:"mt-2",staticStyle:{width:"100%"},attrs:{sm:"12",md:"12",lg:"12"}},[r("b-col",{attrs:{sm:"6"}},[e._v("Total Fee: ")]),r("b-col",[r("span",{staticClass:"form-control totalfees"},[e._v("$"+e._s(e.formatMoney(parseFloat(e.currentSeminar.cost_per_seat||0)*parseFloat(e.registrants.length||0))))])])],1)],1),e.currentSeminar.isFull?e._e():r("b-row",{staticClass:"mt-2 pr-3 pl-3"},[e.currentSeminar.isPaid?r("b-col",{attrs:{block:"",sm:"12",md:"12",lg:"12"}},[e.registrantsError?r("PayPal",{attrs:{"button-style":e.myStyle,amount:""+(parseFloat(e.currentSeminar.cost_per_seat||0)*parseFloat(e.registrants.length||0)).toFixed(2),currency:"USD",experience:{input_fields:{no_shipping:1}},client:e.paypal,env:"production"},on:{"payment-completed":e.processPayment}}):e._e(),e.currentSeminar.isPast?e._e():r("span",[!e.registrantsError||e.currentSeminar.isFull?r("button",{staticClass:"dummybutton",attrs:{disabled:""}},[e._v("Buy Now")]):e._e(),r("br"),r("div",{staticStyle:{"font-size":"12px","text-align":"center","font-weight":"bold"}},[r("i",[e._v("if you're paying with Debit/Credit card, please scroll down in the PayPal popup window to see this option")])])])],1):r("b-col",{attrs:{block:"",sm:"12",md:"12",lg:"12"}},[e.registrantsError?r("button",{staticClass:"activebutton",on:{click:function(t){e.SaveBooking("FREE"+Math.floor(8e5*Math.random()+1),"Test","free",Math.floor(8e5*Math.random()+1))}}},[e._v("Register")]):e._e(),r("br"),e.currentSeminar.isPast?e._e():r("span",[!e.registrantsError||e.currentSeminar.isFull?r("button",{staticClass:"dummybutton",attrs:{disabled:""}},[e._v("Register")]):e._e(),r("br")])])],1)],1)])],1),e.isProcess?r("Loadder"):e._e()],1)},n=[],s=(r("8e6e"),r("456d"),r("7f7f"),r("ac6a"),r("bd86")),o=(r("28a5"),r("c5f6"),r("6b54"),r("a481"),r("b582")),i=(r("0c12"),r("37f3")),l=r("afb1"),c=r("84cf"),m=r("c1df"),u=r.n(m),d=r("3a60");function p(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,a)}return r}function b(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?p(Object(r),!0).forEach((function(t){Object(s["a"])(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):p(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var h={beforeDestroy:function(){},components:{TheMask:d["TheMask"],Calendar:i["a"],PayPal:l["a"],Loadder:c["a"]},data:function(){return{day:0,myStyle:{label:"buynow",size:"responsive",shape:"pill",color:"blue"},loading:!1,events:[],isProcess:!1,paypal:{production:"AUFnvE0LVsJKtenY0t3fHlcpKeESQbPxtBIkym7lCqo5oFbm3ewIfaQeXpQ5qqQE3jcEglZNSmLWlpKx"},error:{},registrants:[{name:null,phoneNumber:null,email:null,companyName:null,applicable:"Applicable",choice_of_communication:"Email Only",accommodation:""}],currentCroods:{},currentSeminar:{description:""}}},created:function(){var e=this;this.$route.params.id&&this.loadData(this.$route.params.id),this.$root.$on("CHANGE_MONTH",(function(t){e.loadEventData(t)})),this.$root.$on("DAY_SELECTED",(function(t){t.event.events.length>0&&e.eventSelected(t.event.events[0])}))},methods:{removeReg:function(e){this.registrants=this.registrants.filter((function(t,r){return r!=e})),delete this.l_error["registrants.".concat(e,".name")],delete this.l_error["registrants.".concat(e,".email")],delete this.l_error["registrants.".concat(e,".phoneNumber")],delete this.l_error["registrants.".concat(e,".companyName")],e!=this.registrants.length&&(delete this.l_error["registrants.".concat(this.registrants.length,".name")],delete this.l_error["registrants.".concat(this.registrants.length,".email")],delete this.l_error["registrants.".concat(this.registrants.length,".phoneNumber")],delete this.l_error["registrants.".concat(this.registrants.length,".companyName")])},addNewReg:function(){var e=this,t=this,r=this.registrants.length||0;r>=this.currentSeminar.empty_seat?this.$swal({allowOutsideClick:!1,title:"Seminar is near capacity",text:"There are only ".concat(this.currentSeminar.empty_seat," seats available. Would you like to proceed with registration?"),showCancelButton:!0,type:"warning",confirmButtonColor:"#3085d6",cancelButtonColor:"#3085d6",confirmButtonText:"Yes",cancelButtonText:"No"}).then((function(r){r.value||e.$swal({allowOutsideClick:!1,title:"Contact Us",type:"info",text:"Please Contact Admin at 303-690-2749 or email at eg@amityhealthcaregroup.com for further assistance",showCancelButton:!1,confirmButtonColor:"#3085d6",confirmButtonText:"Home"}).then((function(e){t.$router.push({name:"home"})}))})):t.changeRegistrants()},deleteRegistran:function(e){this.registrants.splice(e,1),delete this.error["registrants.".concat(e,".phoneNumber")],delete this.error["registrants.".concat(e,".companyName")],delete this.error["registrants.".concat(e,".email")],delete this.error["registrants.".concat(e,".name")],this.currentSeminar.numberofregistrants=this.currentSeminar.numberofregistrants>0?this.currentSeminar.numberofregistrants-1:0},processPayment:function(e){var t=this;this.isProcess=!0,this.$bvModal.hide("modal-center"),this.$http.post("checkValidashion",{registrants:this.registrants,seminar:this.currentSeminar.id}).then((function(r){console.log("Payments Paypal",e),t.SaveBooking(e.id,e.payer.payer_info.payer_id,e.payer.payment_method,e.transactions[0].related_resources[0].sale.id)})).catch((function(e){t.isProcess=!1,t.error=e.errors}))},SaveBooking:function(e,t,r,a){var n=this;console.log("SAVE BOOKING DATA",e,t,r,a),this.isProcess=!0,this.$http.post("seminar/booking",{payment_id:e,payer_id:t,payment_method:r,sale_id:a,registrants:this.registrants,seminar:this.currentSeminar.id}).then((function(e){var t=n.registrants.map((function(e,t){return e.email})),r=n.currentSeminar.title;n.isProcess=!1,n.currentSeminar={},n.registrants=[],n.error={},n.$router.push({name:"success",params:{title:r,emails:t.join(",").replace(",",", ")}})})).catch((function(e){n.error=e.errors}))},genrateCalender:function(e){},changeRegistrants:function(e){this.registrants.push({name:null,phoneNumber:null,email:null,companyName:null,applicable:"Applicable",choice_of_communication:"Email Only",accommodation:""})},eventSelected:function(e){var t=this;this.isProcess=!0,this.$http.get("seminar/".concat(e.id)).then((function(e){t.registrants=[{name:null,phoneNumber:null,email:null,companyName:null,applicable:"Applicable",choice_of_communication:"Email Only"}],t.error={},t.currentSeminar=e,e.lat&&String(e.lat).trim()?t.currentCroods={lat:parseFloat(e.lat),lng:parseFloat(e.lng)}:t.currentCroods={},t.day=t.currentSeminar.day,t.isProcess=!1}))},checkBoxChange:function(e,t){"Not Applicable"===e&&(this.registrants[t].companyName=null)},loadData:function(e){var t=this;this.isProcess=!0,this.$http.get("seminar/".concat(e)).then((function(e){t.currentSeminar=e,e.lat&&String(e.lat).trim()?t.currentCroods={lat:parseFloat(e.lat),lng:parseFloat(e.lng)}:t.currentCroods={},t.day=t.currentSeminar.day,t.loadEventData(u()(e._correct_date)),t.isProcess=!1})).catch((function(e){t.isProcess=!1}))},loadEventData:function(e){var t=this;this.loading=!0,this.$http.get("seminar",{params:{start_date:e.toString()}}).then((function(e){t.events=e,t.day=t.currentSeminar.day,t.loading=!1})).catch((function(e){t.loading=!1}))},formatMoney:function(e){var t=isNaN(t=Math.abs(t))?2:t,r=void 0==r?".":r,a=void 0==a?",":a,n=e<0?"-":"",s=String(parseInt(e=Math.abs(Number(e)||0).toFixed(t))),o=(o=s.length)>3?o%3:0;return n+(o?s.substr(0,o)+a:"")+s.substr(o).replace(/(\d{3})(?=\d)/g,"$1"+a)+(t?r+Math.abs(e-s).toFixed(t).slice(2):"")},addNewRegistrant:function(){var e=this,t=this;this.currentSeminar.numberofregistrants;newValue>this.currentSeminar.empty_seat&&this.$swal({allowOutsideClick:!1,title:"Seminar is near capacity",text:"There are only ".concat(this.currentSeminar.empty_seat," seats available. Would you like to proceed with registration?"),type:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#3085d6",confirmButtonText:"Yes",cancelButtonText:"No"}).then((function(r){r.value?(t.currentSeminar.numberofregistrants=t.currentSeminar.empty_seat,t.changeRegistrants(t.currentSeminar.empty_seat)):e.$swal({allowOutsideClick:!1,title:"Contact Us",text:"Please Contact Admin at 303-690-2749  or email at eg@amityhealthcaregroup.com for further assistance",showCancelButton:!1,confirmButtonColor:"#3085d6",confirmButtonText:"Home"}).then((function(e){t.$router.push({name:"home"})}))}))}},computed:{genratePaymentDetails:function(){},isSeminar:function(){return"seminar"==this.currentSeminar.type},href:function(){return o["a"].isAuthenticated()?"/#/admin":"/"},formatePhoneNumber:function(){return phone.substr(0,3)+"-"+phone.substr(3,3)+"-"+phone.substr(6,4)},formatedSeminarDate:function(){return u()(this.currentSeminar.seminar_date.split(" - ")[0]).format("LL")},registrantsError:function(){var e=this;return this.currentSeminar.id?delete this.error["seminar"]:this.error=b({},this.error,{seminar:["Please Select a Seminar"]}),0===this.registrants.length?this.error=b({},this.error,{registrants:["please add at last one registrants"]}):delete this.error["registrants"],this.registrants.forEach((function(t,r){t.name?delete e.error["registrants.".concat(r,".name")]:e.error=b({},e.error,Object(s["a"])({},"registrants.".concat(r,".name"),["Registrant name is required"])),t.email?/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(t.email)?delete e.error["registrants.".concat(r,".email")]:e.error=b({},e.error,Object(s["a"])({},"registrants.".concat(r,".email"),["The email is not in valid format"])):e.error=b({},e.error,Object(s["a"])({},"registrants.".concat(r,".email"),["Registrant email is required"])),t.phoneNumber?t.phoneNumber.length<10?e.error=b({},e.error,Object(s["a"])({},"registrants.".concat(r,".phoneNumber"),["Invalid phone number"])):e.$delete(e.error,"registrants.".concat(r,".phoneNumber")):e.error=b({},e.error,Object(s["a"])({},"registrants.".concat(r,".phoneNumber"),["Phone number is required"])),t.companyName?e.$delete(e.error,"registrants.".concat(r,".companyName")):"NOT APPLICABLE"===String(t.applicable).toUpperCase()?e.$delete(e.error,"registrants.".concat(r,".companyName")):e.error=b({},e.error,Object(s["a"])({},"registrants.".concat(r,".companyName"),["Company name is required"]))})),!Object.keys(e.error).length>0},l_error:function(){return this.error}},watch:{"currentSeminar.numberofregistrants":function(e){var t=this,r=this;e>this.currentSeminar.empty_seat&&this.$swal({allowOutsideClick:!1,title:"Seminar is near capacity",type:"warning",text:"There are only ".concat(this.currentSeminar.empty_seat," seats available. Would you like to proceed with registration?"),showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#3085d6",confirmButtonText:"Yes",cancelButtonText:"No"}).then((function(e){e.value?(r.currentSeminar.numberofregistrants=r.currentSeminar.empty_seat,r.changeRegistrants(r.currentSeminar.empty_seat)):t.$swal({allowOutsideClick:!1,title:"Contact Us",text:"Please Contact Admin at 720-353-7515 or email at eg@amityhealthcaregroup.com for further assistance",showCancelButton:!1,confirmButtonColor:"3085d6",confirmButtonText:"Home"}).then((function(e){r.$router.push({name:"home"})}))}))}}},g=h,f=(r("052d"),r("2877")),y=Object(f["a"])(g,a,n,!1,null,null,null);t["default"]=y.exports}}]);
//# sourceMappingURL=chunk-041116a5.926f31b3.js.map