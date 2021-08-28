<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              edit buku
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="update" autocomplete="off">
                <div class="form-group">
                  <label>nama buku *</label>
                  <input type="text" v-model="form.nama_buku" class="form-control" />
                  <div v-if="theErrors.nama_buku" class="text-danger mt-2">nama buku tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                  <label>jenis buku *</label>
                  <select @change="selectedJenis" class="form-control">
                    <option :value="form.jenis_id" v-text="form.jenisbuku.label"></option>
                    <template v-for="buku in Label">
                      <option v-if="form.jenis_id !== buku.id" :key="buku.id" :value="buku.id">
                        {{ buku.label }}
                      </option>
                    </template>
                  </select>
                  <div v-if="theErrors.jenis_id" class="text-danger mt-2">jenis buku tidak boleh kosong.</div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-info">Update</button>
                  <router-link :to="{ name: 'buku.index' }" class="btn btn-outline-warning col-2">Back</router-link>
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
  props: ["nama_kelas"],
  components: {
    Navigation2,
  },
  data() {
    return {
      form: [],
      Label: [],
      theErrors: [],
      selected: "",
    };
  },

  mounted() {
    this.getBuku();
    this.getJenisBuku();
  },

  methods: {
    async getBuku() {
      let response = await axios.get(`http://127.0.0.1:8000/api/edit-buku/${this.$route.params.id}/edit`);
      this.form = response.data;
    },

    async getJenisBuku() {
      let response = await axios.get("http://127.0.0.1:8000/api/jenis-buku");
      if (response.status == 200) {
        this.Label = response.data.data;
      }
    },

    selectedJenis(e) {
      this.selected = e.target.value;
    },

    async update() {
      try {
        this.form["jenis_id"] = this.selected || this.form.jenisbuku.id;
        let response = await axios.put(`http://127.0.0.1:8000/api/edit-buku/${this.$route.params.id}`, this.form);
        if (response.status == 200) {
          this.$router.push("/buku");
        }
      } catch (e) {
        this.theErrors = e.response.data.errors;
      }
    },
  },
};
</script>
