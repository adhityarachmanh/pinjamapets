<template>
    <div>
          
           <input type="text" class="input" v-model="cariaja">
    <h1>{{cariaja}}</h1>
    </div>
</template>
<script>
    export default {
      data(){
          return {
              cariaja:'',
          }
      }
    }
</script>