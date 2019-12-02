<script>
    export default {
        mounted() {
            console.log('Supervisor Notification Center Component mounted.')
        },
        data(){
            return{
                form: new Form({
                    user_id: '',
                    incident_id: '',
                    description: ''
                })
            }
        },
        methods: {
            sendIncident(id){
                this.form.user_id = id;
                // console.log(this.form.user_id);
                this.form.post('/notification')
                    .then(()=>{
                        console.log('Success');
                    })
                    .catch(()=>{
                        console.log('Faild');
                    });
            }
        },
    };
</script>