import { ItemLink, ItemSm, ItemMd, ItemLg } from 'vue-muuri';
import { BModal } from 'bootstrap-vue';
import { ValidationProvider } from 'vee-validate';
import GeneralInfoComponent from '../GeneralInfoComponent'
import ScheduleComponent from '../ScheduleComponent'
import SpeakersComponent from '../SpeakersComponent'

export default {

    components : {
        ItemLink, ItemSm, ItemMd, ItemLg,ValidationProvider,
        GeneralInfoComponent,
        ScheduleComponent,
        SpeakersComponent,
        'b-model' : BModal
    },

    state: {
     
         data : {
            widgets: [],
            categories: [],
            templates: [],
            error: "",
            success: "",
            all_guides: [],
            current_widget: {
               "id": "",
               "title": "",
               "icon": "",
               "enabled": 0,
               "web_browser": 0,
               "show_toolbar": 0,
               "default_icon": "",
               "icon_preview": "",
               "fields": [],
            },
            user_fields_value:{
               "facebook": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {"url": ""}
               },
               "twitter": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data":{
                     "hashtags": "",
                     "account": "",
                  }
               },               
               "instagram": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "hashtags": "",
                     "account": "",
                  }
               },
               "list": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "value": "",
                  }
               },
               "map": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "value": "",
                  }
               },
               "view": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "value": "",
                  }
               },
               "webview": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "url": "",
                  }
               },
               "youtube": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "url": "",
                  }
               },
               "album": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "label": "",
                     "photo": "",
                  }
               },
               "sponsor_ads": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "url": "",
                     "banner": "",
                  }
               },
               "qr_code": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "enabled": "0",
                  }
               },
               "todo": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "enabled": "0",
                  }
               },          
               "notes": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "enabled": "0",
                  }
               },    
               "myschedule": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "enabled": "0",
                  }
               }, 
               "inbox": {
                  "id": "",
                  "user_guide_widget_id": "",
                  "guide_widget_field_id": "",
                  "data": {
                     "enabled": "0",
                  }
               },                                                                         
            },
            "album_data":{

            },
            "web_url": "", //not used
            "open_side": ""

         },
         create_guide: {
            category: '',
            template: '',
            current_guide_widgets:[],
            step: 1,
            guide_details: { 
               'id': '',
               'title': '',
               'description': '',
               'short_name': '',
               'has_event_date': 0,
               'event_from_date': '',
               'event_to_date': '',
               'city': '',
               'icon': '',
               'banner': '',
               'venue_name': '',
               'address': '',
               'street': '',
               'state': '',
               'country': '',
               'zip_code': '',
               'lat': '',
               'lng': '',
               'privacy_setting': '1',
               'passphrase': '',
               'sharing': '1',
               'icon_preview': '',
               'banner_preview':'',
               'timezone': '',
            },
         },
         widgets_fields: "",
         template_title : '',
         loading : false,
    },
    getters: {
      getWidgetFormGetters(state){ //take parameter state

         return state.data.widgets
      },
      getCategoryFormGetters(state){ //take parameter state

         return state.data.categories
      },
      getTemplatesFormGetters(state){ //take parameter state

         return state.data.templates
      },
      getTemplateTitleFormGetters(state){ //take parameter state

         return state.template_title
      },
      getTemplateGetters(state){ //take parameter state

         return state.template
      },
      getTemplatesGetters(state){ //take parameter state

         return state.data.templates
      },
      getLoadingGetters(state){ //take parameter state

         return state.loading
      },
      getCreateGuideGetters(state){ //take parameter state

         return state.create_guide
      },
      getGuideDetailsGetters(state){ //take parameter state

         return state.create_guide.guide_details
      },
      getGuideErrorsGetters(state){ //take parameter state

         return state.data.error
      },
      getGuideSuccessGetters(state){ //take parameter state

         return state.data.success
      },
      getAllGuides(state){ //take parameter state

         return state.data.all_guides;
      },
      getWidgetFieldsGetters(state){ //take parameter state

         return state.create_guide.guide_details.widgets_fields;
      },
      getCurrentWidgetGetters(state){ //take parameter state

         return state.data.current_widget;
      },
      getUserFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value;
      }, 
      getFacebookFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.facebook.data;
      },
      getTwitterFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.twitter.data;
      },
      getInstagramFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.instagram.data;
      }, 
      getWebviewFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.webview.data;
      },
      getAlbumFieldValueGetters(state){ //take parameter state

         return state.data.album_data;
      },  
      getAdsFieldValueGetters(state){ //take parameter state

         return state.data.sponsor_ads;
      },
      getWebUrlResponse(state){
         return state.data.web_url;
      }, 
      getOpenSideResponse(state){
         return state.data.open_side;
      },
      getQRCodeFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.qr_code.data;
      }, 
      
      getTodoFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.todo.data;
      },   
      getNotesFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.notes.data;
      },   
      getInboxFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.inbox.data;
      },       
      getMyscheduleFieldValueGetters(state){ //take parameter state

         return state.data.user_fields_value.myschedule.data;
      },   
    }
    ,
    actions: {
      //Qr code
      updateQrcodeFieldId(context, data){
         context.commit("updateQRCodeFieldId", data)
      },
      updateQrcodeFieldWidgetId(context, data){
         console.log(data)
         context.commit("updateQRCodeFieldWidgetId", data)
      },
      updateQrcodeField(context, data){
         context.commit("updateQRCodeField", data)
      },
      //To do
      updateTodoFieldId(context, data){
         context.commit("updateTodoFieldId", data)
      },
      updateTodoFieldWidgetId(context, data){
         context.commit("updateTodoFieldWidgetId", data)
      },
      updateTodoField(context, data){
         context.commit("updateTodoField", data)
      }, 
      //notes
      updateNotesFieldId(context, data){
         context.commit("updateNotesFieldId", data)
      },
      updateNotesFieldWidgetId(context, data){
         context.commit("updateNotesFieldWidgetId", data)
      },
      updateNotesField(context, data){
         context.commit("updateNotesField", data)
      },            
      //My Schedule
      updateMyscheduleFieldId(context, data){
         context.commit("updateMyscheduleFieldId", data)
      },
      updateMyscheduleFieldWidgetId(context, data){
         context.commit("updateMyscheduleFieldWidgetId", data)
      },
      updateMyscheduleField(context, data){
         context.commit("updateMyscheduleField", data)
      }, 
      //Inbox
      updateInboxFieldId(context, data){
         context.commit("updateInboxFieldId", data)
      },
      updateInboxFieldWidgetId(context, data){
         context.commit("updateInboxFieldWidgetId", data)
      },
      updateInboxField(context, data){
         context.commit("updateInboxField", data)
      },             
       showSide(context, data){
         context.commit("showSide",data)
       },
      getwebview(context, url){
         let formData = new FormData();
   
         formData.append("url", url);
        
         axios.post('/api/open_website', formData,{
            headers: {
               'Content-Type': 'multipart/form-data'
            }
         })


            .then((response)=>{
               console.log(response);
               context.commit("setweb_url",response.data) //categories will be run from mutation

            })

            .catch(()=>{
               
               console.log("Error........")
               
            })
      },       
         getTimeZone(context, url){

            axios.get(url)


               .then((response)=>{
                  console.log(response);
                 // context.commit("widgets",response.data.widgets) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error........")
                  
               })
         },
         saveGuide(context, user_guide){
            let formData = new FormData();
            console.log(user_guide);
            for ( var key in user_guide ) {
               formData.append(key, user_guide[key]);
            }
             
            
            axios.post('/api/save-guide', formData,{
                                          headers: {
                                             'Content-Type': 'multipart/form-data'
                                          }
                                       })
                     .then((response)=>{
                  
                  if(response.data.guide_details){
                     console.log(response.data.guide_details);
                     context.commit("guideSaved",response.data.guide_details) //categories will be run from mutation
                  }

               })

               .catch(()=>{
                  
                  console.log("Error........")
                  
               })
               
         }, 
         getGuideFromDatabase(context, guide_id){
            
            axios.get('/api/get-guide/'+guide_id)

               .then((response)=>{
                 console.log(response.data.guide_details);
                  context.commit("getGuide",response.data.guide_details) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error2........")
                  
               })
         },
         getAllGuideFromDatabase(context){
            
            axios.get('/api/get-all-user-guides')

               .then((response)=>{
                 console.log(response.data.guide_details);
                  context.commit("getAllGuides",response.data.guide_details) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error2........")
                  
               })
         },         
         allWidgetsFromDatabase(context){

            axios.get('/api/get-guide-widget')

               .then((response)=>{
                 
                  context.commit("widgets",response.data.widgets) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error........")
                  
               })
         }, 
         allCategoriesFromDatabase(context){
            axios.get('/api/get-guide-categories')

               .then((response)=>{
                  context.commit("categories",response.data.categories) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error........")
                  
               })
         },
         fetchTemplatesFromDatabase(context, category_id){
            
            axios.get('/api/get-guide-templates/'+category_id)

               .then((response)=>{
                 
                  context.commit("templates",response.data.templates) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error........")
                  
               })
         }, 
         addWidgetToGuide(context, data){
            let widget_id = data.widget_id 
            let guide_id = data.guide_id
            
            axios.get('/api/add-widget-guide/'+guide_id+'/'+widget_id)

            .then((response)=>{
              
               context.commit("setAfterAddGuideWidget",response.data.widget) //categories will be run from mutation

            })

            .catch(()=>{
               
               console.log("Error........")
               
            })
            
         },  
         removeWidgetToGuide(context, data){
            let widget_id = data.widget_id 
            let guide_id = data.guide_id
            axios.get('/api/remove-widget-guide/'+guide_id+'/'+widget_id)

            .then((response)=>{
              
               context.commit("setAfterRemoveGuideWidget",response.data.widget) //categories will be run from mutation

            })

            .catch(()=>{
               
               console.log("Error........")
               
            })
         },  
         getWidgetFieldsFromDatabase(context, widget_id){
            
            axios.get('/api/get-widget-fields/'+widget_id)

               .then((response)=>{
                 
                  context.commit("getWidgetFields",response.data.fields) //categories will be run from mutation

               })

               .catch(()=>{
                  
                  console.log("Error........")
                  
               })
         },
         updateGuideWidget(context, user_guide){
            let formData = new FormData();
            for ( var key in user_guide ) {
               formData.append(key, user_guide[key]);
            }
             
            axios.post('/api/update-user-guide-widget', formData,{
                                          headers: {
                                             'Content-Type': 'multipart/form-data'
                                          }
                                       })
                     .then((response)=>{
                  
                  if(response.data.widget){
                     context.commit("makeCurrentWidget",response.data.widget) //categories will be run from mutation
                     context.commit("loadSuccess","Widget updated successfully!")
                  }

               })

               .catch(()=>{
                  context.commit("loadError","Widget not updated! Please try again")
                  console.log("Error........")
                  
               })
               
         }, 
         restoreGuideWidget(context, id){
            
            axios.get('/api/restore-guide-widget/'+id)

               .then((response)=>{
                 
                  context.commit("makeCurrentWidget",response.data.widget) //categories will be run from mutation
                  context.commit("loadSuccess","Widget updated successfully!")

               })

               .catch(()=>{
                  context.commit("loadError","Widget not updated! Please try again")
                  console.log("Error........")
                  
               })
         },                    
         userSelectsCategory(context, category){
            context.commit("select_category",category)
         },
         userSelectsTemplate(context, template){
            context.commit("select_template",template) 
         },
         createGuideStep(context, data){
            context.commit("create_guide_step",data)
         },
         /* Form data here */
         updateTitle(context, title){
            context.commit("updateTitle",title)
         },
         updateDescription(context, description){
            context.commit("updateDescription",description)
         },
         updateShortName(context, short_name){
            context.commit("updateShortName",short_name)
         },
         updateHasEventDates(context, has_event_date){
            context.commit("updateHasEventDates",has_event_date)
         },
         updateEventFromDate(context, event_from_name){
            context.commit("updateEventFromDate",event_from_name)
         },
         updateEventToDate(context, event_to_date){
            context.commit("updateEventToDate",event_to_date)
         },
         updateCity(context, city){
            context.commit("updateCity",city)
         },
         updateVenueName(context, venue_name){
            context.commit("updateVenueName",venue_name)
         },
         updateAddress(context, address){
            context.commit("updateAddress", address)
         },
         updateStreet(context, street){
            context.commit("updateStreet", street)
         },
         updateState(context, state){
            context.commit("updateState", state)
         },
         updateCountry(context, country){
            context.commit("updateCountry", country)
         },
         updateZipCode(context, zipcode){
            context.commit("updateZipCode", zipcode)
         },
         updateLatitude(context, latitude){
            context.commit("updateLatitude", latitude)
         },
         updateLongitude(context, longitude){
            context.commit("updateLongitude", longitude)
         },
         updatePrivacySetting(context, privacy_setting){
            context.commit("updatePrivacySetting", privacy_setting)
         },
         updatePasspPhrase(context, pass_phrase){
            context.commit("updatePassPhrase", pass_phrase)
         },
         updateSharing(context, sharing){
            context.commit("updateSharing", sharing)
         },
         updateIcon(context, icon){
            context.commit("updateIcon", icon)
         },
         updateBanner(context, banner){
            context.commit("updateBanner", banner)
         },
         loadOldState(context, old_state){
            context.commit("loadOldState", old_state)
         },
         loadError(context, error){
            context.commit("loadError", error)
         },
         loadSuccess(context, success){
            context.commit("loadSuccess", success)
         },
         makeCurrentWidget(context, data){
            context.commit("makeCurrentWidget", data)
         },
         /**Widget setting handling */
         updateWidgetTitle(context, data){
            context.commit("updateWidgetTitle", data)
         },
         updateWidgetIcon(context, data){
            context.commit("updateWidgetIcon", data)
         },
         updateEnabledTitle(context, data){
            context.commit("updateEnabledTitle", data)
         },
         updateWebBrowserTitle(context, data){
            context.commit("updateWebBrowserTitle", data)
         },
         updateShowToolbarTitle(context, data){
            context.commit("updateShowToolbarTitle", data)
         },  
         /**Widget field values */
         updateFacebookFieldWidgetId(context, data){
            context.commit("updateFacebookFieldWidgetId", data)
         },
         updateFacebookFieldId(context, data){
            context.commit("updateFacebookFieldId", data)
         },
         updateFacebookFieldValue(context, data){
            context.commit("updateFacebookFieldValue", data)
         },
         //Twitter
         updateTwitterFieldWidgetId(context, data){
            context.commit("updateTwitterFieldWidgetId", data)
         },
         updateTwitterFieldId(context, data){
            context.commit("updateTwitterFieldId", data)
         },
         updateTwitterFieldHashtags(context, data){
            context.commit("updateTwitterFieldHashtags", data)
         },
         updateTwitterFieldAccount(context, data){
            context.commit("updateTwitterFieldAccount", data)
         },   
         //Instagram
         updateInstagramFieldWidgetId(context, data){
            context.commit("updateInstagramFieldWidgetId", data)
         },
         updateInstagramFieldId(context, data){
            context.commit("updateInstagramFieldId", data)
         },
         updateInstagramFieldHashtags(context, data){
            context.commit("updateInstagramFieldHashtags", data)
         },
         updateInstagramFieldAccount(context, data){
            context.commit("updateInstagramFieldAccount", data)
         },
         //webview 
         updateWebviewFieldWidgetId(context, data){
            context.commit("updateWebviewFieldWidgetId", data)
         },
         updateWebviewFieldId(context, data){
            context.commit("updateWebviewFieldId", data)
         },
         updateWebviewFieldValue(context, data){
            context.commit("updateWebviewFieldValue", data)
         },
         //ads
         updateAdsFieldId(context, data){
            context.commit("updateAdsFieldId", data)
         },
         updateAdsFieldWidgetId(context, data){
            context.commit("updateAdsFieldWidgetId", data)
         },
         //albums
         updateAlbumsFieldId(context, data){
            context.commit("updateAlbumsFieldId", data)
         },
         updateAlbumsFieldWidgetId(context, data){
            context.commit("updateAlbumsFieldWidgetId", data)
         },

         saveWidgetFieldValue(context, data){
            let formData = new FormData();
            for ( var key in data ) {

               formData.append(key, JSON.stringify(data[key]));
            }
             
            axios.post('/api/save-guide-widget-field-value', formData,{
                                          headers: {
                                             'Content-Type': 'multipart/form-data'
                                          }
                                       })
                     .then((response)=>{
                  
                  if(response.data!=''){
                     console.log(response.data)
                    // this.$store.dispatch('getUserWidgetFieldValue', {'widget_id': response.data.user_guide_widget_id, 'field_id': response.data.guide_widget_field_id})
                     //context.commit("saveWidgetFieldValue", response.data)
                  }

               })

               .catch(()=>{
                  context.commit("loadError","Widget not updated! Please try again")
                  console.log("Error........")
                  
               })
               
         }, 
         getUserWidgetFieldValue(context, data){
            
            axios.get('/api/get-guide-widget-field-value/'+data.widget_id+'/'+data.field_id)

               .then((response)=>{
                 
                  if(response.data!=''){
                     console.log(response.data.data)
                     context.commit("getUserWidgetFieldValue", response.data.data)
                  }

               })

               .catch(()=>{
                  context.commit("loadError","Widget not updated! Please try again")
                  console.log("Error........")
                  
               })
         },  
         updateAlbumFieldLabel(context, data){
            context.commit("updateAlbumFieldLabel", data)
         },
         updateAlbumFieldPhoto(context, data){
            context.commit("updateAlbumFieldPhoto", data)
         }, 
         updateAdsFieldUrl(context, data){
            context.commit("updateAdsFieldUrl", data)
         },
         updateAdsFieldBanner(context, data){
            context.commit("updateAdsFieldbanner", data)
         },                        
 
      },
      mutations: {
         widgets(state,data) {
            state.data.widgets = data
         },
         categories(state,data) {
            state.data.categories = data
         },
         templates(state,data) {
            state.data.templates = data
         },       
         select_category(state,category) {
            state.create_guide.category = category
            let guide_data = {
               "category": category,
               "template": state.create_guide.template,
               "guide_details": "",
            }
            localStorage.setItem('guide_data', JSON.stringify(guide_data));
            //localStorage.setItem('create_guide', );
         },
         select_template(state,template) {
            state.create_guide.template = template
            let guide_data =localStorage.getItem('guide_data')
            if(guide_data){
               guide_data = JSON.parse(guide_data)
               guide_data.template = template;
               guide_data.guide_details = "";
               guide_data.error="";
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
            }else{
               let guide_data = {
                  "category": state.create_guide.category,
                  "template": template,
                  "guide_details": "",
                  "error": ""
               }
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
            }
         },
         create_guide_step(state,step) {
            state.create_guide.step = step
            let guide_data =localStorage.getItem('guide_data')
            if(guide_data){
               guide_data = JSON.parse(guide_data)
               guide_data.step = step;
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
            }else{
               let guide_data = {
                  "category": state.create_guide.category,
                  "template": state.create_guide.category,
                  "step": step
               }
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
            }
         }
         /* Form data handles here */
         ,
         updateTitle(state, title){            
            state.create_guide.guide_details.title = title
         },
         updateDescription(state, description){
            state.create_guide.guide_details.description = description
         },
         updateShortName(state, short_name){
            state.create_guide.guide_details.short_name = short_name
         },
         updateHasEventDates(state, has_event_date){
            state.create_guide.guide_details.has_event_date = has_event_date
         },
         updateEventFromDate(state, event_from_date){
            state.create_guide.guide_details.event_from_date = event_from_date
         },
         updateEventToDate(state, event_to_date){
            state.create_guide.guide_details.event_to_date = event_to_date
         },
         updateCity(state, city){
            state.create_guide.guide_details.city = city
         },
         updateVenueName(state, venue_name){
            state.create_guide.guide_details.venue_name = venue_name
         },
         updateAddress(state, address){
            state.create_guide.guide_details.address = address
         },
         updateStreet(state, street){
            state.create_guide.guide_details.street = street
         },
         updateState(state, state_name){
            state.create_guide.guide_details.state = state_name
         },
         updateCountry(state, country){
            state.create_guide.guide_details.country = country
         },
         updateZipCode(state, zip_code){
            state.create_guide.guide_details.zip_code = zip_code
         },
         updateLatitude(state, latitude){
            state.create_guide.guide_details.lat = latitude
         },
         updateLongitude(state, longitude){
            state.create_guide.guide_details.lng = longitude
         },
         updatePrivacySetting(state, privacy_setting){
            state.create_guide.guide_details.privacy_setting = privacy_setting
         },
         updatePasspPhrase(state, pass_phrase){
            state.create_guide.guide_details.pass_phrase = pass_phrase
         },
         updateSharing(state, sharing){
            state.create_guide.guide_details.sharing = sharing
         },
         updateIcon(state, icon){
            //state.create_guide.guide_details.icon = icon
            state.create_guide.guide_details.icon_preview = icon
         },
         updateBanner(state, banner){
            //state.create_guide.guide_details.banner = banner
            state.create_guide.guide_details.banner_preview = banner
         },
         guideSaved(state, user_guide){
            //state.create_guide.guide_details.id = user_guide.guide.id
            //state.create_guide.guide_details.icon = user_guide.icon
            //state.create_guide.guide_details.banner = user_guide.banner  
            let banner = '';
            let icon = '';
            if(user_guide.icon){
               banner = user_guide.banner
            }
            if(user_guide.banner){
               icon = user_guide.icon;
            }
            state.create_guide.guide_details.id = user_guide.guide.id
            state.create_guide.guide_details.icon = icon
            state.create_guide.guide_details.banner = banner
            state.create_guide.guide_details.icon_preview = ''
            state.create_guide.guide_details.banner_preview = ''
            let our_guide = state.create_guide.guide_details

            let guide_data =localStorage.getItem('guide_data')
            if(guide_data){
               guide_data = JSON.parse(guide_data)
               guide_data.guide_details = our_guide;
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
            }else{
               let guide_data = {
                  "category": state.create_guide.category,
                  "template": state.create_guide.template,
                  "step": state.create_guide.step,
                  "guide_details": our_guide
               }
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
            }
         },
         loadOldState(state, old_state){
            state.create_guide.guide_details = old_state
         },
         loadError(state, error){
            state.data.error = error;
         },
         loadSuccess(state, success){
            state.data.success = success;
         },         
         getGuide(state, data){
            
            let guide_details = { 
               'id': (data.id)? data.id : '',
               'title': (data.title)? data.title : '',
               'description': (data.description)? data.description : '',
               'short_name': (data.short_name)? data.short_name : '',
               'has_event_date': (data.has_event_date)? data.has_event_date : '0',
               'event_from_date': (data.event_from_date)? data.event_from_date : '',
               'event_to_date': (data.event_to_date)? data.event_to_date : '',
               'city': (data.city)? data.city : '',
               'icon': (data.icon)? data.icon : '',
               'banner': (data.banner)? data.banner : '',
               'venue_name': (data.venue_name)? data.venue_name : '',
               'address': (data.address)? data.address : '',
               'street': (data.street)? data.street : '',
               'state': (data.state)? data.state : '',
               'country': (data.country)? data.country : '',
               'zip_code': (data.zip_code)? data.zip_code : '',
               'lat': (data.lat)? data.lat : '',
               'lng': (data.lng)? data.lng : '',
               'privacy_setting': (data.privacy_setting)? data.privacy_setting : '',
               'passphrase': (data.passphrase)? data.passphrase : '',
               'sharing': (data.sharing)? data.sharing : '',
               'icon_preview': '',
               'banner_preview':'',
               'timezone': (data.timezone)? data.timezone : '',
               'widgets': data.widgets,
            }
            state.create_guide.guide_details = guide_details
         },
         getAllGuides(state, data){
            state.data.all_guides = data
         },
         setAfterAddGuideWidget(state, data){
            let current_state = state.create_guide.guide_details.widgets;
            current_state.push(data)
            state.create_guide.guide_details.widgets = current_state
         },
         setAfterRemoveGuideWidget(state, data){
            let current_state = [];
            data.forEach(element => {
               current_state.push(element)
            });
            state.create_guide.guide_details.widgets = current_state
         },
         getWidgetFields(state, data){
            console.log(data);
            let Obj = {
                  'id': data.id,
                  'widget_id': data.widget_id,
                  'field_key': data.field_key,
                  'description': data.description,
                  'type': data.type
            }
            console.log(Obj);
            state.create_guide.widgets_fields = Obj;
         },
         makeCurrentWidget(state, data){
            //data.icon_preview = ""
            let current_state = {
               "id": data.id,
               "title": data.title,
               "icon": data.icon,
               "enabled": data.enabled,
               "web_browser": data.web_browser,
               "show_toolbar": data.show_toolbar,
               "default_icon": data.default_icon,
               "icon_preview": "",
               "fields":  data.fields,
            }
            state.data.current_widget = current_state;
         },
         /**Widget setting handling */
         updateWidgetTitle(state, title){
            state.data.current_widget.title = title
         },
         updateWidgetIcon(state, data){
            state.data.current_widget.icon_preview = data
         },
         updateEnabledTitle(state, data){
            state.data.current_widget.enabled = data
         },
         updateWebBrowserTitle(state, data){
            state.data.current_widget.web_browser = data
         },
         updateShowToolbarTitle(state, data){
            state.data.current_widget.show_toolbar = data
         },
         /**Widget field values */
         updateFacebookFieldWidgetId(state, data){
            state.data.user_fields_value.facebook.user_guide_widget_id = data
         },
         updateFacebookFieldId(state, data){
            state.data.user_fields_value.facebook.guide_widget_field_id = data
         },
         updateFacebookFieldValue(state, data){
            state.data.user_fields_value.facebook.data.url = data
         },
         //twitter
         updateTwitterFieldWidgetId(state, data){
            state.data.user_fields_value.twitter.user_guide_widget_id = data
         },
         updateTwitterFieldId(state, data){
            state.data.user_fields_value.twitter.guide_widget_field_id = data
         },
         updateTwitterFieldHashtags(state, data){
            state.data.user_fields_value.twitter.data.hashtags = data
         }, 
         updateTwitterFieldAccount(state, data){
            state.data.user_fields_value.twitter.data.account = data
         },   
         //Instagram
         updateInstagramFieldWidgetId(state, data){
            state.data.user_fields_value.instagram.user_guide_widget_id = data
         },
         updateInstagramFieldId(state, data){
            state.data.user_fields_value.instagram.guide_widget_field_id = data
         },
         updateInstagramFieldHashtags(state, data){
            state.data.user_fields_value.instagram.data.hashtags = data
         }, 
         updateInstagramFieldAccount(state, data){
            state.data.user_fields_value.instagram.data.account = data
         }, 
         //webview
         updateWebviewFieldWidgetId(state, data){
            state.data.user_fields_value.webview.user_guide_widget_id = data
         },
         updateWebviewFieldId(state, data){
            state.data.user_fields_value.webview.guide_widget_field_id = data
         },
         updateWebviewFieldValue(state, data){
            state.data.user_fields_value.webview.data.url = data
         },
         //Ads
         updateAdsFieldWidgetId(state, data){
            state.data.user_fields_value.sponsor_ads.user_guide_widget_id = data
         },
         updateAdsFieldId(state, data){
            state.data.user_fields_value.sponsor_ads.guide_widget_field_id = data
         },
         //albums
         updateAlbumsFieldWidgetId(state, data){
            state.data.user_fields_value.album.user_guide_widget_id = data
         },
         updateAlbumsFieldId(state, data){
            state.data.user_fields_value.album.guide_widget_field_id = data
         },
                  //albums
         updateAlbumsFieldWidgetId(state, data){
            state.data.user_fields_value.album.user_guide_widget_id = data
         },
         updateAlbumsFieldId(state, data){
            state.data.user_fields_value.album.guide_widget_field_id = data
         },
         //QR Code
         updateQRCodeFieldWidgetId(state, data){
            state.data.user_fields_value.qr_code.user_guide_widget_id = data
         },
         updateQRCodeFieldId(state, data){
            state.data.user_fields_value.qr_code.guide_widget_field_id = data
         },    
         updateQRCodeField(state, data){
            state.data.user_fields_value.qr_code.data.enabled = data
         },  
         //Todo
         updateTodoFieldWidgetId(state, data){
            state.data.user_fields_value.todo.user_guide_widget_id = data
         },
         updateTodoFieldId(state, data){
            state.data.user_fields_value.todo.guide_widget_field_id = data
         },    
         updateTodoField(state, data){
            state.data.user_fields_value.todo.data.enabled = data
         },               
         //Notes
         updateNotesFieldWidgetId(state, data){
            state.data.user_fields_value.notes.user_guide_widget_id = data
         },
         updateNotesFieldId(state, data){
            state.data.user_fields_value.notes.guide_widget_field_id = data
         },    
         updateNotesField(state, data){
            state.data.user_fields_value.notes.data.enabled = data
         }, 
         //My Scheudle
         updateMyScheduleFieldWidgetId(state, data){
            state.data.user_fields_value.myscheudle.user_guide_widget_id = data
         },
         updateMyscheduleFieldId(state, data){
            state.data.user_fields_value.myschedule.guide_widget_field_id = data
         },    
         updateMyscheduleField(state, data){
            state.data.user_fields_value.myschedule.data.enabled = data
         },
         //My Scheudle
         updateInboxFieldWidgetId(state, data){
            state.data.user_fields_value.inbox.user_guide_widget_id = data
         },
         updateInboxFieldId(state, data){
            state.data.user_fields_value.inbox.guide_widget_field_id = data
         },    
         updateInboxField(state, data){
            state.data.user_fields_value.inbox.data.enabled = data
         },                               
         getUserWidgetFieldValue(state, data){
            //console.log(data);
            for (const [key, value] of Object.entries(data)) {
               console.log(key=="facebook");
               switch(key) {
                  case "facebook":
                    {
                        console.log(value.data.url)
                        state.data.user_fields_value.facebook.data.url = value.data.url
                    }
                    break;
                  case "instagram":
                     {
                        //console.log(value)
                        state.data.user_fields_value.instagram.data.hashtags = value.data.hashtags
                        state.data.user_fields_value.instagram.data.account = value.data.account
                     }
                    // code block
                    break;
                  case "twitter":
                     {
                        state.data.user_fields_value.twitter.data.hashtags = value.data.hashtags
                        state.data.user_fields_value.twitter.data.account = value.data.account
                     }
                     break;  
                     case "webview":
                        {
                           state.data.user_fields_value.webview.data.url = value.data.url
                        }
                        break;                                          
                  default:
                    // code block
                }
            }
           

         },

         updateAlbumFieldLabel(state, data){
            state.data.user_fields_value.album.data.label = data
         },
         updateAlbumFieldPhoto(state, data){
            state.data.user_fields_value.album.data.photo = data
         },

         updateAdsFieldUrl(state, data){
            state.data.user_fields_value.sponsor_ads.data.url = data
         },
         updateAdsFieldBanner(state, data){
            state.data.user_fields_value.sponsor_ads.data.banner = data
         },
         setweb_url(state, data){
            state.data.web_url = data.data
         },
         showSide(state, data){
            state.data.open_side = data
         },
      
   }
}