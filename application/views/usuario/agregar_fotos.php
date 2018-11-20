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
              <div class="card-header">Agregar nuevas fotos de su alojamiento!</div>
        <div class="card-body">
          <form action="<?=base_url("alojamiento/modificar_estado");?>" method="post">

    <!-- Fine Uploader DOM Element
    ====================================================================== -->
    <div id="fine-uploader-manual-trigger"></div>

    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script>
        var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                <?php
                    $id_aloj = $id_alojamiento;
                    //print_r($id_aloj);
                ?>
                endpoint: '<?php echo base_url('alojamiento/subir_foto?id='.$id_aloj); ?>'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '<?php echo base_url()."fine_uploader/"; ?>placeholders/waiting-generic.png',
                    notAvailablePath: '<?php echo base_url()."fine_uploader/"; ?>placeholders/not_available-generic.png'
                }
            },
            autoUpload: false,
            debug: true
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>

              </div>
            </div>

            <!--input type="hidden" type="submit" name="id" value="<//?php echo $product[0]->id?>"/-->
            <!--input class="btn btn-primary btn-block" type="submit" name="modificar_estado" value="guardar"/-->
          </form>
          <div class="text-center">
            <a class="btn btn-primary btn-block" href="<?php echo base_url()."alojamiento/mis_alojamientos"; ?>">Cancelar</a>
          </div>
        </div>
    </div>

</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>