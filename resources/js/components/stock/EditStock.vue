<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Stock</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/" class="btn btn-primary btn-sm float-right mb-2">
                            Back
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" @submit.prevent="updateStock()">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" v-model="stock.name"required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Unit Price</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" v-model="stock.unit_price" required/>
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
    name: "EditStock",
    data(){
        return {
            stock:{}
        }
    },
    created() {
        axios.get(`/api/stock/show/${this.$route.params.id}`) //Todo find another method to get the data by not calling another endpoint
            .then((response) => {
                this.stock = response.data.data;
            });
    },
    methods:{
        updateStock(){
            axios.put(`/api/stock/update/${this.$route.params.id}`,this.stock)
                .then((response) => {
                    this.$router.push({ name: 'ListStock' });
                })
        }
    }
}
</script>

<style scoped>

</style>
