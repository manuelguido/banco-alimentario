const production = true;

const assetMixin = {
	data () {
		return {
			dev_path: 'http://127.0.0.1:8001/',
			prod_path: 'https://banco-alimentario.herokuapp.com/public/',
		}
	},
	methods: {
  	asset_path () { 
			if (production) {
				return this.prod_path;
			}
			else {
				return this.dev_path;
			}
		},
		image_path () {
			return this.asset_path() + 'img/'
		}
	},
}

export default assetMixin
