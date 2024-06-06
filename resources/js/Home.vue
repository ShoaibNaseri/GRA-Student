<template>
    <router-view></router-view>
</template>
<script>
export default {
    methods: {
        checkTost() {
            this.$toast.open({
                message: 'Something went wrong!',
                type: 'warning',
                position: 'top-right',
                // all of other options may go here
            });
        }
    }
}
</script>
