# vue-laravel-crud

# CRUD Vue.js + Laravel

## 📋 Sobre o Projeto

Sistema CRUD (Create, Read, Update, Delete) desenvolvido como desafio técnico, utilizando Vue.js no frontend e Laravel no backend, com armazenamento em memória (cache).

## 🚀 Tecnologias Utilizadas

### Frontend
- **Vue.js 3** - Framework JavaScript progressivo
- **Tailwind CSS** - Framework CSS utility-first
- **Axios** - Cliente HTTP para requisições

### Backend
- **Laravel 10** - Framework PHP
- **Cache (File Driver)** - Armazenamento em memória
- **CORS** - Configuração para comunicação entre domínios

## 📁 Estrutura do Projeto
```
projeto/
├── frontend/           # Aplicação Vue.js
│   ├── src/
│   │   ├── App.vue    # Componente principal
│   │   └── api.js     # Configuração Axios
│   └── package.json
│
└── backend/           # API Laravel
    ├── app/
    │   └── Http/Controllers/
    │       └── ItemController.php
    ├── routes/
    │   └── api.php
    └── composer.json
```

## ⚙️ Como Executar

### Pré-requisitos
- Node.js 16+
- PHP 8.1+
- Composer

### Backend (Laravel)
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

A API estará rodando em: `http://localhost:8000`

### Frontend (Vue.js)
```bash
cd frontend
npm install
npm run dev
```

A aplicação estará rodando em: `http://localhost:5173`

## 🎯 Funcionalidades

- ✅ **Create** - Adicionar novos itens
- ✅ **Read** - Listar todos os itens
- ✅ **Update** - Editar itens existentes
- ✅ **Delete** - Remover itens

## 🏗️ Boas Práticas Implementadas

### Frontend
- Componentização com Composition API
- Tratamento de erros centralizado
- Feedback visual para o usuário
- Validação de formulários
- Código limpo e organizado

### Backend
- Padrão RESTful
- Validação de requests
- Tratamento de erros HTTP
- CORS configurado
- Código seguindo PSR-12

## 📌 Endpoints da API

| Método | Endpoint | Descrição |
|--------|----------|-----------|
| GET | /api/items | Lista todos os itens |
| POST | /api/items | Cria um novo item |
| PUT | /api/items/{id} | Atualiza um item |
| DELETE | /api/items/{id} | Remove um item |

## 🧪 Testando a API
```bash
# Listar itens
curl http://localhost:8000/api/items

# Criar item
curl -X POST http://localhost:8000/api/items \
  -H "Content-Type: application/json" \
  -d '{"name":"Teste"}'

# Atualizar item
curl -X PUT http://localhost:8000/api/items/ID \
  -H "Content-Type: application/json" \
  -d '{"name":"Teste Atualizado"}'

# Deletar item
curl -X DELETE http://localhost:8000/api/items/ID
```

## 📝 Planejamento (Azure DevOps)

O projeto foi planejado e organizado no Azure DevOps com as seguintes etapas:

1. **Setup Inicial** - Configuração do ambiente
2. **Backend** - Desenvolvimento da API Laravel
3. **Frontend** - Desenvolvimento da interface Vue.js
4. **Integração** - Conexão Frontend/Backend
5. **Testes** - Validação das funcionalidades
6. **Documentação** - README e comentários

## 👨‍💻 Autor

Desenvolvido como desafio técnico - 2025
```

### **3. Checklist para o Vídeo (10 minutos)**

**Estrutura sugerida:**

1. **Introdução (1 min)**
   - Apresentação pessoal
   - Objetivo do projeto

2. **Demonstração (4 min)**
   - Mostrar o CRUD funcionando
   - Adicionar, editar, deletar itens
   - Mostrar console do navegador (logs)

3. **Código Backend (2 min)**
   - Explicar o Controller
   - Mostrar uso de Cache para memória
   - Validações e tratamento de erros

4. **Código Frontend (2 min)**
   - Explicar estrutura Vue.js
   - Mostrar comunicação com API
   - Feedback visual ao usuário

5. **Boas Práticas (1 min)**
   - Validações
   - Tratamento de erros
   - Código limpo e organizado
   - Padrão RESTful

### **4. Azure DevOps - Estrutura de Tarefas**

Crie um projeto no Azure DevOps com estas tasks:
```
Epic: CRUD Vue.js + Laravel

User Stories:
│
├─ US01: Setup do Projeto
│  ├─ Task: Criar repositório
│  ├─ Task: Configurar Laravel
│  └─ Task: Configurar Vue.js
│
├─ US02: Backend API
│  ├─ Task: Criar ItemController
│  ├─ Task: Configurar rotas API
│  ├─ Task: Implementar CRUD
│  └─ Task: Configurar CORS
│
├─ US03: Frontend Interface
│  ├─ Task: Criar componente App.vue
│  ├─ Task: Configurar Axios
│  ├─ Task: Implementar formulários
│  └─ Task: Adicionar validações
│
├─ US04: Integração e Testes
│  ├─ Task: Conectar Frontend/Backend
│  ├─ Task: Testar todas operações CRUD
│  └─ Task: Ajustes e correções
│
└─ US05: Documentação
   ├─ Task: Criar README.md
   ├─ Task: Gravar vídeo demonstrativo
   └─ Task: Revisar entrega
