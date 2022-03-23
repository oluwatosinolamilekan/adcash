<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Advertising campaign</h2>
                    <div class="align-items-center px-3 px-md-5">
<!--                        <router-link to="/create"  class="btn btn-primary">Create</router-link>-->
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Total Budget</th>
                            <th>Daily Budget</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr >

                            <td>Name</td>
                            <td>Date</td>
                            <td>Total</td>
                            <td>Budget</td>
                            <td>
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
                    console.log(response.data)
                }).catch((err) => {
                    console.log(err)
            })
        }
    },
}
</script>

<style scoped>

</style>
