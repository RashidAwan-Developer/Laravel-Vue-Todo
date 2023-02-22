<template>
    <div>
        <section className="vh-100" style="background-color: #eee;">
            <div className="container py-5 h-100">
                <div className="row d-flex justify-content-center align-items-center h-100">
                    <div className="col-md-12 col-xl-10">

                        <div className="card">
                            <div className="card-header p-3">
                                <h5 className="mb-0"><i className="fas fa-tasks me-2"></i>Task List</h5>
                            </div>
                            <ListViewComponent
                                :items="items"
                                v-on:reloadList="getList()"
                            />
                            <add-component
                                v-on:itemChanged="getList()"
                            />
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</template>


<style scoped>

</style>

<script setup>
import AddComponent from "./Pages/AddComponent.vue";
import ListViewComponent from "./Pages/ListViewComponent.vue";



</script>


<script>
import axios from "axios";

export default {

    data: function () {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios
            .get('api/item')
                .then(res => {
                    this.items = res.data
                })
                .catch(error => {
                    console.log(error.response.data)
                })

            }
    },
    created() {
        this.getList()
    }

}

// console.log(this.items)
</script>
