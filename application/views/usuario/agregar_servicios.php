<?php
//servicios_disponibles] => Array ( ) [todos_los_servicios
?>
<div id="content-wrapper">
        
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url()."assets/"; ?>#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Alojamientos a modificar-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamiento - Servicios</div>
              <div class="card-header">Modificacion de estado</div>
        <div class="card-body">
      
          <form action="<?=base_url("alojamiento/agregar_servicios");?>" method="post" id="cajaschequeadas">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">

                    <!--select id="estado" name="estado" class="form-control" placeholder="Estado"-->
                  
                    <!--label for="servicio">Servicio</label-->
                    <ul>
                        <?php
                         foreach ($todos_los_servicios as $servicio) {
                            //foreach ($estado as $estadito) {
                               //if($estadito->descripcion==$product[0]->estado){

                               
                          ?>
                            <!--option value='<//?php echo $servicio->id;?>' selected='selected'><//?php echo $servicio->descripcion;?></option-->
                            <li><?php echo $servicio->descripcion?><input name="servicios_agregar" type="checkbox" value="<?php echo $servicio->id?>" id="caja<?php echo $servicio->id?>"/></li>
                          <?php
                                //}else{

                                ?>
                                  <!--option value='<//?php echo $estadito->id;?>'><//?php echo $estadito->descripcion;?></option-->
                                <?php
                                //
                                
                          //}
                        }
                        ?>
                    </ul>
                    <!--/select--> 

                  </div>
                </div>
                
              </div>
            </div>
            
              </div>
            </div>
            <input type="hidden" type="submit" name="id" value="<?php echo $id_alojamiento?>"/>
            <input class="btn btn-primary btn-block" type="submit" name="agregar_servicios" value="Agregar" onclick="sumetear_servicios()"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url()."alojamiento/mis_alojamientos"; ?>">Cancelar</a>
          </div>
        </div>
    </div>

</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>