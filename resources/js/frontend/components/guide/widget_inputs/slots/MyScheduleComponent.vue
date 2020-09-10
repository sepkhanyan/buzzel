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

        name: "Myschedule",
    
        mounted() {
            this.$store.dispatch('updateMyscheduleFieldWidgetId', this.widget_id)
            this.$store.dispatch('updateMyscheduleFieldWidgetId',  this.field.id)
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
                    return this.$store.getters.getMyscheduleFieldValueGetters.enabled
                },
                set (value) {
                    this.$store.dispatch('updateMyscheduleField', value)
                }
            },

        },
        methods: {

        },

    };
  
</script>
