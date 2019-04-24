<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" v-model="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" v-model="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" v-model="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" v-model="address" class="form-control">
                    </div>
                    <input @click.prevent="customerDataSave" type="submit" class="btn btn-info" value="Save">
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div style="width: 100%;" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>SERIAL NO.</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                            <td>ACTION</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(customer, index) in customers" :key="index">
                            <td>{{ index+1 }}</td>
                            <td>{{ customer.name }}</td>
                            <td>{{ customer.email }}</td>
                            <td>{{ customer.phone }}</td>
                            <td>{{ customer.address }}</td>
                            <td>
                                <a :href=" 'customer/' + customer.id" class="btn btn-info">EDIT</a>
                                <a href="#" v-on:click="customerDelete(customer.id)"class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                    </tbody>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['customers'],

        data(){
            return {
                name: '',
                email: '',
                phone: '',
                address: '',
            }
        },

        methods: {
            customerDataSave(){
                axios.post('/customer/data-save', {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    address: this.address,
                })
                .then(function(response){
                    console.log(response);
                    location.reload();
                })
                .then(function(error){
                    console.log(error);
                });
            },


            customerDelete(id){
                axios.get('/customer/delete/' + id)
                .then(function(response){
                    console.log(response);
                    location.reload();
                })
                .then(function(error){
                    console.log(error)
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
