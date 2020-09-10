<template>
 
    <div>
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Facebook</label>
            <div class="col-sm-9 px-3">
                <input type="name" class="form-control" name="name" id="name" placeholder="">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    
                </small>  
            </div>
        </div>   
    </div>

</template>

<script>
    export default {

        name: "Text",
    
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
