<template>
    <div class="col-lg-6 col-md-6 col-sm-4">
        <div class="d-flex flex-row-reverse">
            <div class="page_action">
                <router-link :to="{ name: buttonData.routeName }" class="btn btn-secondary bg-dark text-white">{{
                    buttonData.title }}</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AddButton',
    props: {
        buttonData: {
            typeof: Array
        }
    }
}

</script>
