<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Hashtags</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" id="name" v-model="hashtags" placeholder="Add hashtags...">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Instagram posts with this hashtag will appear in your guide. Don't include the '#' symbol.
                </small>                
            </div>
        </div>   
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Accounts</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" v-model="account"  placeholder="Add Accounts...">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Instagram posts from this account will appear in your guide. Don't include the '@' symbol.
                </small>                  
            </div>
        </div>           
    </div>

</template>

<script>
    export default {

        name: "Instagram",
    
        mounted() {
             this.$store.dispatch('updateInstagramFieldWidgetId', this.widget_id)
             this.$store.dispatch('updateInstagramFieldId', this.field.id)
             this.$store.dispatch('getUserWidgetFieldValue', {'widget_id': this.widget_id, 'field_id': this.field.id})
        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
            /* Form data handled here */
            hashtags: {
                get () {
                    return this.$store.getters.getInstagramFieldValueGetters.hashtags
                },
                set (value) {
                    this.$store.dispatch('updateInstagramFieldHashtags', value)
                }
            },
            account: {
                get () {
                    return this.$store.getters.getInstagramFieldValueGetters.account
                },
                set (value) {
                    this.$store.dispatch('updateInstagramFieldAccount', value)
                }
            },            
        },

    };
  
</script>
