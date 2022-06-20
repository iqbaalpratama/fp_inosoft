<template>
<v-container fluid class="pa-0">      
      <v-data-table
        :headers="mock.TableCompleted.headers"
        :items="dataInstructions"
        item-key="instruction_id"
      >
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
        })
    }
}
</script>