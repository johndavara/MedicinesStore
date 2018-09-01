<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3" v-for="categoryItem in categoryArray" :key="categoryItem.id" > 
            <div class="card">
            <div class="card-body">
                <h5 class="card-title" v-text="categoryItem.name"></h5>
                <p class="card-text" v-text="categoryItem.description"></p>
                <a href="#" class="btn btn-primary">Add to cart</a>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name:'',
                description:'',
                categoryArray : []
            }
        },
        methods:{
             listCategories(){
                 let me = this;
                 axios.get('/category')
                        .then(function (response) {
                            me.categoryArray = response.data;
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
             }
        },
        mounted() {
            this.listCategories();
        }
    }
</script>
