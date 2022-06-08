<template>
  <v-container fluid class="pr-15 pl-15 pt-10">
    <div class="text-h4">3rd Party Instruction</div>

    <v-breadcrumbs :items="items" class="pl-0 pt-1 mb-10">
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
              :items="ItemsInstruction"
              item-text="name"
              item-value="id"
              v-model="TypeInstruction"
              dense
              outlined
              item-color="black"
              color="black"
              background-color="grey lighten-4"
            ></v-select>
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
                          :items="items"
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
                          placeholder="Select Quotation"
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
                          :items="items"
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
                          :items="items"
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
                          :items="items"
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
                    :items="ItemsUOM"
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
                    :items="ItemsCurrency"
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
                    :items="ItemsCharge"
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
            <v-file-input accept="image/*" label="File input"></v-file-input>
          </v-col>
          <v-col cols="7">
            <h3 class="pb-2">Notes</h3>
            <v-textarea
              outlined
              name="input-7-4"
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
              :items="ItemsLink"
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
    >
      Submit
    </v-btn>
        </div>
    </v-card>
  </v-container>
</template>
<script>
export default {
    name: "CreateInstruction",
    data(){
        return{
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
        ItemsInstruction:
        [
          {
            id: 'LI',
            name: 'Logistic Instruction'
          },
          {
            id: 'SI',
            name: 'Service Instruction'
          },
          
        ],
        ItemsLink:[
          {
            text: "ASL-DSL-001"
          }
        ],
        ItemsUOM: [
          {
            text: "SHP",
          },
          {
            text: "SDC"
          }
        ],
        ItemsCurrency: [
          {
            text: "USD",
          },
          {
            text: "AED"
          }
        ],
        ItemsCharge:[
          {
            text: "MITME"
          },
          {
            text: "Customer"
          }
        ],

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
      ],

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
      }
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
