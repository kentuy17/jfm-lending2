@extends('layouts.app')

@section('title', 'Collections')

@section('additional-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jexcel/2.1.0/css/jquery.jexcel.css" type="text/css" /> --}}
{{-- <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" /> --}}
{{-- <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" /> --}}

<style>
  .header-fixed.subheader-fixed.subheader-enabled .wrapper {
    padding-top: 60px !important;
  }
  td.dt-body-right{
    text-align: right;
  }
  th.dt-head-right {
    text-align: center;
  }
  .dataTables_wrapper .dataTable th, .dataTables_wrapper .dataTable td {
    padding: 0.5rem 0.5rem !important;
  }
  .jexcel_container {
    display: block !important;
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
        <div class="card card-custom gutter-b">
          <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
              <h3 class="card-label">Daily Collections
              {{-- <span class="d-block text-muted pt-2 font-size-sm">row selection and group actions</span></h3> --}}
            </div>
            <div class="card-toolbar">
              <!--begin::Dropdown-->
              <div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-md">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                      <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>Action</button>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                  <!--begin::Navigation-->
                  <ul class="navi flex-column navi-hover py-2">
                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose An Action:</li>
                    <li class="navi-item">
                      <a href="#" onclick="javascript:showEditor();" class="navi-link">
                        <span class="navi-icon">
                          <i class="icon-xl la la-edit"></i>
                        </span>
                        <span class="navi-text">Edit</span>
                      </a>
                    </li>
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
                          <i class="la la-file-excel-o"></i>
                        </span>
                        <span class="navi-text">Export</span>
                      </a>
                    </li>
                  </ul>
                  <!--end::Navigation-->
                </div>
                <!--end::Dropdown Menu-->
              </div>
              <!--end::Dropdown-->

              <!--begin::Button-->
              <a href="javascript:void(0)" id="post-data" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <circle fill="#000000" cx="9" cy="15" r="6" />
                      <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>Post Data
              </a>
              <!--end::Button-->
            </div>
          </div>
          <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
              <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                  <div class="row align-items-center">
                    <div class="col-md-4 my-2 my-md-0">
                      <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                        <select class="form-control" id="kt_datatable_search_status">
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
                        <select class="form-control" id="kt_datatable_filter_collector">
                          <option value="0">All</option>
                          @foreach ($collectors as $collector)
                          <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                          @endforeach

                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 my-2 my-md-0">
                      <div class="input-group date">
                        <input type="text" class="form-control" id="kt_datepicker_3_modal">
                        <div class="input-group-append" id="calendar_append">
                          <span class="input-group-text">
                            <i class="la la-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                  <a href="javascript:void(0);" id="search_data" class="btn btn-info px-6 font-weight-bold">Search</a>
                </div>
              </div>
            </div>
            <!--end: Search Form-->
            <!--begin: Selected Rows Group Action Form-->
            <div class="mt-10 mb-5 collapse" id="kt_datatable_group_action_form">
              <div class="d-flex align-items-center">
                <div class="font-weight-bold text-danger mr-3">Selected
                <span id="kt_datatable_selected_records">0</span>records:</div>
                <div class="dropdown mr-2">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Update status</button>
                  <div class="dropdown-menu dropdown-menu-sm">
                    <ul class="nav nav-hover flex-column">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <span class="nav-text">Pending</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <span class="nav-text">Delivered</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <span class="nav-text">Canceled</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <button class="btn btn-sm btn-danger mr-2" type="button" id="kt_datatable_delete_all">Delete All</button>
                <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#kt_datatable_fetch_modal">Fetch Selected Records</button>
              </div>
            </div>
            <!--end: Selected Rows Group Action Form-->
            <!--begin: Datatable-->
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
            <!--end: Datatable-->
          </div>
        </div>
      </div>
      <!--end::Card-->
      @include('components.collection.collection-modal')
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
@endsection

@section('additional-scripts')
@vite(['resources/js/excel-collection.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
<script src="{{ asset('js/collection.js') }}" defer></script>
{{-- <script src="{{ asset('assets/js/pages/crud/ktdatatable/advanced/record-selection.js') }}"></script> --}}
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" defer></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" defer></script>
{{-- <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js" defer></script> --}}
{{-- <script src="https://jsuites.net/v4/jsuites.js" defer></script> --}}

<script>
  async function showEditor() {
    $('#kt_datatable_modal').modal('show');
  }
</script>
@endsection
