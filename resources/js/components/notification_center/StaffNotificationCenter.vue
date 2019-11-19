<script>
    export default {
        mounted() {
            console.log('Staff Notification Center Component mounted.')
        },
        data(){
            return{
                form: new Form({
                    reply: '',
                    message: ''
                })
            }
        },
        methods: {
            sendMessage(){
                console.log('send Message');
                alert('send Message');
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