<template>
    <div id="main-content">
        <!-- mani page content body part -->
        <div class="file_manager">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <title-header :headerData="headerData"></title-header>
                        <add-button v-if="creden == ''" :buttonData="buttonData"></add-button>

                    </div>
                </div>
                <div class="d-block border-bottom mb-3">
                    <h4>Applying Credentials </h4>
                </div>
                <!-- if empty -->
                <div class="row" v-if="creden == ''">
                    <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                        <p class="text-danger">*Please Update Your Personal Information</p>
                    </div>
                </div>
                <!-- end -->
                <div v-else class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="border-bottom">Credens</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable">
                                                <thead class="bg-secondary text-white">
                                                    <tr>

                                                        <th>Prefered Countries</th>
                                                        <th>Prefered Feild</th>
                                                        <th>Prefered Degree</th>
                                                        <th>Acquired Degree</th>
                                                        <th>Language CRT</th>
                                                        <th>Test Score</th>
                                                        <th>Budget</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td class="" style=" white-space: normal;">
                                                            <strong>{{ creden.country }}</strong> <br>

                                                        </td>
                                                        <td>
                                                            <strong> {{ creden.feild }}</strong>
                                                        </td>
                                                        <td><strong>{{ creden.applingFor }}</strong></td>
                                                        <td>
                                                            {{ creden.degree }}
                                                        </td>
                                                        <td>
                                                            {{ creden.language }}
                                                        </td>
                                                        <td>
                                                            {{ creden.score }}
                                                        </td>
                                                        <td>
                                                            {{ creden.bugdet }}
                                                        </td>
                                                        <td>
                                                            <span class="p-1">
                                                                <router-link
                                                                    :to="{ name: 'credential.add', params: { id: creden.id } }"
                                                                    class="btn btn-sm btn-success"><i
                                                                        class="fa fa-pencil"></i></router-link>
                                                            </span>
                                                            <button @click="deleteCreden(creden.id)"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
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
import TitleHeader from '@/components/mainLayout/TitleHeader.vue';
import AddButton from '@/components/mainLayout/AddButton.vue';
export default {
    name: 'CredentialView',
    components: { TitleHeader, AddButton },
    data() {
        return {
            studentId: localStorage.getItem('sid'),
            creden: '',
            headerData: {
                mainTitle: 'Applying Credentials',
                subTitle: 'Applying Credentials Index',
                belongsTo: 'Profilings'
            },
            buttonData: {
                routeName: 'credential.add',
                title: 'Add Credentials'
            },
        }
    },
    methods: {
        deleteCreden(toBeDeletedId) {
            axios.delete(`/api/applyingCredential/${toBeDeletedId}`)
                .then(response => {
                    this.$toast.error(response.data.message, {
                        position: 'top-right',
                    });
                })
                .catch(error => {
                    this.$toast.error(response.data.error, {
                        position: 'top-right',
                    });
                })
        }
    },

    mounted() {
        axios.get(`/api/student/applyingCredential/index/${this.studentId}`)
            .then(response => {
                this.creden = response.data;
                console.log(response);

            })
    },
}

</script>
