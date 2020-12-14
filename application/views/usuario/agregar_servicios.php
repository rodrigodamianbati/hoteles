<?php
//servicios_disponibles] => Array ( ) [todos_los_servicios
//print_r($todos_los_servicios);
//print_r($todos_los_servicios);
//die();
if($this->session->flashdata('id_alojamiento')){
  $id_alojamiento = $this->session->flashdata('id_alojamiento');
  $todos_los_servicios = $this->session->flashdata('todos_los_servicios');
  $servicios_disponibles = $this->session->flashdata('servicios_disponibles');
  //$precio_noche = $datos['precio_noche'];
  //$id_alojamiento = $datos['id_alojamiento'];
  //print_r($this->session->flashdata('datos_redirect'));
  //die();
}
$lista_ids_eliminar = array();
?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <!--li class="breadcrumb-item">
              <a href="<//?php echo base_url() . "assets/"; ?>#">Dashboard</a>
            </li-->
            <li class="breadcrumb-item active"><h6>Servicios de mi alojamiento</h6></li>
          </ol>

          <!-- Alojamientos a modificar-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamiento - Servicios</div>
              <div class="card-header">Aqui puede agregar sus nuevos servicios!</div>
        <div class="card-body">

          <!--form action="</?=base_url("alojamiento/agregar_servicios");?>" method="post" id="cajaschequeadas"-->
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-5">
                  <div class="form-label-group">

                    <!--select id="estado" name="estado" class="form-control" placeholder="Estado"-->

                    <!--label for="servicio">Servicio</label-->
                    <ul>
                        <?php
                  
foreach ($todos_los_servicios as $servicio) {
    $sonIguales = false;
    foreach ($servicios_disponibles as $servicio_disponible) {
        if ($servicio->id == $servicio_disponible->id) {
            $sonIguales = true;
        }
    }
    if($sonIguales){ 
      array_push($lista_ids_eliminar, $servicio->id); ?>
      <li style="margin-bottom: 40px;"><?php echo $servicio->descripcion ?><input style="margin-left: 5px;" name="servicios_agregar" type="checkbox" value="<?php echo $servicio->id ?>" id="caja<?php echo $servicio->id ?>" disabled> Ya posee este servicio</li>
    <?php
    }else{ ?>
      <li style="margin-bottom: 40px;"><?php echo $servicio->descripcion ?><input style="margin-left: 5px;" name="servicios_agregar" type="checkbox" value="<?php echo $servicio->id ?>" id="caja<?php echo $servicio->id ?>"></li>
    <?php
    }
    ?>
                            <!--option value='<//?php echo $servicio->id;?>' selected='selected'><//?php echo $servicio->descripcion;?></option-->
                            
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
<!-- segundo col -->
<div class="col-md-5">
                  <div class="form-label-group">
                    <ul>
                    <?php
                  foreach ($todos_los_servicios as $servicio) {
                      $sonIguales = false;
                      foreach ($servicios_disponibles as $servicio_disponible) {
                          if ($servicio->id == $servicio_disponible->id) {
                              $sonIguales = true;
                          }
                      }
                      if($sonIguales){ 
                        array_push($lista_ids_eliminar, $servicio->id); ?>
                        <form action="<?=base_url("alojamiento/baja_servicio");?>" method="post">
                        <input type="hidden" type="submit" name="id_alojamiento" value="<?php echo $id_alojamiento ?>"/>
                        <li style="list-style-type: none;"><button name="id_servicio" value="<?php echo $servicio->id ?>" class="btn btn-sm btn-danger" style="margin-bottom: 34px;">Eliminar</button></li>
                      </form>
                      <?php
                      }else{ ?>
                      <form action="<?=base_url("alojamiento/baja_servicio");?>" method="post">
                      <input type="hidden" type="submit" name="id_alojamiento" value="<?php echo $id_alojamiento ?>"/>
                      <li style="list-style-type: none;"><button name="id_servicio" value="<?php echo $servicio->id ?>" class="btn btn-sm btn-danger" style="margin-bottom: 34px;" disabled>No lo posee aun</button></li>
                      </form>
                      <?php
                      }
                    }  ?>
                                        <!--option value='<//?php echo $servicio->id;?>' selected='selected'><//?php echo $servicio->descripcion;?></option-->
                    </ul>
              </div>
            </div>

              </div>
            </div>
           
            <input type="hidden" type="submit" id="id" name="id" value="<?php echo $id_alojamiento ?>"/>
            <div class="">
            <input style="margin-left: 25px;" class="btn btn-primary mb-2" type="submit" name="agregar_servicios" value="Agregar" onclick="sumetear_servicios()"/>
</div>
            <!--/form-->
          <div class="text-center">
            <a class="btn btn-outline-primary mb-2" href="<?php echo base_url() . "alojamiento/mis_alojamientos"; ?>">Atras</a>
          </div>
        </div>
    </div>

</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>











<!--

        foreach ($todos_los_servicios as $servicio) {
    $sonIguales = false;
    foreach ($servicios_disponibles as $servicio_disponible) {
        if ($servicio->id == $servicio_disponible->id) {
            $sonIguales = true;
        }else{
            $sonIguales = false;
        }
    }
    if($sonIguales){ ?>
      <li><//?php echo $servicio->descripcion ?><input name="servicios_agregar" type="checkbox" value="<//?php echo $servicio->id ?>" id="caja<//?php echo $servicio->id ?>" disabled>Ya posee este servicio</li>
    <//?php
    }else{ ?>
      <li><//?php echo $servicio->descripcion ?><input name="servicios_agregar" type="checkbox" value="<//?php echo $servicio->id ?>" id="caja<//?php echo $servicio->id ?>"></li>
    <//?php
    }
    ?>
                            <!--option value='<//?php echo $servicio->id;?>' selected='selected'><//?php echo $servicio->descripcion;?></option-->
                            
                          <?php
//}else{

    ?>
                                  <!--option value='<//?php echo $estadito->id;?>'><//?php echo $estadito->descripcion;?></option-->
                                <?php/*
//

    //}
}*/
?>