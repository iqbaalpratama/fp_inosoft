<template>
  <v-simple-table readonly>
            <template v-slot:default>
              <thead class="secondary">
                <tr>
                  <template v-for="HeaderName in headertable">
                  <th class="text-left white--text tbl">{{HeaderName}}</th>
                </template>
                </tr>
              </thead>
              <slot name="body">
              <tbody>
                <tr class="text-2rem">
                  <td class="pa-2">
                    {{data.description}}
                  </td>
                  <td>
                    {{data.quantity}}
                  </td>
                  <td>
                    {{data.uom}}
                  </td>
                  <td>
                    {{data.unit_price}}
                  </td>
                  <td>
                    {{data.discount}}
                  </td>
                  <td>
                    {{data.gst_vat}}
                  </td>
                  <td>
                    {{data.currency}}
                  </td>
                  <td>
                    {{data.vat_amount}}
                  </td>
                  <td>
                    {{data.sub_total}}
                  </td>
                  <td>
                    {{data.total}}
                  </td>
                  <td>
                    {{data.charge_to}}
                  </td>
                </tr>
                <tr>
                  <td colspan="6" class="text-left">
                    Exchange Rate 1 USD = 3.6725 AED
                  </td>
                  <td>
                    <div>AED (Total)</div>
                  </td>
                  <td>0.00</td>
                  <td>0.00</td>
                  <td>0.00</td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="6" class="text-left"></td>
                  <td>USD (Total)</td>
                  <td>0.00</td>
                  <td>0.00</td>
                  <td>0.00</td>
                  <td></td>
                </tr>
              </tbody>
              </slot>
            </template>
          </v-simple-table>
</template>

<script>
export default {
    name: 'SimpleTable',
    props: ['data', 'headertable']
}
</script>

<style scoped>
.tbl:nth-child(3){
  width: 100px
}
.text-2rem td div {
  font-size: 0.7rem;
}
.text-2rem td {
  font-size: 0.7rem;
}
</style>