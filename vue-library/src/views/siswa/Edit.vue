<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              edit siswa
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="update" autocomplete="off">
                <div class="form-group">
                  <label>nama siswa *</label>
                  <input type="text" v-model="form.nama_siswa" class="form-control" />
                  <div v-if="theErrors.nama_siswa" class="text-danger mt-2">nama siswa tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                  <label>nama kelas *</label>
                  <select @change="selectedKelas" class="form-control">
                    <option :value="form.kelas_id" v-text="form.kelas.nama_kelas"></option>
                    <template v-for="kelas in KelaS">
                      <option v-if="form.kelas_id !== kelas.id" :key="kelas.id" :value="kelas.id">
                        {{ kelas.nama_kelas }}
                      </option>
                    </template>
                  </select>
                  <div v-if="theErrors.kelas_id" class="text-danger mt-2">nama kelas tidak boleh kosong.</div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-info">Update</button>
                  <router-link :to="{ name: 'siswa.index' }" class="btn btn-outline-warning col-2">Back</router-link>
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
      KelaS: [],
      theErrors: [],
      selected: "",
    };
  },

  mounted() {
    this.getSiswa();
    this.getKelas();
  },

  methods: {
    async getSiswa() {
      let response = await axios.get(`http://127.0.0.1:8000/api/edit-siswa/${this.$route.params.id}/edit`);
      this.form = response.data;
    },

    async getKelas() {
      let response = await axios.get("http://127.0.0.1:8000/api/kelas");
      if (response.status == 200) {
        this.KelaS = response.data.data;
      }
    },

    selectedKelas(e) {
      this.selected = e.target.value;
    },

    async update() {
      try {
        this.form["kelas_id"] = this.selected || this.form.kelas.id;
        let response = await axios.put(`http://127.0.0.1:8000/api/edit-siswa/${this.$route.params.id}`, this.form);
        if (response.status == 200) {
          this.$router.push("/siswa");
        }
      } catch (e) {
        this.theErrors = e.response.data.errors;
      }
    },
  },
};
</script>
