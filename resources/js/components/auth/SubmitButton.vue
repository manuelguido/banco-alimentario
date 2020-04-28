<template>
    <div class="form-group row mb-0 justify-content-end mt-5">
        <div class="col-12 col-lg-7">
            <button type="submit" class="btn seed-btn-primary btn-block m-0 px-5">
                {{title}}
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: String
        }
    }
</script>
