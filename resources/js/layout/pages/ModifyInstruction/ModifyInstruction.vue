<template>
  <v-container fluid class="pr-15 pl-15 pt-10">
    <Header :item="items" title="3rd Party Instruction"/>

    <v-card class="pl-3 pr-3">    
      <v-tabs background-color="accent-4" color="primary" class="mb-5">
        <v-tab :to="{ name: 'TableOpen'}">Open</v-tab>
        <v-tab :to="{ name: 'TableComplete'}">Complete</v-tab>
        <v-spacer></v-spacer>
        <div style="margin:7px!important">
          <Search @update:modelValue="newValue => searchText = newValue" />
        </div>
        {{searchText}}
        <div class="ma-2">
        <v-btn style="color: black" outlined color="grey lighten-2" > <v-icon left color="primary">mdi-file-outline</v-icon><span style="color:black">Export</span></v-btn>
        </div>

      </v-tabs>
      <router-view :SearchText="searchText"></router-view>
    </v-card>
  </v-container>
</template>
<script>
import Search from '../../components/Search/SearchComponent.vue'
import Header from '../../components/Header/HeaderComponent.vue'
export default {
    name: "Instruction",
    components:{
      Search,
      Header
    },
    data(){
        return{
        searchText: '',
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
        ]
        }
    },
    computed: {

    }
}
</script>
