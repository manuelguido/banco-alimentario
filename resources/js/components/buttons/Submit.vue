<template>
  <button
    type="submit"
    :class="[
      'btn btn-primary mx-0',
      'btn-block'
      ]">
    {{text}}
  </button>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      default: 'Enviar'
    }
  }
}
</script>
