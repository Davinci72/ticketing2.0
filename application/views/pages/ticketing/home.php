<?php $locations_array = json_decode($locations,true); ?>
 <!-- Promo Block -->
 <div class="g-bg-cover g-bg-pos-top-center g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after g-py-100" style="background-image: url(assets/img-temp/1920x1080/img1.jpg);">
        <div class="container g-pos-rel g-z-index-1">
          <div class="g-mb-20">
            <h1 class="g-color-white g-font-size-40 mb-0">Find a Ride</h1>
          </div>

          <div class="g-bg-white g-pa-30">
            <!-- Input Group -->

            <?php 
                    $e = $this->session->flashdata('error');
                    if(!empty($e)){ ?>
             <!-- Border Alert -->
              <div class="alert fade show g-brd-around g-brd-red rounded-0" role="alert">
                <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <div class="media">
                  <div class="media-body">
                    <div class="d-flex justify-content-between">
                    </div>
                    <p class="m-0 text-center g-font-size-14"><strong><?=$e?></strong></p>
                  </div>
                </div>
              </div>
            <!-- End Border Alert -->
            <?php } ?>
            <form action="<?=base_url('check-route')?>" method="post">

              <div class="row">
                <div class="col-6 col-lg-6 g-mb-30">
                  <!-- Button Group -->
                  <div class="input-group-btn">
                    <select name="route_from" class="js-custom-select u-select-v1 w-100 g-brd-gray-light-v3 g-color-main g-color-primary--hover g-py-12" required
                            data-placeholder="Select Origin Town"
                            data-open-icon="fa fa-angle-down"
                            data-close-icon="fa fa-angle-up">
                      <option></option>
                    <?php foreach($locations_array as $locale) {  ?>
                      <option value="<?=$locale['id']?>"  class="g-brd-none g-color-main g-color-white--hover g-color-white--active g-bg-primary--hover g-bg-primary--active"><?=$locale['location']?></option>
                      <?php } ?>

                    </select>
                  </div>
                  <!-- End Button Group -->
                </div>

                <div class="col-6 col-lg-6 g-mb-30">
                  <!-- Button Group -->
                  <div class="input-group-btn">
                    <select name="route_to" class="js-custom-select u-select-v1 w-100 g-brd-gray-light-v3 g-color-main g-color-primary--hover g-py-12" required
                            data-placeholder="Select Destination"
                            data-open-icon="fa fa-angle-down"
                            data-close-icon="fa fa-angle-up">
                      <option></option>
                      <?php foreach($locations_array as $locale) {  ?>
                      <option value="<?=$locale['id']?>"  class="g-brd-none g-color-main g-color-white--hover g-color-white--active g-bg-primary--hover g-bg-primary--active" ><?=$locale['location']?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- End Button Group -->
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12 col-lg-12 g-mb-30">

              <div class="text-right">
                <button class="btn btn-block u-btn-primary g-color-white g-bg-primary-dark-v1--hover g-font-weight-600 rounded-0 g-px-18 g-py-15" type="submit">
                  Search
                </button>
              </div>
              </div>

            </form>
            <!-- End Input Group -->
          </div>
        </div>
      </div>
      <!-- End Promo Block -->