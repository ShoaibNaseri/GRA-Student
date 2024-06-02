<template>
    <li v-if="wallet.isNull">
        <span class="text-danger">No wallet</span>
    </li>
    <li v-else>
        <span class="text-danger" v-if="wallet.status === 'InActive'"> <strong>Your Wallet Hasnt been Active
                Yet</strong></span>
        <span class="text-info" v-else><strong>Wallet Balance:
                {{ wallet.balance }} £</strong></span>

    </li>
</template>
<script>
export default {
    props: {
        wallet: {
            typeof: Object
        }
    }
}
</script>
