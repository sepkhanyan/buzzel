<template>
 
    <div>
            <chose-template-component v-show='this.getCreateGuide.step == 2'></chose-template-component>
            <chose-category-component v-show='this.getCreateGuide.step == 1'></chose-category-component>
    </div>

</template>

<script>
    export default {

        name: "Main",
    
        mounted() {

            this.$store.dispatch("allCategoriesFromDatabase")

        },
        computed: {

            getCreateGuide(){ //final output from here
                return this.$store.getters.getCreateGuideGetters
            },
            ifCurrentComponent(step){
                return this.getCreateGuide.step == step
            },

        },

    };
  
</script>
