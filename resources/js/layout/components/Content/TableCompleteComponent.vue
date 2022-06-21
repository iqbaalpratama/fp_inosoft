<template>
<v-container fluid class="pa-0">      
      <v-data-table
        :headers="mock.TableCompleted.headers"
        :items="dataInstructions"
        item-key="instruction_id"
        class="row-pointer"
        :search="SearchText"
        @click:row="rowClick"
      >
      <template v-slot:item.status="{ item }">
          <v-row
            justify="center"
            align="center"
          >
            <ChipStatus :status="item.status" />
          </v-row>
          </template>
      </v-data-table>
</v-container>
</template>
<script>
import mock from './mock';
import { mapActions, mapGetters } from 'vuex'
import ChipStatus from '../Chip/ChipStatusComponent.vue'
export default {
    name: 'TableCompleteComponent',
    components:{
      ChipStatus
    },
    props: ['SearchText'],
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