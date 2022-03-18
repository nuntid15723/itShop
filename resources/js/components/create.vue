<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="crad">
          <h1>CREATE</h1>
        </div>
        <form @submit.stop.prevent="addIT()">
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
          <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-primary" >CREATE</button>
            <a href="/admin">Back to admin page</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },
  methods: {
    addIT() {
      axios
        .post("api/product/store", {
          name: this.name,
          image: this.image,
          price: this.price,
          description: this.description,
        })
        .then(() => {
          alert("Add success");
          window.location.reload();
        })
        .catch((err) => alert(err));
    },
  },
};
</script>

