<template>
  <v-app class="pa-6">
    <Header />
    <v-main class="content">
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
import Header from './components/Header/HeaderComponent.vue';

export default {
    name: 'Layout',
    components: {Header},
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
