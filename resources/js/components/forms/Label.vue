<template>
    <label for="brand_id" class="text-lg-left black-b w300 ls03 mb-1">
        {{title}}
        <!-- Indica que el campo es requerido -->
        <div v-if="req" class="req-tooltip seed-warning-dark m-0 p-0">
            (Ob)<span class="req-tooltip-text seed-warning-dark w400 seed-rounded">Campo obligatorio</span>
        </div> 
    </label>
</template>

<style>
.req-tooltip {
    position: relative;
    display: inline-block;
    cursor: pointer !important;
    color: inherit;
    z-index: 10;
    font-size: 12px !important;
}
.req-tooltip .req-tooltip-text {
    visibility: hidden;
    width: 13em;
    color: #333;
    text-align: center;
    margin: -7px 0 0 10px;
    padding: 8px 15px !important;
    box-shadow: 0 10px 10px rgba(0,0,0,0.05), 0 6px 6px rgba(0,0,0,0.1);
    position: absolute;
    z-index: 1;
}
.req-tooltip:hover .req-tooltip-text {
    visibility: visible;
}
</style>

<script>
    export default {
        props: {
            for: String,
            title: String,
            req: Boolean,
        }
    }
</script>
