<template>
  <v-container fluid class="pr-15 pl-15 pt-10">

    <Header :item="mock.InvoiceInstruction.items" title="3rd Party Instruction"/>
    <v-card class="pa-3">
      <v-container class="container-custom">
        <v-row class="pa-1" no-gutters>
          <v-col cols="2">
            <v-select
              class="select"
              :items="mock.InvoiceInstruction.TypeInstruction"
              item-text="name"
              item-value="id"
              v-model="data.intruction_type"
              dense
              outlined
              disabled
              item-color="black"
              color="black"
              background-color="grey lighten-4"
            >
              <template slot="selection" slot-scope="data">
                      <v-icon left size="20">{{data.item.icon}}</v-icon>
                      {{data.item.name}}
              </template>
              <template slot="item" slot-scope="data">
                <v-list-item-icon style="margin-right: 0">
                  <v-icon left>{{data.item.icon}}</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title v-text="data.item.name"></v-list-item-title>
                </v-list-item-content>
              </template>
            </v-select>
          </v-col>
          <v-col cols="10">
            <v-row no-gutters>
              <v-col cols="12" class="text-right pb-3">
                <ChipStatus :status="data.invoice_status" />
              </v-col>
              <v-col cols="12">
                <v-row no-gutters>
                  <v-col cols="9">
                    <v-row no-gutters>
                      <v-col cols="3" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Assigned Vendor
                        </v-subheader>
                        <v-select
                          placeholder="Select Vendor"
                          class="select"
                          :items="mock.InvoiceInstruction.vendor_name"
                          v-model="data.assigned_vendor"
                          dense
                          outlined
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-select>
                      </v-col>
                      <v-col cols="3" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Attention Of
                        </v-subheader>
                        <v-text-field
                          placeholder="Enter Attention Of"
                          outlined
                          class="select"
                          v-model="data.attention_of"
                          dense
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="3" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Quotation No.
                        </v-subheader>
                        <v-text-field
                          class="select"
                          placeholder="Enter Quotation"
                          v-model="data.quotation_no"
                          outlined
                          dense
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="3" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Invoice To
                        </v-subheader>
                        <v-select
                          placeholder="Select an Option"
                          class="select"
                          :items="mock.InvoiceInstruction.invoice_to"
                          item-text="text"
                          v-model="data.invoice_to"
                          dense
                          outlined
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-select>
                      </v-col>
                      <v-col cols="12" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Vendor Address
                        </v-subheader>
                        <v-select
                          placeholder="Select Vendor Address"
                          class="select"
                          :items="mock.InvoiceInstruction.vendor_address"
                          v-model="data.vendor_address"
                          dense
                          outlined
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-select>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-divider
                    vertical
                    style="border: 1px dashed #bdbdbd"
                  ></v-divider>
                  <v-col cols="3">
                    <v-row no-gutters>
                      <v-col cols="12" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Customer - Contract
                        </v-subheader>
                        <v-select
                          class="select"
                          placeholder="Select Customer"
                          :items="mock.InvoiceInstruction.customer_contract"
                          v-model="data.customer_contract"
                          item-value="text"
                          dense
                          outlined
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-select>
                      </v-col>
                      <v-col cols="12" class="pa-2">
                        <v-subheader
                          style="height: 20px; font-size: 0.75rem; padding: 0"
                        >
                          Customer PO No.
                        </v-subheader>
                        <v-text-field
                          class="select"
                          v-model="data.customer_po_no"
                          placeholder="Enter Customer PO No."
                          outlined
                          dense
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
      <v-container class="container-custom">
        <h2>Cost Detail</h2>
        
        <SimpleTable :headertable="HeadersName">
          <template v-slot:body>
            <tbody>
              <tr class="text-2rem">
                <td class="pa-2">
                  <v-text-field
                    class="select mt-5"
                    placeholder="Enter Description"
                    v-model="data.cost_detail.description"
                    outlined
                    dense
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-text-field>
                </td>
                <td>
                  <v-text-field
                    v-model="data.cost_detail.quantity"
                    class="select mt-5"
                    placeholder="Enter QTY"
                    outlined
                    dense
                    type="number"
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-text-field>
                </td>
                <td>
                  <v-select
                    class="select mt-5"
                    item-text="text"
                    item-value="text"
                    v-model="data.cost_detail.uom"
                    :items="mock.InvoiceInstruction.ItemsUOM"
                    dense
                    outlined
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-select>
                </td>
                <td>
                  <v-text-field
                    v-model="data.cost_detail.unit_price"
                    class="select mt-5"
                    placeholder="Enter Unit Price"
                    outlined
                    dense
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-text-field>
                </td>
                <td>
                  <v-text-field
                    v-model="data.cost_detail.discount"
                    class="select mt-5"
                    outlined
                    dense
                    item-color="black"
                    color="black"
                    type="number"
                    background-color="grey lighten-4"
                  ></v-text-field>
                </td>
                <td>
                  <v-text-field
                    v-model="data.cost_detail.gst_vat"
                    class="select mt-5"
                    outlined
                    dense
                    item-color="black"
                    color="black"
                    type="number"
                    background-color="grey lighten-4"
                  ></v-text-field>
                </td>
                <td>
                  <v-select
                    v-model="data.cost_detail.currency"
                    class="select mt-5"
                    placeholder="Enter Customer PO"
                    :items="mock.InvoiceInstruction.ItemsCurrency"
                    item-text="text"
                    item-value="text"
                    dense
                    outlined
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-select>
                </td>
                <td>{{VATAmount}}</td>
                <td>{{Subtotal}}</td>
                <td>{{Total}}</td>
                <td>
                  <v-select
                    class="select mt-5"
                    placeholder="Enter Customer PO"
                    :items="mock.InvoiceInstruction.ItemsCharge"
                    item-text="text"
                    item-value="text"
                    v-model="data.cost_detail.charge_to"
                    dense
                    outlined
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-select>
                </td>
              </tr>
              <tr>
                <td colspan="6" class="text-left">
                  Exchange Rate 1 USD = 3.6725 AED
                </td>
                <td>
                  <div>AED (Total)</div>
                </td>
                <td>{{CurrencyTotal.AED.tax}}</td>
                <td>{{CurrencyTotal.AED.subtotal}}</td>
                <td>{{CurrencyTotal.AED.total}}</td>
                <td></td>
              </tr>
              <tr>
                <td colspan="6" class="text-left"></td>
                <td>USD (Total)</td>
                <td>{{CurrencyTotal.USD.tax}}</td>
                <td>{{CurrencyTotal.USD.subtotal}}</td>
                <td>{{CurrencyTotal.USD.total}}</td>
                <td></td>
              </tr>
            </tbody>
          </template>
        </SimpleTable>
      </v-container>
      <v-container>
        <v-row no-gutters class="pt-10">
          <v-col cols="5" class="pr-7">
            <h3>Attachment</h3>
            <v-file-input label="File input" v-model="data.attachtment"></v-file-input>
          </v-col>
          <v-col cols="7">
            <h3 class="pb-2">Notes</h3>
            <v-textarea
              outlined
              name="input-7-4"
              v-model="data.notes"
              background-color="grey lighten-5"
            ></v-textarea>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <v-card class="pa-3 mt-5">
      <div style="width:50%;">
          <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
            Link To
          </v-subheader>
        <v-row no-gutters>
          <v-col cols="9">

          <v-select
              placeholder="Select Item"
              class="select"
              :items="mock.InvoiceInstruction.ItemsLink"
              item-text="text"
              item-value="text"
              v-model="data.link"
              dense
              outlined
              item-color="black"
              color="black"
              background-color="grey lighten-4"
            ></v-select>

          </v-col>
          <v-col cols="3" class="pl-2">

          <v-btn depressed color="error" v-if="data.link !== ''? true : false" @click="removeLink"> Remove Link </v-btn>
          </v-col>
        </v-row>
     </div>
    </v-card>
    <v-card class="pa-5 mt-5">
        <div style="width:100%; text-align: right">
    <v-btn text @click="cancel"> Cancel</v-btn>      
    <v-btn
      class="ma-2"
      outlined
      color="grey darken-2"
    >
      Save as Draft
    </v-btn>

    <v-btn
      depressed
      color="primary"
      @click="submit"
    >
      Submit
    </v-btn>
        </div>
    </v-card>
  </v-container>
