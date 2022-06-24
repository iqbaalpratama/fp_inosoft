<template>
  <div>
    <div class="text-h4">{{title}}</div>
    <v-breadcrumbs :items="item" class="pl-0 pt-1 mb-7">
      <template v-slot:divider>
        <v-icon>mdi-chevron-right</v-icon>
      </template>
    </v-breadcrumbs>
  </div>
</template>

<script>
export default {
  props: ['item','title']
}
</script>

<style>

</style>