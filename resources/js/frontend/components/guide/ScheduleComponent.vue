<template>
    <div>
     <div class="d-block">
            <p>Schedule information about your guide.</p>
            </div>

            <div class="featureMainCon">

                <!-- Tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item"> <a class="navLink_a active" data-toggle="tab" href="#Basics">Basics</a> </li>
                    <li class="nav-item"> <a class="navLink_a" data-toggle="tab" href="#Branding">Branding</a> </li>
                </ul>
                <!-- Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="Basics">
                        <div class="basic_Content">

                            <div class="form-group fieldInline">
                                <label class="control-label">Name</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Description</label>
                                <div class="fieldBlock">
                                    <textarea class="form-control"> </textarea>
                                    <div class="help-Label">A brief paragraph to describe your guide.</div>
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Short name</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                    <div class="help-Label">The short name is used to construct the URL where people view your guide, ex: https://google.com</div>
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Event dates</label>
                                <div class="fieldBlock">
                                    <div class="help-Label">Does your event take place at a specific time?</div>

                                    <div class="EventSelectRow">
                                        <div class="EventRadio">
                                            <div class="RadioCon">
                                                <input type="radio" name="EventDate" />
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="EventCalenderRow">
                                            <div class="eventSelect">
                                                <input type="text" class="form-control datepicker">
                                            </div>

                                            <div class="datepicker-arrow"><i class="fa fa-arrow-right"></i></div>

                                            <div class="eventSelect">
                                                <input type="text" class="form-control datepicker">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="EventSelectRow">
                                        <div class="EventRadio">
                                            <div class="RadioCon">
                                                <input type="radio" name="EventDate" />
                                                <label>No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="help-Label">You cannot change this after your guide is published.</div>

                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Select city</label>
                                <div class="fieldBlock">
                                    <div class="SelectedCity"><a href="javascript:void(0);">Asia/Calcutta (change)</a></div>
                                    <div class="help-Label">The current time in Asia/Calcutta is 8:19 PM.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="Branding">

                        <div class="coverImagesContainer">
                            <p>Add a custom icon and cover image to add some flavor to your guide.</p>

                            <div class="coverImageAndIcon">
                                <div class="covverInner">
                                    <a class="EditCoverImg" href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i></a>
                                    <div class="iconImg">
                                        <!--<img src="{{ asset('img/frontend/icon2.png') }}" alt="">-->
                                        <a class="EditIconImg" href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i></a>
                                    </div>
                                </div>
                            </div>


                            <div class="coverSize">
                                <p><strong>Cover image:</strong> 1440 px wide by 720 px tall</p>
                                <p><strong>Icon:</strong> 232 px wide by 192 px tall</p>
                            </div>


                        </div>

                    </div>
                </div>
                <!-- Tab Content -->
            </div>

            <div class="modalFooter">
                <div class="footerRgt">
                    <button class="buttonBordered">cancel</button>
                    <button class="buttonFill">Save</button>
                </div>
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
