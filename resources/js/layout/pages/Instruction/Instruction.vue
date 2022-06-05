<template>
  <v-container fluid class="pr-15 pl-15 pt-10">
    <div class="text-h4">3rd Instruction</div>
    
    <v-breadcrumbs :items="items" class="pl-0 pt-1 pb-5">
      <template v-slot:divider>
        <v-icon>mdi-chevron-right</v-icon>
      </template>
    </v-breadcrumbs>

    <v-card>
      <v-tabs background-color="deep-purple accent-4" dark>
        <v-tab>Open</v-tab>
        <v-tab>Complete</v-tab>
      </v-tabs>
    </v-card>
    <v-card class="employee-list mb-1">
      <v-data-table
        :headers="mock.invoice.headers"
        :items="mock.invoice.invoice_detail"
        item-key="name"
      >
      </v-data-table>
    </v-card>
  </v-container>
</template>
<script>
import mock from './mock'

export default {
    name: "Instruction",
    data(){
        return{
        items: [
        {
          text: 'Vendor Management',
          disabled: true,
          href: 'breadcrumbs_dashboard',
        },
        {
          text: '3rd Party Instruction',
          disabled: false,
          href: 'breadcrumbs_link_1',
        },
      ],mock
        }
    },
    computed: {

    },
    methods(){

    }
}
</script>
