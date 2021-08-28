<template>
  <div>
    <Navigation2 />
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
          <div class="card">
            <div class="card-header">
              create Jenis-buku
            </div>
            <div class="card-body">
              <form method="post" @submit.prevent="create" autocomplete="off">
                <div class="form-group">
                  <label>Jenis-buku *</label>
                  <input type="text" v-model="form.label" class="form-control" placeholder="Input jenis buku" />
                  <div v-if="theErrors.label" class="text-danger mt-2">{{ theErrors.label[0] }}</div>
                </div>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-outline-info col-10">Save</button> &nbsp;
                  <router-link :to="{ name: 'jenisbuku.index' }" class="btn btn-outline-warning col-2">Back</router-link>
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
        label: "",
      },
      theErrors: [],
    };
  },

  methods: {
    async create() {
      try {
        let response = await axios.post("http://127.0.0.1:8000/api/create-jenis-buku", this.form);
        if (response.status == 200) {
          this.$router.push("/jenisbuku");
        }
      } catch (e) {
        this.theErrors = e.response.data.errors;
      }
    },
  },
};
</script>
