<template>
    <div>
        <li class="list-group-item list-group-item-action" >
            <div
                :class="{bold: isFolder}"
                @click="toggle"
                @mouseover="showActions"
                @mouseleave="hideActions">
                <span v-if="isFolder">[{{ isOpen ? '-':'+'  }}]</span>
                <strong>{{cuenta.codigo_cuenta}}</strong> {{ cuenta.nombre_cuenta }}
                <span v-if="hover">
                    <a v-if="create && cuenta.tipoCuenta_id === 1" :href="'/puc/create/'+cuenta.id" class=""><i class="fa fa-plus"></i></a>
                    <a v-if="edit" :href="'/puc/'+cuenta.id+'/edit'" class=""><i class="fa fa-edit"></i></a>
                </span>
            </div>
            <ul class="list-group" v-if="isFolder && isOpen">
                <cuenta
                         class="item"
                         v-for="(item, index) in cuenta.cuentas"
                         :key="index"
                         :cuenta="item"
                         :create="create"
                         :edit="edit">
                </cuenta>
            </ul>
        </li>
    </div>
</template>

<script>
    export default {
        name: 'cuenta',
        props: {
            cuenta: Object,
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
                return this.cuenta.cuentas &&
                    this.cuenta.cuentas.length
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