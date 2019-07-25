<template>
    <button class="btn btn-success"  @click="openModal()">
        <slot name="label"></slot>
        <i class="fas fa-user-plus fa-fw"></i>
    </button>
</template>
<script>
    export default {
        mounted() {
            console.log('Button Open Modal Component mounted.')
        },
        methods: {
            openModal(){
                Fire.$emit('openModal');
            }
        }
    }

</script>
