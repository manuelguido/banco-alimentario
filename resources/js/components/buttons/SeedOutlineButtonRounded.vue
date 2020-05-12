<template>
    <a class="btn seed-rounded waves-effect"
        v-bind:class="'seed-btn-outline-'+color+' btn-'+size"
        v-bind:href="url">
        {{title}}
    </a>
</template>

<script>
    import { mdbBtn } from 'mdbvue';
    export default {
        name: 'ButtonPage',
        components: {
            mdbBtn
        },
        props: {
            color: String,
            size: String,
            url: String,
            title: String
        }
    }
</script>
