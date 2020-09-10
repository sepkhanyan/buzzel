<template>
<div>
    <div class="row mt-4 px-4" v-show="getErrors!=''">
    <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" >
        {{getErrors}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    </div>    
    <div class="col" style="margin-top: 70px;">
        <div class="col-12 text-right">
            <button class="btn float-left" title="close" v-on:click="closePanel">X</button>
        </div>
        <div class="col-12 text-center border" style="margin-top:40px;">
            <h3>Widgets</h3>
            <p class="text-secondary">Add new widget to your guide</p>
        </div>
        <div class="col-12 mt-5 border">
            <ul class="icon_list">
                <li :id="'item-sm-' + index" v-for="(item, index) in getFinalWidgets" :key="item.id">
                    <div class="icon-body" >
                        <div class="img-container">
                            <img class="card-img-top img-round img-thumbnail" :src="item.thumb" alt="icon">
                        </div>
                        <div class="icon-info text-center">
                            <h5>{{ item.title }}</h5>
                            <p>{{ item.description }}</p>
                        </div>
                        <div class="icon-add">
                            <a v-on:click="addWidget(item.id)" class="btn btn-info card-link border col" style="color: #fff"> ADD</a>
                        </div>
                    </div>
                </li>        
            </ul>
        </div>  
            
    </div>
</div>
</template>

<script>
    export default {

        name: "AddWidget",
        
        mounted() {
            this.$store.dispatch("allWidgetsFromDatabase")
            console.log(this.widgets)
        },
        props: ['guide_id', 'widgets'],
        computed: {
            getAllWidget(){ //final output from here
                return this.$store.getters.getWidgetFormGetters
            },
            excludeIDs(){
                let obj = [];
                this.widgets.forEach(element => {
                    obj.push(parseInt(element.widget_id))
                    
                });
                return obj;
            },
            getFinalWidgets(){
                let obj = [];
                this.getAllWidget.forEach(element => {
                    if(!this.excludeIDs.includes(element.id)){
                        obj.push(element)
                    }
                    
                });
                return obj;                
            },
            getErrors(){ //final output from here
                if(this.getFinalWidgets.length==0){
                    return "You don't have any other icon to add!";
                }else{
                    return "";
                }
            },

        },
        methods: {
            closePanel: function () {
                this.$emit('closePanel', {});
            },
            addWidget: function (widget_id) {
                console.log(widget_id + " " +this.guide_id )
                this.$store.dispatch("addWidgetToGuide", {"guide_id": this.guide_id, "widget_id": widget_id});
            },
        }
            

    };
  
</script>
