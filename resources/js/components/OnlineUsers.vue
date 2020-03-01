<template>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted')
        },
        data() {
            return {
                onlineUsers: 0,
                onlineUsersArrayId: []
            }
        },
        created() {

            var onlineUsersArrayId = [], onlineUsers = 0, loc = '';   
            
            window.Echo.channel('online')
                .listen('OnlineUsers',(event) => {
                    console.log('event', event);
                })

            window.Echo.join('online')
                .here((users) => {
                    this.onlineUsers = users.length;
                    console.log(users);

                    this.update_online_counter(this.onlineUsers);
                })
                .joining((user) => {
                    this.onlineUsers++;
                    this.update_online_counter(this.onlineUsers);
                    
                        this.onlineUsersArrayId.push(user.id);
                    // console.log(user);
                })
                .leaving((user) => {
                    this.onlineUsers--;                    
                    this.update_online_counter(this.onlineUsers);
                });

                console.log(this.onlineUsers);
        },
        methods: {

            update_online_counter(cnt) {
                jQuery('#online').text(cnt);
            },

            isInArray(value, array) {
              return array.indexOf(value) > -1;
            }
        }
    }
</script>
