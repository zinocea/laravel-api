<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input
                                v-model="email"
                                class="form-control"
                                type="email"
                                placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input
                                v-model="password"
                                class="form-control"
                                type="password"
                                placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <button @click="login_in" class="btn btn-success">Login</button>

                    </div>
                </div>
                {{email}}
                {{password}}
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'login',
        data(){
            return {
                email: "",
                password: ""

            }
        },
        methods: {
            test() {
                this.$http.get("http://localhost/webventure/venture_test/laravel54/public/index.php/api/test")
                    .then(function (response) {
                        console.log(response.body)
                    })
            },
            login_in() {
                let data = {
                    client_id: 2,
                    client_secret: "aktqHigYhgmlVxcAV9QTFFPAK2zUPGdAbR9lBgBj",
                    grant_type: "password",
                    username: this.email,
                    password: this.password
                };
                this.$http.post(
                    "oauth/token",
                    data
                )
                    .then(response => {
                        this.$auth.setToken(
                            response.body.access_token,
                            response.body.expires_in + Date.now(),
                        );
                        this.$router.push("/")
                    })


            }
        }
    }
</script>
<style>

</style>