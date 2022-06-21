<template>
    <div class="box">

    <label :data-state="state">
      <input type="text" placeholder="Search" v-model="value" @click="state = 'open'" @blur="state='close'"/>
      <v-icon color="primary" >mdi-magnify</v-icon>
    </label>
    </div>
</template>

<script>
export default {
  name: 'Search',
  emits: ['update:modelValue'],
  data(){
    return {
      state: "close",
      searchText: ''
    }
  },
  computed:{
    value: {
      get(){
        return this.searchText
      },
      set(value) {
        this.searchText = value
        this.$emit('update:modelValue', value)
      }
    }
  }
}
</script>

<style src="./Search.scss" lang="scss"></style>


