<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              create peminjaman
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="create" autocomplete="off">
                <div class="form-group">
                  <label>nama siswa *</label>
                  <select class="form-control" v-model="form.siswa_id">
                    <option value="">Choose one!</option>
                    <option v-for="siswa in Siswa" :key="siswa.id" :value="siswa.id">
                      {{ siswa.nama_siswa }}
                    </option>
                  </select>
                  <div v-if="theErrors.siswa_id" class="text-danger mt-2">nama siswa tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                  <label>nama buku *</label>
                  <select class="form-control" v-model="form.buku_id">
                    <option value="">Choose one!</option>
                    <option v-for="buku in Buku" :key="buku.id" :value="buku.id">
                      {{ buku.nama_buku }}
                    </option>
                  </select>
                  <div v-if="theErrors.buku_id" class="text-danger mt-2">nama buku tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                  <label>Tanggal Peminjaman</label>
                  <input type="date" v-model="form.tanggal_peminjaman" class="form-control" />
                  <div v-if="theErrors.tanggal_peminjaman" class="text-danger mt-2">{{ theErrors.tanggal_peminjaman[0] }}</div>
                </div>
                <div class="form-group">
                  <label>Tanggal Pengembalian</label>
                  <input type="date" v-model="form.tanggal_pengembalian" class="form-control" />
                  <div v-if="theErrors.tanggal_pengembalian" class="text-danger mt-2">{{ theErrors.tanggal_pengembalian[0] }}</div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-info">Save</button>
                  <router-link :to="{ name: 'peminjaman.index' }" class="btn btn-outline-warning">Back</router-link>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

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
        siswa_id: "",
        buku_id: "",
        tanggal_peminjaman: "",
        tanggal_pengembalian: "",
      },
      Siswa: [],
      Buku: [],
      theErrors: [],
    };
  },

  mounted() {
    this.getBuku();
    this.getSiswa();
  },

  methods: {
    async getSiswa() {
      let response = await axios.get("http://127.0.0.1:8000/api/siswa");
      if (response.status == 200) {
        this.Siswa = response.data.data;
      }
    },
    async getBuku() {
      let response = await axios.get("http://127.0.0.1:8000/api/buku");
      if (response.status == 200) {
        this.Buku = response.data.data;
      }
    },

    async create() {
      try {
        let response = await axios.post("http://127.0.0.1:8000/api/create-peminjaman", this.form);
        if (response.status == 200) {
          this.$router.push("/peminjaman");
        }
      } catch (e) {
        this.theErrors = e.response.data.errors;
      }
    },
  },
};
</script>