</template>
<script>
import mock from './mock'
import InstructionService from '../../../services/instruction.service'
import SimpleTable from '../../components/Table/SimpleTable/SimpleTableComponent.vue'
import ChipStatus from '../../components/Chip/ChipStatusComponent.vue'
export default {
    name: "ModifyInstruction",
    components:{
      SimpleTable,
      ChipStatus
    },
    data(){
        return{
        mock,
        HeadersName: ['Description','QTY','UOM','Unit Price','Discount (%)','GST/VAT (%)','Currency','VAT Amount','Sub Total','Total','Charge To'],
        data: null,
        CurrencyTotal: {
          USD :{
            tax: 0,
            subtotal: 0,
            total: 0
          },
          AED :{
            tax: 0,
            subtotal: 0,
            total: 0
          }
          }
        }
    },
    watch:{
      'data.cost_detail.currency'(newValue){
        if(newValue == 'USD'){
          this.CurrencyTotal.USD = { tax: this.VATAmount, subtotal: this.Subtotal, total: this.Total }
          this.CurrencyTotal.AED = { tax: this.VATAmount * 3.67, subtotal: this.Subtotal* 3.67, total: this.Total * 3.67 }
        }else if(newValue == 'AED'){
          this.CurrencyTotal.AED = { tax: this.VATAmount, subtotal: this.Subtotal, total: this.Total }
          this.CurrencyTotal.USD = { tax: this.VATAmount * 0.27, subtotal: this.Subtotal* 0.27, total: this.Total * 0.27 }
        }
      }
    },
    mounted(){
      this.initializeData();
    },
    computed: {
      Subtotal(){
        return ((this.data.cost_detail.quantity * this.data.cost_detail.unit_price) - (this.data.cost_detail.quantity * this.data.cost_detail.unit_price * (this.data.cost_detail.discount/100)));
      },
      VATAmount(){
        return (this.Subtotal  * (this.data.cost_detail.gst_vat/100))
      },
      Total(){
        return (this.Subtotal + this.VATAmount)
      }      
    },
    methods:{
      initializeData(){
        InstructionService.getDetail(this.$route.params.id).then(
            response => {
                this.data = response.data.data[0];
                console.log(this.data);
            },
            error => {
                console.log(error);
            }
        );
      },
      removeLink(){
        this.data.link = ''
      },
      cancel(){
        this.$router.push({
          name: 'DetailInstruction',
          params:{
            id: this.data.id
          }
        })
      },
      submit(){
        let formData = new FormData();
        Object.entries(this.data).forEach(([key, value]) => {
            formData.append(key, value);   
        });      
      },
    }
}
</script>
<style scoped>
.select {
  font-size: 0.8rem;
}
.container-custom {
  border: 2px solid #bac0c5;
  border-radius: 0;
}
.container-custom:nth-child(2) {
  border-top: none;
}
.line {
  border: 1px dashed;
  border-color: grey;
}
.text-2rem td div {
  font-size: 0.7rem;
}
.text-2rem td {
  font-size: 0.7rem;
}
</style>