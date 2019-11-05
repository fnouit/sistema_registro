<template>
    <div class="section">
        <div class="section">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalNuevo">
                <i class="fa fa-plus" aria-hidden="true"></i> CREAR
            </button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">SEDE</th>
                    <th scope="col">COORDINADOR</th>
                    <th scope="col">EDICIÓN</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="region in mostrarRegiones" :key="region.id" >
                    <th v-text="region.id"></th>
                    <td v-text="region.nombre"></td>
                    <td v-text="region.sede"></td>
                    <td v-text="region.coordinador"></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Editar</button>
                    </td>
                </tr>
            </tbody>        
        </table> 

        <!-- Inicio modal registro --> 
        <div id="modalNuevo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">NUEVA DELEGACIÓN</h5>
                            <button @click="cerrarModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">NOMBRE DE LA REGIÓN</label>
                                <input type="text" v-model="nombre" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="sede">¿CÚAL ES SU SEDE?</label>
                                <input type="text" v-model="sede" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="coordinador">NOMBRE DEL COORDINADOR</label>
                                <input type="text" v-model="coordinador" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button @click="cerrarModal()" type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
                            <button @click="registrar()" type="button" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Fin modal registro -->

    </div>
</template>

<script>
    export default {
        data() {
            return {
                nombre : '',
                sede : '',
                coordinador : '',
                mostrarRegiones : []
            }
        },  
        methods : {
            regiones() {
                let me = this;
                axios.get('/regiones/listado_regiones').then(function(response){
                    me.mostrarRegiones = response.data;
                }).catch(function(error){
                    console.log(error);
                });
            }, 
            registrar(){
                if (this.validarCategoria()){
                    return;
                }

                let me = this;

                axios.put('/regiones/crear_region',{
                    'nombre' : this.nombre,
                    'sede' : this.sede,
                    'coordinador' : this.coordinador
                }).then(function(response){
                    me.cerrarModal();
                    me.mostrarRegiones();
                    console.log("click en modulo envio");
                }).catch(function(error){
                    console.log(error);
                });
            },


            cerrarModal(){
                this.nombre = '';
                this.sede = '';
                this.coordinador = '';
            }

        },
        mounted() {
            this.regiones();
        }
    }
</script>
