<template>
  <v-app-bar height="62" color="navColor" dark app>
    <v-toolbar-title class="ml-4">Inosoft Bootcamp</v-toolbar-title>
    <v-spacer></v-spacer>

    <v-menu min-width="180" offset-y bottom left nudge-bottom="10">
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="mr-0" icon v-bind="attrs" v-on="on">
          <v-icon style="font-size: 30px" color="iconColor">mdi-account</v-icon>
        </v-btn>
        <v-toolbar-title class="mr-3 subtitle-1">Winata Admin</v-toolbar-title>
      </template>
      <v-list>
        <div class="d-flex justify-center my-3">
          <v-btn
            width="80%"
            large
            outlined
            color="navColor"
            class="text-capitalize"
            @click="logOut"
            >Sign Out
          </v-btn>
        </div>
      </v-list>
    </v-menu>
  </v-app-bar>
</template>

<script>
export default {
  name: 'Navbar',
  data: () => ({

  }),
  computed: {

  },
  methods: {
    logOut: function () {
      this.$router.push('/login');
    }
  }
};
</script>

<style src="./Navbar.scss" lang="scss"></style>
