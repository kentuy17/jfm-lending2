@extends('layouts.app')

@section('title', 'Loans')

@section('additional-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
  .header-fixed.subheader-fixed.subheader-enabled .wrapper {
    padding-top: 60px !important;
  }

  td.dt-body-right {
    text-align: right;
  }

  th.dt-head-right {
    text-align: center;
  }

  th.dt-head-center {
    text-align: center;
  }

  td.dt-body-center {
    text-align: center;
  }

  .dataTables_wrapper .dataTable th,
  .dataTables_wrapper .dataTable td {
    padding: 0.5rem 0.5rem !important;
  }
</style>
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header">
          <div class="card-title">
            <span class="card-icon">
              <span class="svg-icon svg-icon-primary svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                  height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path
                      d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                      fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                  </g>
                </svg>
              </span>
            </span>
            <h3 class="card-label">Client Loans</h3>
          </div>
          <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
              <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-md">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path
                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                        fill="#000000" opacity="0.3" />
                      <path
                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                        fill="#000000" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>Export</button>
              <!--begin::Dropdown Menu-->
              <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!--begin::Navigation-->
                <ul class="navi flex-column navi-hover py-2">
                  <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an
                    option:</li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="la la-print"></i>
                      </span>
                      <span class="navi-text">Print</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="la la-copy"></i>
                      </span>
                      <span class="navi-text">Copy</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="la la-file-excel-o"></i>
                      </span>
                      <span class="navi-text">Excel</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="la la-file-text-o"></i>
                      </span>
                      <span class="navi-text">CSV</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="la la-file-pdf-o"></i>
                      </span>
                      <span class="navi-text">PDF</span>
                    </a>
                  </li>
                </ul>
                <!--end::Navigation-->
              </div>
              <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
            <!--begin::Button-->
            <a href="#" class="btn btn-primary font-weight-bolder">
              <span class="svg-icon svg-icon-md">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                  height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <circle fill="#000000" cx="9" cy="15" r="6" />
                    <path
                      d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                      fill="#000000" opacity="0.3" />
                  </g>
                </svg>
                <!--end::Svg Icon-->
              </span>New Record</a>
            <!--end::Button-->
          </div>
        </div>
        <div class="card-body">
          <!--begin: Datatable-->
          <table class="table datatable datatable-bordered table-hover datatable-head-custom" id="kt_datatable"
            style="margin-top: 13px !important">
            <thead>
              <tr>
                {{-- <th>Account #</th> --}}
                <th>Account Name</th>
                <th>Date Release</th>
                <th>Loan Amount</th>
                <th>Interest</th>
                <th>Total</th>
                <th>Amount Paid</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
          <!--end: Datatable-->
        </div>
      </div>
      <!--end::Card-->
      @include('components.loan.client-info-modal')
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
@endsection

@section('additional-scripts')
{{-- <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}
<script src="{{ asset('js/client-loan.js') }}" defer></script>
{{-- <script src="{{ asset('assets/js/custom/widgets.js') }}" defer></script> --}}
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" defer></script>
<script>
  $(function() {
    var tooltips = $('[data-toggle="tooltip"]');
    tooltips.tooltip();
    $('#kt_datepicker_modal').modal('show');
  })
</script>
@endsection