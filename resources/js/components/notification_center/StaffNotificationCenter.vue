<script>
    export default {
        mounted() {
            console.log('Staff Notification Center Component mounted.')
        },
        data(){
            return{
                form: new Form({
                    standard_response_id: '',
                    message: '',
                })
            }
        },
        methods: {
            sendMessage(id){
                console.log(this.form.standard_response_id);
                this.form.put('/notification/'+id)
                    .then(()=>{
                        console.log('Success');
                    })
                    .catch(()=>{
                        console.log('Faild');
                    });
            },

            solve(){
                console.log('solve');
                alert();
            },

            process(){
                console.log('process');
                alert('process');
            }
        },
    };
</script>