<template>
    <div>
        <li class="list-group-item list-group-item-action" >
            <div
                :class="{bold: isFolder}"
                @click="toggle"
                @mouseover="showActions"
                @mouseleave="hideActions">
                <span v-if="isFolder">[{{ isOpen ? '-':'+'  }}]</span>
                <strong>{{presupuestogasto.codigo_presupuestal}}</strong> {{ presupuestogasto.nombre_rubro }}
                <span v-if="hover">
                    <a v-if="create && presupuestogasto.tipo_cuenta_id === 1" :href="'/presupuestogasto/create/'+presupuestogasto.id" class=""><i class="fa fa-plus"></i></a>
                    <a v-if="edit" :href="'/presupuestogasto/'+presupuestogasto.id+'/edit'" class=""><i class="fa fa-edit"></i></a>
                </span>
            </div>
            <ul class="list-group" v-if="isFolder && isOpen">
                <presupuestogasto
                         class="item"
                         v-for="(item, index) in presupuestogasto.cuentas_presupuesto"
                         :key="index"
                         :presupuestogasto="item"
                         :create="create"
                         :edit="edit">
                </presupuestogasto>
            </ul>
        </li>
    </div>
</template>

<script>
    export default {
        name: 'presupuestogasto',
        props: {
            presupuestogasto: Object,
            create: false,
            edit: false
        },
        data: function () {
            return {
                isOpen: false,
                hover: false
            }
        },
        computed: {
            isFolder: function () {
                return this.presupuestogasto.cuentas_presupuesto &&
                    this.presupuestogasto.cuentas_presupuesto.length
            }
        },
        methods: {
            toggle: function () {
                if (this.isFolder) {
                    this.isOpen = !this.isOpen
                }
            },
            hideActions: function () {
                console.log('hide');
                this.hover = false
            },
            showActions: function () {
                console.log('show');
                this.hover = true
            },
            mostrarTodo(){
                this.isOpen=true
            },
            ocultar(){
                this.isOpen=false
            }
        }
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