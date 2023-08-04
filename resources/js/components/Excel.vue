<template>
  <div class="mb-5">
    <div class="row align-items-center">
      <div class="col-lg-9 col-xl-8">
        <div class="row align-items-center">
          <div class="col-md-4 my-2 my-md-0">
            <div class="d-flex align-items-center">
              <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
              <select class="form-control" id="modal_filter_status" v-model="status">
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
              <select class="form-control" id="modal_filter_collector" v-model="collector_id">
                <option v-for="(collector, index) in collectors" v-bind:key="index" :value="index">{{ collector }}</option>
              </select>
            </div>
          </div>
          <div class="col-md-4 my-2 my-md-0">
            <div class="d-flex align-items-center">
              <label class="mr-3 mb-0 d-none d-md-block">Date:</label>
              <div class="input-group date">
                <input type="text" class="form-control" id="kt_datepicker_2_modal" v-model="date">
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
        <a href="#" class="btn btn-light-primary px-6 font-weight-bold" @click="fetchData()">Search</a>
      </div>
    </div>
  </div>
  <div class="datatable datatable-bordered datatable-head-custom" style='display: block !important;'>
    <vue-excel-editor v-model="jsondata" enterToSouth="true" >
      <vue-excel-column field="id" invisible="true" readonly="true" />
      <vue-excel-column field="account_name" label="AccountName" type="string" width="215px" readonly="true" />
      <vue-excel-column field="date_release" label="DateReleased" type="date" width="115px" readonly="true" />
      <vue-excel-column field="amount_to_pay" label="AmountToPay" type="number" width="165px" readonly="true" />
      <vue-excel-column field="daily_principal" label="Principal" type="number" width="95px" readonly="true" />
      <vue-excel-column field="daily_interest" label="Interest" type="number" width="95px" readonly="true" />
      <vue-excel-column field="remaining_balance" label="Balance" type="number" width="165px" readonly="true" />
      <vue-excel-column field="daily_paid" label="AmountPaid" type="number" width="160px" :change="onBeforePaid" />
    </vue-excel-editor>
  </div>

</template>

<script>
import { reactive, ref } from 'vue'
import moment from 'moment'

export default {
  name: 'excel',
  setup() {
    return {
      jsondata: ref([]),
      date: ref(null),
      collector_id: ref(0),
      status: ref('active'),
      collectors: reactive([]),
    }
  },
  mounted() {
    axios.post('/collection/excel', {
        date: this.date,
        collector_id: this.collector_id,
        status: this.status,
      })
      .then((data) => {
        console.log(data.data);
        this.jsondata = this.excelData(data.data.data);
      })

    let ktStatus = document.getElementById('kt_datatable_search_status')
    let ktCollector = document.getElementById('kt_datatable_filter_collector');
    let ktDate = document.getElementById('kt_datepicker_3_modal');
    let ktSearch = document.getElementById('search_data');

    this.collector_id = ktCollector.value;
    this.status = ktStatus.value;
    this.date = ktDate.value;
    var arrayOfNodes = ktCollector.childNodes;
    var optionsArr = [];
    for (var i = 0; i < arrayOfNodes.length; i++) {
      if (arrayOfNodes[i].nodeName === 'OPTION') {
        optionsArr.push(arrayOfNodes[i].innerHTML);
      }
    }
    this.collectors = optionsArr;

    ktCollector.addEventListener('change', (event) => {
      this.collector_id = event.target.value;
    })

    ktStatus.addEventListener('change', (event) => {
      this.status = event.target.value;
    })

    ktSearch.addEventListener('click', () => {
      this.date = ktDate.value;

    });
  },
  methods: {
    excelData(json=[]) {
      let data = []
      for (let i = 0; i < json.length; i++) {
        const element = json[i];
        data[i] = {
          id: element.id,
          account_name: element.clients.account_name,
          date_release: moment(element.loans.date_release, "MMM-DD-YY").format("YYYY-MM-DD"),
          amount_to_pay: element.loans.daily_payable,
          daily_principal: element.daily_principal,
          daily_interest: element.daily_interest,
          remaining_balance: element.remaining_balance,
          daily_paid: element.daily_paid,
        }
      }
      return data
    },

    onBeforePaid(newVal, oldVal, row) {
      if(newVal == oldVal) return;
      axios.post('/collection/paid', {
          id: row.id,
          amount_paid: newVal,
        })
        .catch((err) => {
          console.log(err);
        })

      row.remaining_balance = row.remaining_balance - newVal
    },

    fetchData() {
      axios.post('/collection/excel', {
        date: this.date,
        collector_id: this.collector_id,
        status: this.status,
      })
      .then((response) => {
        this.jsondata = this.excelData(response.data.data)
      })

      return true
    }
  },
  // updated() {
  //   this.collector_id
  // },

}



</script>
