<template>
 
    <div>

        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label">Photo</label>
            <div class="col-sm-9 px-3">
                <input type="file" class="form-control" name="icon" ref="photo" id="" >                            
            </div>

        </div> 
        <div class="form-group row mt-4">
            <label for="name" class="col-sm-3 col-form-label" >Description</label>
            <div class="col-sm-9 px-3">
                <ckeditor :editor="editor"></ckeditor>
            </div>
        </div>                      
    </div>

</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {

        name: "View",
    
        mounted() {

        },
        props: ['field', 'widget_id'],
        computed: {
            getInputFields(){
                let type = this.widget.type
                return this.widget.type
            },
            editor(){
                return ClassicEditor
            }
        },

    };
  
</script>
