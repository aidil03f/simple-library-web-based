<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              edit peminjaman
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="update" autocomplete="off">
                <div class="form-group">
                  <label>nama siswa *</label>
                  <select @change="selectedSiswa" class="form-control">
                    <option :value="form.siswa_id" v-text="form.siswa.nama_siswa"></option>
                    <template v-for="Datasiswa in Siswa">
                      <option v-if="form.siswa_id !== Datasiswa.id" :key="Datasiswa.id" :value="Datasiswa.id">
                        {{ Datasiswa.nama_siswa }}
                      </option>
                    </template>
                  </select>
                  <div v-if="theErrors.siswa_id" class="text-danger mt-2">nama siswa tidak boleh kosong.</div>
                </div>

                <div class="form-group">
                  <label>nama buku *</label>
                  <select @change="selectedBuku" class="form-control">
                    <option :value="form.buku_id" v-text="form.buku.nama_buku"></option>
                    <template v-for="buku in Buku">
                      <option v-if="form.buku_id !== buku.id" :key="buku.id" :value="buku.id">
                        {{ buku.nama_buku }}
                      </option>
                    </template>
                  </select>
                  <div v-if="theErrors.buku_id" class="text-danger mt-2">nama buku tidak boleh kosong.</div>
                </div>

                <div class="form-group">
                  <label>tanggal peminjaman *</label>
                  <input type="date" v-model="form.tanggal_peminjaman" class="form-control" />
                  <div v-if="theErrors.tanggal_peminjaman" class="text-danger mt-2">tanggal peminjaman tidak boleh kosong.</div>
                </div>

                <div class="form-group">
                  <label>tanggal pengembalian *</label>
                  <input type="date" v-model="form.tanggal_pengembalian" class="form-control" />
                  <div v-if="theErrors.tanggal_pengembalian" class="text-danger mt-2">{{ theErrors.tanggal_pengembalian[0] }}</div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-info">Update</button>
                  <router-link :to="{ name: 'peminjaman.index' }" class="btn btn-outline-warning col-2">Back</router-link>
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
      Siswa: [],
      Buku: [],
      theErrors: [],
      SiswaSelected: "",
      BukuSelected: "",
    };
  },

  mounted() {
    this.Edit();
    this.getSiswa();
    this.getBuku();
  },

  methods: {
    async Edit() {
      let response = await axios.get(`http://127.0.0.1:8000/api/edit-peminjaman/${this.$route.params.id}/edit`);
      this.form = response.data;
    },

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

    selectedSiswa(e) {
      this.SiswaSelected = e.target.value;
    },

    selectedBuku(e) {
      this.BukuSelected = e.target.value;
    },

    async update() {
      try {
        this.form["siswa_id"] = this.SiswaSelected || this.form.siswa.id;
        this.form["buku_id"] = this.BukuSelected || this.form.buku.id;
        let response = await axios.put(`http://127.0.0.1:8000/api/edit-peminjaman/${this.$route.params.id}`, this.form);
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
