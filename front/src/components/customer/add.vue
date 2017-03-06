<template>
    <div class="row">
        <div class='alert alert-success'>
            {{result}}
        </div>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input
                                v-model="firstname"
                                class="form-control"
                                type="text"
                                placeholder="First Name"
                        >
                    </div>
                    <div class="form-group">
                        <input
                                v-model="lastname"
                                class="form-control"
                                type="text"
                                placeholder="Last Name"
                        >
                    </div>
                    <div class="form-group">
                        <input
                                v-model="email"
                                class="form-control"
                                type="email"
                                placeholder="Email"
                        >
                    </div>
                    <div class="form-group">
                        <input
                                v-model="gender"
                                class="form-control"
                                type="text"
                                placeholder="Gender"
                        >
                    </div>
                    <div class="form-group">
                        <input
                                v-model="country"
                                class="form-control"
                                type="text"
                                placeholder="Country"
                        >
                    </div>
                    <div class="form-group">
                        <button @click="addCustomer" class="btn btn-success">Add Customer</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                firstname: "",
                lastname: "",
                email: "",
                gender: "",
                country: "",
                result:"",
                }
        },
        computed:{
           currentUserId (){
                return this.$auth.getAuthenticatedUserId();
                     }
        },
        methods: {
            addCustomer() {
               let data = {
                    user_id: this.currentUserId,
                    firstname: this.firstname,
                    lastname: this.lastname,
                    email: this.email,
                    gender: this.gender,
                    country: this.country
                };
                this.$http.post('api/customer',
                    data
                )
                    .then(response => {
                        console.log(response);
                        this.firstname = "",
                        this.lastname = "",
                        this.email = "",
                        this.gender = "",
                        this.country = "",
                        this. setResponse(response.statusText)
                    })
            },
            setResponse (res) {
                if(res == "OK"){
                    this.result = "Customer added Successfully"
                }else{
                    this.result = "the email already exist in database"
                }
            }
           }
    }
</script>
<style>

</style>