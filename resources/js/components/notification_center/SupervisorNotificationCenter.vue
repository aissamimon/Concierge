<script>
    export default {
        mounted() {
            console.log('Supervisor Notification Center Component mounted.')
        },
        data(){
            return{
                form: new Form({
                    fehler: '',
                    description: ''
                })
            }
        },
        methods: {
            sendIncident(){
                console.log('send Incident');
                alert('send Incident');
            }
        },
    };
</script>