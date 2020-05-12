<template>
    <div class="form-group pt-5 mb-0 text-right">
        <a type="submit" class="btn btn-primary m-0">
            {{title}}
        </a>
    </div>
</template>

<script>
export default{
    props: {
        title: String
    }
}
</script>
