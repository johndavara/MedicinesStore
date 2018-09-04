<template>

<div class="container">
             <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Carrito de compras<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Su carrito</span>
                        <span class="badge badge-secondary badge-pill" v-text="productArray.length"></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed"  v-for="productItem in productArray" :key="productItem.id" >
                        <div>
                            <h6 class="my-0" v-text="productItem.name "></h6>
                            <p class="text-muted" v-text="'Precio ₡ '+productItem.price"></p>
                        </div>
                        </li>

                       </ul>
                            <a class="dropdown-item" href="/shoppingCart/checkout">
                                Pagar
                            </a>
                        </div>
                    </li>                
</div>
</template>


<script>
export default {
  data() {
    return {
      productArray: []
    };
  },
  methods: {
    listProducts() {
      let me = this;
      axios
        .get("/shoppingCart/checkoutData")
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
