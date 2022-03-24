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
                    <table id="productsTable" class="table table-product" style="width:100%">
                        <thead>
                        <tr v-if="stocks.length > 0">
                            <th>Name</th>
                            <th>Volume</th>
                            <th>Purchase Price</th>
                            <th>Current Price</th>
                            <th>Gain/ Loss</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-if="stocks.length === 0">
                            <td>No Client stock </td>
                        </tr>
                        <tr  v-for="stock in stocks" v-bind:key="stock.id" v-else>

                            <td>{{ stock.stock }}</td>
                            <td>{{ stock.volume }}</td>
                            <td>{{ numberFormat(stock.volume * client.unit_price)}}</td>
                            <td>
                                {{numberFormat(client.unit_price)}}
                            </td>
                            <td v-if="numberFormat(client.unit_price - (stock.volume * client.unit_price)) >= 0">
                                 <span class="text-success">
                                     <i class="mdi mdi-arrow-up-bold text-success"></i>
                                     <span>+ {{ numberFormat(client.unit_price - (stock.volume * client.unit_price))}}</span>
                                </span>

                            </td>
                            <td v-else>
                                <span class="text-danger">
                                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                                    <span>{{ numberFormat(client.unit_price - (stock.volume * client.unit_price))}}</span>
                                </span>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td colspan="6" align="right">Total</td>-->
<!--                            <td class="total" colspan="2"><b>$ 163.47</b></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td colspan="6" align="right">Investment</td>-->
<!--                            <td class="total" colspan="2"><b>$ 163.47</b></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td colspan="6" align="right">Performance</td>-->
<!--                            <td class="total" colspan="2"><b>$ 163.47</b></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td colspan="6" align="right">Cash Balance</td>-->
<!--                            <td class="total" colspan="2"><b>$ 163.47</b></td>-->
<!--                        </tr>-->

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
            stocks: [],
            // total: null,
            // cash_balance: null,
            // performance: null,
            // invested: null,
        }
    },
    created() {
        axios.get(`/api/client/show/${this.$route.params.id}`) //Todo find another method to get the data by not calling another endpoint
            .then((response) => {
                this.client = response.data.data;
                this.stocks = response.data.data.stocks;
            });
    },
    methods:{
        numberFormat(n){
            return "€ " + (Math.round(n * 100) / 100).toFixed(2);
        }
    }
}
</script>

<style scoped>

</style>
