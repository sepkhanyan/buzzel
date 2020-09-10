<template>
 
    <div>
        <div v-for="(field, index) in fields" :key="index"> 
            <slot-facebook :field="field" :widget_id="widget.id" v-if="field.type=='facebook'"></slot-facebook>
            <slot-twitter :field="field" :widget_id="widget.id" v-if="field.type=='twitter'"></slot-twitter>
            <slot-instagram :field="field" :widget_id="widget.id" v-if="field.type=='instagram'"></slot-instagram>
            <slot-youtube :field="field" :widget_id="widget.id" v-if="field.type=='youtube'"></slot-youtube>
            <slot-vimeo :field="field" :widget_id="widget.id" v-if="field.type=='vimeo'"></slot-vimeo>
            <slot-album :field="field" :widget_id="widget.id" v-if="field.type=='album'"></slot-album>
            <slot-map :field="field" :widget_id="widget.id" v-if="field.type=='map'"></slot-map>
            <slot-view :field="field" :widget_id="widget.id" v-if="field.type=='view'"></slot-view>
            <slot-webview :field="field" :widget_id="widget.id" v-if="field.type=='webview'"></slot-webview>
            <slot-list :field="field" :widget_id="widget.id" v-if="field.type=='list'"></slot-list>
            <slot-venue :field="field" :widget_id="widget.id" v-if="field.type=='venue'"></slot-venue>
            <slot-ads :field="field" :widget_id="widget.id" v-if="field.type=='ads'"></slot-ads>
            <slot-qrcode :field="field" :widget_id="widget.id" v-if="field.type=='qrcode'"></slot-qrcode>
            <slot-todo :field="field" :widget_id="widget.id" v-if="field.type=='todo'"></slot-todo>
            <slot-notes :field="field" :widget_id="widget.id" v-if="field.type=='notes'"></slot-notes>
            <slot-myschedule :field="field" :widget_id="widget.id" v-if="field.type=='myschedule'"></slot-myschedule>
            <slot-inbox :field="field" :widget_id="widget.id" v-if="field.type=='inbox'"></slot-inbox>
        </div>         
    </div>

</template>

<script>
    export default {

        name: "SlotWidget",
    
        mounted() {
            console.log(this.widget.id);

        },
        props: ['widget'],
        computed: {
            fields(){
                return this.widget.fields
            },

            
        },
        methods: {

        },
        

    };
  
</script>
