<template>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <title-header :headerData="headerData"></title-header>

                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Update Your Personal Details</strong></h2>
                            <span class="samll text-muted"></span>
                        </div>
                        <div class="body">
                            <form action="">
                                <div class="row clearfix">
                                    <div>
                                        <input type="text" name="student_id" hidden>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Father Name</label>
                                            <input type="text" v-model="profile.f_name" class="form-control"
                                                placeholder="Father Name">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Phone Number</label>
                                            <input type="text" v-model="profile.phone" class="form-control"
                                                placeholder="Phone">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">WhatsApp Number</label>
                                            <input type="text" v-model="profile.wtsp" class="form-control"
                                                placeholder="WhatsApp">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Residential Country</label>
                                            <input type="text" v-model="profile.country" class="form-control"
                                                placeholder="Country">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Residential City</label>
                                            <input type="text" v-model="profile.city" class="form-control"
                                                placeholder="City">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Address</label>
                                            <input type="text" v-model="profile.address" class="form-control"
                                                placeholder="Address">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Mailing Address</label>
                                            <input type="text" v-model="profile.mailingAddress" class="form-control"
                                                placeholder="Country">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name"> Postal Code</label>
                                            <input type="text" v-model="profile.postal_code" class="form-control"
                                                placeholder="Postal Code">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Marital State</label>
                                            <select v-model="profile.marital_state" class="form-control">
                                                <option value="" selected disabled>Your Marital State</option>
                                                <option value="Single">Single</option>
                                                <option value="Engaged">Engaged</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="f_name">Gender</label>
                                            <input type="text" v-model="profile.gender" class="form-control"
                                                placeholder="Gender">
                                            <div class="text-danger small">
                                                ljlk
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button v-if="editMode" type="submit" class="btn btn-success">Update</button>
                                        <button v-else type="submit" class="btn btn-success">Save</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios'
import TitleHeader from '../../../components/mainLayout/TitleHeader.vue'

export default {
    components: { TitleHeader },
    name: "SavePersonelBackground",
    data() {
        return {
            editMode: false,
            profile: {

            },
            headerData: {
                mainTitle: 'Personel Information',
                subTitle: 'Personel Information Customization',
                belongsTo: 'Profilings'
            }
        }
    },
    mounted() {
        axios.get(`/api/student/profiling/personel/edit/${this.$route.params.id}`)
            .then(response => {
                this.profile = response.data;
            })
    }
}

</script>
