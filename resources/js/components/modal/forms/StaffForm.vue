<script>
    export default {
        mounted() {
            console.log('Staff Component mounted.')
        },
        data(){
            return{
                form: new Form({
                    name: '',
                    username: '',
                    email: '',
                    role_id: '',
                    password: '',
                    password_confirmation: ''
                })
            }
        },
        methods: {
            resetForm(){
                this.form.reset();
                this.form.clear();
            },
            flash(typeToast, message){
                Toast.fire({
                    type: typeToast,
                    title: message
                });
            },
            submit(){
                this.form.post('/staffs')
                    .then(()=>{
                        console.log('Success');
                        this.flash('success', 'Successfully added!', '/staffs');
                        setTimeout(function() {
                            $('#AddnewModal').modal('hide');
                            window.location.replace('/staffs');
                        }, 1500);
                    })
                    .catch(()=>{
                        console.log('Faild');
                        this.flash('error', 'Whoops, looks like something went wrong!');
                    });
            },
        },
        created() {
            Fire.$on('submitted', () => {
                this.submit();
            });
            Fire.$on('openModal', () => {
                this.resetForm();
            });
        }
    }

</script>
