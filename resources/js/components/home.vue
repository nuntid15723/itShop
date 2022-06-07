<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="row">
              <div class="col-4">
                <h1 class="text-center">IT NEW!!</h1> 
              </div>
              <div class="col-2"></div>
              <div class="col-5">
                <form class="d-flex" @submit.stop.prevent="searchclick">
                  <input
                    v-model="searchtext"
                    class="form-control me-2"
                    type="search"
                    placeholder="ค้นหา"
                    aria-label="Search"
                  />
                  <button class="btn btn-outline-light" type="submit">
                    Search
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body bg-Info">
            <div class="row my-5">
              <div
                class="col-4 mt-5 d-flex justify-content-center"
                v-for="it in shop"
                :key="it.id"
              >
                <div class="card" style="max-width: 500px">
                  <img :src="it.image" class="card-img-top" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title">{{ it.name }}</h5>
                    <p class="card-text text-truncate mt-3">
                      {{ it.description }}
                    </p>
                    <p class="card-text">
                      {{ it.price }}
                    </p>
                    <div class="row">
                      <div class="col-md-6 ms-auto"></div>
                      <button
                        type="button"
                        class="btn btn-outline-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"
                        @click="readModal(it.id)"
                      >
                        ข้อมูลเพิ่มเติม
                      </button>
                    </div>
                  </div>
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
                      <h5 class="modal-title" id="staticBackdropLabel">
                        {{ name }}
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>

                    <div class="modal-body">
                      <img
                        :src="image"
                        class="img-fluid text-center"
                        style="max-height: 300px"
                      />
                    </div>
                    <div class="container my-4 text-center">
                      <p>{{ description }}</p>
                    </div>
                    <div class="text-center">
                      <h3><span>ราคา :</span> {{ price }}</h3>
                    </div>

                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-Danger"
                        data-bs-dismiss="modal"
                      >
                        ปิด
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal -->
            </div>
          </div>
        </div>
      </div>
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
      searchtext: "",
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
    readModal(id) {
      axios.get(`/api/product/show/${id}`).then((data) => {
        (this.id = data.data.id),
          (this.name = data.data.name),
          (this.image = data.data.image),
          (this.price = data.data.price),
          (this.description = data.data.description);
      });
    },
    searchclick() {
      axios
        .get(`/api/product/search/${this.searchtext}`)
        .then((data) => {
          this.shop = data.data;
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>
