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
                            <h2 v-if="editMode"><strong>Update Your High School Details</strong></h2>
                            <h2 v-else><strong>Add Your High School Details</strong></h2> <span
                                class="samll text-muted"></span>
                        </div>
                        <div class="body">
                            <form action="" @submit.prevent="handleSubmit()">

                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="schoolName">School Name</label>
                                            <input type="text" v-model="school.schoolName" class="form-control"
                                                placeholder="Meria High School">

                                            <div class="text-danger small">
                                                ss
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="schoolType">School Type</label>
                                            <select v-model="school.schoolType" class="form-control">
                                                <option value="">Select School Type</option>
                                                <option value="Private">Private</option>
                                                <option value="Public">Public</option>
                                            </select>
                                            <div class="text-danger small">
                                                ddd
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="address">School Address</label>
                                            <input type="text" v-model="school.address" class="form-control"
                                                placeholder="London, United Kingdom">

                                            <div class="text-danger small">
                                                ddd
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="startedDate">Enrolled Date</label>
                                            <input type="date" v-model="school.startedDate" class="form-control"
                                                placeholder="Institute startedDate">

                                            <div class="text-danger small">
                                                lkl
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="graduationDate">Graduation Date</label>
                                            <input type="date" v-model="school.graduationDate" class="form-control"
                                                placeholder="Institute graduationDate">

                                            <div class="text-danger small">
                                                ss
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="percentage">High School Percentage</label>
                                            <input type="number" v-model="school.percentage" class="form-control"
                                                placeholder="88">

                                            <div class="text-danger small">
                                                lk
                                            </div>

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
import axios from 'axios';
import TitleHeader from '../../../components/mainLayout/TitleHeader.vue'
export default {
    components: { TitleHeader },
    name: 'SchoolSaveView',
    data() {
        return {
            editMode: false,
            headerData: {
                mainTitle: 'High School Details Customization',
                subTitle: 'Education Background Index',
                belongsTo: 'Profilings'
            },
            school: {
                schoolType: '',
                schoolName: '',
                percentage: '',
                startedDate: '',
                graduationDate: '',
                address: '',
                student_id: localStorage.getItem('sid')
            },
        }
    },
    methods: {
        handleSubmit() {
            if (this.editMode) {
                this.updateSchool();
            } else {
                this.createSchool();
            }
        },
        updateSchool() {
            axios.post(`/api/student/profiling/education/school/update/${this.$route.params.id}`, this.school)
                .then(response => {
                    this.$router.push({ name: "education.index" });
                    this.$toast.success(response.data.success, {
                        position: 'top-right',
                    })
                })
                .catch(error => {
                    this.$toast.error(response.data.error, {
                        position: 'top-right'
                    })
                })

        },
        createSchool() {
            axios.post('/api/student/profiling/education/school/store', this.school)
                .then(response => {
                    this.$router.push({ name: "education.index" });
                    this.$toast.success(response.data.success, {
                        position: 'top-right',
                    })
                })
                .catch(error => {
                    this.$toast.error(response.data.error, {
                        position: 'top-right'
                    })
                })
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.editMode = true;
            axios.get(`/api/student/profiling/education/school/edit/${this.$route.params.id}`)
                .then(response => {
                    this.school = response.data;
                })
        }
    }
}

</script>
