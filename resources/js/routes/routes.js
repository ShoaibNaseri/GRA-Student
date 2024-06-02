
import { createRouter, createWebHistory } from 'vue-router';
import Home from "@/Home.vue";
import Login from "@/pages/auth/Login.vue";
import Register from "@/pages/auth/Register.vue";
import Dashboard from "@/pages/dashboard/Dashboard.vue";
import MainLayout from "@/pages/layouts/MainLayout.vue";
import PersonelBackground from '@/pages/profilings/personelBackground/PersonelBackgroundView.vue';



const routes = [
    {
        // path:'/',
        // name:'Home',
        // component:Home,
        // meta:{
        //   requiresAuth:true
        // }

    },
    {
        path:'/student',
        name:'MainLayout',
        component:MainLayout,
        meta:{requiresAuth:true},
        children:[
            {
                path:"/",
                name:'Dashboard',
                component:Dashboard
            },
            {
                path:'/profilings/personel/background',
                name:'profilings.personel',
                component:PersonelBackground
            }
        ]
    }

    ,
       {
         path:'/login',
        name:'student.login',
        component:Login
       },
       {
         path:'/register',
        name:'student.register',
        component:Register
       }
]


const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
