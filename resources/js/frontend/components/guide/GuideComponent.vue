<template>
<div>
        <!-- Main Content  -->
    <div class="leftContentWidthSDB">
        <div class="iphoneDisplay">
            <div class="deviceScrn">
                <div class="bg">
                    <div class="main_wrap">
                        <div class="burger-menu">
                            <Slide>
                                <div class="guide_info" v-on:click="openLink('')">
                                    <img class="card-img-top img-round img-thumbnail" :src="getIcon" alt="icon">        
                                    <h3>{{guide.title}}</h3>
                                </div>
                                <div class="sideNavRow item" :id="'side-item-sm-' + index" v-for="(item, index) in guide.widgets" :key="item.id" v-on:click="openLink(item)">
                                    <span class="navIcons">
                                        <img :src="getWidgetIcon(item)" alt="">
                                    </span>

                                    <p>{{ item.title }}</p>
                                </div>
                            </Slide>
                        </div>
                        <div class="card mx-1 text-center" v-if="showMain">
                            <img class="card-img-top img-round img-thumbnail template_icon" :src="getIcon" alt="icon">
                            <img class="card-img-top img-round img-thumbnail template_banner" :src="getBanner" alt="banner">
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold mt-1">{{guide.title}}</h5>
                            </div>
                            <div >
                                <GmapMap
                                    :center="{lat:52.098823, lng:-4.549537}"
                                    :zoom="7"
                                    map-type-id="terrain"
                                    style="width: 360px; height: 180px"
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
                            <!-- <img src="/images/google@2x.png"> -->
                        </div>
                        <div class="card mx-1 text-center" v-if="showWebView">
                            <iframe :src="showDetails" width="100%" height="650"></iframe>
                        </div>
                        <div class="card mx-1 text-center" v-if="showFacebook">
                            <iframe :src="viewFacebook" width="100%" height="650"></iframe>
                        </div> 
                        <div class="card mx-1 text-center" v-if="showTwitter">
                            <iframe :src="viewTwitter" width="100%" height="650"></iframe>
                        </div>                        
                        <div class="card mx-1 text-center" v-if="showInstagram">
                            <iframe :src="viewInstagram" width="100%" height="650"></iframe>
                        </div>                         
                        <div class="card mx-1 text-center" v-if="showYoutube">
                            <iframe :src="viewYoutube" width="100%" height="650"></iframe>
                        </div>      
                        <div class="card mx-1 text-center" v-if="showVimeo">
                            <iframe :src="viewVimeo" width="100%" height="650"></iframe>
                        </div>                                                                    
                        <div class="card mx-1 text-center" v-if="showQRCode" style="padding-top: 100px; height:600px;">
                            <h3>QR code will be used in mobile app</h3>
                        </div>
                        <div class="card mx-1 text-center" v-if="showNotes" style="padding-top: 100px; height:600px;">
                            <h3>Notes will be used in mobile app</h3>
                        </div>       
                        <div class="card mx-1 text-center" v-if="showToDo" style="padding-top: 100px; height:600px;">
                            <h3>ToDO code will be used in mobile app</h3>
                        </div>                                         
                        <div class="card mx-1 text-center" v-if="showInbox" style="padding-top: 100px; height:600px;">
                            <h3>Inbox code will be used in mobile app</h3>
                        </div>                        
                        <div class="card mx-1 text-center" v-if="showMySchedule" style="padding-top: 100px; height:600px;">
                            <h3>My Schedule will be used in mobile app</h3>
                        </div> 
                        <div class="card mx-1 text-center" v-if="showSponsor" style="padding-top: 100px; height:600px;">
                            <h3>Sponsor ads will be used in mobile app</h3>
                        </div>
                        <div class="card mx-1 text-center" v-if="showVenue" style="padding-top: 100px; height:600px;">                        
                            <GmapMap
                                :center="{lat:52.098823, lng:-4.549537}"
                                :zoom="7"
                                map-type-id="terrain"
                                style="width: 100%; height: 250px"
                                    ref="mapRef"
                                >
                            </GmapMap>                                                                       
                        </div>
                        <div class="card mx-1 text-center" v-if="showSocial" style="padding-top: 100px; height:600px;">
                            <h3>Social will be used in mobile app</h3>
                        </div>
                        <div class="card mx-1 text-center" v-if="showPhotoAlbum" style="padding-top: 100px; height:600px;">
                            <h3>Photo Album will be used in mobile app</h3>
                        </div> 
                        <div class="card mx-1 text-center" v-if="showGoogleMap" style="padding-top: 100px; height:600px;">
                            <GmapMap
                                :center="{lat:52.098823, lng:-4.549537}"
                                :zoom="7"
                                map-type-id="terrain"
                                style="width: 100%; height: 250px"
                                    ref="mapRef"
                                >
                            </GmapMap>  
                        </div>
                        <div class="card mx-1 text-center" v-if="showView" style="padding-top: 100px; height:600px;">
                            <h3>View will be used in mobile app</h3>
                        </div>
                        <div class="card mx-1 text-center" v-if="showCustomList" style="padding-top: 100px; height:600px;">
                            <h3>Custom List will be used in mobile app</h3>
                        </div> 
                        <div class="card mx-1 text-center" v-if="showFolder" style="padding-top: 100px; height:600px;">
                            <h3>Folder will be used in mobile app</h3>
                        </div> 
                        <div class="card mx-1 text-center" v-if="showSessions" style="padding-top: 100px; height:600px;">
                            <h3>Sessions will be used in mobile app</h3>
                        </div>                                                                                                                                                                               
                    </div>                    
                    
                </div>
               
            </div>
            <i class="deviceTopBar"></i>
            <i class="deviceBtmCircle"></i>
        </div>
    </div>
    <!-- Main Content  -->
    <div class="sidebarWrapper">
        <div class="sidebarHead">
            <a href = "/dashboard" class="backPage" ><i class="fa fa-angle-left"></i> <span>Back to Dashboard</span></a>
            <div class="adWidget">
                <a v-on:click="addWidget(guide_id)" style="cursor: pointer"><i class="fa fa-plus"></i><span class="text-white">Add widgets to your guide</span></a>
            </div>
        </div>


        <muuri-grid id="example-grid" class="sideNavGroup grid" v-if="guide.widgets && guide.widgets.length">
            <div class="sideNavRow item" v-on:click="widgetSetting(getCreateGuide.template, item.widget_id)" :id="'item-sm-' + index" v-for="(item, index) in guide.widgets" :key="item.id">
                <span class="navIcons">
                    <img :src="getWidgetIcon(item)" alt="">
                </span>

                <p>{{ item.title }}</p>
            </div>
        </muuri-grid>


        <div class="sideNavMoreLinks">
            <a v-on:click="editGuide(guide.id)" class="sdnavLink" href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i><span>Edit guide details</span></a>
            <a v-on:click="previewGuide(guide.id)" class="sdnavLink" href="javascript:void(0);"><i class="fa fa-mobile"></i><span>Preview on your device</span></a>
        </div>

        <slideout-panel></slideout-panel>
    </div>
    <!-- SideBar -->


    <!-- Modal -->
