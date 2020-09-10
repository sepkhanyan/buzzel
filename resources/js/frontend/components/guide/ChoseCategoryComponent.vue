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
    <div class="row mt-4" v-if="getAllCategories.length">
        <div class="col-4 mt-4" :id="'item-sm-' + index" v-for="(item, index) in getAllCategories" :key="item.id">
            <div class="card mx-1 text-center">
            <img class="card-img-top img-round img-thumbnail" :src="item.thumb" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title font-weight-bold">{{ item.title }}</h5>
                <p class="card-text item-description text-center">{{ item.description }}</p>
            </div>
            <div class="card-body text-center px-3">
                <a v-on:click="chose_category(item.id)" class="btn btn-light card-link border"><i class="fa fa-eye" aria-hidden="true"></i> Select & view templates</a>
            </div>
            </div>
        </div>
        
    </div>
</div>
    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
    export default {

        name: "Category",
    
        mounted() {
            this.$store.dispatch("allCategoriesFromDatabase")
            let guide_data = localStorage.getItem('guide_data')
            if(guide_data){
                guide_data = JSON.parse(guide_data);
                if(guide_data.error){
                    this.$store.dispatch("loadError", guide_data.error)
                }
            }
            localStorage.removeItem('guide_data');
        },
        computed: {
            getAllCategories(){ //final output from here
                return this.$store.getters.getCategoryFormGetters
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
            chose_category: function (category_id) {
                this.$store.dispatch("userSelectsCategory", category_id);
                window.location.href = '/guide/templates';
            },
        },

    };
  
</script>
