<template>
  <button ref="deleteJenisBuku" @click="destroyJenisBuku">Delete</button>
</template>

<script>
import axios from "axios";
export default {
  props: ["endpoint"],

  methods: {
    async destroyJenisBuku() {
      if (window.confirm("are you sure ?")) {
        let response = await axios.delete(`http://127.0.0.1:8000/api/delete-jenis-buku/${this.endpoint}`);
        if (response.status == 200) {
          this.$refs.deleteJenisBuku.parentNode.parentNode.remove();
        }
      }
    },
  },
};
</script>
