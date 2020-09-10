<template>

    <div>
        <div class="form-group row mt-4">
            <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
            <div class="col-sm-9 px-3">
                hello
            </div>
        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "QRCode",
        mounted() {
            this.updateFacebookFieldWidgetId(this.widget_id)
            this.updateFacebookFieldId(this.field.id)
            this.getUserWidgetFieldValue({'widget_id': this.widget_id, 'field_id': this.field.id})
        },
        props: ['field', 'widget_id'],
        computed: {
            ...mapGetters('guide', {
                facebookData: 'facebookData'
            }),
            getInputFields() {
                let type = this.widget.type
                return this.widget.type
            },
            /* Form data handled here */
            url: {
                get() {
                    return this.facebookData.url
                },
                set(value) {
                    this.updateFacebookFieldValue(value)
                }
            },
        },
        methods: {
            ...mapActions('guide', {
                updateFacebookFieldWidgetId: 'updateFacebookFieldWidgetId',
                updateFacebookFieldId: 'updateFacebookFieldId',
                getUserWidgetFieldValue: 'getUserWidgetFieldValue',
                updateFacebookFieldValue: 'updateFacebookFieldValue'
            })
        }
    };
</script>
