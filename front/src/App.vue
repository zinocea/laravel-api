<template >
  <div id="app" class="container">
    <navbar></navbar>
    <h3>{{my_name}}</h3>
    <p>This front End is made with Vue and it is enough for testing
        the backend but maybe you will see some errors or problems
        here in this case all what you have to do is to refresh
       the page, don't forget plz to refresh after login and out</p>
    <img src="./assets/imgs/logo.png">
      <router-view></router-view>

  </div>
</template>

<script>
import navbar from './components/Navbar'

export default {
  name: 'app',
    data(){
      return {
          my_name: 'Jafar Jabr'
      }
    },
  components: {
      navbar,
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
