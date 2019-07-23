<template>
    <div class="modal fade" id="AddnewModal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #17a2b8">
                    <h5 class="modal-title" style="color: white" id="addNewLabel">
                        <slot name="header"></slot>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit()">
                        <slot name="body"></slot>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click="closeModal()">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Modal Component mounted.')
        },
        methods: {
            submit(){
                Fire.$emit('submitted');
            },
            openModal(){
                $('#AddnewModal').modal('show');
            },
            closeModal(){
                $('#AddnewModal').modal('hide');
            }
        },
        created() {
            Fire.$on('openModal', () => {
                this.openModal();
            });
        }
    };
</script>
