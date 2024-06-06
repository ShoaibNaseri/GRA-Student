<template>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <h2>{{ headerData.mainTitle }}</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><router-link href="" :to="{ name: 'Dashboard' }"><i
                        class="fa fa-dashboard"></i></router-link></li>
            <li class="breadcrumb-item">{{ headerData.belongsTo }}</li>
            <li class="breadcrumb-item active">{{ headerData.subTitle }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "TitleHeader",
    props: {
        headerData: {
            typeof: Array
        }
    }
}
</script>
