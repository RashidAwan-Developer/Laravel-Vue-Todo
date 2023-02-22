<template>
    <div class="card-footer text-end p-3">
        <div class="input-group flex-nowrap justify-content-center" >
                <p :class="[this.item.name == '' ? 'error' : 'none'] ">Fill Name Field</p>
                <p :class="[this.item.priority == '' ? 'error' : 'none']">Fill Priority Field </p>

            <div class="form-outline col-3 mx-2">
                <input v-model="item.name" maxlength="80" id="search-focus" type="search" class="form-control bg-white border h-100" />
                <label class="form-label field" for="form1">Add List</label>
            </div>
            <div class="form-outline col-3 ">
<!--                <input v-model="item.priority" id="search-focus" type="search" class="form-control bg-white border h-100" />-->
<!--                <label class="form-label" for="form1">Add Priority</label>-->
                <select v-model="item.priority" class="form-select form-select-sm h-100" aria-label=".form-select-sm example">
                    <option value="low">Low Priority</option>
                    <option value="medium">Medium Priority</option>
                    <option value="high">High Priority</option>
                </select>
            </div>
            <span @click="addItem()" type="button" class="btn btn-outline-success">
                <i class="fas fa-plus" ></i>
            </span>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "AddComponent",
    emits: ['itemChanged'],
    data: function(){
        return {
            item: {
                name: "",
                priority: ""
            }
        }
    },
    methods: {
        addItem() {
            if( this.item.name == '' || this.item.priority == ''){
                alert(this.item.priority + ' ' + this.item.name)
                return;
            }
            console.log(this.item)
            axios.post('api/item/store', {
                name: this.item.name,
                priority: this.item.priority
            })
                .then(res => {
                    // console.log(res)
                    this.item.name = '';
                    this.item.priority = '';
                    this.$emit('itemChanged')
                }).catch(error => {
                console.log(error.response.data)
            })
        }
    }
}
</script>

<style scoped>
.none{
    display: none;
}
.error{
    margin: 0;
    color: red;
    margin-right: 15px;
}
</style>
