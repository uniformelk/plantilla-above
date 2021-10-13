<template>
  <div class="Cabezera">
    <div id="nav" class="" >
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top container">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="@/assets/logo.png" alt="Logo" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav text-light mb-2 mb-lg-0 ">
        <li class="nav-item">
          <router-link to="/" class="nav-link">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/About" class="nav-link">About</router-link>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
      
    </div>
    <div class="hero">
      <div class="text-light text-header">
        <h1 class="text-secundary">Lorem Ipsum</h1>
        <p><span class="text-secundary fs-5">"</span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...<span class="text-secundary fs-5">"</span></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Cabezera',
  props: {
    msg: String
  },
  data: {
    
  }
  
}

</script>



