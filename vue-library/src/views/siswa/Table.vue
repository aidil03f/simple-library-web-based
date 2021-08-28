<template>
  <div>
    <Navigation2 />
    <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <h3>Siswa</h3>
        <router-link :to="{ name: 'siswa.create' }" class="btn btn-primary mb-3" title="Create">Create</router-link>
      </div>
      <div class="table table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="siswa in Siswa" :key="siswa.id">
              <td>{{ siswa.nama_siswa }}</td>
              <td>{{ siswa.nama_kelas }}</td>
              <td>{{ siswa.created_at }}</td>
              <td>{{ siswa.updated_at }}</td>
              <td class="col-2">
                <router-link :to="{ name: 'siswa.edit', params: { id: siswa.id } }" class="btn btn-warning btn-sm" title="Edit">Edit</router-link> &nbsp;
                <delete-siswa :endpoint="siswa.id" class="btn btn-danger btn-sm" title="Delete" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import DeleteSiswa from "./Delete";
import Navigation2 from "../../components/Navigation2";
export default {
  components: {
    Navigation2,
    DeleteSiswa,
  },

  data() {
    return {
      Siswa: [],
    };
  },

  mounted() {
    this.getSiswa();
  },

  methods: {
    async getSiswa() {
      let response = await axios.get("http://127.0.0.1:8000/api/siswa");
      this.Siswa = response.data.data;
    },
  },
};
</script>
