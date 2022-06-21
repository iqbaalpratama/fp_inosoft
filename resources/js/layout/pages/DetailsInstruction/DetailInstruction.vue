<template>
  <v-container fluid class="pr-15 pl-15 pt-10">
    
    <Header :item="mock.DetailInstruction.items" title="3rd Party Instruction"/>

    <div style="width:100%;text-align: right" class="mb-2">
        <v-btn style="background-color: white" outlined color="grey lighten-2"> <v-icon color="primary" left>mdi-email-fast</v-icon><span style="color:black">Send Email</span></v-btn>
        <v-btn style="background-color: white" outlined color="grey lighten-2" > <v-icon left color="primary">mdi-file-outline</v-icon><span style="color:black">Export</span></v-btn>
    </div>
    <v-card class="pa-3">
      <v-row no-gutters>
        <v-col cols="auto">
          <v-btn text @click="BackClick">
            <v-icon left>mdi-chevron-left</v-icon>Back
          </v-btn>
        </v-col>
        <v-spacer></v-spacer>
        <v-col cols="auto">
          <v-dialog v-if="StatusChecker"
            v-model="dialogTerminated"
            persistent
            max-width="600px"
            >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-bind="attrs"
                v-on="on"
                text
                >
              <v-icon left>mdi-delete</v-icon>Terminated
              </v-btn>
            </template>
      <v-card>
        <v-card-title class="text-center">
          <span class="text-h5 text-center">Reason Of Cancellation</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Cancelled By
            </v-subheader>
            <h4>
              Winata Admin
            </h4>
              </v-col>
              <v-col cols="12">
                <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Description
            </v-subheader>
                <v-textarea
                  readonly
                  outlined
                  name="input-7-4"
                  background-color="grey lighten-5"
                ></v-textarea>
              </v-col>
              <v-col
                cols="12"
                sm="6"
              >
                <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Attachment
            </v-subheader>
<v-file-input
                  label="File input"
                ></v-file-input>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialogTerminated = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="dialogTerminated = false"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
          <v-btn text @click="ModifyClick" v-if="StatusChecker">
            <v-icon left>mdi-pencil</v-icon>Modify
          </v-btn>
        </v-col>
      </v-row>
      <v-container class="container-custom mt-10">
        <v-row no-gutters>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Type
            </v-subheader>
            <h4>
              {{ data.intruction_type == 'SI'? 'Service Instruction': 'Logistic Instruction'}}
            </h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
             {{ data.intruction_type }}  No.</v-subheader
            >
            <h4>{{data.instruction_id}}</h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Transfer No.</v-subheader
            >
            <h4>{{data.link}}</h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Customer
            </v-subheader>
            <h4>{{data.customer_contract}}</h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Customer PO
            </v-subheader>
            <h4>{{data.customer_po_no}}</h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Status
            </v-subheader>
            <ChipStatus :status="data.invoice_status"/>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Attention Of.
            </v-subheader>
            <h4>{{data.attention_of}}</h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Assigned Vendor
            </v-subheader>
            <h4>{{data.assigned_vendor}}</h4>
          </v-col>
          <v-col cols="2" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Vendor Quotation No.
            </v-subheader>
            <h4>{{data.quotation_no}}</h4>
          </v-col>
          <v-col cols="6" class="pa-3">
            <v-subheader style="height: 20px; font-size: 0.75rem; padding: 0">
              Vendor Address
            </v-subheader>
            <h4>{{data.vendor_address}}</h4>
          </v-col>
        </v-row>
      </v-container>

      <v-container class="mt-10 pa-0">
        <h2 class="pb-5">Cost Detail</h2>
        <v-container class="container-custom pa-0">
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
                    {{data.cost_detail.description}}
                  </td>
                  <td>
                    {{data.cost_detail.quantity}}
                  </td>
                  <td>
                    {{data.cost_detail.uom}}
                  </td>
                  <td>
                    {{data.cost_detail.unit_price}}
                  </td>
                  <td>
                    {{data.cost_detail.discount}}
                  </td>
                  <td>
                    {{data.cost_detail.gst_vat}}
                  </td>
                  <td>
                    {{data.cost_detail.currency}}
                  </td>
                  <td>
                    {{data.cost_detail.vat_amount}}
                  </td>
                  <td>
                    {{data.cost_detail.sub_total}}
                  </td>
                  <td>
                    {{data.cost_detail.total}}
                  </td>
                  <td>
                    {{data.cost_detail.charge_to}}
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
          <v-container>
            <v-row no-gutters class="pt-5">
              <v-col cols="5" class="pr-7">
                <h3>Attachment</h3>
                <v-file-input
                  label="File input"
                  v-model="data.attachment"
                ></v-file-input>
              </v-col>
              <v-col cols="7">
                <h3 class="pb-2">Notes</h3>
                <v-textarea
                  readonly
                  outlined
                  v-model="data.notes"
                  name="input-7-4"
                  background-color="grey lighten-5"
                ></v-textarea>
              </v-col>
            </v-row>
          </v-container>
        </v-container>
        
          <v-data-table

            :headers="headers"
            :items="desserts"
            disable-sort
            disable-pagination
            disable-filtering
            :hide-default-footer="true"
            class="elevation-1 mt-5 mb-5"
          >
            <template v-slot:top>
              <v-toolbar flat>
                <v-toolbar-title>Vendor Invoice</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-dialog v-model="dialog" max-width="500px" v-if="StatusChecker">

                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      color="primary"
                      dark
                      class="mb-2"
                      v-bind="attrs"
                      v-on="on"
                    >
                      Add Vendor Invoice
                    </v-btn>
                  </template>

                  <v-card>

                    <v-card-title>
                      <span class="text-h5"> {{formTitle}}</span>
                    </v-card-title>

                    <v-card-text>
                      <v-container>
                        <v-row>
                          <v-col cols="12">
                            <v-text-field
                              v-model="editedItem.invoice_no"
                              label="Invoice No."
                            ></v-text-field>
                          </v-col>
                          <v-col cols="12">
                            <v-text-field
                              v-model="editedItem.attachment"
                              label="Attachment"
                            ></v-text-field>
                          </v-col>
                          <v-col cols="12">
                            <v-text-field
                              v-model="editedItem.supporting_document"
                              label="Supporting Document"
                            ></v-text-field>
                          </v-col>
                        </v-row>
                      </v-container>
                    </v-card-text>

                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click="close">
                        Cancel
                      </v-btn>
                      <v-btn color="blue darken-1" text @click="save">
                        Save
                      </v-btn>
                    </v-card-actions>

                  </v-card>
                </v-dialog>

                <v-dialog v-model="dialogDelete" max-width="500px">
                  <v-card>
                    <v-card-title class="text-h5"
                      >Are you sure you want to delete this item?</v-card-title
                    >
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click="closeDelete"
                        >Cancel</v-btn
                      >
                      <v-btn
                        color="blue darken-1"
                        text
                        @click="deleteItemConfirm"
                        >OK</v-btn
                      >
                      <v-spacer></v-spacer>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
              </v-toolbar>
            </template>

            <template v-slot:item.actions="{ item }">
              <v-icon small class="mr-2" @click="editItem(item)">
                mdi-pencil
              </v-icon>
              <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
            </template>

          </v-data-table>
          <v-row no-gutters class="mb-10" v-if="StatusChecker">
            <v-col cols="6" class="text-right pr-2">
              <p class="text-body-2">
              Click the button if all vendor invoices <br>
              have been received.
              </p>
            </v-col>
            <v-col cols="6" class="text-left pl-2">
              <v-btn color="primary" @click="receiveInvoice"> All Received</v-btn>
            </v-col>
          </v-row>


      </v-container>
    </v-card>
  </v-container>
