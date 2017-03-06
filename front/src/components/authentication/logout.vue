<template>
    <h1>out</h1>
</template>
<script>
    export default {
        data () {
            return {}
        },
        created() {
            this.$auth.destroyToken();
            this.$auth.killAuthenticatedUser();
            this.$router.push("/login");
        },
    }
</script>