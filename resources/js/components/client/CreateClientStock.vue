<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Purchase Stock</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/clients" class="btn btn-primary btn-sm float-right mb-2">
                            Back
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" @submit.prevent="addClientStock()">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Choose Client</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control" v-model="form.client_id" required>
                                            <option value="" disabled>Select Option</option>
                                            <option v-for="client in clients" :value="client.id">
                                                {{ client.name }}
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Choose Stock</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control"  v-model="form.stock_id" required>
                                            <option value="" disabled>Select Option</option>
                                            <option v-for="stock in stocks" v-bind:key="stock.id" :value="stock.id">
                                                {{ stock.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Volume</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" v-model="form.volume" placeholder="Enter Volume" required/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary btn-pill mr-2" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </template>

<script>
export default {
    name: "CreateClientStock",
    data(){
        return {
            clients: [],
            stocks: [],
            form:{
                stock_id: '',
                client_id: '',
                volume: '',
            }
        }
    },
    created() {
        this.getClientRecords()
        this.getStockRecords()
    },
    methods:{
        getClientRecords(){
            axios.get('/api/client/index')
                .then((response) => {
                    this.clients = response.data.data
                }).catch((err) => {
            })
        },
        getStockRecords(){
            axios.get('/api/stock/index')
                .then((response) => {
                    this.stocks = response.data.data
                }).catch((err) => {
            })
        },
        addClientStock(){
            axios.post('/api/client-stock/store', this.form)
                .then(response => {
                    this.$router.push({name: 'ListClientStock'})
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
