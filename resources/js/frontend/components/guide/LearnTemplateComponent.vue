<template>
 
<div>
    <button class="btn" title="close" v-on:click="closePanel">X</button>
       <div class="row mt-4 text-center">
           <div class="col">
               <div class="row text-center">
                    <div class="col">
                        <img class="card-img-top img-round img-thumbnail" style="width: 150px;" :src="TemplateDetails.icon" alt="icon">
                    </div>
               </div>
               <div class="row text-center">
                    <div class="col ">
                        <h3>{{ TemplateDetails.title }}</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        {{ TemplateDetails.description }}
                    </div>
                </div>
           </div>
       </div>
       <div class="col-12 text-center">
            <a v-on:click="closePanel" class="btn btn-secondary border mt-2 mb-2">Choose other</a>
            
       </div>
        
           
</div>
    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
    export default {

        name: "LearnMoreTemplate",
        
    
        mounted() {

            console.log(this.$store.getters.getTemplatesFormGetters);

            

        },
        props: ['template_id'],
        computed: {
            TemplateDetails(template_id){ //final output from here
             let all_templates = this.$store.getters.getTemplatesFormGetters
             //return all_templates.length
            //  var result = [];

                     for(let value of all_templates){
                         
                         if(value.id==this.template_id){
                             return value
                         }
                     }
                     return {
                                 "title": "",
                                 "description": "",
                                 
                             }                     

            //         return result? result[0] : null; // or undefined
                
            }

        },
        methods: {
            closePanel: function () {
                this.$emit('closePanel', {});
            },
        }
            

    };
  
</script>
