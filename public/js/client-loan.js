$(function() {
  $('#kt_datatable').DataTable({
    "bPaginate": true,
    "responsive": true,
    "searchDelay": 500,
    "processing": true,
    "serverSide": true,
    "ajax": '/client/loans',
    "pageLength": 25,
    "columnDefs": [
      {
        "targets": [2, 3, 4, 5],
        "className": 'dt-body-right',
      },
      {
        "targets": [6],
        "className": 'dt-body-center',
      },
      {
        "targets": [6],
        "className": 'dt-head-center',
      },
    ],
    "columns": [
      {
        "data": "account_name",
      },
      {
        "data": (data) => {
          return data.latest_loan.length > 0 ? data.latest_loan[0]['date_release'] : '--';
        },
      },
      {
        "data": (data) => {
          return data.latest_loan.length > 0 ? data.latest_loan[0]['amount'].toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') : '--';
        },
      },
      {
        "data": (data) => {
          return data.latest_loan.length > 0 ? data.latest_loan[0]['total_interest'].toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') : '--';
        },
      },
      {
        "data": (data) => {
          return data.latest_loan.length > 0 ? data.latest_loan[0]['total_payable'].toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') : '--';
        },
      },
      {
        "data": null,
        render: (data) => {
          if(data.latest_loan.length > 0) {
            let paid = parseFloat(data.latest_loan[0]['total_payable']) - parseFloat(data.latest_loan[0]['remaining_balance']);
            return paid.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
          }
          return '--';
        }
      },
      {
        "data": null,
        render: (data) => {
          return '\
            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="tooltip" data-theme="dark" title="Renew Loan">\
                <span class="svg-icon svg-icon-md">\
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                          <rect x="0" y="0" width="24" height="24"/>\
                          <path d="M8.29606274,4.13760526 L1.15599693,10.6152626 C0.849219196,10.8935795 0.826147139,11.3678924 1.10446404,11.6746702 C1.11907213,11.6907721 1.13437346,11.7062312 1.15032466,11.7210037 L8.29039047,18.333467 C8.59429669,18.6149166 9.06882135,18.596712 9.35027096,18.2928057 C9.47866909,18.1541628 9.55000007,17.9721616 9.55000007,17.7831961 L9.55000007,4.69307548 C9.55000007,4.27886191 9.21421363,3.94307548 8.80000007,3.94307548 C8.61368984,3.94307548 8.43404911,4.01242035 8.29606274,4.13760526 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                          <path d="M23.2951173,17.7910156 C23.2951173,16.9707031 23.4708985,13.7333984 20.9171876,11.1650391 C19.1984376,9.43652344 16.6261719,9.13671875 13.5500001,9 L13.5500001,4.69307548 C13.5500001,4.27886191 13.2142136,3.94307548 12.8000001,3.94307548 C12.6136898,3.94307548 12.4340491,4.01242035 12.2960627,4.13760526 L5.15599693,10.6152626 C4.8492192,10.8935795 4.82614714,11.3678924 5.10446404,11.6746702 C5.11907213,11.6907721 5.13437346,11.7062312 5.15032466,11.7210037 L12.2903905,18.333467 C12.5942967,18.6149166 13.0688214,18.596712 13.350271,18.2928057 C13.4786691,18.1541628 13.5500001,17.9721616 13.5500001,17.7831961 L13.5500001,13.5 C15.5031251,13.5537109 16.8943705,13.6779456 18.1583985,14.0800781 C19.9784273,14.6590944 21.3849749,16.3018455 22.3780412,19.0083314 L22.3780249,19.0083374 C22.4863904,19.3036749 22.7675498,19.5 23.0821406,19.5 L23.3000001,19.5 C23.3000001,19.0068359 23.2951173,18.2255859 23.2951173,17.7910156 Z" fill="#000000" fill-rule="nonzero"/>\
                      </g>\
                    </svg>\
                </span>\
            </a>\
            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                <span class="svg-icon svg-icon-md">\
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                            <rect x="0" y="0" width="24" height="24"/>\
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                        </g>\
                    </svg>\
                </span>\
            </a>\
            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                <span class="svg-icon svg-icon-md">\
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                            <rect x="0" y="0" width="24" height="24"/>\
                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                        </g>\
                    </svg>\
                </span>\
            </a>\
        ';
        }
      }
    ],
    "createdRow": function( row, data, dataIndex){
      // if( data.status ==  `failed` ) {
      //   $(row).find('td').eq(0).attr('style', 'color: red !important');
      // }

      // if( data.status ==  `completed` ) {
      //   $(row).find('td').eq(0).attr('style', 'color: green !important');
      // }
    }
  });
})
