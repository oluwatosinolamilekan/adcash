<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Client</h2>
                    <div class="align-items-center px-3 px-md-5">
                        <router-link to="/clients" class="btn btn-primary btn-sm float-right mb-2">
                            Back
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" @submit.prevent="addClient()">
                        <div class="row">
                            <div class="col-xl-6" >
                                <div class="mb-5" >
                                    <label class="text-dark font-weight-medium">Client</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" v-model="form.name" required/>
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
    name: "CreateClient",
    data(){
        return {
            allErrors: [],
            form:{
                name: ''
            }
        }
    },
    methods:{
        addClient(){
            axios.post('/api/client/store',this.form)
                .then(response => {
                    this.$router.push({name: 'ListClient'})
                })
                .catch(err =>{
                    console.log(err.response.data.errors)
                })
        }
    }
}
</script>

<style scoped>

</style>
