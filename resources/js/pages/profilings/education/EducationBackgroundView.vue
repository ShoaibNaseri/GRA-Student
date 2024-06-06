<template>
    <div id="main-content">
        <div class="file_manager">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <title-header :headerData="headerData"></title-header>
                    </div>
                </div>
                <div class="d-block border-bottom mb-3">
                    <h4>Educational Information </h4>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="border-bottom">High School Degree Details</h4>
                                        <div class="d-flex float-end p-2">
                                            <span v-if="school == null">
                                                <router-link href="" :to="{ name: 'school.add' }"
                                                    class="btn btn-sm btn-success mr-2"><i
                                                        class="fa fa-plus"></i></router-link>
                                            </span>
                                            <span v-else>
                                                <router-link :to="{ name: 'school.add', params: { id: school.id } }"
                                                    href="" class="btn btn-sm btn-success mr-2"><i
                                                        class="fa fa-pencil"></i></router-link>

                                                <button @click="deleteSchool(school.id)"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </span>
                                        </div>
                                        <span v-if="school == null" class="text-danger">Please Add Your Birth
                                            Certificate Details</span>
                                        <div v-else class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="bg-secondary text-white">
                                                    <tr>
                                                        <th>School Name</th>
                                                        <th>School Type</th>
                                                        <th>School Adress</th>
                                                        <th>Start Date</th>
                                                        <th>Graducation Date</th>
                                                        <th>Percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ school.schoolName }}</td>
                                                        <td>{{ school.schoolType }}</td>
                                                        <td>{{ school.address }}</td>
                                                        <td>{{ school.startedDate }}</td>
                                                        <td>{{ school.graduationDate }}</td>
                                                        <td>{{ school.percentage }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="border-bottom">Bachelor Degree Details</h4>
                                        <div class="d-flex float-end p-2">
                                            <span v-if="bachelor == null">
                                                <router-link :to="{ name: 'bachelor.add' }" href=""
                                                    class="btn btn-sm btn-success mr-2"><i
                                                        class="fa fa-plus"></i></router-link>
                                            </span>
                                            <span v-else>
                                                <router-link href=""
                                                    :to="{ name: 'bachelor.add', params: { id: bachelor.id } }"
                                                    class="btn btn-sm btn-success mr-2"><i
                                                        class="fa fa-pencil"></i></router-link>
                                                <button @click="deleteBachelor(bachelor.id)"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </span>

                                        </div>

                                        <span v-if="bachelor == null" class="text-danger">Please Add Bachelor Degree
                                            Information</span>

                                        <div v-else class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="bg-secondary text-white">

                                                    <tr>
                                                        <th>University Name</th>
                                                        <th>Universit Location</th>
                                                        <th>Feild of Study</th>
                                                        <th>Degree Type</th>
                                                        <th>Enrolled Date</th>
                                                        <th>Gruduation Date</th>
                                                        <th>GPA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ bachelor.universityName }}</td>
                                                        <td>{{ bachelor.address }}</td>
                                                        <td>{{ bachelor.feild }}</td>
                                                        <td>{{ bachelor.degreeType }}</td>
                                                        <td>{{ bachelor.startedDate }}</td>
                                                        <td>{{ bachelor.graduationDate }}</td>
                                                        <td>{{ bachelor.gpa }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="border-bottom">Master's Degree Details</h4>
                                        <div class="d-flex float-end p-2">
                                            <span v-if="master == null">
                                                <router-link :to="{ name: 'master.add' }" href=""
                                                    class="btn btn-sm btn-success mr-2"><i
                                                        class="fa fa-plus"></i></router-link>
                                            </span>
                                            <span v-else>
                                                <router-link :to="{ name: 'master.add', params: { id: master.id } }"
                                                    href="" class="btn btn-sm btn-success mr-2"><i
                                                        class="fa fa-pencil"></i></router-link>
                                                <button @click="deleteMaster(master.id)"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </span>
                                        </div>

                                        <span v-if="master == null" class="text-danger">Please Add Master's Degree
                                            Information</span>

                                        <div v-else class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="bg-secondary text-white">

                                                    <tr>
                                                        <th>University Name</th>
                                                        <th>Universit Location</th>
                                                        <th>Feild of Study</th>
                                                        <th>Degree Type</th>
                                                        <th>Enrolled Date</th>
                                                        <th>Gruduation Date</th>
                                                        <th>GPA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {{ master.universityName }}
                                                        </td>
                                                        <td>{{ master.address }}</td>
                                                        <td>{{ master.feild }}</td>
                                                        <td>{{ master.degreeType }}</td>
                                                        <td>{{ master.startedDate }}</td>
                                                        <td>{{ master.graduationDate }}</td>
                                                        <td>{{ master.gpa }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                            </div>
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
    data() {
        return {
            headerData: {
                mainTitle: 'Educational Background Information',
                subTitle: 'Education Background Index',
                belongsTo: 'Profilings'
            },
            studentId: localStorage.getItem('sid'),
            educationData: '',
            school: '',
            master: '',
            bachelor: ''
        }
    },
    methods: {
        deleteSchool(toBeDeletedId) {
            axios.delete(`/api/student/profiling/education/school/delete/${toBeDeletedId}`)
                .then(response => {
                    this.school = null;
                    this.$toast.error(response.data.success, {
                        position: 'top-right',
                    });
                })
                .catch(error => {
                    console.error(error);
                    // this.$toast.error(error.data.error, {
                    //     position: 'top-right'
                    // })
                })
        },
        deleteBachelor(toBeDeletedId) {
            axios.delete(`/api/student/profiling/education/bachelor/delete/${toBeDeletedId}`)
                .then(response => {
                    this.bachelor = null;
                    this.$toast.error(response.data.success, {
                        position: 'top-right',
                    });
                })
                .catch(error => {
                    console.error(error);
                })
        },
        deleteMaster(toBeDeletedId) {
            axios.delete(`/api/student/profiling/education/master/delete/${toBeDeletedId}`)
                .then(response => {
                    this.master = null;
                    this.$toast.error(response.data.success, {
                        position: 'top-right',
                    });
                })
                .catch(error => {
                    console.error(error);
                })
        }
    },
    mounted() {
        axios.get(`/api/student/profiling/education/${this.studentId}`)
            .then(response => {
                this.educationData = response.data;
                this.school = this.educationData.school;
                this.master = this.educationData.master;
                this.bachelor = this.educationData.bachelor;
            })
    }

}
</script>
