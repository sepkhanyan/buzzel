<template>
 
<div class="col mt-4">
    <div class="col-12">
        <button class="btn float-right" title="close" v-on:click="closePanel">X</button>
    </div>

        <div class="col-12 text-center mt-4">
            <h2 class="text-secondary">Your preview guide is updated and ready to go!</h2>
        </div>
        <div class="row">
            <div class="col text-center border text-secondary">
                <qrcode :value="guide_id" :options="{ width: 200 }"></qrcode>
                <h4 class="text-secondary">Scan QR code with the Buzzel app</h4>
                <p>Choose the Scan option in the Buzzel app to begin the download.</p>
                <p class="text-muted"><span class="text-danger">Important:</span> Do not distribute this preview QR code publicly. You can find your guide's public and permanent QR code here.</p>
            </div>
        </div>
        <div class="col-12 text-center bg-info">
            <h3 class="text-white">OR</h3>
        </div>
        <div class="row">
            <div class="col text-center border text-secondary">
                <p>Preview Published</p>
                <h1 class="text-secondary bg-light mx-10 px-10">{{guide_id}}</h1>
                <h4 class="text-secondary">Select the 'Enter passphrase' option within Guidebook and enter the preview code above.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col text-center text-muted">
                <span class="text-danger">Important:</span> The preview guides we generate will not update as you make additional edits in the online builder. To view recent content changes, please delete the existing preview on your phone, then re-download a fresh preview.
            </div>
        </div>
 
        
           
</div>
    <!-- SideBar -->


    <!-- Modal -->

</template>

<script>
    export default {

        name: "DevicePreviewCode",
        
    
        mounted() {

            console.log(this.$store.getters.getTemplatesFormGetters);

            

        },
        props: ['guide_id'],
        computed: {
 

        },
        methods: {
            closePanel: function () {
                this.$emit('closePanel', {});
            },
        }
            

    };
  
</script>
