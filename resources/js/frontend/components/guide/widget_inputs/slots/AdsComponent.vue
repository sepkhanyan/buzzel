<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="label" class="col-sm-3 col-form-label" >link</label>
            <div class="col-sm-9 px-3">
                <input type="text" class="form-control" name="label" v-model="link" id="label" placeholder="Enter url">
            </div>
        </div> 
        <div class="form-group row mt-4">
            <label for="photo" class="col-sm-3 col-form-label">Banner</label>
            <div class="col-sm-9 px-3">
                <input type="file" class="form-control" name="photo" @change="setFile" ref="photo" id="" >                            
            </div>

        </div>              
    </div>

</template>

<script>
    export default {

        name: "Ads",
    
        mounted() {
            this.$store.dispatch('updateAdsFieldWidgetId', this.widget_id)
            this.$store.dispatch('updateAdsFieldId',  this.field.id)
        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
            /* Form data handled here */
            link: {
                get () {
                    return ""
                },
                set (value) {
                    this.$store.dispatch('updateAdsFieldUrl', value)
                }
            },

        },
        methods: {
            setFile:  function(e){
                //let file = e.target.files[0];
                let file = this.$refs.icon.files[0];
                //this.$store.dispatch('updateWidgetIcon', file)
            },
        },

    };
  
</script>
