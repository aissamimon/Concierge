<script>
    export default {
        mounted() {
            console.log('ConfirmDialog Component mounted.')
        },
        data(){
            return{
                form: new Form({
                    _method: "DELETE"
                })
            }
        },
        methods: {
            onDelete(id){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                  if (result.value) {
                    this.form.post('/incident/'+ id)
                        .then(()=>{
                            console.log('Success');
                            Swal.fire({
                                title: 'Deleted!', 
                                text: 'incident has been deleted.', 
                                type: 'success',
                                showConfirmButton: false
                            })
                            setTimeout(function() {
                                window.location.replace('/incident');
                            }, 2000);
                        })
                        .catch(()=>{
                            console.log('Faild');
                            Swal.fire('error!', 'Whoops, looks like something went wrong!', 'error')
                        });
                    }
                })   
            },
        },
    }

</script>
