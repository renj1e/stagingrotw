<template>

</template>

<script>
    export default {
        mounted() {
            console.log('Component[RiderTableWidget] mounted')
        },
        data() {
            return {
            }
        },
        created() {
            this.get_rider_by_zipcode();
        },
        methods: {

            get_rider_by_zipcode() {
                axios.get('/api/get-all-riders', {
                    headers: {
                        'Authorization': 'Bearer '+ window.token,
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },      
                })
                .then((res) => {
                    console.log(res)
                })
                .catch((err) => {
                    console.log(err)
                })
            },
        }
    }
</script>
