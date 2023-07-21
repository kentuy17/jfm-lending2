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
