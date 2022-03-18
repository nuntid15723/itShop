<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card bg-info ">
          <div class="card text-end" style="width: 100%">
            <div class="card-body bg-info ">
                 <a href="/create" class="btn btn-success">CREATE PRODUCT</a>
            </div>
          </div>
          <!-- <a href="/create" class="btn btn-success">CREATE</a> -->
          <table class="table">
            <thead class="table-info">
              <tr>
                <th>ID</th>
                <th>name</th>
                <th>image</th>
                <th>price</th>
                <th>description</th>
                <th>update</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="it in shop" :key="it.id">
                <!-- <td>{{ it.id }}</td> -->
                <td width="150px"><img :src="it.image" width="100%" /></td>
                <td>{{ it.name }}</td>
                <td>{{ it.price }}</td>
                <td>{{ it.description }}</td>
                <td>
                  <!-- Button trigger modal -->
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop"
                    @click="updateModal(it.id)"
                  >
                    UPDATE
                  </button>
                </td>
                <td>
                  <div class="btn btn-danger" @click="delIT(it.id)">DELETE</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">UPDATE IT</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form @submit.stop.prevent="UpdateIT()">
              <div class="modal-body">
                <label for="name">ชื่อสินค้า</label>
                <input
                  type="text"
                  id="name"
                  v-model="name"
                  class="form-control"
                  required
                />
                <label for="image">รูปสินค้า</label>
                <input
                  type="text"
                  id="image"
                  v-model="image"
                  class="form-control"
                  required
                />
                <label for="price">ราคาสินค้า</label>
                <input
                  type="number"
                  id="price"
                  v-model="price"
                  class="form-control"
                  required
                />
                <label for="des">รายละเอียดสินค้า</label>
                <textarea
                  type="text"
                  id="des"
                  v-model="description"
                  class="form-control"
                  required
                />
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="sumbit" class="btn btn-primary">UPDATE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end modal -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      shop: [],
      id: "",
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },
  mounted() {
    axios
      .get("api/product")
      .then((data) => {
        this.shop = data.data;
      })
      .catch((err) => console.log(err));
  },
  methods: {
    updateModal(id) {
      axios.get(`/api/product/show/${id}`).then((data) => {
        (this.id = data.data.id),
          (this.name = data.data.name),
          (this.image = data.data.image),
          (this.price = data.data.price),
          (this.description = data.data.description);
      });
    },
    UpdateIT() {
      axios
        .post(`/api/product/update/${this.id}`, {
          name: this.name,
          price: this.price,
          image: this.image,
          description: this.description,
        })
        .then(() => {
          alert("UPDATE SUCCESS");
          window.location.reload();
        })
        .catch((err) => alert(err));
    },

    delIT(id) {
      const del = confirm("Are u sure to delete this item?");
      if (del == true) {
        axios
          .delete(`api/product/delete/${id}`)
          .then(() => {
            alert("delete success");
            window.location.reload();
          })
          .catch((err) => alert(err));
      }
    },
  },
};
</script>


