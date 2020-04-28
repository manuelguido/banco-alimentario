<template>
    <div class="col-xl-12 text-center mt-5">
        <a href="/" class="btn seed-rounded seed-btn-outline-primary">
            <i class="far fa-chevron-left seed-primary mr-3"></i>
            Volver al inicio
        </a>
    </div>
</template>

<script>
    import { mdbBtn } from 'mdbvue';
    export default {
        name: 'ButtonPage',
        components: {
            mdbBtn
        }
    }
</script>