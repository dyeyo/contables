<template>
    <div>
        <ul id="presupuestoGastoGasto" class="list-group">
            <presupuestogasto
                    class="item"
                    :presupuestogasto="presupuestogasto"
                    :edit="edit"
                    :create="create"
                    :pdf="pdf"
            ></presupuestogasto>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "gasto",
        props: {
            'presupuestogasto': Object,
            'create': false,
            'edit':false,
            'pdf':false
        },
        data: function () {
            return {
                'search': ''
            }
        },
    }
</script>

<style scoped>
    .item{
        cursor: pointer;
    }
    li{
        list-style: none;
    }
</style>