<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Facebook</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" id="name" v-model="url" placeholder="Enter facebook url">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Facebook from this account will appear in your guide. Don't include the '@' symbol.
                </small>  
            </div>
        </div>   
    </div>

</template>

<script>
    export default {

        name: "Facebook",
    
        mounted() {
             this.$store.dispatch('updateFacebookFieldWidgetId', this.widget_id)
             this.$store.dispatch('updateFacebookFieldId', this.field.id)
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
                    return this.$store.getters.getFacebookFieldValueGetters.url
                },
                set (value) {
                    this.$store.dispatch('updateFacebookFieldValue', value)
                }
            },
        },

    };
  
</script>
