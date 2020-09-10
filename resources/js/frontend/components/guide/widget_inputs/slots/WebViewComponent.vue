<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Url</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" v-model="url" name="url" id="url" placeholder="Enter Url">
            </div>
        </div>             
    </div>

</template>

<script>
    export default {

        name: "WebView",
    
        mounted() {
             this.$store.dispatch('updateWebviewFieldWidgetId', this.widget_id)
             this.$store.dispatch('updateWebviewFieldId', this.field.id)
             this.$store.dispatch('getUserWidgetFieldValue', {'widget_id': this.widget_id, 'field_id': this.field.id})
        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
            /* Form data handled here */
            url: {
                get () {
                    return this.$store.getters.getWebviewFieldValueGetters.url
                },
                set (value) {
                    this.$store.dispatch('updateWebviewFieldValue', value)
                }
            },            
        },

    };
  
</script>
