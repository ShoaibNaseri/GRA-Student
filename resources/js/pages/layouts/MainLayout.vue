<template>
    <top-bar :wallet="wallet"></top-bar>
    <side-bar :student="student"></side-bar>
    <router-view></router-view>
</template>
<script>
import axios from 'axios';
import SideBar from '@/components/mainLayout/SideBar.vue';
import TopBar from '@/components/mainLayout/TopBar.vue';

export default {
    components: { SideBar, TopBar },
    data() {
        return {
            studentId: localStorage.getItem('sid'),
            studentData: '',
            student: {
                name: '',
                status: '',
                image: '',

            },
            wallet: {
                walletName: '',
                balance: '',
                status: '',
                isNull: true,
            }

        }
    },

    mounted() {
        axios.get(`/api/student/profile/wallet/${this.studentId}`)
            .then(response => {
                this.studentData = response.data;
                this.student.name = this.studentData.name;
                this.student.status = this.studentData.status;
                this.student.image = this.studentData.image;
                this.wallet.name = this.studentData.wallet.name;
                if (this.studentData.wallet != null) {
                    this.wallet.isNull = false;
                    this.wallet.balance = this.studentData.wallet.amount;
                    this.wallet.status = this.studentData.wallet.status;
                }
                console.log(response.data)
            })
    },

}
</script>

<style></style>
