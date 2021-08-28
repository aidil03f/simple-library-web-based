<template>
  <div>
    <Navigation2 />
    <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <h3>Jenis Buku</h3>
        <router-link :to="{ name: 'jenisbuku.create' }" class="btn btn-primary mb-3" title="Create">Create</router-link>
      </div>
      <div class="table table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Jenis buku</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="Jenisbuku in JenisBuku" :key="Jenisbuku.id">
              <td>{{ Jenisbuku.label }}</td>
              <td>{{ Jenisbuku.created_at }}</td>
              <td>{{ Jenisbuku.updated_at }}</td>
              <td class="col-2">
                <router-link :to="{ name: 'jenisbuku.edit', params: { id: Jenisbuku.id } }" class="btn btn-warning btn-sm" title="Edit">Edit</router-link> &nbsp;
                <delete-JenisBuku :endpoint="Jenisbuku.id" class="btn btn-danger btn-sm" title="Delete" />
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
import DeleteJenisBuku from "./Delete";
import Navigation2 from "../../components/Navigation2";
export default {
  components: {
    Navigation2,
    DeleteJenisBuku,
  },

  data() {
    return {
      JenisBuku: [],
    };
  },

  mounted() {
    this.getJenisBuku();
  },

  methods: {
    async getJenisBuku() {
      let response = await axios.get("http://127.0.0.1:8000/api/jenis-buku");
      this.JenisBuku = response.data.data;
    },
  },
};
</script>
