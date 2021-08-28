<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              create siswa
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="create" autocomplete="off">
                <div class="form-group">
                  <label>nama siswa *</label>
                  <input type="text" v-model="form.nama_siswa" class="form-control" placeholder="Input nama siswa" />
                  <div v-if="theErrors.nama_siswa" class="text-danger mt-2">nama siswa tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                  <label>kelas *</label>
                  <select class="form-control" v-model="form.kelas_id">
                    <option value="" disabled>Choose one!</option>
                    <option v-for="kelas in KelaS" :key="kelas.id" :value="kelas.id">
                      {{ kelas.nama_kelas }}
                    </option>
                  </select>
                  <div v-if="theErrors.kelas_id" class="text-danger mt-2">nama kelas tidak boleh kosong.</div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-info">Save</button>
                  <router-link :to="{ name: 'siswa.index' }" class="btn btn-outline-warning">Back</router-link>
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
        nama_siswa: "",
        kelas_id: "",
      },
      KelaS: [],
      theErrors: [],
    };
  },

  mounted() {
    this.getKelas();
  },

  methods: {
    async getKelas() {
      let response = await axios.get("http://127.0.0.1:8000/api/kelas");
      if (response.status == 200) {
        this.KelaS = response.data.data;
      }
    },

    async create() {
      try {
        let response = await axios.post("http://127.0.0.1:8000/api/create-siswa", this.form);
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