</div>
</template>

<script>
import { Slide } from 'vue-burger-menu'
import {gmapApi} from 'vue2-google-maps'
    export default {

        name: "List",
        
        mounted() {
            this.$store.dispatch("allWidgetsFromDatabase");
            this.$store.dispatch("getGuideFromDatabase", this.guide_id);

                this.$refs.mapRef.$mapPromise.then((map) => {
                map.panTo({lat: parseInt(this.guide.lat), lng: parseInt(this.guide.lng)})
                })
        },
        props: ['guide_id'],
        components: {
            Slide // Register your component
        },
        computed: {
            getAllWidget(){ //final output from here
                return this.$store.getters.getWidgetFormGetters
            },
            template_title(){ //final output from here
                return this.$store.getters.getCreateGuideGetters.guide_details.title
            },
            template(){ //final output from here
                return this.$store.getters.getTemplateGetters
            },
            getLoading(){ //final output from here
                return this.$store.getters.getLoadingGetters
            },
            getCreateGuide(){ //final output from here
                return this.$store.getters.getCreateGuideGetters
            }, 
            getMenuItem(){
                return "Home";
            },
            guide(){
                return this.$store.getters.getGuideDetailsGetters
            } ,
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
             google: gmapApi ,
             markers(){
              return   [
                {
                    position: {
                        lat: 52.098823,
                        lng: -4.549537
                    },
                    infoText: 'Marker 1'
                },
                {
                    position: {
                        lat: 52.111571,
                        lng: -4.570579
                    },
                    infoText: 'Marker 2'
                }
            ]
            },
            showDetails(){
                
                let web = this.$store.getters.getWebviewFieldValueGetters
                console.log(web.url);
                if(web.url!=''){
                    //let url="http://www.sunitpanwar.com/"
                    let url = web.url
                    //this.$store.dispatch("getwebview", url);
                    //return (this.$store.getters.getWebUrlResponse)
                    return "/api/open_website?url="+encodeURIComponent(url)
                }else{
                    return "";
                }
                
            }, 
            viewFacebook(){
                
                let web = this.$store.getters.getFacebookFieldValueGetters
                console.log(web.url);
                if(web.url!=''){
                    //let url="http://www.sunitpanwar.com/"
                    let url = web.url
                    //this.$store.dispatch("getwebview", url);
                    //return (this.$store.getters.getWebUrlResponse)
                    return "/api/open_website?url="+encodeURIComponent(url)
                }else{
                    return "";
                }
                
            }, 
            viewTwitter(){
                
                let web = this.$store.getters.getTwitterFieldValueGetters
                console.log(web.url);
                if(web.url!=''){
                    //let url="http://www.sunitpanwar.com/"
                    let url = web.hashtags
                    //this.$store.dispatch("getwebview", url);
                    //return (this.$store.getters.getWebUrlResponse)
                    return "/api/open_website?url="+encodeURIComponent(url)
                }else{
                    return "";
                }
                
            }, 
            viewInstagram(){
                
                let web = this.$store.getters.getInstagramFieldValueGetters
                console.log(web.url);
                if(web.url!=''){
                    //let url="http://www.sunitpanwar.com/"
                    let url = web.hashtags
                    //this.$store.dispatch("getwebview", url);
                    //return (this.$store.getters.getWebUrlResponse)
                    return "/api/open_website?url="+encodeURIComponent(url)
                }else{
                    return "";
                }
                
            }, 
            viewYoutube(){
                
                let web = this.$store.getters.getYoutubeFieldValueGetters
                console.log(web.url);
                if(web.url!=''){
                    //let url="http://www.sunitpanwar.com/"
                    let url = web.url
                    //this.$store.dispatch("getwebview", url);
                    //return (this.$store.getters.getWebUrlResponse)
                    return "/api/open_website?url="+encodeURIComponent(url)
                }else{
                    return "";
                }
                
            },
            viewVimeo(){
                
                let web = this.$store.getters.getVimeoFieldValueGetters
                console.log(web.url);
                if(web.url!=''){
                    //let url="http://www.sunitpanwar.com/"
                    let url = web.url
                    //this.$store.dispatch("getwebview", url);
                    //return (this.$store.getters.getWebUrlResponse)
                    return "/api/open_website?url="+encodeURIComponent(url)
                }else{
                    return "";
                }
                
            },                                                                  
            showWebView(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Web View"){
                    return true
                }else{
                    return false
                }
            },
            showQRCode(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="QR Code"){
                    return true
                }else{
                    return false
                }
            }, 
            showNotes(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Notes"){
                    return true
                }else{
                    return false
                }
            }, 
            showToDo(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="TODO"){
                    return true
                }else{
                    return false
                }
            },   
            showInbox(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Inbox"){
                    return true
                }else{
                    return false
                }
            }, 
            showMySchedule(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="My Schedule"){
                    return true
                }else{
                    return false
                }
            }, 
            showSponsor(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Sponsor Ads"){
                    return true
                }else{
                    return false
                }
            },
            showVenue(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Venue Map"){
                    return true
                }else{
                    return false
                }
            },
            showSocial(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Social"){
                    return true
                }else{
                    return false
                }
            },
            showFacebook(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Facebook"){
                    return true
                }else{
                    return false
                }
            }, 
            showInstagram(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Instagram"){
                    return true
                }else{
                    return false
                }
            }, 
            showYoutube(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Youtube"){
                    return true
                }else{
                    return false
                }
            },
            showTwitter(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Twitter"){
                    return true
                }else{
                    return false
                }
            },
            showVimeo(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Vimeo"){
                    return true
                }else{
                    return false
                }
            },                                                                
            showPhotoAlbum(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Photo Album"){
                    return true
                }else{
                    return false
                }
            },
            showGoogleMap(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Google Map"){
                    return true
                }else{
                    return false
                }
            }, 
            showView(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="View"){
                    return true
                }else{
                    return false
                }
            },
            showCustomList(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Custom List"){
                    return true
                }else{
                    return false
                }
            }, 
            showFolder(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Folder"){
                    return true
                }else{
                    return false
                }
            }, 
            showSessions(){
                let openside = this.$store.getters.getOpenSideResponse
                console.log(openside);
                if(openside=="Sessions"){
                    return true
                }else{
                    return false
                }
            },                                                                                                                                                                              
            showMain(){
                let openside = this.$store.getters.getOpenSideResponse
                if(openside==""){
                    return true
                }else{
                    return false
                }
            },
            widgetFieldDetails(){
                return this.$store.getters.getGuideDetailsGetters.widgets
            },                 
        },
        methods: {
            widgetSetting(template_id, widget_id) {
                const panel1Handle = this.$showPanel({
                openOn: 'right',
                component : 'widget-setting',
                props: {
                    template_id,
                    widget_id,
                    'guide_id': this.guide_id,
                    
                }
                })

                panel1Handle.promise
                .then(result => {
                    this.$store.dispatch("allWidgetsFromDatabase");
                    this.$store.dispatch("getGuideFromDatabase", this.guide_id);                    
                });
            },
            editGuide(guide_id) {
                const panel2Handle = this.$showPanel({
                openOn: 'right',
                component : 'edit-guide-details',
                props: {
                    guide_id
                }
                })

                panel2Handle.promise
                .then(result => {

                });
            }, 
            previewGuide(guide_id) {
                const panel3Handle = this.$showPanel({
                openOn: 'bottom',
                component : 'device-preview-code',
                props: {
                    guide_id
                }
                })

                pane31Handle.promise
                .then(result => {

                });
            }, 
            addWidget(guide_id) {
                const panel4Handle = this.$showPanel({
                openOn: 'right',
                width: 1000,
                component : 'add-widget-component',
                props: {
                    guide_id,
                    widgets: this.guide.widgets
                }
                })

                panel4Handle.promise
                .then(result => {

                });
            }, 
            getWidgetIcon(widget){
                if(widget.icon!=''){
                    return widget.icon
                }else{
                    return widget.default_icon
                }
            },
            openLink(widget){
                
                //console.log(widget);
                if(widget!=''){
                    this.makeCurrentWidget(widget)
                }else{
                    this.$store.dispatch("showSide", "");
                }
                
            },
            makeCurrentWidget(widget){
                //console.log(widget.id);
                //console.log(this.widgetFieldDetails);
                // let obj = "";
                // this.widgetFieldDetails.forEach(element => {
                    
                //     if(element.widget_id == widget.id){
                //         obj = element;
                //     }
                // });
                //console.log(obj);
                //console.log(widget.fields[0])
                //this.$store.dispatch("makeCurrentWidget", widget);
                if(typeof widget.fields[0]!='undefined'){
                    this.$store.dispatch('getUserWidgetFieldValue', {'widget_id': widget.id, 'field_id': widget.fields[0].id})
                }
                this.$store.dispatch("showSide", widget.title);
                
            },
                                               
        },

    };
    // import { ItemLink, ItemSm, ItemMd, ItemLg } from 'vue-muuri';
    // import { BModal } from 'bootstrap-vue';
    // import { ValidationProvider } from 'vee-validate';
    // import GeneralInfoComponent from './GeneralInfoComponent'
    // import ScheduleComponent from './ScheduleComponent'
    // import SpeakersComponent from './SpeakersComponent'

    // export default {

    //     components : {
    //         ItemLink, ItemSm, ItemMd, ItemLg,ValidationProvider,
    //         GeneralInfoComponent,
    //         ScheduleComponent,
    //         SpeakersComponent,
    //         'b-model' : BModal
    //     },

    //     data () {
    //      return {
    //          widgets : [],
    //          template : '',
    //          template_title : '',
    //          loading : false
    //      }
    //     },

    //     mounted() {
    //         console.log('Component mounted.')
    //     },

    //     methods : {
    //         showModal(type) {

    //             // can fire the axios request and assign to template type Or
    //             // switch case for all the widgets
    //             this.template = type;
    //             this.template_title = type;
    //             this.$refs['general_info'].show();
    //         },
    //         hideModal() {
    //             this.$refs['general_info'].hide();
    //         },
    //         fetchGuideModule () {


    //             axios.get('/get-guide-widget').then((response) => {
    //                 this.widgets = response.data.widgets;
    //             });
    //         }

    //     },created () {
    //         // fetch the data when the view is created and the data is
    //         // already being observed
    //         this.fetchGuideModule();

    //     },
    // }
</script>
