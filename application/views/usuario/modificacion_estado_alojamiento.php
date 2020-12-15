<?php
/*
foreach ($estados as $estado) {
  foreach ($estado as $estadito) {
      print_r($estadito->id);
  }
}
die();
/*
foreach ($estados as $estado) {
    foreach ($estado as $estadito) {
        print_r($estadito->descripcion);
    }
}
die(); 
foreach ($estados[0] as $estado) {
    print_r($estado[0]->descripcion);
}
die(); */?>
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
              Alojamiento - Modificaciones</div>
              <div class="card-header">Modificacion de estado</div>
        <div class="card-body">
          <form action="<?=base_url("alojamiento/modificar_estado");?>" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">

                    <select id="estado" name="estado" class="form-control" placeholder="Estado">
                    <label for="estado">Estado</label>
                        <?php
                         
                         foreach ($estados as $estado) {
                            foreach ($estado as $estadito) {
                               if($estadito->descripcion==$product[0]->estado){

                               
                          ?>
                            <option value='<?php echo $estadito->id;?>' selected='selected'><?php echo $estadito->descripcion;?></option>;

                          <?php
                                }else{

                                ?>
                                  <option value='<?php echo $estadito->id;?>'><?php echo $estadito->descripcion;?></option>;
                                <?php
                                }
                                
                          }
                        }
                        ?>
                    </select> 

                  </div>
                </div>
                
              </div>
            </div>
            
              </div>
            </div>
            <input type="hidden" type="submit" name="id" value="<?php echo $product[0]->id?>"/>
            <input class="btn btn-primary btn-block" type="submit" name="modificar_estado" value="Modificar"/>
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