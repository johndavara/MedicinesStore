<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3" v-for="productItem in productArray" :key="productItem.id" > 
            <div class="card">
            <a v-bind:href="'/product/'+productItem.id+'/all'+'/show'">
                <img class="card-img-top" v-bind:src="'/images/products/'+productItem.photo" alt="Card image cap">
            </a>
            <div class="card-body">
                <h5 class="card-title" v-text="productItem.name"></h5>
                <p class="card-text" v-text="productItem.description"></p>
                <p class="card-text" v-text="productItem.price"></p>
                <a href="#" class="btn btn-primary">Add to cart</a>
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
      name: "",
      description: "",
      productArray: []
    };
  },
  methods: {
    listProducts() {
      let me = this;
      axios
        .get("/product")
        .then(function(response) {
          me.productArray = response.data;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    }
  },
  mounted() {
    this.listProducts();
  }
};
</script>
