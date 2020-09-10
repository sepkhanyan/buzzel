<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="longitude" class="col-sm-3 col-form-label">Enabled</label>
            <div class="btn-group btn-group-toggle col-sm-9" data-toggle="buttons">
                <label>
                    <input type="radio" name="enabled" autocomplete="off" v-model="enabled" value="1"> Yes
                </label>
                <label>
                    <input type="radio" name="enabled" autocomplete="off" v-model="enabled" value="0"> No
                </label>
                
            </div>
        </div>             
    </div>

</template>

<script>
    export default {

        name: "Notes",
    
        mounted() {
            this.$store.dispatch('updateNotesFieldWidgetId', this.widget_id)
            this.$store.dispatch('updateNotesFieldWidgetId',  this.field.id)
            this.$store.dispatch('getUserWidgetFieldValue', {'widget_id': this.widget_id, 'field_id': this.field.id})
        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
            /* Form data handled here */
            enabled: {
                get () {
                    return this.$store.getters.getNotesFieldValueGetters.enabled
                },
                set (value) {
                    this.$store.dispatch('updateNotesField', value)
                }
            },

        },
        methods: {

        },

    };
  
</script>
