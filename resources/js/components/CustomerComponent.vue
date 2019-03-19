<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input v-model="name" type="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input v-model="email" type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input v-model="phone" type="phone" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input v-model="address" type="address" class="form-control" id="address">
                            </div>
                            <button @click.prevent="customerDataSave()" type="submit" class="btn btn-info">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                posts:{},
                name: '',
                email: '',
                phone: '',
                address: '',
            }
        },

        mounted() {
            this.getData();
        },

        methods: {

            customerDataSave(){
                axios.post('/customer/post', {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    address: this.address,
                })
                .then(function (response) {
                    console.log(response, 'Well Done');
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            getData(){
                axios.get('https://jsonplaceholder.typicode.com/posts')
                    .then(response => {
                        this.posts = response.data;
                    })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
    }
</script>
