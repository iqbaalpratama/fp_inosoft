<template>
  <v-chip
    tag="div"
    draggable
    :text-color="FontColorChipStatus"
    :color="BgColorChipStatus"
    class="chip text-center"
  >
    {{ status }}
  </v-chip>
</template>

<script>
export default {
    name: 'ChipStatus',
    props: ['status'],
    computed:{
        BgColorChipStatus(){
            let data = this.status.toUpperCase();

            if(data == 'COMPLETED'){
                return 'green'
            }else if(data == 'CANCELLED'){
                return 'grey'
            }else if(data == 'DRAFT'){
                return 'grey lighten-3'
            }else if(data == 'IN PROGRESS'){
                return 'indigo lighten-5'
            }else{
                return ''
            }
        },
        FontColorChipStatus(){
            if(this.BgColorChipStatus == 'green' || this.BgColorChipStatus == 'grey'){
                return 'white'
            } else if(this.BgColorChipStatus == 'indigo lighten-5'){
                return 'blue darken-4'
            }else if(this.BgColorChipStatus == 'grey lighten-3'){
                return 'grey darken-3'
            }else{
                return ''
            }
        }

    }
}
</script>

<style scoped>
.chip {
  width: 100px;
  justify-content: center;
}
</style>
