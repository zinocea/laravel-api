<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input
                                v-model="fname"
                                class="form-control"
                                type="text"
                                placeholder="First Name"
                        >
                    </div>
                    <div class="form-group">
                        <input
                                v-model="lname"
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
                                v-model="password"
                                class="form-control"
                                type="password"
                                placeholder="Password"
                        >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Register</button>

                    </div>
                </div>
                {{fname}}<br>
                {{lname}}<br>
                {{email}}<br>
                {{password}}<br>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'register',
        data(){
            return{
                fname:"",
                lname:"",
                email:"",
                password:""

            }
        }
    }
</script>
<style>

</style>