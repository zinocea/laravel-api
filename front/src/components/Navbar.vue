<template>
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <router-link tag="li" to="/login" v-if = "! isAuth" >
                   <a>Login</a>
                </router-link>
                   <router-link tag="li" to="/register" v-if = "! isAuth" >
                       <a>Register</a>
                    </router-link>
                <router-link tag="li" to="/logout" v-if = "isAuth" >
                    <a>Log Out</a>
                </router-link>
                <router-link tag="li" to="/" v-if = "isAuth" >
                    <a>Home</a>
                </router-link>
                <router-link tag="li" to="/add" v-if = "isAuth" >
                    <a>Add Customer</a>
                </router-link>
                <router-link tag="li" to="/deposit" v-if = "isAuth" >
                    <a>Deposit</a>
                </router-link>
                <router-link tag="li" to="/withdraw" v-if = "isAuth" >
                    <a>Withdraw</a>
                </router-link>
                <router-link tag="li" to="/report" v-if = "isAuth" >
                    <a>Report</a>
                </router-link>

            </ul>
        </nav>
        <h3 class="text-muted">WebVenture Test </h3>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                isAuth: null
            }
        },
        created() {
            this.isAuth = this.$auth.isAuthenticated();
            this.setAuthenticatedUser();
        },
        methods: {
            setAuthenticatedUser() {
                this.$http.get('api/user')
                    .then(response => {
                        this.$auth.setAuthenticatedUser(response.body);
                        console.log(this.$auth.getAuthenticatedUser());
                    })
            }
        }
    }
</script>

<style >

</style>
