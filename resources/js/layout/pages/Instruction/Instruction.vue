<template>
  <v-container fluid class="pr-15 pl-15 pt-10">
     <div class="text-h4">3rd Party Instruction</div>

    <v-breadcrumbs :items="items" class="pl-0 pt-1 mb-7">
      <template v-slot:divider>
        <v-icon>mdi-chevron-right</v-icon>
      </template>
    </v-breadcrumbs>

    <v-card class="pl-3 pr-3">    
      <v-tabs background-color="accent-4" color="primary" class="mb-5">
        <v-tab :to="{ name: 'TableOpen'}">Open</v-tab>
        <v-tab :to="{ name: 'TableComplete'}">Complete</v-tab>
        <v-spacer></v-spacer>
        <v-btn class="ma-2" outlined color="grey lighten-2"> <v-icon color="primary">mdi-magnify</v-icon></v-btn>
        <v-btn class="ma-2" style="color: black" outlined color="grey lighten-2" > <v-icon left color="primary">mdi-file-outline</v-icon><span style="color:black">Export</span></v-btn>
      </v-tabs>
      <router-view></router-view>
    </v-card>
  </v-container>
</template>
<script>
export default {
    name: "Instruction",
    data(){
        return{
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
