<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              Edit kelas
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="update" autocomplete="off">
                <div class="form-group">
                  <label>Kelas *</label>
                  <input type="text" v-model="form.nama_kelas" class="form-control" placeholder="Input nama kelas" />
                  <div v-if="theErrors.nama_kelas" class="text-danger mt-2">{{ theErrors.nama_kelas[0] }}</div>
                </div>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-outline-info col-10">Update</button> &nbsp;
                  <router-link to="/kelas" class="btn btn-outline-warning col-2">Back</router-link>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
input[type="text"]::placeholder {
  font-size: 14px;
  font-family: "Courier New", Courier, monospace;
}
</style>

<script>
import axios from "axios";
import Navigation2 from "../../components/Navigation2";
export default {
  components: {
    Navigation2,
  },
  data() {
    return {
      form: [],
      theErrors: [],
    };
  },

  mounted() {
    this.getKelas();
  },

  methods: {
    async getKelas() {
      let response = await axios.get(`http://127.0.0.1:8000/api/edit-kelas/${this.$route.params.id}/edit`);
      this.form = response.data;
    },

    async update() {
      try {
        let response = await axios.put(`http://127.0.0.1:8000/api/edit-kelas/${this.$route.params.id}/edit`, this.form);
        if (response.status == 200) {
          this.$router.push("/kelas");
        }
      } catch (e) {
        this.theErrors = e.response.data.errors;
      }
    },
  },
};
</script>
