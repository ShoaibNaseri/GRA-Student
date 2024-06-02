<template>
    <div id="main-content">
        <!-- mani page content body part -->
        <div class="file_manager">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h2>Personal Information</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><router-link href="" :to="{ name: 'Dashboard' }"><i
                                            class="fa fa-dashboard"></i></router-link></li>
                                <li class="breadcrumb-item">Information</li>
                                <li class="breadcrumb-item active">Personal Inforamtion Index</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-4">
                            <div class="d-flex flex-row-reverse">
                                <div class="page_action">
                                    <a href="" class="btn btn-secondary bg-dark text-white">Addsss
                                        Personal
                                        Details</a>
                                </div>
                                <div class="p-2 d-flex">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block border-bottom mb-3">
                    <h4>Personal Information </h4>
                </div>
                <!-- if empty -->
                <div class="row">
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
                                            <img height="200" width="200" src="" class="img-fluid rounded"
                                                alt="profile-image">

                                        </div>
                                        <div class="detail mt-3">
                                            <h4 class="mb-0">name</h4>
                                            <p class="text-muted">email</p>
                                            <div class="">
                                                <a class="btn btn-success" href="">Edit
                                                    Infos</a>
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
export default {
    name: "PersonelBackground",
    mounted() {
        axios.get()
    }
}

</script>
