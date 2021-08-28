<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <router-link to="/" class="navbar-brand">Home</router-link>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/about" class="nav-link">About</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/contact" class="nav-link">Contact</router-link>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <router-link to="/login" class="btn btn-primary my-2 my-sm-0">Login</router-link>
          <router-link to="/register" class="btn btn-primary my-2 my-sm-0">Register</router-link>
        </div>
      </div>
    </nav>
  </div>
</template>
