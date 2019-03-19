<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-borderd table-hover table-striped">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            </td>
                            <td>Phone</td>
                            </td>
                            <td>Address</td>
                            </td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(customer, index) in customers">
                            <td>{{ customer.name }}</td>
                            <td>{{ customer.email }}</td>
                            <td>{{ customer.phone }}</td>
                            <td>{{ customer.address }}</td>
                            <td>
                                <a :href=" 'customer-edit/' + customer.id" class="btn btn-info">Edit</a>
                                <a href="javascript:;" @click.prevent="customerDelete(customer.id, index)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                customers: {},
                name: '',
                phone: '',
                address: '',
            }
        },

        mounted() {
            console.log('Component mounted.');
            this.getValue();
        },
        methods: {

            customerDataSave() {
                axios.post('/customer/data', {
                        name: this.name,
                        phone: this.phone,
                        address: this.address,
                    })
                    .then(function (response) {
                        console.log(response, 'Well done');
                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            customerDelete(id, index){
                alert('Are you sure you want to delete this customer?');
                axios.post('/customer-delete/' + id, {
                })
                .then(function(response){
                    console.log(response);
                    location.reload();
                })
                .catch(function(error){
                    console.log(error);
                }); 
            },

            getValue() {
                axios.get('/customer-list')
                    .then(response => {
                        this.customers = response.data;
                    })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }

    };


</script>
