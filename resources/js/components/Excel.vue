<template>
  <vue-excel-editor v-model="jsondata" filter-row enterToSouth="true" processing />
    <!-- <vue-excel-column field="collection_date" label="CollectionDate" type="date" width="150px" readonly="true" /> -->

</template>

<script>
import { reactive, ref } from 'vue';

export default {
  name: 'excel',
  setup() {
    return {
      jsondata: ref([]),
      date: null,
      collector_id: 0,
      status: 'active',
    }
  },
  mounted() {
    fetch('/collection/excel', {
      date: this.date,
      collector_id: this.collector_id,
      status: this.status,
    })
      .then((resp) => resp.json())
      .then((data) => {
        this.jsondata = data.data;
        console.log(data);
      })
  },
}



</script>
