<template>
<v-container fluid class="pa-0">      
      <v-data-table
        :headers="mock.TableCompleted.headers"
        :items="dataInstructions"
        item-key="instruction_id"
        @click:row="rowClick"
      >
      <template v-slot:item.status="{ item }">
          <v-row
            justify="center"
            align="center"
          >
            <v-chip draggable text-color="white" :color="ColorChipStatus(item.status)">
            {{ item.status}}
            </v-chip>
          </v-row>
          </template>
      </v-data-table>
</v-container>
</template>
<script>
import mock from './mock';
import { mapActions, mapGetters } from 'vuex'

export default {
    name: 'TableCompleteComponent',
    data(){
        return{
            mock
        }
    },
    computed: {
        ...mapGetters('instruction',['FilteredDataInstruction']),
        dataInstructions(){
          return this.FilteredDataInstruction('completed');
        }
    },
    mounted(){
        this.getAll();
        
    },
    methods:{
        ...mapActions('instruction', {
            getAll: 'getAllInstruction'
        }),
        ColorChipStatus(data){
          if(data == 'completed'){
            return 'green'
          }else if(data == 'cancelled'){
            return 'grey'
          }else{
            return ''
          }
        },
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