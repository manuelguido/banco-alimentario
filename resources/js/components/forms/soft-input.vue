<template>
  <div>
    <label v-if="label" class="mb-1">
      {{ label }}
      <span v-if="required"> (*)</span>
    </label>
    <input
      class="soft-input"
      v-bind:value="value"
      v-on:input="$emit('input', $event.target.value)"
      :type="type"
      :placeholder="placeholder"
      :minlength="minlength"
      :min="min"
      :max="max"
      :step="step"
      required
      :autocomplete="autocomplete"
    />
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: [Number, Date, String],
    },
    placeholder: {
      type: [String, Number],
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    label: {
      type: String,
      default: "",
    },
    required: {
      type: Boolean,
      default: false,
    },
    minlength: {
      type: [String, Number],
    },
    min: {
      type: [String, Number],
      default: null,
    },
    max: {
      type: [String, Number],
      default: null,
    },
    maxLimit: {
      type: Boolean,
      default: false,
    },
    step: {
      type: [String, Number],
      default: 0,
    },
    autocomplete: {
      type: String,
      default: "off",
    },
    loading: {
      type: Boolean,
      default: false,
    },
  },
  watch: {
    value: function () {
      if (this.value > this.max) {
        this.$emit("input", this.max);
      }
    },
  },
};
</script>

<style scoped>
.soft-input {
  width: 100%;
  border: 0 solid transparent;
  border-radius: 8px;
  padding: 11px 16px;
  background: #f1f1f1;
  color: var(--black-a);
}

.is-invalid {
  border: 2px solid rgba(255, 0, 0, 0.6);
}

.soft-input:focus {
  outline: none;
  box-shadow: none;
}

.soft-input::placeholder {
  color: #aaa;
}
</style>

