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
        <h5 class="modal-title">Update Collection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <div class="modal-body" id="kt_datatable_sub">
        <!--begin: Search Form-->
        <!--begin::Search Form-->

        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->

        {{-- <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_sub">

        </table> --}}
        <!--end: Datatable-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase" data-dismiss="modal">Close</button>
        <button type="button" id="sumbit_modal" class="btn btn-primary font-weight-bold text-uppercase">Submit</button>
      </div>
    </div>
  </div>
</div>
