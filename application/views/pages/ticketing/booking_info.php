<div class="g-bg-cover g-bg-pos-top-center g-bg-img-hero" style="background-image: url(assets/img/bg/map-sketch.jpg);">
    <div class="g-pos-rel g-z-index-1">
     <!-- Breadcrumbs -->
     <div class="container-fluid g-py-50">
            <ul class="u-list-inline g-font-weight-500 mb-2">
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-gray-dark-v5 g-color-main--hover" href="#">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
              </li>
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-gray-dark-v5 g-color-main--hover" href="#">Routes</a>
                <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
              </li>
              <li class="list-inline-item g-color-primary">
                <span>View Route</span>
              </li>
            </ul>
            <h1 class="h2 mb-0">View Travel and routes info - Dispatch date and time</h1>
          </div>
          <!-- End Breadcrumbs -->

          <div class="container-fluid g-pb-100">
            <!-- Box Shadow -->
            <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">
            <h3 class="h2 g-font-weight-300 g-mb-20">Route Information </h3>
            
            
            <div class="shortcode-html">
              <!--Basic Table-->
              <div class="table-responsive">
                <table class="table table-bordered u-table--v2">
                  <thead class="text-uppercase g-letter-spacing-1">
                    <tr>
                      <th class="g-font-weight-300 g-color-black" colspan="2">Route From</th>
                      <th class="g-font-weight-300 g-color-black g-min-width-200">Dispatch Time</th>
                      <th class="g-font-weight-300 g-color-black">ETA</th>
                      <th class="g-font-weight-300 g-color-black">Available Seats</th>
                      <th class="g-font-weight-300 g-color-black">No Of Tickets</th>
                      <th class="g-font-weight-300 g-color-black">Amount</th>
                      <th class="g-font-weight-300 g-color-black">Actions</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php if($error==true){ }else {  $r = json_decode($routeinfo,true); $rf = json_decode($r_from,true); $rt = json_decode($r_to,true);   ?>
                    <tr>
                      <td class="align-middle text-nowrap" colspan="2">
                        <h4 class="h6 g-mb-2"><?=$rf[0]['location']?> - <?=$rt[0]['location']?></h4>
                        <div class="js-rating g-font-size-12 g-color-primary" data-rating="3.5"></div>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <i class="fa fa-calendar-plus-o g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                          <span><?=$r['route_info'][0]['departure']?></span>
                        </div>
                      </td>
                      <td class="align-middle">
                      <div class="d-flex">
                        <i class="fa fa-calendar-plus-o g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                            <?=$r['route_info'][0]['eta']?>
                        </i>
                      </td>
                      <td class="align-middle text-nowrap">
                          <?=$r['available_seats']['total']?>
                      </td>
                      <td class="align-middle">
                        <form >
                                <!-- Quantity -->
                                <div class="form-group">
                                    <div class="js-quantity input-group u-quantity-v1  g-brd-primary--focus">
                                    <div class="js-minus input-group-prepend  g-color-gray g-bg-grey-light-v3">
                                        <span class="input-group-text rounded-1 "><i class="fa fa-minus"></i></span>
                                    </div>
                                    <input class="js-result form-control text-center rounded-0 g-pa-15" type="text" value="0" readonly="">
                                    <div class="js-plus input-group-append  g-color-gray g-bg-grey-light-v3">
                                        <span class="input-group-text rounded- "><i class="fa fa-plus"></i></span>
                                    </div>
                            <!-- End Quantity -->
                            </div>
                        </form>
                      </td>
                      <td class="align-middle">
                          KSHS <?=$r['route_info'][0]['routecost']?> /=
                      </td>
                      <td class="align-middle">
                        <a class="btn btn-block u-btn-primary g-rounded-1 g-py-5" href="#!">
                          <i class="fa fa-minus"></i>
                          Book Now
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!--End Basic Table-->
            </div>
          
            </div>
            <!-- End Box Shadow -->
        </div>
    </div>
</div>

