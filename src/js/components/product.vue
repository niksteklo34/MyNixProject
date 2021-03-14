j<template>
  <li>
    <div class="product-item">
      <div class="row">
        <div class="product-name col-lg-12 col-md-12 col-12">{{title}}</div>
        <div class="product-img col-lg-3 col-md-3 col-3"><a :href="`product/${id}`" ><img :src="img" height="128px" style="text-align: center" :alt="id"></a></div>
        <div class="product-desc col-lg-9 col-md-9 col-9">{{description}}</div>
        <div class="price col-lg-3 col-md-3 ">{{price}} грн</div>
        <div class="price col-lg-6 col-md-6 ">Категория: {{category}}</div>
        <div v-if="status" class="availability-yes col-lg-3 col-md-3">Есть в наличии</div>
        <div v-else class="status availability-yes col-lg-3 col-md-3">Нет в наличии</div>
        <form action="catalog/addProduct" method="post" class="row">
          <div class="col-lg-3 col-md-3 col-3"></div>
          <button class="btn btn-primary col-lg-3 col-md-3 col-3" type="submit" name="AddWish" :value="id" style="width: 400px">В избранные</button>
          <div class="col-lg-3 col-md-3 col-3"></div>
          <button class="btn btn-primary col-lg-3 col-md-3 col-3" type="submit" name="AddCart" :value="id" style="width: 400px">В корзину</button>
        </form>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  name: "product",
  props: {
    id: {
      type: Number,
      require: true
    },
    title: {
      type: String,
      require: true
    },
    img: {
      type: String,
      require: true
    },
    description: {
      type: String,
      require: true
    },
    status: {
      type: Boolean,
      require: true
    },
    price: {
      type: Number,
      require: true
    },
    category: {
      type: String,
      require: true
    }
  },

}
</script>

<style scoped>
  .price {
    color: white
  }
  .status {
    color: rebeccapurple
  }

  form {
    width: 100%
  }
</style>