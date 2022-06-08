<template>
<v-container fluid class="pa-0">      
      <v-data-table
        :headers="mock.invoice.headers"
        :items="mock.invoice.invoice_detail"
        item-key="instruction_id"
      >
      </v-data-table>
</v-container>
</template>
<script>
import mock from '../../pages/Instruction/mock';
export default {
    name: 'TableCompleteComponent',
    data(){
        return{
            mock
        }
    }
}
</script>