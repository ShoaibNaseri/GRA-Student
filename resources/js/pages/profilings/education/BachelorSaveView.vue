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
                            <h2 v-if="editMode"><strong>Update Your Bachelore's Degree Details</strong></h2>
                            <h2 v-else><strong>Add Your Bachelor Degree Details</strong></h2> <span
                                class="samll text-muted"></span>
                        </div>
                        <div class="body">
                            <form action="" @submit.prevent="handleSubmit()">

                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="bachelorName">University Name</label>
                                            <input type="text" v-model="bachelor.universityName" class="form-control"
                                                placeholder="Birmingham University">

                                            <div class="text-danger small">
                                                ss
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="bachelorName">Degree Type</label>
                                            <input type="text" v-model="bachelor.degreeType" class="form-control"
                                                placeholder="Degree Type">

                                            <div class="text-danger small">
                                                ss
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="bachelorType">Feild Or Major</label>
                                            <select v-model="bachelor.feild" class="form-control">
                                                <option value="Science">Science</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Econemics">Econemics</option>
                                            </select>
                                            <div class="text-danger small">
                                                ddd
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="address">University Location</label>
                                            <input type="text" v-model="bachelor.address" class="form-control"
                                                placeholder="London, United Kingdom">

                                            <div class="text-danger small">
                                                ddd
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="startedDate">Enrolled Date</label>
                                            <input type="date" v-model="bachelor.startedDate" class="form-control"
                                                placeholder="Institute startedDate">

                                            <div class="text-danger small">
                                                lkl
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="graduationDate">Graduation Date</label>
                                            <input type="date" v-model="bachelor.graduationDate" class="form-control"
                                                placeholder="Institute graduationDate">

                                            <div class="text-danger small">
                                                ss
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="percentage">GPA</label>
                                            <input type="number" v-model="bachelor.gpa" class="form-control"
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
    name: 'BachelorSaveView',
    data() {
        return {
            editMode: false,
            headerData: {
                mainTitle: 'Bachelor Degree Details Customization',
                subTitle: 'Education Background Index',
                belongsTo: 'Profilings'
            },
            bachelor: {
                universityName: '',
                feild: '',
                degreeType: '',
                gpa: '',
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
                this.updatebachelor();
            } else {
                this.createbachelor();
            }
        },
        updatebachelor() {
            axios.post(`/api/student/profiling/education/bachelor/update/${this.$route.params.id}`, this.bachelor)
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
        createbachelor() {
            axios.post('/api/student/profiling/education/bachelor/store', this.bachelor)
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
            axios.get(`/api/student/profiling/education/bachelor/edit/${this.$route.params.id}`)
                .then(response => {
                    this.bachelor = response.data;
                })
        }
    }
}

</script>
