<template>
  <button ref="deletePeminjaman" @click="destroyPeminjaman">Delete</button>
</template>

<script>
import axios from "axios";
export default {
  props: ["endpoint"],

  methods: {
    async destroyPeminjaman() {
      if (window.confirm("are you sure ?")) {
        let response = await axios.delete(`http://127.0.0.1:8000/api/delete-peminjaman/${this.endpoint}`);
        if (response.status == 200) {
          this.$refs.deletePeminjaman.parentNode.parentNode.remove();
        }
      }
    },
  },
};
</script>
