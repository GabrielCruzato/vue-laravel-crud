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


