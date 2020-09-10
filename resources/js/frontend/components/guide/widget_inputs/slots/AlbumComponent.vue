<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="label" class="col-sm-3 col-form-label" >Label</label>
            <div class="col-sm-9 px-3">
                <input type="text" class="form-control" name="label" v-model="label" id="label" placeholder="Enter photo label">
            </div>
        </div> 
        <div class="form-group row mt-4">
            <label for="photo" class="col-sm-3 col-form-label">Photo</label>
            <div class="col-sm-9 px-3">
                <input type="file" class="form-control" name="photo" @change="setFile" ref="photo" id="" >                            
            </div>

        </div>              
    </div>

</template>

<script>
    export default {

        name: "Album",
    
        mounted() {
            this.$store.dispatch('updateAlbumsFieldWidgetId', this.widget_id)
             this.$store.dispatch('updateAlbumsFieldId',  this.field.id)
            
        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
                        /* Form data handled here */
            label: {
                get () {
                    return ""
                },
                set (value) {
                    this.$store.dispatch('updateAlbumFieldLabel', value)
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
