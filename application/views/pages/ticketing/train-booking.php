<div class="g-bg-cover g-bg-pos-top-center g-bg-img-hero">
    <div class="g-pos-rel g-z-index-1">
     <!-- Breadcrumbs -->
     <div class="container g-py-50">
            <ul class="u-list-inline g-font-weight-500 mb-2">
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-gray-dark-v5 g-color-main--hover" href="#">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
              </li>
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-gray-dark-v5 g-color-main--hover" href="#">NCR</a>
                <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
              </li>
              <li class="list-inline-item g-color-primary">
                <span>View Route</span>
              </li>
            </ul>
            <h1 class="h2 mb-0">Nairobi Commuter Rail - Booking INFO</h1>
          </div>
          <!-- End Breadcrumbs -->

          <div class="container g-pb-0">
            <!-- Box Shadow -->
            <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">
            <h3 class="h2 g-font-weight-300 g-mb-20">Route Information <?=$route?></h3>
            
            <!-- <pre><?php $r = json_decode($routeinfo,true); $rf = json_decode($r_from,true); $rt = json_decode($r_to,true); ?></pre> -->
            <div class="shortcode-html">
              <!--Basic Table-->
              <div class="table-responsive">
                <table class="table table-bordered u-table--v2">
                  <thead class="text-uppercase g-letter-spacing-1">
                    <tr>
                      <th class="g-font-weight-300 g-color-black" colspan="2">Route </th>
                      <th class="g-font-weight-300 g-color-black g-min-width-200">Dispatch Time</th>
                      <th class="g-font-weight-300 g-color-black">No Of Adults</th>
                      <th class="g-font-weight-300 g-color-black">No Of Children ( 1yr - 13yr)</th>
                      <!-- <th class="g-font-weight-300 g-color-black">Amount</th> -->
                      <!-- <th class="g-font-weight-300 g-color-black">Actions</th> -->
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td class="align-middle text-nowrap" colspan="2">
                        <h4 class="h6 g-mb-2"><?=$route?></h4>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <i class="fa fa-calendar-plus-o g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                          <span><?=$departure?></span>
                        </div>
                      </td>
                      <td class="align-middle">
                        <form >
                                <!-- Quantity -->
                                <div class="form-group">
                                    <div class="js-quantity input-group u-quantity-v1  g-brd-primary--focus">
                                    <div class="js-minus input-group-prepend  g-color-gray g-bg-grey-light-v3">
                                        <span class="input-group-text rounded-1 "><i class="fa fa-minus"></i></span>
                                    </div>
                                    <input class="js-result form-control text-center rounded-0" type="text" value="1" readonly="">
                                    <div class="js-plus input-group-append  g-color-gray g-bg-grey-light-v3">
                                        <span class="input-group-text rounded- "><i class="fa fa-plus"></i></span>
                                    </div>
                            <!-- End Quantity -->
                            </div>
                        </form>
                      </td>
                      <td class="align-middle">
                        <form >
                                <!-- Quantity -->
                                <div class="form-group">
                                    <div class="js-quantity input-group u-quantity-v1  g-brd-primary--focus">
                                    <div class="js-minus input-group-prepend  g-color-gray g-bg-grey-light-v3">
                                        <span class="input-group-text rounded-1 "><i class="fa fa-minus"></i></span>
                                    </div>
                                    <input class="js-result form-control text-center rounded-0" type="text" value="1" readonly="">
                                    <div class="js-plus input-group-append  g-color-gray g-bg-grey-light-v3">
                                        <span class="input-group-text rounded- "><i class="fa fa-plus"></i></span>
                                    </div>
                            <!-- End Quantity -->
                            </div>
                        </form>
                      </td>
                      <!-- <td class="align-middle">
                          KSHS <?=$r['route_info'][0]['routecost']?> /=
                      </td> -->
                      <!-- <td class="align-middle">
                        <a class="btn btn-block u-btn-primary g-rounded-1 g-py-5" href="#!">
                          <i class="fa fa-minus"></i>
                          Book Now
                        </a>
                      </td> -->
                    </tr>
                    <tr>
                    <td class="align-middle text-nowrap" colspan="4">
                        <h4 class="h6 g-mb-2">Total : </h4>
                      </td>
                      <td class="align-middle text-nowrap" colspan="2">
                        <h4 class="h6 g-mb-2">KSHS : 100 /=</h4>
                      </td>
                    </tr>
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



<div class="g-bg-cover g-bg-pos-top-center">
    <div class="g-pos-rel g-z-index-1">
     <div class="container g-py-0">
        <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">
        <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-0">
            <h3 class="h2 g-font-weight-300 g-mb-20">Booking Details </h3>
            <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-0">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group u-has-success-v1-1 g-mb-20">
                    <label for="disabledSelect">Passenger Full Names *</label>
                        <input id="inputGroup9_1" class="form-control rounded-0" type="text" placeholder="Passenger Full Names">
                        <small class="form-control-feedback">This is a required field.</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group u-has-success-v1-1 g-mb-20">
                    <label for="disabledSelect">ID / PASSPORT NO *</label>
                        <input id="inputGroup9_1" class="form-control rounded-0" type="text" placeholder="ID / PASSPORT NO *">
                        <small class="form-control-feedback">This is a required field.</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group u-has-success-v1-1 g-mb-20">
                    <label for="disabledSelect">Gender *</label>
                        <select class="form-control rounded-0" id="exampleSelect1">
                            <option>--SELECT GENDER--</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <small class="form-control-feedback">This is a required field.</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group u-has-success-v1-1 g-mb-20">
                        <label for="disabledSelect">Nationality</label>
                        <select class="form-control rounded-0" id="exampleSelect1">
                            <option>--SELECT NATIONALITY</option>
                            <option>KENYAN</option>
                            <option>UGANDAN</option>
                            <option>TANZANIAN</option>
                        </select>
                        <small class="form-control-feedback">This is a required field.</small>
                    </div>
                </div>
            </div>
            <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-0">
            <div class="form-group u-has-success-v1-1 g-mb-20">
              <label for="example-date-input" class="col-2 col-form-label">Date Of Birth</label>
              <div class="col-10">
                <input name="dob" class="form-control rounded-0 form-control-md" type="date" value="2011-08-19" id="example-date-input">
                <small class="form-control-feedback">This is a required field.</small>
              </div>
            </div>
            <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-0">
            <h3 class="h2 g-font-weight-300 g-mb-20">Paymet Details </h3>
            <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-0">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group u-has-success-v1-1 g-mb-20">
                        <label for="disabledSelect">M-PESA Mobile No *</label>
                            <input id="inputGroup9_1" class="form-control rounded-0" type="text" placeholder="M-PESA Mobile No *">
                            <small class="form-control-feedback">This is a required field.</small>
                        </div>
                    </div>
                    <div class="col-md-5">
                    <div class="form-group u-has-success-v1-1 g-mb-20">
                    <label for="disabledSelect">Your Email Address *</label>
                        <input id="inputGroup9_1" class="form-control rounded-0" type="text" placeholder="Your Email Address *">
                        <small class="form-control-feedback">This is a required field.</small>
                    </div>
                </div>
                <a href="#!" class="btn btn-sm btn-block u-btn-primary g-mb-10">Book Your Ticket</a>
                </div>

        </div>
     </div>
    </div>
</div>