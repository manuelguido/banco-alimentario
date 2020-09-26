const csrfMixin = {
	data () {
		return {
			data_csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		}
	},
	methods: {
  	csrf () { 
			return this.data_csrf;
		}
	},
}

export default csrfMixin
