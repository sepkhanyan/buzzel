<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Vimeo</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" id="name" placeholder="Enter Vimeo url">
            </div>
        </div>   
    </div>

</template>

<script>
    export default {

        name: "Vimeo",
    
        mounted() {

        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
        },

    };
  
</script>
