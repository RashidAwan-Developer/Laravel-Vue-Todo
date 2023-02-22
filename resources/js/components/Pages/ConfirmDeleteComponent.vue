<template>

    <!-- Modal -->
    <div class="modal fade" id="deleteUserModel" tabindex="-1" role="dialog" aria-labelledby="deleteUserModel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    Are You Sure? {{this.$props.userId}}
                </div>
                <div class="modal-footer">
                    <button @click="deleteRecord()" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

import {ref} from "vue";

const userIdBigIntDetected = ref(null);
export default {
    name: "ConfirmDeleteComponent",
    props: ['userId'],
    methods: {
        deleteRecord(){
            console.log(this.$props.userId)
            axios
                .delete('api/item/' + this.$props.userId)
                .then(response => {
                    if(response.status == 200){
                        $('#deleteUserModel').modal('hide');
                        this.$emit('itemChanged')
                    }
                })
                .catch(error => {
                    console.log(error.response.data)
                })

        }
    }
}
</script>

<style scoped>

</style>
