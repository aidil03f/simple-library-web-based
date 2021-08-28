<template>
  <button ref="deleteKelas" @click="destroyKelas">Delete</button>
</template>

<script>
import axios from "axios";
export default {
  props: ["endpoint"],

  methods: {
    async destroyKelas() {
      if (window.confirm("are you sure ?")) {
        let response = await axios.delete(`http://127.0.0.1:8000/api/delete-kelas/${this.endpoint}`);
        if (response.status == 200) {
          this.$refs.deleteKelas.parentNode.parentNode.remove();
        }
      }
    },
  },
};
</script>
