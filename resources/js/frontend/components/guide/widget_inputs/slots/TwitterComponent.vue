<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Hashtags</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" v-model="hashtags" id="name" placeholder="Add Hashtags...">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Tweets with this hashtag will appear in your guide. Don't include the '#' symbol.
                </small>                
            </div>
        </div>   
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Accounts</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" v-model="account"  placeholder="Add Account...">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Tweets from this account will appear in your guide. Don't include the '@' symbol.
                </small>                  
            </div>
        </div>           
    </div>

</template>

<script>
    export default {

        name: "Twitter",
    
        mounted() {

        },
        mounted() {
             this.$store.dispatch('updateTwitterFieldWidgetId', this.widget_id)
             this.$store.dispatch('updateTwitterFieldId',  this.field.id)
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
                    return this.$store.getters.getTwitterFieldValueGetters.hashtags
                },
                set (value) {
                    this.$store.dispatch('updateTwitterFieldHashtags', value)
                }
            },
            account: {
                get () {
                    return this.$store.getters.getTwitterFieldValueGetters.account
                },
                set (value) {
                    this.$store.dispatch('updateTwitterFieldAccount', value)
                }
            },            
        },

    };
  
</script>
