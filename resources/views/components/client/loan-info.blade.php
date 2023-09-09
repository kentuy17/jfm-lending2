<!--begin::Modal-->
<style>
  .modal-body-bg {
    background-color: #EEF0F8 !important;
  }
</style>
<div class="modal fade" id="kt_datepicker_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Loan Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <form class="form">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-form-label text-right col-lg-3 col-sm-12">Collection Date</label>
            <div class="col-lg-9 col-md-9 col-sm-12">
              <div class="input-group date">
                <input type="text" class="form-control" value="05/20/2017" id="kt_datepicker_3_modal" />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="la la-calendar"></i>
                  </span>
                </div>
              </div>
              <span class="form-text text-muted">Select date to filter</span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary mr-2" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-secondary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end::Modal-->

<div id="kt_datatable_modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="min-height: 590px;">
      <div class="modal-header py-5">
        <h5 class="modal-title">Dodot Flores - Loan Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <div class="d-flex flex-row flex-column-fluid modal-body-bg" id="kt_datatable_sub">
        <div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px  mx-1" style="height:500px;" id="kt_todo_aside">
          <!--begin::Card-->
          <div class="card card-custom card-stretch">
            <!--begin::Body-->
            <div class="card-body px-5">
              <!--begin:Nav-->
              <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
                <div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">Loan History</div>

                <!--begin:Item-->
                <div class="navi-item my-2">
                  <a href="#" class="navi-link ">
                    <span class="navi-icon mr-4">
                      <span class="svg-icon svg-icon-success svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                              fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) " />
                          </g>
                        </svg>
                      </span>
                    </span>
                    <span class="navi-text font-weight-bolder font-size-lg">3,000.00</span>
                  </a>
                </div>
                <!--end:Item-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                  <a href="#" class="navi-link ">
                    <span class="navi-icon mr-4">
                      <span class="svg-icon svg-icon-success svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                              fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) " />
                          </g>
                        </svg>
                      </span>
                    </span>
                    <span class="navi-text font-weight-bolder font-size-lg">10,000.00</span>
                  </a>
                </div>
                <!--end:Item-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                  <a href="#" class="navi-link ">
                    <span class="navi-icon mr-4">
                      <span class="svg-icon svg-icon-success svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                              fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) " />
                          </g>
                        </svg>
                      </span>
                    </span>
                    <span class="navi-text font-weight-bolder font-size-lg">15,000.00</span>
                  </a>
                </div>
                <!--end:Item-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                  <a href="#" class="navi-link active">
                    <span class="navi-icon mr-4">
                      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Cooking\Dish.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 Z" fill="#000000" />
                            <path d="M12,16 C14.209139,16 16,14.209139 16,12 C16,9.790861 14.209139,8 12,8 C9.790861,8 8,9.790861 8,12 C8,14.209139 9.790861,16 12,16 Z" fill="#000000" opacity="0.3" />
                          </g>
                        </svg><!--end::Svg Icon--></span>
                    </span>
                    <span class="navi-text font-weight-bolder font-size-lg">3,000.00</span>
                  </a>
                </div>
                <!--end:Item-->

                <!--begin:Section-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                  <a href="#" class="navi-link">
                    <span class="navi-icon mr-4">
                      <i class="fa flaticon2-plus icon-1x"></i>
                    </span>
                    <span class="navi-text font-weight-bolder font-size-lg">Renew Loan</span>
                  </a>
                </div>
                <!--end:Item-->
              </div>
              <!--end:Nav-->


            </div>
            <!--end::Body-->
          </div>
          <!--end::Card-->
        </div>
        <div class="card card-custom card-stretch  mx-1 w-100 h-100" style="height:500px;" id="kt_page_stretched_card">
          <div class="card-body">
            <div class="card-scroll">
              <table class="table datatable datatable-bordered table-hover datatable-head-custom" id="daily-collection-table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>Date Release</th>
                    <th>Status</th>
                    <th>Collector</th>
                    <th>Amount to Pay</th>
                    <th>Amount Paid</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
        <button type="button" id="sumbit_modal" class="btn btn-primary font-weight-bold text-uppercase">Submit</button>
      </div>
    </div>
  </div>
</div>
