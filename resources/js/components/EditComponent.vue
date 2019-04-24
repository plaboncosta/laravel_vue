<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="customer.name" type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input v-model="customer.email" type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="customer.phone">Phone</label>
                        <input v-model="customer.phone" type="text" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="customer.address">Address</label>
                        <input v-model="customer.address" type="text" class="form-control" id="address">
                    </div>
                    <input @click.prevent="customerDataUpdate" type="submit" class="btn btn-info" value="Save">
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['customer'],

        data() {
            return {
                name: '',
                email: '',
                phone: '',
                address: '',
            }
        },

        methods: {

            customerDataUpdate() {
                axios.post('/customer/update/' + this.customer.id, {
                        name: this.customer.name,
                        email: this.customer.email,
                        phone: this.customer.phone,
                        address: this.customer.address,
                    })
                    .then(function (response) {
                        console.log(response, 'Well done');
                        location = '/customer';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
