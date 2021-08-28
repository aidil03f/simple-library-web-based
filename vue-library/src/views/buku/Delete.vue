<template>
  <button ref="deleteBuku" @click="destroyBuku">Delete</button>
</template>

<script>
import axios from "axios";
export default {
  props: ["endpoint"],

  methods: {
    async destroyBuku() {
      if (window.confirm("are you sure ?")) {
        let response = await axios.delete(`http://127.0.0.1:8000/api/delete-buku/${this.endpoint}`);
        if (response.status == 200) {
          this.$refs.deleteBuku.parentNode.parentNode.remove();
        }
      }
    },
  },
};
</script>
