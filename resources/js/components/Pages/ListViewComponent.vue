<template>
    <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;   overflow: auto;">
        <table class="table mb-0">
            <thead>
            <tr style="">
<!--                <th scope="col">Team Member</th>-->
                <th scope="col">Task</th>
                <th scope="col">Priority</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>


            <tr class="fw-normal" v-for="(item, index) in items" :key="index">
                <ListItemComponent
                    :item="item"
                    v-on:itemChanged="$emit('reloadList')"
                />
            </tr>

            </tbody>
        </table>

    </div>
</template>

<script>
import ListItemComponent from './ListItemComponent.vue'

export default {
    name: "ListViewComponent",
    emits: ['reloadList'],
    props:  ['items'],
    components: {
        ListItemComponent
    }
}
</script>

<style scoped>

</style>
