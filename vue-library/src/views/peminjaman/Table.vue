<template>
  <div>
    <Navigation2 />
    <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <h3>Peminjaman</h3>
        <router-link :to="{ name: 'peminjaman.create' }" class="btn btn-primary mb-3" title="Create">Create</router-link>
      </div>
      <div class="table table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama Siswa</th>
              <th>Nama Buku</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="data in Peminjaman" :key="data.id">
              <td>{{ data.namasiswa }}</td>
              <td>{{ data.namabuku }}</td>
              <td>{{ data.tanggal_peminjaman }}</td>
              <td>{{ data.tanggal_pengembalian }}</td>
              <td>{{ data.created_at }}</td>
              <td>{{ data.updated_at }}</td>
              <td class="col-2">
                <router-link :to="{ name: 'peminjaman.edit', params: { id: data.id } }" class="btn btn-warning btn-sm" title="Edit">Edit</router-link> &nbsp;
                <delete-peminjaman :endpoint="data.id" class="btn btn-danger btn-sm" title="Delete" />
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
import DeletePeminjaman from "./Delete";
import Navigation2 from "../../components/Navigation2";
export default {
  components: {
    Navigation2,
    DeletePeminjaman,
  },

  data() {
    return {
      Peminjaman: [],
    };
  },

  mounted() {
    this.getPeminjaman();
  },

  methods: {
    async getPeminjaman() {
      let response = await axios.get("http://127.0.0.1:8000/api/peminjaman");
      this.Peminjaman = response.data.data;
    },
  },
};
</script>
