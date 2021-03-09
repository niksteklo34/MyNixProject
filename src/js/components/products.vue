<template>
  <div>
    <sort @sort-changed="changeSort"></sort>
    <product v-for="(product, index) in products" :key="index"
             :id = "product.id" :title = "product.title" :img = "product.img" :description = "product.description" :status = "product.status" :price = "product.price" :category ="product.category"
    ></product>
    <pagination @pageChanged="toChangePage" :total="length" :itemsOnPage="2"></pagination>
  </div>
</template>

<script>
export default {
name: "products",
  data() {
    return {
      products: [],
      pageNumber: 1,
      length: 0,
      sort: 'price-ASC'
    }
  },
  methods: {
      async getProducts() {
      let Result = await fetch(`http://coffezin.local/catalog/api?page=${this.pageNumber}&sort=${this.sort}`, {
        method: 'GET',
            headers: {
          'Content-Type': 'application/json'
        }
      });
      let data = await Result.json();
      this.products = data.products;
      this.length = data.length;
    },
    toChangePage(page) {
      this.pageNumber = page
    },
    changeSort(sortRule) {
      this.sort = sortRule
    },
  },
  watch: {
    pageNumber() {
      this.getProducts()
    },sort() {
      this.getProducts()
    },
  },
  created() {
    this.getProducts();
  }
}
</script>

<style scoped>

</style>