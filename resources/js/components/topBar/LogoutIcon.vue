<template>
    <li>
        <a href="" @click="logout" class="icon-menu"><i class="fa fa-power-off text-danger"></i></a>
    </li>
</template>
<script>
export default {
    methods: {
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
    }
}

</script>
