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
                            <h2 v-if="editMode"><strong>Update Credentials Details</strong></h2>
                            <h2 v-else><strong>Add Credentials Details</strong></h2>
                            <span class="samll text-muted"></span>
                        </div>
                        <div class="body">
                            <form action="" @submit.prevent="handleSubmit">

                                <div class="row clearfix">
                                    <div>
                                        <input type="text" name="student_id" v-model="creden.student_id" id="" hidden>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="country">Prefered Country</label>
                                            <input type="text" name="country" v-model="creden.country"
                                                class="form-control" placeholder="Country" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="organiztion">Prefered Degree</label>
                                            <input type="text" name="applingFor" v-model="creden.applingFor"
                                                class="form-control"
                                                placeholder="Name of applyingFor give Certification" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="degree">Acquired Degree <span
                                                    class="text-muted small"></span></label>
                                            <input type="text" name="degree" v-model="creden.degree"
                                                class="form-control" id="" placeholder="Aquired Degree">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="language">Language CRT <span
                                                    class="text-muted small">(Certification Test)</span></label>
                                            <input type="text" name="language" v-model="creden.language"
                                                class="form-control" id="" placeholder="Language Certifiaction">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="score">Score <span class="text-muted small"></span></label>
                                            <input type="text" name="score" v-model="creden.score" placeholder="Score"
                                                class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="feild">Feild <span class="text-muted small"></span></label>
                                            <input type="text" name="feild" v-model="creden.feild" class="form-control"
                                                id="" placeholder="Feild">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="bugdet">Budget<span class="text-muted small"></span></label>
                                            <input type="number" name="bugdet" v-model="creden.bugdet"
                                                class="form-control" id="" placeholder="Budget">

                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button v-if="editMode" type="submit" name="submit"
                                            class="btn btn-success">Update</button>
                                        <button v-else type="submit" name="submit" class="btn btn-success">Save</button>
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
    name: 'CredentialSave',

    data() {
        return {
            editMode: false,
            headerData: {
                mainTitle: 'Applying Credentials Customization',
                subTitle: 'Applying Credentials Customize',
                belongsTo: 'Profilings'
            },
            creden: {
                student_id: localStorage.getItem('sid'),
                country: '',
                degree: '',
                applingFor: '',
                bugdet: '',
                feild: '',
                score: '',
                language: '',
                degree: '',
            }

        }
    },
    methods: {
        updateCreden() {
            axios.put(`/api/applyingCredential/${this.$route.params.id}`, this.creden)
                .then(response => {
                    this.$router.push({ name: 'credential.index' });
                    this.$toast.success("Your Creadential Details Has Been Updated Successfully", {
                        position: 'top-right',
                        duration: 3000,
                        dismissible: true,
                        pauseOnHover: true,
                    });
                })
                .catch(error => {
                    this.$toast.error("Faild To Update Credential Details", {
                        position: 'top-right',
                    });
                })
        },
        createCreden() {
            axios.post(`/api/applyingCredential`, this.creden)
                .then(response => {
                    this.$router.push({ name: 'credential.index' });
                    this.$toast.success("Your Creadential Details Has Been Saved Successfully", {
                        position: 'top-right',
                        duration: 3000,
                        dismissible: true,
                        pauseOnHover: true,
                    });
                })
                .catch(error => {
                    this.$toast.error("Faild To Save Credential Details", {
                        position: 'top-right',
                    });
                })
        },
        handleSubmit() {
            if (this.editMode) {
                this.updateCreden()
            } else {
                this.createCreden();
            }
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.editMode = true
            axios.get(`/api/applyingCredential/${this.$route.params.id}/edit`)
                .then(response => {
                    this.creden = response.data;
                })
        }
    }


}
</script>
