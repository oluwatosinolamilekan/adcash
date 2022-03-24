<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Stock</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/" class="btn btn-primary btn-sm float-right mb-2">
                            Back
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" @submit.prevent="addStock()">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" v-model="form.name" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Unit Price</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" v-model="form.unit_price" required/>
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
    name: "CreateStock",
    data(){
        return{
            erros: [],
            form:{
                name: '',
                unit_price: ''
            }
        }
    },
    methods:{
        addStock(){
            axios.post('/api/stock/store',this.form)
                .then(response => {
                    this.$router.push({name: 'ListStock'})
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
