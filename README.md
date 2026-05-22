# 🎟️ Events Laravel

Sistema web para gerenciamento e participação em eventos. A plataforma permite que usuários criem seus próprios eventos, se inscrevam em eventos de outras pessoas, acompanhem suas participações e cancelem inscrições quando necessário — tudo em um ambiente simples, autenticado e organizado.

---

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

> O projeto utiliza **Laravel Sail** (Docker), portanto não é necessário instalar PHP, MySQL ou Node.js diretamente na sua máquina.

---

## 📋 Pré-requisitos

Antes de começar, você precisa ter instalado:

- **WSL2** com Ubuntu (para usuários Windows)
- **Docker Desktop** — [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)
- **Git** — [https://git-scm.com](https://git-scm.com)
- **Composer** — [https://getcomposer.org](https://getcomposer.org)

Verifique se estão instalados corretamente:

```bash
docker --version
git --version
composer --version
```

---

## 🔧 Instalação

Siga o passo a passo abaixo **na ordem correta** para ter o ambiente rodando localmente.

**1. Clone o repositório:**

```bash
git clone https://github.com/seu-usuario/events-laravel.git
cd events-laravel
```

**2. Instale as dependências PHP:**

```bash
composer install --ignore-platform-reqs
```

**3. Copie o arquivo de ambiente:**

```bash
cp .env.example .env
```

**4. Configure o banco de dados no `.env`:**

Abra o arquivo `.env` e confirme que as variáveis do banco estão assim:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

> ⚠️ O `DB_HOST` deve ser `mysql` (nome do container), **nunca** `127.0.0.1` ou `localhost` — isso causaria erro de conexão.

**5. Suba os containers Docker:**

```bash
./vendor/bin/sail up -d
```

> ⏳ Aguarde alguns segundos após esse comando para o MySQL terminar de inicializar antes de continuar.

**6. Verifique se todos os containers estão rodando:**

```bash
./vendor/bin/sail ps
```

Todos devem aparecer com status **Up** antes de prosseguir.

**7. Gere a chave da aplicação:**

```bash
./vendor/bin/sail artisan key:generate
```

**8. Rode as migrations para criar as tabelas no banco:**

```bash
./vendor/bin/sail artisan migrate
```

**9. Instale as dependências do frontend:**

```bash
./vendor/bin/sail npm install
```

**10. Inicie o servidor de desenvolvimento do frontend:**

```bash
./vendor/bin/sail npm run dev -- --host
```

Após esses passos, acesse a aplicação em:

```
http://localhost
```

> ⚠️ Mantenha o terminal com o Vite rodando aberto. Ele é necessário para carregar estilos e scripts em ambiente de desenvolvimento.

---

## ⚙️ Executando os testes

Para rodar os testes automatizados do projeto:

```bash
./vendor/bin/sail artisan test
```

### 🔩 Testes de funcionalidade (Feature Tests)

Verificam os fluxos principais da aplicação, como autenticação, criação de eventos e inscrições.

```bash
./vendor/bin/sail artisan test --testsuite=Feature
```

### ⌨️ Testes unitários (Unit Tests)

Verificam o comportamento isolado de classes e métodos do sistema.

```bash
./vendor/bin/sail artisan test --testsuite=Unit
```

---

## 📦 Implantação

Para implantar o projeto em um servidor de produção:

**1.** Configure as variáveis de ambiente no `.env` do servidor (banco de dados, `APP_ENV=production`, `APP_DEBUG=false`)

**2.** Instale as dependências sem pacotes de desenvolvimento:

```bash
composer install --no-dev --optimize-autoloader
```

**3.** Gere o build do frontend:

```bash
npm run build
```

**4.** Rode as migrations:

```bash
php artisan migrate --force
```

**5.** Otimize a aplicação:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🛠️ Construído com

* [Laravel 9](https://laravel.com) — Framework PHP principal
* [Laravel Sail](https://laravel.com/docs/sail) — Ambiente de desenvolvimento via Docker
* [Jetstream](https://jetstream.laravel.com) — Autenticação, perfil e gerenciamento de sessão
* [Livewire](https://laravel-livewire.com) — Componentes reativos server-side
* [Tailwind CSS](https://tailwindcss.com) — Estilização do frontend
* [Vite](https://vitejs.dev) — Build e hot reload do frontend
* [MySQL](https://www.mysql.com) — Banco de dados relacional
* [Docker](https://www.docker.com) — Containerização do ambiente

---

## 🖇️ Colaborando

Contribuições são bem-vindas! Para contribuir:

1. Faça um **fork** do projeto
2. Crie uma branch para sua feature: `git checkout -b feature/minha-feature`
3. Commit suas alterações: `git commit -m 'feat: adiciona minha feature'`
4. Faça o push para a branch: `git push origin feature/minha-feature`
5. Abra um **Pull Request**

---

## 📌 Versão

Usamos [SemVer](http://semver.org/) para controle de versão. Para as versões disponíveis, veja as [tags neste repositório](https://github.com/seu-usuario/events-laravel/tags).

---

## ✒️ Autor

* **Leoni Zilli** — Desenvolvimento — [GitHub](https://github.com/seu-usuario)

---

## 📄 Licença

Este projeto está sob a licença MIT — veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

## 🎁 Expressões de gratidão

* Conta pra alguém sobre esse projeto 📢
* Deixa uma ⭐ no repositório se te ajudou
* Um agradecimento publicamente 🫂

---

⌨️ com ❤️ por **Leoni Zilli** 😊
