<script>

	class Errors{
	
		constructor() {

			this.errors = {};
		}

		get(field){

			if (this.errors[field]) {

				return this.errors[field][0];
			}
		}

		record(errors){

			this.errors = errors;
		}
	}

	export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){
        	return{
        		name: '',
        		description: '',
        		incident_type_id: '',
        		errors: new Errors()
        	}
        },

        methods: {

        	onSubmit(){

        		axios.post('/incident', this.$data)

	        		.then(response => window.location.replace('/incident_type'))
	        		.catch(error => this.errors.record(error.response.data.errors));
        	}

        	
        }
    }

</script>		