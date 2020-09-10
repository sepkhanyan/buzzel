<template>
    <div>
     <div class="d-block">
            <p>Speaker information about your guide.</p>
            </div>


    </div>
</template>

<script>

    import { ValidationProvider } from 'vee-validate';

    export default {

        components : {
            ValidationProvider,
        },

        data () {
         return {
             widgets : [],
             loading : false
         }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods : {


        },created () {
            // fetch the data when the view is created and the data is
            // already being observed
           // this.fetchGuideModule();

        },
    }
</script>
