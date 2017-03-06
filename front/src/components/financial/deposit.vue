<template>
    <div class="row">
        <p class='alert alert-success'>{{result}}</p>
    <h1>deposit</h1>
        <h3> your Balance is  {{balance}}</h3><br>
        <h3> your Bonus is  {{bonuses}}</h3><br>
        <div class="form-inline">
            <label class="sr-only" for="inlineFormInput">Amount</label>
            <input type="text" v-model="AddedAmount" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Enter Deposit Amount">
            <button @click="addDeposit" class="btn btn-success">Add Deposit</button>
            <br>
            <br>
            <br>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                balance:'',
                bonuses: '',
                AddedAmount:'',
                result: ''
            }
        },
        created() {
            this.loadDeposit();
        },
        computed:{
            currentUserId (){
                return this.$auth.getAuthenticatedUserId();
            }
        },
        methods: {
            addDeposit() {
                let data = {
                    amount: this.AddedAmount,
                    user_id:this.currentUserId
                };
                this.$http.post('api/deposit', data)
                    .then(response => {
                        this.result = response.body;
                        this.AddedAmount="";
                    })
            },
            loadDeposit() {
                let user_id = this.currentUserId;
                this.$http.get('api/financial/'+ user_id)
                    .then(response => {
                       this.balance = response.body.amount;
                       this.bonuses = response.body.bonus;
                    })
            }
        }
    }
</script>