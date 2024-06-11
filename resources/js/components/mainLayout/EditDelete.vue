<template>
    <router-link href="" :to="{ name: editDeletData.editRoute }" class="btn btn-sm btn-primary"><i
            class="fa fa-pencil"></i></router-link>
    <router-link :to="{}" href="" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i></router-link>
</template>

<script>
export default {
    props: {
        editDeletData: {
            typeof: Array
        }
    }
}

</script>
