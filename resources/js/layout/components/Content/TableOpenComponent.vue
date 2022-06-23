<template>
  <v-container fluid class="pa-0">
    <div style="width: 100%; text-align: right" class="mb-5">
      <v-menu offset-y class="mb-5">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="primary" v-bind="attrs" v-on="on"
            ><v-icon left>mdi-plus</v-icon>
            Create 3rd Party Instruction
          </v-btn>
        </template>
        <v-list>
          <v-list-item
            v-for="(item, index) in items"
            :key="index"
            :to="item.link"
          >
            <v-icon left color="primary">{{ item.icon }}</v-icon>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </div>
    <v-data-table
      @click:row="rowClick"
      :headers="mock.TableOpen.headers"
      :items="dataInstructions"
      class="row-pointer"
      :search="SearchText"
      item-key="instruction_id"
    >
      <template v-slot:item.intruction_type="{ item }">
        <v-icon
          left
          color="secondary"
          >{{ item.intruction_type == 'LI'? 'mdi-truck': 'mdi-human-male-board-poll'}}</v-icon
        >{{item.intruction_type}}
      </template>
      <template v-slot:item.status="{ item }">
        <v-row justify="center" align="center">
          <ChipStatus :status="item.status" />
        </v-row>
      </template>
    </v-data-table>
  </v-container>
</template>
<script>
import mock from './mock';
import {  mapActions,mapGetters } from 'vuex'
import ChipStatus from '../Chip/ChipStatusComponent.vue'


export default {
    name: 'TableOpenComponent',
    components:{
      ChipStatus
    },
    props: ['SearchText'],
    data(){
        return{
            mock,
            items: [
              {
                icon: 'mdi-truck',
                title: 'Logistic Instruction',
                link: {
                  name: 'NewInstruction',
                  query: { type: 'LI' }
                }
              },
              {
                icon: 'mdi-human-male-board-poll',
                title: 'Service Instruction',
                link: {
                  name: 'NewInstruction',
                  query: { type: 'SI' }
                }
              }]
        }
    },
    computed: {
        ...mapGetters('instruction',['FilteredDataInstruction']),
        dataInstructions(){
          return this.FilteredDataInstruction('draft','in progress');
        },

    },
    mounted(){
        this.getAll();
        console.log('Table OPEN Mount');

    },
    methods:{
        ...mapActions('instruction', {
            getAll: 'getAllInstruction'
        }),
        rowClick(item){
          this.$router.push({
            name: 'DetailInstruction',
            params: { id: item.id }
          });
        }
    }
}
</script>
<style scoped>
.row-pointer >>> tbody tr :hover {
  cursor: pointer;
}
</style>
