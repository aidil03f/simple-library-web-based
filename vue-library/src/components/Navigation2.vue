<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="navbar-brand">App</div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/kelas" class="nav-link">Kelas</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/jenisbuku" class="nav-link">Jenis Buku</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/siswa" class="nav-link">Siswa</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/buku" class="nav-link">Buku</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/peminjaman" class="nav-link">Peminjaman</router-link>
          </li>
        </ul>
        <div class="form-inline my-lg-0">
          <div class="my-sm-2 text-white mr-2">{{ UserName }}</div>
          <form @submit.prevent="logouT">
            <button type="submit" class="btn btn-primary text-white my-sm-0">Logout</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      UserName: "",
    };
  },

  mounted() {
    this.User();
  },

  methods: {
    async User() {
      let response = await axios.get("http://127.0.0.1:8000/api/user");
      if (response.status == 200) {
        this.UserName = response.data;
      }
    },
    async logouT() {
      let response = await axios.post("http://127.0.0.1:8000/api/logout");
      if (response.status == 200) {
        localStorage.setItem("token", "");
        this.$router.push("/login");
      }
    },
  },

  created() {
    axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("token");
  },
};
</script>
