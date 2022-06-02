<template>
    <button @click="login">Login</button>
</template>
<script>
export default {
    name:'Login',
    methods:{
        login(){
            this.$router.push('/instruction');
        }
    }
}
</script>