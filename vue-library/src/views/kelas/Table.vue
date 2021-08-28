<template>
  <div>
    <Navigation2 />
    <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <h3>Kelas</h3>
        <router-link to="/kelas-create" class="btn btn-primary mb-3" title="Create">Create</router-link>
      </div>
      <div class="table table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="kelas in Kelas" :key="kelas.id">
              <td>{{ kelas.nama_kelas }}</td>
              <td>{{ kelas.created_at }}</td>
              <td>{{ kelas.updated_at }}</td>
              <td class="col-2">
                <router-link :to="{ name: 'kelas.edit', params: { id: kelas.id } }" class="btn btn-warning btn-sm" title="Edit">Edit</router-link> &nbsp;
                <delete-kelas :endpoint="kelas.id" class="btn btn-danger btn-sm" title="Delete" />
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
import DeleteKelas from "./Delete";
import Navigation2 from "../../components/Navigation2";
export default {
  components: {
    Navigation2,
    DeleteKelas,
  },

  data() {
    return {
      Kelas: [],
    };
  },

  mounted() {
    this.getKelas();
  },

  methods: {
    async getKelas() {
      let response = await axios.get("http://127.0.0.1:8000/api/kelas");
      this.Kelas = response.data.data;
    },
  },
};
</script>
