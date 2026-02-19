# Arquitetura Backend Escalável

Projeto focado na aplicação prática de princípios de arquitetura, concorrência e escalabilidade em backend com Laravel.  
Este repositório faz parte da minha evolução profissional, aplicando conceitos avançados além do CRUD básico.

---

## 🎯 Objetivo

Desenvolver uma API de pedidos que segue boas práticas de engenharia de software, com foco em:

- Separação de responsabilidades
- Processamento assíncrono com filas
- Controle de concorrência
- Idempotência
- Transações de banco de dados
- Eventos e desacoplamento
- Testes automatizados

O objetivo é criar uma base sólida que permita crescimento da aplicação e evolução do desenvolvedor.

---

## 🛠 Tecnologias

- Laravel 10+
- MySQL / PostgreSQL
- Redis (para filas e locks)
- Laravel Queues
- PHPUnit para testes

---

## 🧱 Arquitetura

O projeto aplica:

- Controllers enxutos
- Service Layer
- DTOs para transporte de dados
- Events & Listeners
- Jobs para processamento assíncrono
- Locks com Redis para controle de concorrência
- Transações para garantir consistência

---

## 🚀 Funcionalidades

- CRUD de produtos
- Criação e processamento de pedidos
- Processamento assíncrono de pagamento
- Controle de estoque com concorrência
- Prevenção de requisições duplicadas
- Testes focados em regras de negócio

---

## ▶️ Como Executar

```bash
git clone https://github.com/seu-usuario/arquitetura-backend-escalavel
cd arquitetura-backend-escalavel

cp .env.example .env
php artisan key:generate

# configurar banco e redis no .env

php artisan migrate
php artisan queue:work
php artisan serve
