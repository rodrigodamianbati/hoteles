<?php 
//print_r($galeria[1]); 
//die();
/*
foreach ($galeria as $foto) {
        print_r($foto);
        //die();
        //foreach ($foto as $fotito) {
         //   print_r($fotito);
            //die(); 
        //}
}
die(); 
*/

?>
<div id="content-wrapper">
        
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><h6>Mi alojamiento</h6></li>
          </ol>

          <!-- Alojamientos a modificar-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamiento - Modificaciones</div>
              <div class="card-header">Modificacion de Galeria</div>
        <div class="card-body">
          <!--form action="<//?=base_url("alojamiento/modificar_estado");?>" method="post"-->
          <div class="container">
	<div class="row">
		<div class="row">
        <!--form method="POST" action="alojamiento/modficar_galeria" id="cajaschequeadas"-->
<!--------------------------------------------------------------------------------------------->
<?php $id_vista = 0;
//print_r($galeria.); 
 foreach ($galeria as $foto) {
    $id_vista + 1;
?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   <?php //data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" ?>
                   data-image="<?php echo base_url().$foto->foto_url?>"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="<?php echo base_url().$foto->foto_url?>"
                         alt="Another alt text">
                </a>
                <input name="fotos_borrar" type="checkbox" value="<?php echo $foto->id?>" id="caja<?php echo $id_vista?>" />
            </div>
<?php
        }
?>
<!------------------------------------------------------------------------------------------------->
        </form>
        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
           
            </div>
            <input type="hidden" id="id_alojamiento" value="<?php echo $product[0]->id?>"/>
            <input class="btn btn-primary btn-block" type="submit" name="borrar_fotos" value="Borrar seleccionados" onclick="sumetear()"/>
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