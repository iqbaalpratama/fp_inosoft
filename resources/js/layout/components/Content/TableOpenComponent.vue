<template>
<v-container fluid class="pa-0">
    <div style="width:100%; text-align: right" class="mb-5">
        <v-menu offset-y class="mb-5">
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            color="primary"
            dark
            v-bind="attrs"
            v-on="on"
          >
            Create 3rd Party Instruction
          </v-btn>
        </template>
        <v-list>
          <v-list-item v-for="(item, index) in items" :key="index" :to="item.link">
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      </div>
      
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
    name: 'TableOpenComponent',
    data(){
        return{
            mock,
            items: [
              {
                title: 'Logistic Instruction',
                link: {
                  name: 'NewInstruction',
                  query: { type: 'LI' }
                }
              },
              {
                title: 'Service Instruction',
                link: {
                  name: 'NewInstruction',
                  query: { type: 'SI' }
                }
              }]
        }
    }
}
</script>