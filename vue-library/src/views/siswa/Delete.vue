<template>
  <button ref="deleteSiswa" @click="destroySiswa">Delete</button>
</template>

<script>
import axios from "axios";
export default {
  props: ["endpoint"],

  methods: {
    async destroySiswa() {
      if (window.confirm("are you sure ?")) {
        let response = await axios.delete(`http://127.0.0.1:8000/api/delete-siswa/${this.endpoint}`);
        if (response.status == 200) {
          this.$refs.deleteSiswa.parentNode.parentNode.remove();
        }
      }
    },
  },
};
</script>
