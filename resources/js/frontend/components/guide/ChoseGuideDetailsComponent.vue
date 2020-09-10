<template>
 <div>
    <header class="guide-header">
    
        <div class="row">
            <div class="col-3">
           
            </div>
            <div class="col-6 text-center mt-1">
                <h3>{{getStepInfo.heading}}</h3>
                <h5>Step {{getCreateGuide.step}} of 4: {{getStepInfo.title}}</h5>
            </div>
            <div class="col-3">
            
            </div>
        </div>
    </header>
    <div class="container mb-5">
        <form  method="post" v-on:submit.prevent class="mt-4 bm-5">
        <div id="step1" v-show="getCreateGuide.step==1">
            <div class="row mt-4">
                <div class="col-3 mt-4 justify-content">
                    <h3>Building with Buzzel</h3>
                    <p>
                        You’re on your way to creating an extremely useful, wonderfully eco-friendly, and pleasantly elegant mobile guide. With Guidebook, it’s extremely simple to put information right in your audience’s hands, and it all starts here with our guide builder.
                    </p>
                    <p>
                        With a few short steps, you’ll have a complete guide that can be published and ready to use. Don’t worry - we’ll walk you through the process! Start here by telling us a few details about your guide.
                    </p>
                </div>
                <div class="col-9 border mt-4 px-5">
                    <div class="form-group row mt-4">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" v-model="title" class="form-control" name="title" id="name" placeholder="Enter Guide Name">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9 px-3">
                                <textarea class="form-control" v-model="description" id="description" name="description" rows="3" placeholder="A brief paragraph to describe your guide."></textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="short_name" class="col-sm-3 col-form-label">Short Name</label>
                            <div class="col-sm-9 px-3">
                                <input type="text" class="form-control" v-model="short_name" name="short_name" id="short_name" placeholder="Enter short Name">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    The short name is used to construct the URL where people view your guide, ex: https://buzzel.com.au/g/hp0onttdapbvzyy
                                </small>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="event_dates" class="col-sm-3 col-form-label"><i class="fa fa-question-circle" aria-hidden="true"></i> Event Dates</label>
                            <div class="col-sm-9 px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" v-model="has_event_date" name="has_event_date" id="event_date_yes" value="1" >
                                    <label class="form-check-label" for="event_date_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" v-model="has_event_date" name="has_event_date" id="gridRadios2" value="0" checked>
                                    <label class="form-check-label" for="gridRadios2">
                                        No
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    You can not change it after published
                                </small>
                            </div>
                    </div>
                    <div class="form-group row"  v-show="getCreateGuide.guide_details.has_event_date==1">
                            <label for="short_name" class="col-sm-3 col-form-label">Event Dates</label>
                            <div class="col">
                                <date-picker :input-attr = "{ name: 'event_from_date' }" v-model="event_from_date" valueType="format" placeholder="From Date"></date-picker>
                            </div>
                            To
                            <div class="col">
                                <date-picker :input-attr = "{ name: 'event_to_date' }" v-model="event_to_date" valueType="format" placeholder="To Date"></date-picker>
                            </div>
                    </div>                    
                    <div class="form-group row">
                            <label for="select_city" class="col-sm-3 col-form-label">Select City</label>
                            <div class="col-sm-9 px-3">
                                <vue-google-autocomplete
                                    
                                    id="map"
                                    classname="form-control"
                                    placeholder="Please type your address"
                                    v-model="city"
                                    v-on:placechanged="getToData"
                                    types="(cities)"
                                >
                                </vue-google-autocomplete>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    The current time in Asia/Calcutta is <b>12:34 PM</b>.
                                </small>
                            </div>
                    </div>
                    <div class="col border">
                        <button v-on:click="select_guide_detail_step(2)" :disabled='is_next_active' class="btn btn-info border mt-2 mb-2 float-right">Save and Continue</button>
                    </div>    
                </div>
            </div>
            
        </div><!--step1-->
        <div id="step2"  v-show="getCreateGuide.step==2">
            <div class="row mt-4">
                <div class="col-3 mt-4 justify-content">
                    <h3>Branding your guide</h3>
                    <p>
                        Here’s your chance to brand this mobile guide and give it a distinct feel. Think of your icon and cover image as your guide’s first impression - and like all first impressions you only get one chance to make it count.
                    </p>
                    <p>
                        Users see the custom icon when they’re searching for your guide, so be sure to use something clear, easily identifiable and unique to your guide’s subject matter. Cover images add personality to a guide. Be sure to choose something complementary that strengthens the branding and enhances the icon, rather than distracting from it.
                    </p>
                     <a v-on:click="select_guide_detail_step(3)" class="btn btn-light border mt-2 mb-2">Skip for now</a>
                </div>
                <div class="col-9 border mt-4 px-5">
                    <p class="img-top-text mt-3 text-center text-muted">Add a custom icon and cover image to add some flavor to your guide.</p>
                    <div class="card">
                        <i class="fa fa-pencil-square banner_edit" @click="openFileSelection('banner_select')" aria-hidden="true"></i>
                        <i class="fa fa-pencil-square icon_edit" @click="openFileSelection('icon_select')" aria-hidden="true"></i>
                        <img class="card-img-top img-thumbnail template_icon" :src="getIcon" alt="Card image cap">
                        <img class="card-img-top img-thumbnail template_banner" :src="getBanner" alt="Card image cap">
                        <input type="file" @change="selectIcon" id="icon_select" ref="icon" name="icon" class="d-none">
                        <input type="file" @change="selectBanner" id="banner_select" ref="banner" name="banner" class="d-none">
                    </div>
                    <div class="col text-center border mt-5">
                            <p class="mt-2"><b>Cover image:</b> 1440 px wide by 720 px tall</p>
                             <p class="mb-2"><b>Icon:</b> 232 px wide by 192 px tall</p>
                    </div>
                    <div class="col border mt-4">
                        <a v-on:click="select_guide_detail_step(1)" class="btn btn-secondary border mt-2 mb-2 float-left">Back</a>
                        <a v-on:click="select_guide_detail_step(3)" class="btn btn-info border mt-2 mb-2 float-right">Save and Continue</a>
                    </div> 
                </div>
            </div>
        </div><!--step2-->
        <div id="step3"  v-show="getCreateGuide.step==3">
            <div class="row mt-4">
                <div class="col-3 mt-4 justify-content">
                    <h3>Adding location</h3>
                    <p>
                        Your guide’s location tells users exactly where your event or place is so that they can easily navigate their way to wherever you are. Whether it’s an exact address or a general area, adding a location is essential to helping your users visualize the whereabouts of your guide and attach a sense of place to it.
                    </p>
                    <a v-on:click="select_guide_detail_step(4)" class="btn btn-light border mt-2 mb-2">Skip for now</a>
                </div>
                <div class="col-9 border mt-4 px-5">
                    <div class="form-group row mt-4">
                        <label for="venue_name" class="col-sm-3 col-form-label">Venue Name</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="venue_name" name="venue_name" id="venue_name" placeholder="Enter Venue Name">
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9 px-3">
                                <vue-google-autocomplete
                                    
                                    id="autocomplete"
                                    classname="form-control"
                                    placeholder="Enter a street address..."
                                    v-model="address"
                                    v-on:placechanged="getAddressData"
                                    types="(street_address)"
                                >
                                </vue-google-autocomplete>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                            <GmapMap
                                :center="{lat:52.098823, lng:-4.549537}"
                                :zoom="7"
                                map-type-id="terrain"
                                style="width: 100%; height: 250px"
                                 ref="mapRef"
                                >
                                <GmapMarker
                                    :key="index"
                                    v-for="(m, index) in markers"
                                    :position="m.position"
                                    :clickable="true"
                                    :draggable="true"
                                    @click="center=m.position"
                                />
                            </GmapMap>
                        </div>
                    <div class="form-group row mt-4">
                        <label for="street" class="col-sm-3 col-form-label">Street</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="street" name="street" id="street" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group row mt-4">
                        <label for="city" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="city" name="city" id="city" placeholder="">
                        </div>
                    </div>   
                    <div class="form-group row mt-4">
                        <label for="state" class="col-sm-3 col-form-label">State</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="state" name="state" id="state" placeholder="">
                        </div>
                    </div>                                                                
                    <div class="form-group row mt-4">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="country" name="country" id="country" placeholder="">
                        </div>
                    </div>                                      
                    <div class="form-group row mt-4">
                        <label for="zipcode" class="col-sm-3 col-form-label">Zipcode</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="zip_code" name="zip_code" id="zipcode" placeholder="">
                        </div>
                    </div>                      
                    <div class="form-group row mt-4">
                        <label for="latitude" class="col-sm-3 col-form-label">Latitude</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="latitude" name="latitude" id="latitude" placeholder="">
                        </div>
                    </div>                      
                    <div class="form-group row mt-4">
                        <label for="longitude" class="col-sm-3 col-form-label">Longitude</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" v-model="longitude" name="longitude" id="longitude" placeholder="">
                        </div>
                    </div>                      
                    <div class="col border">
                        <a v-on:click="select_guide_detail_step(2)" class="btn btn-secondary border mt-2 mb-2 float-left">Back</a>
                        <a v-on:click="select_guide_detail_step(4)" class="btn btn-info border mt-2 mb-2 float-right">Save and Continue</a>
                    </div>    
                </div>
            </div>
            
        </div><!--step3-->
        <div id="step4"  v-show="getCreateGuide.step==4">
            <div class="row mt-4">
                <div class="col-3 mt-4 justify-content">
                    <h3>Privacy</h3>
                    <p>
                        Not all guides are meant for the public, so here is where you can protect your information.
                    </p>
                    <p>
                        <b>Sharing:</b> Enabling sharing on your guide will allow your users to share their favorite guide items with their friends and followers on social media, email, and messaging platforms. Disabling it will prevent users from sharing your guide’s info outside the app.
                    </p>
                     <a class="btn btn-light border mt-2 mb-2">Skip and start building</a>
                </div>
                <div class="col-9 border mt-4 px-5">
                    <label for="longitude" class="col-sm-3 col-form-label mt-3">Privacy Setting</label>
                    <div class="btn-group btn-group-toggle col-sm-9" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="privacy" v-model="privacy_setting" id="option1" autocomplete="off" checked> Public
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" v-model="privacy_setting" name="privacy" id="option2" autocomplete="off"> Passphrase
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" v-model="privacy_setting" name="privacy" id="option3" autocomplete="off"> Invite-only
                        </label>
                      
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        Your guide will show up in search results and anyone can download it.
                    </small>  
                    <label for="longitude" class="col-sm-3 col-form-label">Sharing</label>
                    <div class="btn-group btn-group-toggle col-sm-9" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" v-model="sharing" name="sharing" id="option1" autocomplete="off" checked> Yes
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" v-model="sharing" name="sharing" id="option2" autocomplete="off"> No
                        </label>
                      
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                       Sharing lets your attendees share your guide via Twitter, Facebook, email, or messaging!
                    </small>  
                    <div class="col border mt-4">
                        <a v-on:click="select_guide_detail_step(3)" class="btn btn-secondary border mt-2 mb-2 float-left">Back</a>
                        <a v-on:click="select_guide_detail_step(5)" class="btn btn-info border mt-2 mb-2 float-right">Save and start building</a>
                    </div> 
                </div>
            </div>
        </div><!--step4-->        
        </form>
    </div>

    
 </div>


    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
  import DatePicker from 'vue2-datepicker';
  import 'vue2-datepicker/index.css';
  import VueGoogleAutocomplete from 'vue-google-autocomplete'
  import {gmapApi} from 'vue2-google-maps'
    export default {

        name: "GuideDetails",
        components: {gmapApi,  VueGoogleAutocomplete },
        mounted() {

            let guide_data = localStorage.getItem('guide_data')
            if(guide_data){
                guide_data = JSON.parse(guide_data);
                if(guide_data.category){
                    this.$store.dispatch("userSelectsCategory", guide_data.category);
                }else{
                    let guide_data = {
                        "error": "Please choose category first"
                    }
                    localStorage.setItem('guide_data', JSON.stringify(guide_data));
                    window.location.href = '/guide/categories';
                }
                if(guide_data.template){
                    this.$store.dispatch("userSelectsTemplate", guide_data.template);
                }else{
                    let guide_data = {
                        "category": guide_data.category,
                        "error": "Please choose template first"
                    }
                    localStorage.setItem('guide_data', JSON.stringify(guide_data));
                    window.location.href = '/guide/templates';                    
                }
                if(guide_data.step){
                    this.$store.dispatch("createGuideStep", guide_data.step);
                }
                if(guide_data.guide_details){
                    this.$store.dispatch("loadOldState", guide_data.guide_details);
                }
            }
                if(this.getGuideDetails.lat && this.getGuideDetails.lng){
                    this.$refs.mapRef.$mapPromise.then((map) => {
                    map.panTo({lat: parseInt(this.getGuideDetails.lat), lng: parseInt(this.getGuideDetails.lng)})
                    })
                }

        },
        props: ['placeholder_image_path'],
        computed: {
             google: gmapApi,
             markers(){
              return   [
                {
                    position: {
                        lat: parseInt(this.getGuideDetails.lat),
                        lng: parseInt(this.getGuideDetails.lng)
                    },
                    infoText: 'Marker 1'
                }
            ]
            },       
            fetchTemplates(){ //final output from here
                return this.$store.getters.getTemplatesFormGetters
            },
            getLoading(){ //final output from here
                return this.$store.getters.getLoadingGetters
            },
            getCreateGuide(){ //final output from here
                return this.$store.getters.getCreateGuideGetters
            },
            getIcon(){
               if(this.getGuideDetails.icon_preview==''){
                   if(this.getGuideDetails.icon!=''){
                       return this.getGuideDetails.icon
                   }else{
                    return '/images/placeholder/guide_icon.png';
                   }
                }else {
                    const file = this.getGuideDetails.icon_preview;
                    return window.URL.createObjectURL(file);
                }
            },
            getBanner(){
               if(this.getGuideDetails.banner_preview==''){
                   if(this.getGuideDetails.banner!=''){
                       return this.getGuideDetails.banner
                   }else{
                    return '/images/placeholder/guide_banner.png';
                   }
                }else {
                    const file = this.getGuideDetails.banner_preview;
                    return window.URL.createObjectURL(file);
                }
            }
            ,
            getStepInfo(){
                let curren_step = this.getCreateGuide.step;
                if(curren_step == 1){
                    return {
                        'heading': "Welcome. Let's get started",
                        'title': "Tell us a bit about your Campus guide."
                    }
                } else if(curren_step ==2){
                    return {
                        'heading': "Let's add some flavor",
                        'title': "Add imagery to your guide."
                    }
                } else if(curren_step ==3){
                    return {
                        'heading': "Where are you?",
                        'title': "add the location for your guide."
                    }
                } else if(curren_step ==4){
                    return {
                        'heading': "Privacy settings",
                        'title': "Set this guide’s privacy and select a passphrase."
                    }
                }
            },
            getGuideDetails(){
                return this.$store.getters.getGuideDetailsGetters;
            },
            is_next_active: function (){
               
                if(this.getGuideDetails.title){
                    return false;
                }else{
                    return true;
                }
            },
            /* Form data handled here */
            title: {
                get () {
                    return this.$store.state.create_guide.guide_details.title
                },
                set (value) {
                    this.$store.dispatch('updateTitle', value)
                }
            },
            description: {
                get () {
                    return this.$store.state.create_guide.guide_details.description
                },
                set (value) {
                    this.$store.dispatch('updateDescription', value)
                }
            },
            short_name: {
                get () {
                    return this.$store.state.create_guide.guide_details.short_name
                },
                set (value) {
                    this.$store.dispatch('updateShortName', value)
                }
            },
            has_event_date: {
                get () {
                    return this.$store.state.create_guide.guide_details.has_event_date
                },
                set (value) {
                    this.$store.dispatch('updateHasEventDates', value)
                }
            },
            event_from_date: {
                get () {
                    return this.$store.state.create_guide.guide_details.event_from_date
                },
                set (value) {
                    this.$store.dispatch('updateEventFromDate', value)
                }
            },
            event_to_date: {
                get () {
                    return this.$store.state.create_guide.guide_details.event_to_date
                },
                set (value) {
                    this.$store.dispatch('updateEventToDate', value)
                }
            },
            city: {
                get () {
                    return this.$store.state.create_guide.guide_details.city
                },
                set (value) {
                    this.$store.dispatch('updateCity', value)
                }
            },
            venue_name: {
                get () {
                    return this.$store.state.create_guide.guide_details.venue_name
                },
                set (value) {
                    this.$store.dispatch('updateVenueName', value)
                }
            },
            address: {
                get () {
                    return this.$store.state.create_guide.guide_details.address
                },
                set (value) {
                    this.$store.dispatch('updateAddress', value)
                }
            },
            street: {
                get () {
                    return this.$store.state.create_guide.guide_details.street
                },
                set (value) {
                    this.$store.dispatch('updateStreet', value)
                }
            },
            state: {
                get () {
                    return this.$store.state.create_guide.guide_details.state
                },
                set (value) {
                    this.$store.dispatch('updateState', value)
                }
            },
            country: {
                get () {
                    return this.$store.state.create_guide.guide_details.country
                },
                set (value) {
                    this.$store.dispatch('updateCountry', value)
                }
            },
            zip_code: {
                get () {
                    return this.$store.state.create_guide.guide_details.zip_code
                },
                set (value) {
                    this.$store.dispatch('updateZipCode', value)
                }
            },
            latitude: {
                get () {
                    return this.$store.state.create_guide.guide_details.lat
                },
                set (value) {
                    this.$store.dispatch('updateLatitude', value)
                }
            },
            longitude: {
                get () {
                    return this.$store.state.create_guide.guide_details.lng
                },
                set (value) {
                    this.$store.dispatch('updateLongitude', value)
                }
            },
            privacy_setting: {
                get () {
                    return this.$store.state.create_guide.guide_details.privacy_setting
                },
                set (value) {
                    this.$store.dispatch('updatePrivacySetting', value)
                }
            },
            pass_phrase: {
                get () {
                    return this.$store.state.create_guide.guide_details.pass_phrase
                },
                set (value) {
                    this.$store.dispatch('updatePassPhrase', value)
                }
            },
            sharing: {
                get () {
                    return this.$store.state.create_guide.guide_details.setting
                },
                set (value) {
                    this.$store.dispatch('updatePrivacySetting', value)
                }
            },
            // icon: function(){
            //         return this.$store.state.create_guide.guide_details.icon
            // },
            // banner: function() {
            //         return this.$store.state.create_guide.guide_details.banner
            // },

        },
        methods: {
            select_guide_detail_step: function (step) {
                let current_state = this.getCreateGuide
                let saveData = this.getGuideDetails;
                saveData.guide_template_id = current_state.template
                    //save details and update state
                    if(saveData.title!=''){
                        this.$store.dispatch('saveGuide', saveData)
                    }
                if(step==5){
                    //localStorage.removeItem('guide_data');
                    window.location.href = '/guides/build/'+saveData.id;
                }else{
                        this.$store.dispatch("createGuideStep", step);
                }
            },
            selectIcon: function(e){
                //let file = e.target.files[0];
                let file = this.$refs.icon.files[0];
                this.$store.dispatch('updateIcon', file)
            },
            selectBanner: function(e){
                //let file = e.target.files[0];
                let file = this.$refs.banner.files[0];
                this.$store.dispatch('updateBanner', file)
            },
            openFileSelection: function(id){
               document.getElementById(id).click();
            },
            /**
            * When the location found
            * @param {Object} addressData Data of the found location
            * @param {Object} placeResultData PlaceResult object
            * @param {String} id Input container ID
            */
            getToData: function (addressData, placeResultData, id) {
               
                let lat = addressData.latitude;
                let lng = addressData.longitude;
                let city  = addressData.locality
                this.$store.dispatch('updateLatitude', lat);
                this.$store.dispatch('updateLongitude', lng);
               this.$store.dispatch('updateCity', city);
                //let url = 'https://maps.googleapis.com/maps/api/timezone/json?location='+lat+','+lng+'&timestamp=1331766000&key='+this.GmapKey
                //this.$store.dispatch('getTimeZone', url);
            },
            getAddressData: function (addressData, placeResultData, id) {
               console.log(placeResultData);
                let lat = addressData.latitude;
                let lng = addressData.longitude;
                let city  = addressData.locality
                this.$store.dispatch('updateLatitude', lat);
                this.$store.dispatch('updateLongitude', lng);
                this.$store.dispatch('updateCity', city);
                //let url = 'https://maps.googleapis.com/maps/api/timezone/json?location='+lat+','+lng+'&timestamp=1331766000&key='+this.GmapKey
                //this.$store.dispatch('getTimeZone', url);
            },
            GmapKey: function(){
                return 'AIzaSyAddazTu6MeLaef_NguCtT7SC-f56q1Kus';
            }

        },

    };
  
</script>
