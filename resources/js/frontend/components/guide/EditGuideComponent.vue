<template>
 
<div class="col" style="margin-top: 70px;">
    <div class="col-12 text-right">
        <button class="btn float-right" title="close" v-on:click="closePanel">X</button>
    </div>
    <div class="col-12 mt-5">
        <h3>Guide Details</h3>
    </div>  
    <div class="col-12 mt-5">
        <b-tabs content-class="mt-3">
            <b-tab title="Basics" active>
                    <div class="form-group row mt-4">
                        <label for="name" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="title" id="title" v-model="title" placeholder="Enter Guide Name">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9 px-3">
                                <textarea class="form-control" id="description" name="description" rows="3" v-model="description" placeholder="A brief paragraph to describe your guide."></textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="short_name" class="col-sm-3 col-form-label">Short Name</label>
                            <div class="col-sm-9 px-3">
                                <input type="short_name" class="form-control" name="short_name" id="short_name" v-model="short_name" placeholder="Enter short Name">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    The short name is used to construct the URL where people view your guide, ex: https://buzzel.com.au/g/hp0onttdapbvzyy
                                </small>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="event_dates" class="col-sm-3 col-form-label"><i class="fa fa-question-circle" aria-hidden="true"></i> Event Dates</label>
                            <div class="col-sm-9 px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="has_event_date" id="event_date_yes" v-model="has_event_date" value="1" >
                                    <label class="form-check-label" for="event_date_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="has_event_date" id="gridRadios2" v-model="has_event_date" value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        No
                                    </label>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    You can not change it after published
                                </small>
                            </div>
                    </div>
                    <div class="form-group row"  v-show="guide.has_event_date==1">
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
                       
            </b-tab>
            <b-tab title="Branding">
                    <p class="img-top-text mt-3 text-center text-muted">Add a custom icon and cover image to add some flavor to your guide.</p>
                    <div class="card">
                        <i class="fa fa-pencil-square banner_edit" @click="openFileSelection('banner')" aria-hidden="true"></i>
                        <i class="fa fa-pencil-square icon_edit" @click="openFileSelection('icon')" aria-hidden="true"></i>
                        <img class="card-img-top img-thumbnail template_icon" :src="getIcon" alt="Card image cap">
                        <img class="card-img-top img-thumbnail template_banner" :src="getBanner" alt="Card image cap">
                        <input type="file" @change="selectIcon" id="icon" ref="icon" name="icon" class="d-none">
                        <input type="file" @change="selectBanner" id="banner" ref="banner" name="banner" class="d-none">
                    </div>
                    <div class="col text-center border mt-5">
                            <p class="mt-2"><b>Cover image:</b> 1440 px wide by 720 px tall</p>
                             <p class="mb-2"><b>Icon:</b> 232 px wide by 192 px tall</p>
                    </div>            

            </b-tab>
            <b-tab title="Location">
                
                    <div class="form-group row mt-4">
                        <label for="venue_name" class="col-sm-3 col-form-label">Venue Name</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="venue_name" id="venue_name" v-model="venue_name" placeholder="Enter Venue Name">
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
                            <input type="text" class="form-control" name="street" id="street" v-model="street" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group row mt-4">
                        <label for="city" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="city" id="city" v-model="city" placeholder="">
                        </div>
                    </div>   
                    <div class="form-group row mt-4">
                        <label for="state" class="col-sm-3 col-form-label">State</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="state" v-model="state" id="state" placeholder="">
                        </div>
                    </div>                                                                
                    <div class="form-group row mt-4">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="country" v-model="country" id="country" placeholder="">
                        </div>
                    </div>                                      
                    <div class="form-group row mt-4">
                        <label for="zipcode" class="col-sm-3 col-form-label">Zipcode</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="zipcode" v-model="zip_code" id="zipcode" placeholder="">
                        </div>
                    </div>                      
                    <div class="form-group row mt-4">
                        <label for="latitude" class="col-sm-3 col-form-label">Latitude</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="latitude" v-model="latitude" id="latitude" placeholder="">
                        </div>
                    </div>                      
                    <div class="form-group row mt-4">
                        <label for="longitude" class="col-sm-3 col-form-label">Longitude</label>
                        <div class="col-sm-9 px-3">
                            <input type="text" class="form-control" name="longitude" v-model="longitude" id="longitude" placeholder="">
                        </div>
                    </div>                  
            </b-tab>
            <b-tab title="Privacy">
                    <label for="longitude" class="col-sm-3 col-form-label mt-3">Privacy Setting</label>
                    <div class="btn-group btn-group-toggle col-sm-9" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Public
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Passphrase
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Invite-only
                        </label>
                      
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                        Your guide will show up in search results and anyone can download it.
                    </small>  
                    <label for="longitude" class="col-sm-3 col-form-label">Sharing</label>
                    <div class="btn-group btn-group-toggle col-sm-9" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="sharing" id="sharing" autocomplete="off" v-model="privacy_setting"> Yes
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="sharing" id="sharing" autocomplete="off" v-model="privacy_setting"> No
                        </label>
                      
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted ml-3">
                       Sharing lets your attendees share your guide via Twitter, Facebook, email, or messaging!
                    </small>  
                 

            </b-tab>  
            <b-tab title="Quick Info">
                Quick Info section here

            </b-tab>          
        </b-tabs>

    </div>        
        <footer class="footer">
            <div class="col-12 border mt-5">
                <a v-on:click="closePanel" class="btn btn-light float-left border mt-3">Close</a>
                <a v-on:click="save_guide_details" class="btn btn-info float-right  mt-3 " :disabled='is_next_active'>Save</a>
            </div>
        </footer>       
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

        name: "EditGuide",
        components: {gmapApi,  VueGoogleAutocomplete },
        mounted() {
            this.$store.dispatch("getGuideFromDatabase", this.guide_id);
            //console.log(this.guide_id);
        },
        props: ['guide_id'],
        computed: {
            guide(){
                return this.$store.getters.getGuideDetailsGetters
            } ,
            getCreateGuide(){ //final output from here
                return this.$store.getters.getCreateGuideGetters
            },  
            is_next_active: function (){
               
                if(this.guide.title){
                    return false;
                }else{
                    return true;
                }
            }, 
            getIcon(){
               if(this.guide.icon_preview==''){
                   if(this.guide.icon!=''){
                       return this.guide.icon
                   }else{
                    return '/images/placeholder/guide_icon.png';
                   }
                }else {
                    const file = this.guide.icon_preview;
                    return window.URL.createObjectURL(file);
                }
            },
            getBanner(){
               if(this.guide.banner_preview==''){
                   if(this.guide.banner!=''){
                       return this.guide.banner
                   }else{
                    return '/images/placeholder/guide_banner.png';
                   }
                }else {
                    const file = this.guide.banner_preview;
                    return window.URL.createObjectURL(file);
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
        },
        methods: {
            closePanel: function () {
                this.$emit('closePanel', {});
            },
            save_guide_details: function () {
                let saveData = this.guide;
                //save details and update state
                if(saveData.title!=''){
                    this.$store.dispatch('saveGuide', saveData)
                    this.$emit('closePanel', {});
                }
            },
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
            },    
            selectIcon: function(e){
                console.log(e.target);
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
               // console.log(this.$refs.id);
              document.getElementById(id).click();
            },                               
        }
            

    };
  
</script>
