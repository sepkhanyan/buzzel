<template>
    <div>
     <div class="d-block">
            <p>Show general information about your guide.</p>
            </div>

            <div class="featureMainCon">

                <!-- Tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item"> <a class="navLink_a active" data-toggle="tab" href="#Location">Location</a> </li>
                    <li class="nav-item"> <a class="navLink_a" data-toggle="tab" href="#Privacy">Privacy</a> </li>
                    <li class="nav-item"> <a class="navLink_a" data-toggle="tab" href="#Settings">Settings</a> </li>
                </ul>
                <!-- Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">

                    <div class="tab-pane container active" id="Location">

                        <div class="basic_Content">

                            <div class="form-group fieldInline">
                                <label class="control-label">Venue Name</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Address</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />

                                    <div class="addressMap">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125685.85709364772!2d-105.91947320176777!3d34.126520142777565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1577637261187!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Street</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">City</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">State</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Country</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Zipcode</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Latitude</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Longitude</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="Privacy">
                        <div class="basic_Content">

                            <div class="privacySetting">

                                <ul class="selectPrivacyOption">
                                    <li>
                                        <input type="radio" name="selectPrivacy">
                                        <div class="selectedOptionCont">
                                            <h2>Public</h2>
                                            <p>Your guide will show up in search results and anyone can download it.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="selectPrivacy">
                                        <div class="selectedOptionCont">
                                            <h2>Passphrase</h2>
                                            <p>Your guide will not show up in search results and anyone with the passphrase can download it.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="radio" name="selectPrivacy">
                                        <div class="selectedOptionCont">
                                            <h2>Invite-only <span class="secure">MOST SECURE</span></h2>
                                            <p>Your guide will show up in search results, but only those who were invited can download it.</p>
                                        </div>
                                    </li>
                                </ul>

                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Sharing</label>
                                <div class="fieldBlock">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="help-Label">Sharing lets your attendees share your guide via Twitter, Facebook, email, or messaging!</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane container fade" id="Settings">
                        <div class="basic_Content">

                            <div class="form-group fieldInline">
                                <label class="control-label">Name</label>
                                <div class="fieldBlock">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Icon</label>
                                <div class="fieldBlock">
                                    <!--<img class="selectedIcons" src="{{ asset('img/frontend/icon2.png') }}" alt="">-->
                                    <div class="btnRow">
                                        <a class="buttonFill" href="javascript:void(0);">Change icon</a>
                                        <a class="buttonBordered" href="javascript:void(0);">Reset</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Enabled</label>
                                <div class="fieldBlock">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="help-Label">If not enabled, the menu item will be hidden but is not deleted.</div>
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Allow Rating</label>
                                <div class="fieldBlock">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="help-Label">If enabled, your users will be able to rate this menu item</div>
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">Home screen</label>
                                <div class="fieldBlock">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="help-Label">Set this as your home screen menu item</div>
                                </div>
                            </div>

                            <div class="form-group fieldInline">
                                <label class="control-label">&nbsp;</label>
                                <div class="fieldBlock">
                                    <button class="buttonBordered">Delete this Feature</button>
                                    <div class="help-Label">To hide this feature from users only, disable it instead.</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Tab Content -->
            </div>

            <div class="modalFooter">
                <div class="footerRgt">
                    <button class="buttonBordered" @click="hideModal()">cancel</button>
                    <button class="buttonFill" @click="hideModal()">Save</button>
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
            hideModal(){
                this.$emit('event')
            }

        },created () {
            // fetch the data when the view is created and the data is
            // already being observed
           // this.fetchGuideModule();

        },
    }
</script>
