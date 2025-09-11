<script setup lang="ts">
import Button from "primevue/button";
</script>

<template>
  <!-- Delete this test -->
  <div class="flex justify-center items-center w-full">
    <div
      class="flex flex-wrap justify-center items-center w-1/2 bg-cyan-100 my-4 rounded-lg p-2 px-4"
    >
      <h1 class="text-cyan-700 font-bold text-4xl w-full text-center my-2">
        Test
      </h1>
      <p class="text-gray-800 text-2xl">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae
        repudiandae ratione praesentium modi saepe veritatis natus labore
        repellat reiciendis quae ea, dolor a odit deserunt dolore. Eveniet non
        quis error!
      </p>
      <Button label="Test Click" class="my-4" icon="pi pi-eye" />
    </div>
  </div>
</template>
