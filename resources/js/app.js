import './bootstrap';
import store from '@/store'; // Import Vuex store
import { createApp } from 'vue/dist/vue.esm-bundler';
import router from "@/routes/routes";
import FlagIcon from 'vue-flag-icon';
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
import Home from "@/Home.vue";




const app = createApp(Home);




const token = localStorage.getItem('token');
if (token) {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
}

const isLoggedIn = () => {
    return localStorage.getItem('token');
};

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !isLoggedIn()) {
        // Check if the route requires authentication and the user is not logged in
        next({ name: 'student.login' }); // Redirect to the 'Login' route
    } else if (to.name === 'student.login' && isLoggedIn()) {
        // If trying to access the login page while logged in, redirect to Dashboard
        next({ name: 'Dashboard' });
    } else {
        next(); // Continue navigation
    }
});
app.use(router).use(store).use(VueToast).use(FlagIcon).mount("#app");
