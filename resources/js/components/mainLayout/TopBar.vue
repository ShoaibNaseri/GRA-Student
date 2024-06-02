<template>
    <!-- Top navbar div start -->
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
                <a href="">GlobalReachAdmission</a>
            </div>
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <wallet-list :wallet="wallet"></wallet-list>
                        <notification-list></notification-list>
                        <logout-icon></logout-icon>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import LogoutIcon from '../topBar/LogoutIcon.vue'
import NotificationList from '../topBar/NotificationList.vue'
import WalletList from '../topBar/WalletList.vue'
export default {
    components: {
        WalletList,
        NotificationList,
        LogoutIcon
    },
    props: {
        wallet: {
            typeof: Array
        }
    },
    name: "TopBar"
}

</script>
