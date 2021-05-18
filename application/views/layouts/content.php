
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel pd-x-5 pd-sm-x-5">
      <div class="pd-t-1">
      </div>

      <div class="br-pagebody">
        <div class="card">
            <div class="card-header">
                <div class="card-tittle mg-1">
                    <h5 class="pd-t-5 tx-dark"><?= $tittle ?></h5>
                </div>
            </div><!-- card-header -->
            <div class="card-body pd-3 bd-color-gray-lighter mg-b-20">
                <div class="row no-gutters tx-center">
                    <?php 
                        if($isi){
                            $this->load->view($isi);
                        }
                    ?>
                </div><!-- row -->
            </div><!-- card-body -->
        </div>
        <!-- start you own content here -->

      </div><!-- br-pagebody -->
    
      <footer class="br-footer">
        <div class="footer-right">
          <div class="mg-b-2">Copyright © <a href="https://imaniprima.co.id">Imani Prima</a> <?= date('Y') ?></div>
          <div>AR</div>
        </div>
      </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    



