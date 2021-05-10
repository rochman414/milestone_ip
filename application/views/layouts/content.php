
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
        <div class="footer-left">
          <div class="mg-b-2">Copyright © 2017. Bracket. All Rights Reserved.</div>
          <div>Attentively and carefully made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracket/intro"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracket/intro"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    



