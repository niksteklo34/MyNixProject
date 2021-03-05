<template>
  <ul class=' dropdown-menu-end' aria-labelledby='dropdownSort' style='text-align: right'>
    <li v-for="(sort, i) in totalSort" :key="i"
        @click="changeSort(sort)">
      <button v-if="sort === 'price-ASC'" class='dropdown-item'>&#8593; возрастанию цены</button>
      <button v-if="sort === 'price-DESC'" class='dropdown-item'>&#8595; убыванию цены</button>
      <button v-if="sort === 'title-ASC'" class='dropdown-item'>алфавиту</button>
    </li>
  </ul>
</template>

<script>
export default {
name: "sort",
  data() {
    return {
      sortRule: 'price-DESC'
    }
  },
  computed: {
    totalSort() {
      return ['title-ASC', 'price-ASC', 'price-DESC']
    }
  },
  methods: {
    changeSort(sortProduct) {
      this.sortRule = sortProduct
      this.$emit('sort-changed', sortProduct)
    }
  }
}
</script>

<style scoped>

</style>