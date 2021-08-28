<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              create buku
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="create" autocomplete="off">
                <div class="form-group">
                  <label>nama buku *</label>
                  <input type="text" v-model="form.nama_buku" class="form-control" placeholder="Input nama buku" />
                  <div v-if="theErrors.nama_buku" class="text-danger mt-2">nama buku tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                  <label>jenis buku *</label>
                  <select class="form-control" v-model="form.jenis_id">
                    <option value="" disabled>Choose one!</option>
                    <option v-for="label in JenisBuku" :key="label.id" :value="label.id">
                      {{ label.label }}
                    </option>
                  </select>
                  <div v-if="theErrors.jenis_id" class="text-danger mt-2">jenis buku tidak boleh kosong.</div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-info">Save</button>
                  <router-link :to="{ name: 'buku.index' }" class="btn btn-outline-warning">Back</router-link>
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
      form: {
        nama_buku: "",
        jenis_id: "",
      },
      JenisBuku: [],
      theErrors: [],
    };
  },

  mounted() {
    this.getJenisbuku();
  },

  methods: {
    async getJenisbuku() {
      let response = await axios.get("http://127.0.0.1:8000/api/jenis-buku");
      if (response.status == 200) {
        this.JenisBuku = response.data.data;
      }
    },

    async create() {
      try {
        let response = await axios.post("http://127.0.0.1:8000/api/create-buku", this.form);
        if (response.status == 200) {
          this.$router.push("/buku");
          console.log(response.data.data);
        }
      } catch (e) {
        this.theErrors = e.response.data.errors;
      }
    },
  },
};
</script>
