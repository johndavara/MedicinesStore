
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
                <a  class="btn btn-primary" @click="addToCheckout(productItem.id,productItem.name)" v-bind:id="productItem.id">Agregar al carrito</a>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
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
    },
    addToCheckout(id,name){
        let me = this;
      axios
        .post("/shoppingCart/addToCheckout",{
            'id': id
        })
        .then(function(response) {
                swal({
                      title: 'Carrito de compras',
                      text: 'El articulo ' + name + ' fue agregado al carrito de compras.',
                      type: 'info',
                      confirmButtonText: 'Esta bien'
                    });
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
