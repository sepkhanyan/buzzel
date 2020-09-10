<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Location</label>
            <div class="col-sm-9 px-3">
                        <vue-google-autocomplete
                                
                                id="map"
                                classname="form-control"
                                placeholder="Please type venue location"
                                
                                v-on:placechanged="getToData"
                                types="(cities)"
                            >
                        </vue-google-autocomplete>               
                <GmapMap
                    :center="{lat:52.098823, lng:-4.549537}"
                    :zoom="7"
                    map-type-id="terrain"
                    style="width: 100%; height: 250px"
                        ref="mapRef"
                    >


                </GmapMap>
            </div>
        </div>   
    </div>

</template>

<script>
  import VueGoogleAutocomplete from 'vue-google-autocomplete'
  import {gmapApi} from 'vue2-google-maps'
    export default {

        name: "Venue",
        components: {gmapApi,  VueGoogleAutocomplete },
        mounted() {

        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
        },
        methods:{
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
        }

    };
  
</script>
