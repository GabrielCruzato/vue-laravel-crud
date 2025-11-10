<template>
  <div class="container">
    <h1>CRUD de Itens</h1>

    <div class="form">
      <input v-model="newItem" placeholder="Digite um nome" />
      <button @click="addItem">Adicionar</button>
    </div>

    <ul>
      <li v-for="item in items" :key="item.id">
        <input v-model="item.name" @blur="updateItem(item)" />
        <button @click="deleteItem(item.id)">Excluir</button>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import api from "../api.js";

const items = ref([]);
const newItem = ref("");

async function loadItems() {
  const response = await api.get("/items");
  items.value = response.data;
}

async function addItem() {
  if (!newItem.value.trim()) return;
  const response = await api.post("/items", { name: newItem.value });
  items.value.push(response.data);
  newItem.value = "";
}

async function updateItem(item) {
  await api.put(`/items/${item.id}`, { name: item.name });
}

async function deleteItem(id) {
  await api.delete(`/items/${id}`);
  items.value = items.value.filter((i) => i.id !== id);
}

onMounted(loadItems);
</script>

<style>
.container {
  max-width: 500px;
  margin: 30px auto;
  padding: 20px;
  background: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.form {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

input {
  flex: 1;
  padding: 8px;
}

button {
  padding: 8px 12px;
  cursor: pointer;
}
</style>
