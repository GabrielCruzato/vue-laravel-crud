<script setup>
import { ref, onMounted } from "vue";
import api from "./api";

const items = ref([]);
const newItem = ref("");
const editingItem = ref(null);
const editedName = ref("");
const message = ref("");
const messageType = ref("");

const showMessage = (text, type = "success") => {
  message.value = text;
  messageType.value = type;
  setTimeout(() => (message.value = ""), 2500);
};

const fetchItems = async () => {
  try {
    const response = await api.get("/items");
    items.value = response.data.data || response.data;
  } catch (error) {
    showMessage("Erro ao carregar itens", "error");
  }
};

const addItem = async () => {
  if (!newItem.value.trim()) return;
  try {
    await api.post("/items", { name: newItem.value });
    newItem.value = "";
    await fetchItems();
    showMessage("Item adicionado com sucesso!");
  } catch (error) {
    showMessage("Erro ao adicionar item", "error");
  }
};

const startEdit = (item) => {
  editingItem.value = item;
  editedName.value = item.name;
};

const cancelEdit = () => {
  editingItem.value = null;
  editedName.value = "";
};

const updateItem = async () => {
  if (!editedName.value.trim()) return;
  try {
    await api.put(`/items/${editingItem.value.id}`, { name: editedName.value });
    editingItem.value = null;
    editedName.value = "";
    await fetchItems();
    showMessage("Item atualizado com sucesso!");
  } catch (error) {
    showMessage("Erro ao atualizar item", "error");
  }
};

const deleteItem = async (id) => {
  if (!confirm("Tem certeza que deseja excluir este item?")) return;
  try {
    await api.delete(`/items/${id}`);
    await fetchItems();
    showMessage("Item removido com sucesso!");
  } catch (error) {
    showMessage("Erro ao excluir item", "error");
  }
};

onMounted(fetchItems);
</script>

<template>
  <div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center">📋 Lista de Itens</h1>
    
    <div
      v-if="message"
      :class="[
        'p-2 mb-4 rounded text-center transition-all',
        messageType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'
      ]"
    >
      {{ message }}
    </div>
    
    <div class="flex gap-2 mb-4">
      <input
        v-model="newItem"
        @keyup.enter="addItem"
        placeholder="Novo item"
        class="border p-2 rounded flex-grow focus:outline-none focus:ring-2 focus:ring-green-500"
      />
      <button
        @click="addItem"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
      >
        Adicionar
      </button>
    </div>
    
    <ul class="space-y-2">
      <li
        v-for="item in items"
        :key="item.id"
        class="border rounded p-3 flex justify-between items-center bg-white shadow-sm"
      >
        <div v-if="editingItem?.id !== item.id" class="flex-grow">
          {{ item.name }}
        </div>
        <div v-else class="flex gap-2 flex-grow">
          <input
            v-model="editedName"
            @keyup.enter="updateItem"
            @keyup.esc="cancelEdit"
            class="border p-1 rounded flex-grow focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Editar item"
            autofocus
          />
          <button 
            @click="updateItem" 
            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition"
            title="Salvar"
          >
            💾
          </button>
          <button 
            @click="cancelEdit" 
            class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400 transition"
            title="Cancelar"
          >
            ❌
          </button>
        </div>
        <div v-if="editingItem?.id !== item.id" class="flex gap-2">
          <button
            @click="startEdit(item)"
            class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 transition"
            title="Editar"
          >
            ✏️
          </button>
          <button
            @click="deleteItem(item.id)"
            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
            title="Excluir"
          >
            🗑️
          </button>
        </div>
      </li>
    </ul>
    
    <div v-if="items.length === 0" class="text-center text-gray-500 mt-8">
      Nenhum item cadastrado. Adicione o primeiro!
    </div>
  </div>
</template>