<template>
  <div class="row">
    <div class="col-md-12">
      <div class="input-group" id="adv-search">
        <input type="text" class="form-control" placeholder="Buscar cuenta por nombre" v-model="search" />
        <div class="input-group-btn">
          <div class="btn-group" role="group">
            <a :href="'/presupuetoGasto?search='+search" type="button" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "busca-cuenta-presupuesto",
    data: function () {
      return {
        search:''

      }
    },

  }
</script>

<style scoped>

</style>