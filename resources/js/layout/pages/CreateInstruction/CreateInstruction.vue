<template>
  <v-container fluid class="pr-15 pl-15 pt-10">
    <div class="text-h4">3rd Party Instruction</div>

    <v-breadcrumbs :items="mock.InvoiceInstruction.items" class="pl-0 pt-1 mb-7">
      <template v-slot:divider>
        <v-icon>mdi-chevron-right</v-icon>
      </template>
    </v-breadcrumbs>

    <v-card class="pa-3">
      <v-container class="container-custom">
        <v-row class="pa-1" no-gutters>
          <v-col cols="2">
            <v-select
              class="select"
              :items="mock.InvoiceInstruction.TypeInstruction"
              item-text="name"
              item-value="id"
              v-model="TypeInstruction"
              dense
              outlined
              item-color="black"
              color="black"
              background-color="grey lighten-4"
            >
              <template slot="selection" slot-scope="data">
                      <v-icon left size="20" color="primary">{{data.item.icon}}</v-icon>
                      {{data.item.name}}
              </template>
              <template slot="item" slot-scope="data">
                <v-list-item-icon style="margin-right: 0">
                  <v-icon left color="primary">{{data.item.icon}}</v-icon>
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
                <v-chip style="width: 100px; justify-content: center"
                  >Draft</v-chip
                >
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
                          v-model="vendor_name"
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
                          v-model="attention_of"
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
                          v-model="quotation_no"
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
                          v-model="invoice_to"
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
                          v-model="vendor_address"
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
                          v-model="customer_contract"
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
                          v-model="customer_po_no"
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
        <!-- <v-data-table
            :headers="headers"
            :items="invoice_detail"
            disable-sort
          >
            <template v-slot:item.link_to>
                <v-text-field 
                          class="select text-center mt-2"
                          placeholder="Select Quotation"
                          outlined
                          dense
                          item-color="black"
                          color="black"
                          background-color="grey lighten-4"
                ></v-text-field>
            </template>
          </v-data-table> -->

        <v-simple-table readonly>
          <template v-slot:default>
            <thead class="secondary">
              <tr>
                <th class="text-left white--text">Description</th>
                <th class="text-left white--text">QTY</th>
                <th
                  class="text-left white--text"
                  style="min-width: 50px; width: 75px"
                >
                  UOM
                </th>
                <th class="text-left white--text">Unit Price</th>
                <th class="text-left white--text">Discount (%)</th>
                <th class="text-left white--text">GST/VAT (%)</th>
                <th class="text-left white--text">Currency</th>
                <th class="text-left white--text">VAT Amount</th>
                <th class="text-left white--text">Sub Total</th>
                <th class="text-left white--text">Total</th>
                <th class="text-left white--text">Charge To</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-2rem">
                <td class="pa-2">
                  <v-text-field
                    class="select mt-5"
                    placeholder="Enter Description"
                    v-model="description"
                    outlined
                    dense
                    item-color="black"
                    color="black"
                    background-color="grey lighten-4"
                  ></v-text-field>
                </td>
                <td>
                  <v-text-field
                    v-model="quantity"
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
                    v-model="UOM"
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
                    v-model="UnitPrice"
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
                    v-model="discount"
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
                    v-model="GSTVAT"
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
                    v-model="Currency"
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
                    v-model="ChargeTo"
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
          </template>
        </v-simple-table>
      </v-container>
      <v-container>
        <v-row no-gutters class="pt-10">
          <v-col cols="5" class="pr-7">
            <h3>Attachment</h3>
            <v-file-input label="File input" v-model="attachment"></v-file-input>
          </v-col>
          <v-col cols="7">
            <h3 class="pb-2">Notes</h3>
            <v-textarea
              outlined
              name="input-7-4"
              v-model="notes"
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
              v-model="LinkTo"
              dense
              outlined
              item-color="black"
              color="black"
              background-color="grey lighten-4"
            ></v-select>
          
          </v-col>
          <v-col cols="3" class="pl-2">

          <v-btn depressed color="error" v-if="LinkTo !== ''? true : false" @click="removeLink"> Remove Link </v-btn>
          </v-col>
        </v-row>
     </div>
    </v-card>
    <v-card class="pa-5 mt-5">
        <div style="width:100%; text-align: right">
          
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
import { mapActions, mapGetters } from 'vuex'
import mock from './mock'
export default {
    name: "CreateInstruction",
    data(){
        return{
        mock,
        vendor_name:'',
        attention_of:'',
        quotation_no:'',
        invoice_to:'',
        vendor_address:'',
        customer_contract:'',
        customer_po_no:'',
        description: '',
        quantity: '0',
        UOM: 'SHP',
        UnitPrice: '0',
        discount: 0,
        GSTVAT:0,
        Currency: '',
        ChargeTo: '',
        LinkTo: '',
        TypeInstruction:'',
        attachment:null,
        notes:''

        }
    },
    mounted(){
      if(this.$route.query.type !== '' || this.$route.query.type !== null){
        this.TypeInstruction = this.$route.query.type
      }
    },
    computed: {
      Subtotal(){
        return ((this.quantity * this.UnitPrice) - (this.quantity * parseInt(this.UnitPrice) * (this.discount/100)));
      },
      VATAmount(){
        return (this.Subtotal  * (this.GSTVAT/100))
      },
      Total(){
        return (this.Subtotal + this.VATAmount)
      }      
    },
    methods:{
      removeLink(){
        this.LinkTo = ''
      },
      submit(){
        let formData = new FormData();
        formData.append('instruction_type', this.TypeInstruction);
        formData.append('associates_vendor_name',this.vendor_name);
        formData.append('associates_vendor_addres',this.vendor_address);
        formData.append('attention_of',this.attention_of);
        formData.append('quatation_no',this.quotation_no);
        formData.append('invoice_name',this.invoice_to);
        formData.append('associates_customer_contract',this.customer_contract);
        formData.append('associates_customer_po_no', this.customer_po_no);

        formData.append('desc', this.description);
        formData.append('qty', this.quantity);
        formData.append('uom', this.UOM);
        formData.append('unit_price', this.UnitPrice);
        formData.append('disc', this.discount);
        formData.append('tax', this.GSTVAT);
        formData.append('curenncy', this.Currency);
        formData.append('link',this.LinkTo);
        formData.append('charge', this.ChargeTo);
        formData.append('invoice_total', this.Total);
        formData.append('notes', this.notes);
        formData.append('attachtment', this.attachment);
        console.log(this.attachment);
        this.AddDataInstruction(formData);      
      },
      ...mapActions('instruction',['AddDataInstruction'])
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
