<template>
    <div class="container">
        <button class="btn btn-primary" @click="followUser" v-text="buttontext"></button>
    </div>
</template>

<script>
    export default {
        props:[
            'userId','follows'
        ],
        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return {
                status:this.follows,
            }
        },

        methods:{
            followUser(){
                 axios.post('follow/'+this.userId).then(response=>{
                        this.status=!this.status;
                    }).catch(errors=>{
                        if(errors.response.status==401){
                            window.location.href = 'http://localhost/insta/public/login';
                        }
                    });
                }
        },
        computed:{
            buttontext(){
                return (this.status)?'Unfollow':'Follow'
            }
        }
    }
</script>
