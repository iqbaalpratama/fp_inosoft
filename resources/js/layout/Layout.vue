<template>
  <v-app class="pa-6">
    <Navbar />
    <v-main class="content">
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import Navbar from './components/Navbar/NavbarComponent.vue';

export default {
    name: 'Layout',
    components: {Navbar},
};
</script>
<style scoped>
.v-main__wrap {
  padding: 70px 24px 24px;
}
.content {
  background-color: #f6f7ff;
}
</style>
