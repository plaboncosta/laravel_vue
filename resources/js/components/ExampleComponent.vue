<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                customers: {},
            }
        },

        mounted() {
            this.getData();
        },

        methods: {
            getData() {
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
        },
    }

</script>
