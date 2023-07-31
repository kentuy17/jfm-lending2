<!--begin::Modal-->
<div class="modal fade" id="kt_datepicker_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bootstrap Date Picker Examples</h5>
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
        <h5 class="modal-title">Update Collection
          {{-- <span class="d-block text-muted font-size-sm">sub datatable for the selected row is loaded from remote data source</span> --}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->
        <div class="mb-5">
          <div class="row align-items-center">
            <div class="col-lg-9 col-xl-8">
              <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                  <div class="d-flex align-items-center">
                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                    <select class="form-control" id="modal_filter_status">
                      <option value="">All</option>
                      <option value="GOOD">ACTIVE</option>
                      <option value="INACTIVE">INACTIVE</option>
                      <option value="PENDING">PENDING</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                  <div class="d-flex align-items-center">
                    <label class="mr-3 mb-0 d-none d-md-block">Collector:</label>
                    <select class="form-control" id="modal_filter_collector">
                      <option value="">All</option>
                      @foreach ($collectors as $collector)
                      <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                  <div class="d-flex align-items-center">
                    <label class="mr-3 mb-0 d-none d-md-block">Date:</label>
                    <div class="input-group date">
                      <input type="text" class="form-control" id="kt_datepicker_2_modal">
                      <div class="input-group-append" id="calendar_append">
                        <span class="input-group-text">
                          <i class="la la-calendar"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
              <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
            </div>
          </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_sub" style="display: block !important;"></div>
        {{-- <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_sub">

        </table> --}}
        <!--end: Datatable-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary font-weight-bold text-uppercase">Submit</button>
      </div>
    </div>
  </div>
</div>
