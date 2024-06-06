
import { createRouter, createWebHistory } from 'vue-router';
import Home from "@/Home.vue";
import Login from "@/pages/auth/Login.vue";
import Register from "@/pages/auth/Register.vue";
import Dashboard from "@/pages/dashboard/Dashboard.vue";
import MainLayout from "@/pages/layouts/MainLayout.vue";
import PersonelBackground from '@/pages/profilings/personelBackground/PersonelBackgroundView.vue';
import PersonelBackgroundSave from "@/pages/profilings/personelBackground/SavePersonelBackgroundView.vue";
import EducationIBackgroundView from "@/pages/profilings/education/EducationBackgroundView.vue";
import SchoolSaveView from "@/pages/profilings/education/SchoolSaveView.vue";
import BachelorSaveView from "@/pages/profilings/education/BachelorSaveView.vue";
import MasterSaveView from  "@/pages/profilings/education/MasterSaveView.vue";


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
            },
            {
                path:'/profilings/personel/information/customize/:id?',
                name:'personel.add',
                component:PersonelBackgroundSave
            },
            {
                path:'/profilings/education/background/index',
                name:'education.index',
                component:EducationIBackgroundView
            },
            {
                path:'/profilings/education/school/customize/:id?',
                name:'school.add',
                component:SchoolSaveView,
            },

            {
                path:'/profiling/education/bachelor/customize/:id?',
                name:'bachelor.add',
                component:BachelorSaveView,
            },
            {
                path:'/profiling/education/master/customize/:id?',
                name:'master.add',
                component:MasterSaveView,
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
