<template>
    <a class="btn waves-effect"
        :class="' seed-btn-'+color+' btn-'+size"
        :href="url">
        {{title}}
    </a>
</template>

<script>
    import { mdbBtn } from 'mdbvue';
    export default {
        name: 'Button',
        components: {
            mdbBtn
        },
        props: {
            color: String,
            size: String,
            url: String,
            title: String,
            rounded: Boolean
        }
    }
</script>
