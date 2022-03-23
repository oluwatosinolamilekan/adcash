<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Stocks</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/create/stock" class="btn btn-primary btn-sm float-right mb-2">Add Stock</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Unit Price</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="stock in stocks" v-bind:key="stock.id">

                            <td>{{ stock.name }}</td>
                            <td>{{ stock.unit_price }}</td>
                            <td>{{ stock.updated_at }}</td>
                            <td>
                                <router-link :to="{name: 'EditStock', params: { id: stock.id }}" class="btn btn-secondary">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteStock(stock.id)">Delete</button>
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
    name: "ListStock",
    data(){
        return {
            stocks: []
        }
    },
    created() {
        this.getRecords()
    },
    methods: {
        getRecords(){
            axios.get('api/stock/index')
                .then((response) => {
                    this.stocks = response.data.data
                }).catch((err) => {
                console.log(err)
            })
        },
        deleteStock(id){
            axios.delete(`api/stock/delete/${id}`)
                .then((response) => {
                    let i = this.stocks.map(data => data.id).indexOf(id);
                    this.stocks.splice(i, 1)
                }).catch((err) => {
                    console.log(err)
            })
        },

    },
}
</script>

<style scoped>

</style>
