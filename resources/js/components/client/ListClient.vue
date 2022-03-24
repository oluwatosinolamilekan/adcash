<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Clients</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/client/create"  class="btn btn-primary btn-sm float-right mb-2">Add Client</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cash Balance</th>
                            <th>Gain Loss</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="client in clients" v-bind:key="client.id">

                            <td>{{ client.name }}</td>
                            <td>{{ priceFormat(0) }}</td>
                            <td></td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <router-link :to="{name: 'ShowClientStock', params: { id: client.id }}" class="dropdown-item">View Stock</router-link>
<!--                                        <button class="dropdown-item" @click="deleteStock(stock.id)">Delete</button>-->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListClient",
    data(){
        return {
            clients: []
        }
    },
    created() {
        this.getRecords()
    },
    methods: {
        getRecords(){
            axios.get('api/client/index')
                .then((response) => {
                    this.clients = response.data.data
                }).catch((err) => {
                    console.log(err)
            })
        },
        deleteStock(id){
            axios.delete(`api/client/delete/${id}`)
                .then((response) => {
                    let i = this.clients.map(data => data.id).indexOf(id);
                    this.clients.splice(i, 1)
                }).catch((err) => {
                console.log(err)
            })
        },
        numberFormat(n){
            return "€ " + (Math.round(n * 100) / 100).toFixed(2);
        }
    },
}
</script>

<style scoped>

</style>
