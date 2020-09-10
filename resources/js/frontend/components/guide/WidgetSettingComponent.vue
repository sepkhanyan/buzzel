<template>
 <div>
  
    <div class="col" style="margin-top: 70px;">
        <div class="row mt-4 px-4" v-show="getErrors!=''">
        <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" >
            {{getErrors}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
        <div class="row mt-4 px-4" v-show="getSuccess!=''">
        <div class="alert alert-success alert-dismissible fade show col-12" role="alert" >
            {{getSuccess}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>          
        <div class="col-12 text-right">
            <button class="btn float-right" title="close" v-on:click="closePanel">X</button>
        </div>
        <div class="col-12 mt-5">
            <div class="row">
                <div class="col-2">
                    <div class="icon_container">
                        <img :src="getIcon" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-10 text-left">
                    <h4>{{currentWidget.title}}</h4>
                    <p>{{currentWidget.description}}</p>
                </div>
            </div>
        </div>  
        <div class="col-12 mt-5">
            <b-tabs content-class="mt-3">
                <b-tab title="Details" active>
                        <widget-input-slot :widget="currentWidget"></widget-input-slot>
                </b-tab>
                <b-tab title="Setting">
                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9 px-3">
                                <input type="name" v-model="title" class="form-control" name="name" id="name" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-3 col-form-label">Icon</label>
                            <div class="col-sm-9 px-3">
                                <input type="file" @change="selectIcon" class="form-control" name="icon" ref="icon" id="" >
                                <small id="passwordHelpBlock" class="form-text text-danger" style="cursor: pointer;" v-on:click = "reset_file()" v-show="currentWidget.icon_preview!=''">
                                    <i class="fa fa-minus-circle" aria-hidden="true" ></i> Reset to Default

                                </small>                               
                            </div>
                        
                        </div>
                        <div class="form-group row">
                                <label for="event_dates" class="col-sm-3 col-form-label">Enabled</label>
                                <div class="col-sm-9 px-3">
                                    <div class="form-check">
                                        <input class="form-check-input" value="1" type="radio" v-model="enabled" name="enabled" checked>
                                        <label class="form-check-label" value="0" for="event_date_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="enabled" value="0" name="enabled" autocomplete="off">
                                        <label class="form-check-label" for="gridRadios2">
                                            No
                                        </label>
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        If not enabled, the menu item will be hidden but is not deleted.
                                    </small>
                                </div>
                        </div>    
                        <div class="form-group row">
                                <label for="event_dates" class="col-sm-3 col-form-label">Web Browser</label>
                                <div class="col-sm-9 px-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="web_browser" name="web_browser" value="1" >
                                        <label class="form-check-label" value="0" for="event_date_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="web_browser" name="web_browder" value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            No
                                        </label>
                                    </div>

                                </div>
                        </div>  
                        <div class="form-group row" v-show="currentWidget.web_browser==1">
                                <label for="event_dates" class="col-sm-3 col-form-label">Show Toolbar</label>
                                <div class="col-sm-9 px-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  v-model="show_toolbar" name="show_toolbar" value="1" >
                                        <label class="form-check-label" value="0" for="event_date_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="show_toolbar" name="show_toolbar" value="0" autocomplete="off">
                                        <label class="form-check-label" for="gridRadios2">
                                            No
                                        </label>                                      
                                    </div>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                        In case of browser
                                        </small>  
                                </div>
                        </div>                                      

                </b-tab>
            </b-tabs>

        </div>        
            <footer class="footer">
                <div class="col-12 border mt-5">
                    <a v-on:click="closePanel" class="btn btn-light float-left border mt-3">Close</a>
                    <a v-on:click="restoreDefault" class="btn btn-info float-left  mt-3 ml-1">Restore to Default</a>
                    <a class="btn btn-info float-right  mt-3" v-on:click="save_widget" :disabled='currentWidget.title==""'>Save</a>
                    <a v-on:click="removeWidget()" class="btn btn-danger float-right mt-3 mr-2 text-white"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                </div>
            </footer>       
    </div>
</div>
    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
    export default {

        name: "WidgetSetting",
        
        mounted() {
             //this.$store.dispatch("getWidgetFieldsFromDatabase", this.widget_id);
             this.makeCurrentWidget()
             this.$store.dispatch("loadError", '');
             this.$store.dispatch("loadSuccess", '');
        },
        data: () => ({
            current_tab: 'v-pills-home',
        }),
        props: ['widget_id', 'template_id', 'guide_id'],
        computed: {
            WidgetDetails(){ //final output from here
             let all_widgets = this.$store.getters.getWidgetFormGetters
             //return all_templates.length
            //  var result = [];

                     for(let value of all_widgets){
                         
                         if(value.id==this.widget_id){
                             return value
                         }
                             
                         
                     }
                     return {
                                 "title": "",
                                 "description": "",
                                 "thumb": ""
                             }

            //         return result? result[0] : null; // or undefined
                
            },
            widgetFieldDetails(){
                return this.$store.getters.getGuideDetailsGetters.widgets
            },
            isActive(tab_id){
                if(tab_id==this.current_tab){
                    return "Active"
                }else{
                    return "";
                }
            },
            fields(){
 
                return this.getWidgetByID()
                
            },
            currentWidget(){
                return this.$store.getters.getCurrentWidgetGetters
            },
            getIcon(){
                if(this.currentWidget.icon_preview==""){
                    if(this.currentWidget.icon!=""){
                        return this.currentWidget.icon;
                    }else{
                        return this.currentWidget.default_icon;
                    }
                }else{
                    const file = this.currentWidget.icon_preview;
                    return window.URL.createObjectURL(file);                    
                }
            },            
            /* Form data handled here */

            title: {
                get () {
                    return this.$store.state.data.current_widget.title
                },
                set (value) {
                    this.$store.dispatch('updateWidgetTitle', value)
                }
            },
            enabled: {
                get () {
                    return this.$store.state.data.current_widget.enabled
                },
                set (value) {
                    this.$store.dispatch('updateEnabledTitle', value)
                }
            },
            web_browser: {
                get () {
                    return this.$store.state.data.current_widget.web_browser
                },
                set (value) {
                    this.$store.dispatch('updateWebBrowserTitle', value)
                    if(value==0){
                        this.$store.dispatch('updateShowToolbarTitle', value)
                    }
                }
            },
            show_toolbar: {
                get () {
                    return this.$store.state.data.current_widget.show_toolbar
                },
                set (value) {
                    this.$store.dispatch('updateShowToolbarTitle', value)
                }
            },      
            getErrors(){ //final output from here
                return this.$store.getters.getGuideErrorsGetters
            },
            getSuccess(){ //final output from here
                return this.$store.getters.getGuideSuccessGetters
            },                                                      

        },
        methods: {
            closePanel: function () {
                this.$emit('closePanel', {});
            },
            restoreDefault: function () {
                this.$store.dispatch("restoreGuideWidget", this.currentWidget.id);
            },
            removeWidget: function () {
                if(confirm("All data related to this widget will be deleted. Are you sure?")){ console.log("delete this buddy");
                    this.$store.dispatch("removeWidgetToGuide", {"guide_id": this.guide_id, "widget_id": this.widget_id});
                    this.closePanel()
                }
            }
            ,
            getWidgetByID(){
                
                let obj = [];
                this.widgetFieldDetails.forEach(element => {
                    
                    if(element.widget_id == this.widget_id){
                       
                        element.fields.forEach(el => {
                          
                            if((el.type!=null || el.type!='') && typeof el.type!='object'){
                                el.type = JSON.parse(el.type);
                            }
                            obj.push(el);
                        })
                    }
                });
                return obj
            },
            makeCurrentWidget(){
                let obj = "";
                this.widgetFieldDetails.forEach(element => {
                    
                    if(element.widget_id == this.widget_id){
                        obj = element;
                    }
                });
                
                this.$store.dispatch("makeCurrentWidget", obj);
            },
            selectIcon: function(e){
                //let file = e.target.files[0];
                let file = this.$refs.icon.files[0];
                this.$store.dispatch('updateWidgetIcon', file)
            },
            reset_file(){
                this.$store.dispatch('updateWidgetIcon', "")
            },
            save_widget: function () {
                let saveData = this.currentWidget;
                //save details and update state
                if(saveData.title!=''){
                    this.$store.dispatch('updateGuideWidget', saveData)
                }
                let fieldValues = this.$store.getters.getUserFieldValueGetters
                    this.$store.dispatch('saveWidgetFieldValue', fieldValues)
                this.closePanel()
            },            
        },
            

    };
  
</script>
