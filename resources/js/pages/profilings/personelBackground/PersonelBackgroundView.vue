<template>
    <div id="main-content">
        <!-- mani page content body part -->
        <div class="file_manager">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <title-header :headerData="headerData"></title-header>
                        <add-button v-if="personel == null" :buttonData="buttonData"></add-button>
                    </div>
                </div>
                <div class="d-block border-bottom mb-3">
                    <h4>Personal Information </h4>
                </div>
                <!-- if empty -->
                <div class="row" v-if="personel == null">
                    <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                        <p class="text-danger">*Please Update Your Personal Information</p>
                    </div>
                </div>
                <!-- end -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <div class="member-thumb">
                                            <img height="200" width="200"
                                                :src="getImageUrl('student/images/profile/' + student.image)"
                                                class="img-fluid rounded" alt="profile-image">

                                        </div>
                                        <div class="detail mt-3">
                                            <h4 class="mb-0">{{ student.name }}</h4>
                                            <p class="text-muted">{{ student.email }}</p>
                                            <div class="">
                                                <router-link :to="{ name: 'personel.add', params: { id: personel.id } }"
                                                    class="btn btn-success" href="">Edit
                                                    Infos</router-link>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-9">
                                        <h4 class="border-bottom">Personal Details</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="bg-secondary text-white">
                                                    <tr>
                                                        <th>Father Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>WhatsApp</th>
                                                        <th>Gender</th>
                                                        <th>Marital State</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ personel.f_name }}</td>
                                                        <td>{{ student.email }}</td>
                                                        <td>{{ personel.phone }}</td>
                                                        <td>{{ personel.wtsp }}</td>
                                                        <td>{{ personel.gender }}</td>
                                                        <td>{{ personel.marital_state }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h4 class="border-bottom mt-2">Address Info</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="bg-secondary text-white">
                                                    <tr>
                                                        <th>Country</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Mailing Address</th>
                                                        <th>Postal Code</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ personel.country }}</td>
                                                        <td>{{ personel.city }}</td>
                                                        <td>{{ personel.address }}</td>
                                                        <td>{{ personel.mailing_address }}</td>
                                                        <td>{{ personel.postal_code }}</td>
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
import TitleHeader from '../../../components/mainLayout/TitleHeader.vue';
import AddButton from '../../../components/mainLayout/AddButton.vue';
export default {
    components: { TitleHeader, AddButton },
    name: "PersonelBackground",
    data() {
        return {
            headerData: {
                mainTitle: 'Personel Inforamtion',
                subTitle: 'Personel Information Index',
                belongsTo: 'Profilings'
            },
            buttonData: {
                routeName: 'pesonel.add',
                title: 'Add Personel Information'
            },
            studentId: localStorage.getItem('sid'),
            personel: '',
            student: '',
        }
    },
    methods: {
        getImageUrl(imagePath) {
            return `${window.location.origin}/storage/${imagePath}`;
        },
    },
    mounted() {

        axios.get(`/api/student/profiling/personel/info/${this.studentId}`)
            .then(response => {
                this.personel = response.data;
                this.student = this.personel.student;
                console.log(response.data);
            })
    }
}

</script>
