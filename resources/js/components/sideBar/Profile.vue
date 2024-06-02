<template>
    <div class="user-account">
        <img :src="getImageUrl('student/images/profile/' + student.image)" class="rounded-circle user-photo"
            alt="User Profile Picture">
        <div class="dropdown">
            <span>Welcome,</span>
            <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>
                    {{ student.name }}
                </strong></a>
            <ul class="dropdown-menu dropdown-menu-right account">
                <li><a href=""><span class="text-info"><i class="fa fa-user"></i></span>Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="" @click="logout"><span class="text-danger"><i class="icon-power"></i></span>Logout</a>
                </li>
            </ul>
        </div>
        <hr>
    </div>
</template>
<script>
export default {
    name: "Profile",
    props: {
        student: {

        }
    },
    methods: {
        getImageUrl(imagePath) {
            return `${window.location.origin}/storage/${imagePath}`;
        },

        logout() {
            // Clear token from local storage
            localStorage.removeItem('token');
            localStorage.removeItem('sid');
            // Commit logout mutation to update Vuex store state
            this.$store.commit('logout');
            // Clear any other user-related data from Vuex store if needed
            // For example: this.$store.commit('clearUserData');
            // Redirect to the login page or another appropriate page
            this.$router.push({ name: 'student.login' });
        }

    },
}

</script>
