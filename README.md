# Delivery - API de endereços

## 📌 Visão Geral

Este projeto é apenas um CRUD com foco em **API RESTful**, responsável pelo gerenciamento de endereços. Ele foi estruturado seguindo Repository Pattern, com separação clara de responsabilidades entre camadas.
O objetivo principal é fornecer uma base organizada, escalável e de fácil manutenção, facilitando o consumo pelo frontend por padronização de retornos.

---

## 🛠 Tecnologias Utilizadas

* **PHP 8+**
* **Laravel 12**
* **Composer**
* **API REST**

---

## 🧱 Arquitetura do Projeto

O projeto foi desenvolvido utilizando camadas de responsabilidades, evitando regras de negócio nos controllers e facilitando manutenção e testes.

### Camadas utilizadas:

```
Controller
   ↓
Request
   ↓
  DTO 
   ↓
Service
   ↓
Repository
   ↓
Model / Database
```

### 📂 Responsabilidades das Camadas

* **Controller**: Apenas recebe e repassa.
* **Form Request**: Validações de entrada.
* **DTO**: Padroniza e transporta dados entre camadas.
* **Service**: Contém as regras de negócio da aplicação.
* **Repository**: Apenas manipula o banco de dados.
* **ApiResponse**: Padroniza todas as respostas da API.

---

## 📌 Endpoints Disponíveis

Foi utilizado o padrão ApiResources onde cria automaticamente as rotas do CRUD para API.

| Método | Endpoint          | Descrição                    |
| ------ | ----------------- | ---------------------------- |
| GET    | `/addresses`      | Lista todos os endereços     |
| GET    | `/addresses/{id}` | Exibe um endereço específico |
| POST   | `/addresses`      | Cria um novo endereço        |
| PUT    | `/addresses/{id}` | Atualiza um endereço         |
| DELETE | `/addresses/{id}` | Remove um endereço           |

---

## 📦 Padronização de Respostas

Todas as respostas da API seguem um padrão através da classe `ApiResponse`, se caso tiver um frontend, o padrão de retorno será o mesmo sempre.

Exemplo de resposta de sucesso:

```json
{
  "success": true,
  "message": "Sucesso",
  "data": {}
}
```

---

## 🚀 Como Executar o Projeto

```bash
# Instalar dependências
composer install

# Copiar variáveis de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate

# Rodar migrations
php artisan migrate

# Subir servidor
php artisan serve
```
## 🚀 Testes

Na pasta "BACKEND -> JSON" possui alguns arquivos para testar as rotas.
---

## 🔧 Lembrete

Projeto foi criado apenas para um CRUD básico de rotas de entregas, não possui autenticação ou algo que fuja do CRUD. Portanto, poderá ser inserido algumas funcionalidades extras no futuro
