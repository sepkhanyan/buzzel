<template>
 <div>
     <div class="row mt-4" v-show="getErrors!=''">
        <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" >
            {{getErrors}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="row mt-4" v-if="fetchTemplates.length">
        <div class="col-4 mt-4" :id="'item-sm-' + index" v-for="(item, index) in fetchTemplates" :key="item.id">
            <div class="card mx-1 text-center">
                <img class="card-img-top img-round img-thumbnail template_icon" :src="item.icon" alt="icon">
                <img class="card-img-top img-round img-thumbnail template_banner" :src="item.banner" alt="banner">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold">{{ item.title }}</h5>
                    <p class="card-text item-description text-center">{{ item.description }}</p>
                </div>
                <div class="card-body text-center px-3">
                    <a v-on:click="learnMore(item.id)" class="btn btn-light card-link border"> Learn More</a>
                    <a v-on:click="chose_template(item.id)" class="btn btn-secondary card-link border" style="color: #fff"> Choose</a>
                </div>
            </div>
        </div>
        <slideout-panel></slideout-panel>
    </div>
</div>
    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
    export default {

        name: "Template",
        
        mounted() {
            let guide_data = localStorage.getItem('guide_data')
            if(guide_data){
                guide_data = JSON.parse(guide_data);
                if(guide_data.category){
                    this.$store.dispatch("userSelectsCategory", guide_data.category);
                    this.$store.dispatch("fetchTemplatesFromDatabase", guide_data.category)
                    if(guide_data.error){
                        this.$store.dispatch("loadError", guide_data.error)
                    }
                                   
                }else{
                    let guide_data = {
                        "error": "Please choose category first"
                    }
                    localStorage.setItem('guide_data', JSON.stringify(guide_data));
                    window.location.href = '/guide/categories';                    
                }
            }else{
               let guide_data = {
                  "error": "Please choose category first"
               }
               localStorage.setItem('guide_data', JSON.stringify(guide_data));
               window.location.href = '/guide/categories';
            }
        },
        computed: {
            fetchTemplates(){ //final output from here
                return this.$store.getters.getTemplatesFormGetters
            },
            getLoading(){ //final output from here
                return this.$store.getters.getLoadingGetters
            },
            getCreateGuide(){ //final output from here
                return this.$store.getters.getCreateGuideGetters
            },
            getErrors(){ //final output from here
                return this.$store.getters.getGuideErrorsGetters
            },
        },
        methods: {
            chose_template: function (template_id) {
                this.$store.dispatch("userSelectsTemplate", template_id);
                window.location.href = '/guide/details/'+template_id;
            },
            learnMore(template_id) {
                const panel1Handle = this.$showPanel({
                openOn: 'right',
                width: 1000,
                component : 'learn-more-template',
                props: {
                    template_id
                }
                })

                panel1Handle.promise
                .then(result => {

                });
            },
        },

    };
  
</script>
