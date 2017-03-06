<template>
    <div class="row">
        <p class='alert alert-success'>{{result}}</p>
        <h1>withdraw</h1>
        <h3> your Balance is  {{balance}}</h3><br>
        <h3> your Bonus is  {{bonuses}}</h3><br>
        <div class="form-inline">
            <label class="sr-only" for="inlineFormInput">Amount</label>
            <input type="text" v-model="withAmount" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Enter Withdraw Amount">
            <button @click="withdraw" class="btn btn-success">Withdraw</button>

        </div>
        <br>
        <br>
        <br>
    </div>

</template>
<script>
    export default {
        data () {
            return {
                balance:'',
                bonuses: '',
                withAmount:'',
                result: ''
            }
        },
        created() {
            this.loadwithdraw();
        },
        computed: {
            currentUserId (){
                return this.$auth.getAuthenticatedUserId();
            }
        },
        methods: {
            withdraw() {
                let data = {
                    amount: this.withAmount,
                    user_id:this.currentUserId
                };
                this.$http.post('api/withdraw',data)
                    .then(response => {
                        this.result = response.body;
                        this.withAmount ="";
                    })
            },
            loadwithdraw(){
                let user_id = this.currentUserId;
                this.$http.get('api/financial/'+ user_id)
                    .then(response => {
                        this.balance = response.body.amount;
                        this.bonuses = response.body.bonus;
                    })
            }
        },

    }
</script>