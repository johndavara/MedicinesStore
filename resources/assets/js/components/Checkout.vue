<template>

<div class="container">
             <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Carrito de compras<span class="caret"
                            ></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Su carrito</span>
                        <span class="badge badge-secondary badge-pill" v-text="productArray.length"></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed"  v-for="productItem in productArray" :key="productItem.idProductCheckout" >
                        <div>
                            <h6 class="my-0" v-text="productItem.name "></h6>
                            <p class="text-muted" v-text="'Precio ₡ '+productItem.price"></p>
                            <button type="button" class="btn btn-danger" @click="deleteItemCheckout(productItem.idProductCheckout)" v-bind:id="productItem.idProductCheckout">X</button>
                        </div>
                        </li>

                       </ul>
                       <div v-if="productArray.length > 0" class="col-md-4">
                            <a class="btn btn-success center-block" href="/shoppingCart/checkout">
                                Pagar
                            </a>
                        </div>
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
    },
    deleteItemCheckout(id){
        let me = this;
      axios
        .put("/shoppingCart/deleteItemCheckout",{
            'id': id
        })
        .then(function() {
            me.listProducts();
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
