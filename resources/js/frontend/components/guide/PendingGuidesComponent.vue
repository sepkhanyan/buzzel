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
    <div class="row mt-4" v-if="fetchGuides.length">
        <div class="col-4 mt-4" :id="'item-sm-' + index" v-for="(item, index) in fetchGuides" :key="item.id">
            <a v-bind:href="'/guides/build/'+item.id">
                <div class="card mx-1 text-center">
                    <img class="card-img-top img-round img-thumbnail template_icon" :src="getImage('icon', item.icon)" alt="icon">
                    <img class="card-img-top img-round img-thumbnail template_banner" :src="getImage('banner', item.banner)" alt="banner">
                    <div class="card-body text-center">
                        <h5 class="card-title font-weight-bold">{{ item.title }}</h5>
                        <p class="card-text item-description text-center">{{ item.description }}</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
    export default {

        name: "PendingGuides",
        
    
        mounted() {    
            //this.$store.dispatch("fetchTemplatesFromDatabase",'all')
            this.$store.dispatch("getAllGuideFromDatabase")
            
        },
        computed: {
            fetchGuides(){ //final output from here
                //return this.$store.getters.getTemplatesFormGetters
                return this.$store.getters.getAllGuides
            },
            getLoading(){ //final output from here
                return this.$store.getters.getLoadingGetters
            },
            getCreateGuide(){ //final output from here
                return this.$store.getters.getCreateGuideGetters
            },
            getErrors(){ //final output from here
                if(this.fetchGuides.length==0){
                    return "You don't have any Guide. Please create new guide";
                }else{
                    return "";
                }
            },

        },
        methods: {

            getImage(type, payload){
                if(type=='icon'){
                    if(payload!=''){
                        return payload
                    }else{
                        return '/images/placeholder/guide_icon.png'
                    }
                } else if(type=='banner'){
                    if(payload!=''){
                        return payload
                    }else{
                        return '/images/placeholder/guide_banner.png'
                    }
                }
            }
        },

    };
  
</script>
