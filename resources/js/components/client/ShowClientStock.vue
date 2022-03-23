<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>List client's Stock {{client.name}}</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/clients"  class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Volume</th>
                            <th>Purchase Price</th>
                            <th>Current Price</th>
                            <th>Gain/ Loss</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="stock in stocks" v-bind:key="stock.id">

                            <td>{{ stock.stock }}</td>
                            <td>{{ stock.volume }}</td>
                            <td>{{ stock.volume * client.unit_price}}</td>
                            <td>
                                {{client.unit_price}}
                            </td>
                            <td>{{client.unit_price - (stock.volume * client.unit_price)}}</td>
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
    name: "ShowClientStock",
    data(){
        return {
            client: {},
            stocks: []
        }
    },
    created() {
        axios.get(`/api/client/show/${this.$route.params.id}`) //Todo find another method to get the data by not calling another endpoint
            .then((response) => {
                this.client = response.data.data;
                this.stocks = response.data.data.stocks;
            });
    },
}
</script>

<style scoped>

</style>
