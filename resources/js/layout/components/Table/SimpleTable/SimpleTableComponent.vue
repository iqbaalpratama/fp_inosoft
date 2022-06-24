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
            <template v-for="item in data">
              <td>
                {{item}}
              </td>   
            </template>
          </tr>
          <tr>
            <td colspan="6">
              Exchange Rate 1 USD = 3.6725 AED
            </td>
            <td>AED (Total)</td>
            <td>0.00</td>
            <td>0.00</td>
            <td>0.00</td>
            <td></td>
          </tr>
          <tr>
            <td colspan="6"></td>
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
  width: 100px;
}
.tbl:nth-child(7){
  width: 120px;
}
.tbl:nth-child(11){
  width: 140px;
}
.text-2rem td div {
  font-size: 0.7rem;
}
.text-2rem td {
  font-size: 0.7rem;
}
</style>
