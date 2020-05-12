<template>
    <div class="col-12 text-center mt-2">
        <a href="/" class="btn seed-rounded seed-btn-outline-primary">
            <i class="fas fa-chevron-left seed-primary mr-2"></i>
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