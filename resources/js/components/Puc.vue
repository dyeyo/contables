<template>
    <div>
        <ul id="puc" class="list-group">
            <cuenta
                    class="item"
                    :cuenta="cuenta"
                    :edit="edit"
                    :create="create"
                    :pdf="pdf"
            ></cuenta>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "puc",
        props: {
            'cuenta': Object,
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