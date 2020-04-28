<template>       
    <div class="col-12 col-lg-5 text-center mobile-hide">
        <img v-bind:src="img_url" class="donate-image uns lazyload ">
    </div>
</template>

<style scoped>
.donate-image {
    width: 65%;
    margin: 22% auto;
}
</style>

<script>
    export default {
        props: {
            img_url: String
        }
    }
</script>
