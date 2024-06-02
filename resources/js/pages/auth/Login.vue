<template>
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle auth-main university">
            <div class="auth-box">
                <div class="top">
                    <img class="shadow-logo" src="../../assets/logo-white.png" alt="Iconic">
                </div>
                <div class="card shadow">
                    <div class="header">
                        <p class="lead">Login to your account</p>
                    </div>
                    <div class="body">
                        <form class="form-auth-small" action="" @submit.prevent="submitLogin">
                            <div class="form-group">
                                <label for="signin-email" class="control-label small">Your Email</label>
                                <input type="email" v-model="student.email" class="form-control" required
                                    id="signin-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label small">Your Password</label>
                                <input type="password" v-model="student.pass" class="form-control" required
                                    id="signin-password" placeholder="Password">
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-dark bg-dark btn-lg btn-block">LOGIN</button>
                            <div class="bottom">
                                <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a
                                        href="page-forgot-password.html">Forgot password?</a></span>
                                <span>Don't have an account? <a href="page-register.html">Register</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            student: {
                email: '',
                pass: ''
            }
        }
    },
    methods: {
        submitLogin() {
            const formData = {
                email: this.student.email,
                password: this.student.pass
            }
            axios.post("/api/student/login", formData)
                .then(response => {
                    console.log(response.data);
                    localStorage.setItem('token', response.data.token);
                    localStorage.setItem('sid', response.data.Sid);
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.token;
                    this.$store.commit('login');
                    this.$store.dispatch('setCurrentRoute', this.$route.path);
                    this.$router.push({ path: '/' });
                }).catch(error => {
                    console.error('Failed to login', error);
                    if (error.response && error.response.status === 401) {
                        // Unauthorized - Incorrect email or password
                        // Handle error message or show an alert to the user
                    } else {
                        // Handle other errors
                    }
                });
        }
    }
}
</script>
<style>
.auth-main::before {
    width: 400px;
}

.auth-main.university:after {
    background-color: #afafbb29;
}

.logo img {
    width: 400px;
}
</style>
