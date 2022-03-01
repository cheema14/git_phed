<template>
  <div class="d-flex justify-content-between align-items-baseline">
    <div class="mb-2">
      <div class="dataTables_info" id="style-1_info" role="status" aria-live="polite">
        <span v-if="meta.total">Showing {{ meta.from.toLocaleString() }} to {{ meta.to.toLocaleString() }} of {{ meta.total.toLocaleString() }} Entries</span>
        <span v-else>Showing 0 to 0 of 0 Entries</span>
      </div>
    </div>
    <div v-if="links.prev || links.next" class="mb-2">
      <div class="dataTables_paginate paging_simple_numbers" id="style-1_paginate">
        <ul class="pagination">
          <li class="paginate_button page-item previous" id="style-1_previous">
            <button :disabled="!links.prev" class="page-link" @click="paging(links.prev)">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-arrow-left"
              >
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
              </svg>
            </button>
          </li>
          <li class="paginate_button page-item" v-for="(page, key) in pageRange(meta)" :key="key" :class="{ 'active': page == meta.current_page }">
              <a class="page-link" @click="paging(meta.path+'?page='+page)">
                  {{ page.toLocaleString() }}
                  <span class="sr-only" v-if="page == meta.current_page">(current)</span>
              </a>
          </li>
          <li class="paginate_button page-item next" id="style-1_next">
            <button :disabled="!links.next" class="page-link" @click="paging(links.next)">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-arrow-right"
              >
                <line x1="5" y1="12" x2="19" y2="12" />
                <polyline points="12 5 19 12 12 19" />
              </svg>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<style>
  .page-link {
    line-height: 2.00;
  }
</style>
<script>
export default {
  mounted() {
  },
  name: "data-table-footer",
  props: {
    links: {},
    meta: {},
    url: ""
  },
  methods: {
    paging(url) {
      if(url !== this.meta.path+'?page=...'){
        this.$emit("eventname", url);
      }
    },
    pageRange (meta) {
      var current = meta.current_page;
      var last = meta.last_page;
      var delta = meta.current_page;
      var left = current;
      var right = current + 4;
      var range = [];
      var pages = [];
      var l;
      for (var i = 1; i <= last; i++) {
          if (i === 1 || i === last || (i >= left && i < right)) {
              range.push(i);
          }
      }
      range.forEach(function (i) {
          if (l) {
              if (i - l === 2) {
                  pages.push(l + 1);
              } else if (i - l !== 1) {
                  pages.push('...');
              }
          }
          pages.push(i);
          l = i;
      });
      return pages;
    },
  }
}
</script>