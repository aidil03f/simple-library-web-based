<template>
  <div>
    <Navigation2 />
    <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <h3>Buku</h3>
        <router-link :to="{ name: 'create.buku' }" class="btn btn-primary mb-3" title="Create">Create</router-link>
      </div>
      <div class="table table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama buku</th>
              <th>Jenis buku</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="buku in Buku" :key="buku.id">
              <td>{{ buku.nama_buku }}</td>
              <td>{{ buku.jenisbuku }}</td>
              <td>{{ buku.created_at }}</td>
              <td>{{ buku.updated_at }}</td>
              <td class="col-2">
                <router-link :to="{ name: 'buku.edit', params: { id: buku.id } }" class="btn btn-warning btn-sm" title="Edit">Edit</router-link> &nbsp;
                <delete-buku :endpoint="buku.id" class="btn btn-danger btn-sm" title="Delete" />
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
import DeleteBuku from "./Delete";
import Navigation2 from "../../components/Navigation2";
export default {
  components: {
    Navigation2,
    DeleteBuku,
  },

  data() {
    return {
      Buku: [],
    };
  },

  mounted() {
    this.getBuku();
  },

  methods: {
    async getBuku() {
      let response = await axios.get("http://127.0.0.1:8000/api/buku");
      this.Buku = response.data.data;
    },
  },
};
</script>
