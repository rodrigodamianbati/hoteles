<?php
  //print_r($_SESSION);
  //die(); 
  //print_r($product);
  //print_r($localidades);
  //die();  
?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><h6>Mi Alojamiento</h6></li>
          </ol>

          <!-- Alojamientos a modificar-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamiento - Modificaciones</div>
              <div class="card-header">Modificacion de datos</div>
        <div class="card-body">
          <form action="<?=base_url("alojamiento/modificar");?>" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">

                    <select id="tipo" name="tipo" class="form-control" name="tipo" placeholder="Tipo">
                    <label for="tipo">Tipo</label>
                        <?php
                         
                          foreach ($tipos as $tipo) {
                               if($tipo->descripcion==$product[0]->tipo){

                               
                          ?>
                            <option value='<?php echo $tipo->id;?>' selected='selected'><?php echo $tipo->descripcion;?></option>;

                          <?php
                                }else{

                                ?>
                                  <option value='<?php echo $tipo->id;?>'><?php echo $tipo->descripcion;?></option>;
                                <?php
                                }
                                
                          }
                        ?>
                    </select> 

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="precio" class="form-control" placeholder="Precio" required="required" name="precio" value="<?php echo $product[0]->precio?>">
                    <label for="precio">Precio</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="direccion_nombre" class="form-control" placeholder="Nombre direccion" required="required" name="direccion_nombre" value="<?php echo $product[0]->direccion_nombre?>">
                <label for="direccion_nombre">Nombre dirección</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="direccion_numero" class="form-control" placeholder="Numero direccion" required="required" name="direccion_numero" value="<?php echo $product[0]->direccion_numero?>">
                    <label for="direccion_numero">Numero dirección</label>
                  </div>
                </div>
                <!--div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña" required="required" name="confirmar_contraseña">
                    <label for="confirmPassword">Confirmar contraseña</label>
                  </div>
                </div-->
                <div class="col-md-6">
                  <div class="form-label-group">

                    <select id="localidad" class="form-control" name="localidad" placeholder="Localidad">
                    <label for="localidad">Localidad</label>
                        <?php
                            
                          foreach ($localidades as $localidad) {
                                  if($localidad->nombre==$product[0]->localidad){
                          ?>
                                    <option value="<?php echo $localidad->id;?>" selected='selected'><?php echo $localidad->nombre;?></option>;
                          <?php
                                  } else{
                          ?>
                            
                                  <option value="<?php echo $localidad->id;?>"><?php echo $localidad->nombre;?></option>;

                          <?php
                                  }
                          }
                        ?>
                    </select> 

                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" type="submit" name="id" value="<?php echo $product[0]->id?>"/>
            <input class="btn btn-primary btn-block" type="submit" name="modificar" value="Modificar"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url()."alojamiento/mis_alojamientos"; ?>">Atras</a>
          </div>
        </div>
    </div>

</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>