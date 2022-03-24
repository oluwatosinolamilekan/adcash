<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Client Stocks</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/create/client-stock"  class="btn btn-primary btn-sm float-right mb-2">Add Client Stock</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>Company</th>
                            <th>Volume</th>
                            <th>Purchase Price</th>
                            <th>Current Price</th>
                            <th>Gain/Loss</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="client in clients" v-bind:key="clients.id">
                            <td>{{ client.company }}</td>
                            <td>{{ client.volume }}</td>
                            <td>{{ priceFormat(client.volume * client.unit_price)}}</td>
                            <td>
                                {{priceFormat(client.unit_price)}}
                            </td>
                            <td v-if="priceFormat(client.unit_price - (client.volume * client.unit_price)) >= 0">
                                 <span class="text-success">
                                     <i class="mdi mdi-arrow-up-bold text-success"></i>
                                     <span>+ {{ priceFormat(client.unit_price - (client.volume * client.unit_price))}}</span>
                                </span>

                            </td>
                            <td v-else>
                                <span class="text-danger">
                                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                                    <span>{{ priceFormat(client.unit_price - (client.volume * client.unit_price))}}</span>
                                </span>
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
    name: "ListClientStock",
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
            axios.get('api/client-stock/index')
                .then((response) => {
                    this.clients = response.data.data
                }).catch((err) => {
                console.log(err)
            })
        },

    },
}
</script>

<style scoped>

</style>