</template>
<script>
import InstructionService from '../../../services/instruction.service'
import Header from '../../components/Header/HeaderComponent.vue'
import mock from './mock'
import ChipStatus from '../../components/Chip/ChipStatusComponent.vue'
import {mapActions} from 'vuex'
export default {
    name: "DetailInstruction",
    components:{
      Header,
      ChipStatus
    },
    data(){
        return{
        mock,
        data: null,
        dialogTerminated: false,

        dialog: false,
        dialogDelete: false,
        headers: [
        { text: 'Invoice No.',value: 'invoice_no' },
        { text: 'Invoice Attachment', value: 'attachment' },
        { text: 'Supporting Document', value: 'supporting_document' },
        { text: 'Actions', value: 'actions', sortable: false },
        ],
        desserts: [],
        editedIndex: -1,
        editedItem: {
          invoice_no: '',
          attachment: '',
          supporting_document: 0,
        },
        defaultItem: {
          invoice_no: '',
          attachment: '',
          supporting_document: 0,
        },
        StatusChecker: null
        }
    },
    async mounted(){
        await InstructionService.getDetail(this.$route.params.id).then(
            response => {
                this.data = response.data.data[0];
                console.log(this.data);
            },
            error => {
                console.log(error);
            }
        );
        this.initialize();
        this.StatusCheck();

    },
    computed: {
      StatusCheck(){
        if(this.data.invoice_status == 'completed'){
          this.StatusChecker = false
        }else{
          this.StatusChecker = true
        }
      },
      formTitle () {
        return this.editedIndex === -1 ? 'Add Vendor Invoice' : 'Edit Vendor Invoice'
      }
    },
    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
    },
    methods: {
      BackClick(){
        this.$router.push('/instruction');
      },
      ModifyClick(){
        this.$router.push({
          name: 'ModifyInstruction',
          params:{
            id: this.$route.params.id
          }
        })
      },
      TerminatedClick(){

      },

      // Initialize()
      // get data invoice vendor
      initialize () {
        this.desserts = [
          {
            invoice_no: 'VI0001',
            attachment: 'Vendor Invoice.png',
            supporting_document: 0,
          },
          {
            invoice_no: 'VI0002',
            attachment: 'Instruction.png',
            supporting_document: 0,
          }
        ]
      },

      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.desserts.splice(this.editedIndex, 1)
        this.closeDelete()
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
      receiveInvoice(){
        this.ReceiveInvoice(this.$route.params.id);
        console.log(this.$route.params.id);
      },
      ...mapActions('instruction',['ReceiveInvoice'])
    },
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
.v-data-table > .v-data-table__wrapper tbody tr.v-data-table__expanded__content {
  box-shadow: none;
}
</style>
