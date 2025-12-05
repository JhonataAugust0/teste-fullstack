# Changelog

Todas as mudanças notáveis deste projeto estão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/pt-BR/1.0.0/),
e este projeto adere ao [Semantic Versioning](https://semver.org/lang/pt-BR/).

---

## [Unreleased]

### Adicionado

---

## [0.2.0] - 2025-12-05

### 📅 05/12/2025 - Dia 4: Frontend UI com Bootstrap 5

#### Adicionado
- **Layout Bootstrap 5** (`5781457`)
  - Navbar responsiva com hamburger menu para mobile
  - Container principal com card estilizado
  - Integração com Google Fonts (Inter)
  - CSS customizado em `webroot/css/style.css`

- **Navegação Lateral** (`0970144`)
  - Links ativos com destaque visual
  - Flash messages estilizadas como toast

- **Views de Prestadores** (`563bea3`)
  - Listagem com tabela responsiva e paginação
  - Foto do prestador com fallback para iniciais
  - Exibição de serviços e valores por prestador
  - Formulários de add/edit com Bootstrap 5

- **Views de Serviços** (`33177da`, `d60c7aa`)
  - Catálogo de serviços com cards modernos
  - Formulários estilizados para add/edit
  - Modal de importação CSV

- **Modal de Importação** (`54c74f6`)
  - Drag & drop para upload de arquivo CSV
  - Validação de formato no frontend
  - Feedback visual durante upload

- **Responsividade Mobile** (`abf664e`)
  - Telefone, serviços e valores visíveis no mobile
  - Ícones de ação (editar/excluir) inline no mobile
  - Tabela de serviços compacta para telas pequenas
  - Menu hamburger fecha ao clicar nos links

#### Alterado
- **Rotas** (`f24234e`)
  - Homepage redirecionada para `/providers`

#### Corrigido
- **Layout Corrompido** (`abf664e`)
  - Removido jQuery e Bootstrap JS duplicados
  - Corrigido tags `<body>` duplicadas

- **Edição de Prestadores** (`33556ce`, `ef10fea`)
  - Concatenação de first_name + last_name no edit
  - Validação de tipo para foto e valor do serviço

- **Estilos da Tabela** (`b0212e4`)
  - Font-size 12px nos headers
  - Removido text-uppercase

---

## [0.1.0] - 2025-12-04

---

### 📅 02/12/2025 - Dia 1: Infraestrutura

#### Adicionado
- **Docker Environment** (`abd6725` - 16:38)
  - Dockerfile com PHP 7.2, Apache e suporte a mcrypt
  - docker-compose.yml com MySQL 5.7 e volumes persistentes
  - Configuração otimizada para desenvolvimento local

- **CakePHP 2.10.24** (`2d842dc` - 16:41)
  - Estrutura completa do framework em `lib/Cake/`
  - Configurações padrão em `app/Config/`
  - Templates de console e bake

- **Schema do Banco de Dados** (`60032e9` - 17:03)
  - Tabela `providers` (id, name, email, phone, photo, created, modified)
  - Tabela `services` (id, provider_id, name, description, value, created, modified)
  - Relacionamento 1:N entre Provider e Service com CASCADE delete
  - Campos DECIMAL(10,2) para valores monetários

---

### 📅 03/12/2025 - Dia 2: CRUD e Documentação

#### Adicionado
- **Scaffold Providers e Services** (`299f092` - 20:14)
  - Controllers: `ProvidersController` e `ServicesController`
  - Models: `Provider` e `Service` com relacionamentos
  - Views: index, view, add, edit para ambas entidades
  - Fixtures para testes

- **Especificação Técnica (SDD)** (`7f45dd0` - 20:55)
  - Documento de Arquitetura em `docs/SPECIFICATION.md`
  - Diagrama de contexto Mermaid
  - Diagrama ER das entidades
  - Decisões arquiteturais (ADR)
  - Roadmap de evolução (V2-V4)

- **DevOps - .dockerignore e .gitignore** (`cc1794d` - 23:56)
  - Exclusão de arquivos Git, documentação, testes
  - Otimização de build do container
  - Padrões para IDEs (VS Code, PhpStorm)
  - Exclusão de cache e logs

---

### 📅 04/12/2025 - Dia 3: Arquitetura e Refinamentos

#### Adicionado
- **Service Layer - ProviderService** (`302c214` - 00:05)
  - `create()` - Criação com upload de foto
  - `update()` - Atualização com substituição de foto
  - `delete()` - Exclusão com remoção de arquivo
  - `findById()` - Busca por ID com serviços relacionados
  - `buildSearchConditions()` - Filtros de busca
  - `_processPhotoUpload()` - Processamento de upload com hash único

- **Service Layer - ServiceService** (`302c214` - 00:05)
  - `create()` - Criação com sanitização monetária
  - `update()` - Atualização de serviços
  - `delete()` - Exclusão de serviços
  - `findById()` - Busca por ID
  - `getProvidersList()` - Lista de prestadores para dropdown
  - `buildSearchConditions()` - Filtros de busca

- **Validações do Provider** (`03a74f5` - 00:06)
  - Nome obrigatório (2-255 caracteres)
  - Email único, formato válido, normalizado para lowercase
  - Telefone com regex flexível (com/sem parênteses no DDD)
  - Formatação automática para "XX XXXXX-XXXX"

- **Validações do Service** (`03a74f5` - 00:06)
  - Nome obrigatório (2-255 caracteres)
  - Descrição até 2000 caracteres
  - Valor monetário obrigatório e positivo
  - Provider obrigatório e existente no banco

#### Alterado
- **ProvidersController** (`03a74f5` - 00:06)
  - Delegação de lógica para `ProviderService`
  - Controller "thin" com apenas orquestração HTTP
  - Flash messages em português

- **ServicesController** (`03a74f5` - 00:06)
  - Delegação de lógica para `ServiceService`
  - Controller "thin" com apenas orquestração HTTP
  - Flash messages em português

- **AppModel Simplificado** (`03a74f5` - 00:06)
  - Remoção de métodos não utilizados
  - Apenas configurações base ($actsAs, $recursive)

- **Provider Model** (`03a74f5` - 00:06)
  - Validações completas com mensagens em PT-BR
  - Callback `beforeSave()` para normalização
  - Relacionamento hasMany com Service

- **Service Model** (`03a74f5` - 00:06)
  - Validações completas com mensagens em PT-BR
  - Callback `beforeSave()` para sanitização monetária
  - Relacionamento belongsTo com Provider

- **AppController** (`03a74f5` - 00:06)
  - Components: Flash, Session, Paginator, Security
  - Helpers: Html, Form, Flash
  - Headers de segurança (X-Frame-Options, X-Content-Type-Options)

#### Removido
- **Arquivos de Teste Auto-gerados** (`11a43e5` - 00:06)
  - `ProvidersControllerTest.php`, `ServicesControllerTest.php`, `ServiceTest.php`
  - Fixtures geradas automaticamente
  - Reservado para implementação manual futura

#### Corrigido
- **Upload de Foto** (`28228d5` - 00:07)
  - Formulários de Provider com `enctype="multipart/form-data"` correto

#### Adicionado
- **Validação Monetária Flexível** (`ab83f42` - 12:32)
  - Aceita tanto vírgula quanto ponto como separador decimal
  - Sanitização de formato brasileiro (R$ 1.234,56 → 1234.56)
  - Método `_sanitizeDecimalValue()` no Service Model

- **Atualização do Roadmap** (`cca7935` - 12:41)
  - Idiomas dos prestadores (V3)
  - API restrita para app do parceiro (V4)

- **Filtros de Busca** (`c5eeaeb` - 12:49)
  - Campo de pesquisa em `Providers/index.ctp`
  - Campo de pesquisa em `Services/index.ctp`
  - Busca por nome, email e telefone

- **Checklist de Progresso** (`aaeb7ee` - 12:54)
  - Fase 1: Infraestrutura ✓
  - Fase 2: Backend ✓
  - Fase 3: Frontend (pendente)
  - Fase 4: Importação CSV (pendente)
  - Fase 5: Documentação (em progresso)

---

## Histórico de Commits (ordem cronológica)

| Hash | Data/Hora | Tipo | Descrição |
|------|-----------|------|-----------|
| `e7e421d` | 02/12 16:37 | docs | Instruções do desafio |
| `abd6725` | 02/12 16:38 | build | Setup Docker PHP 7.2 + MySQL 5.7 |
| `2d842dc` | 02/12 16:41 | chore | Instalação CakePHP 2.10.24 |
| `60032e9` | 02/12 17:03 | feat | Schema do banco de dados |
| `299f092` | 03/12 20:14 | feat | Scaffold CRUD via cake bake |
| `7f45dd0` | 03/12 20:55 | docs | Especificação técnica (SDD) |
| `cc1794d` | 03/12 23:56 | chore | .dockerignore e .gitignore |
| `302c214` | 04/12 00:05 | refactor | Adiciona camada de serviços |
| `03a74f5` | 04/12 00:06 | refactor | Delega lógica para service layer |
| `11a43e5` | 04/12 00:06 | chore | Remove testes auto-gerados |
| `28228d5` | 04/12 00:07 | fix | Formulários de upload de foto |
| `ab83f42` | 04/12 12:32 | feat | Validação monetária flexível (vírgula/ponto) |
| `cca7935` | 04/12 12:41 | docs | Atualiza roadmap com idiomas e API |
| `c5eeaeb` | 04/12 12:49 | feat | Implementa filtros de busca nas listagens |
| `aaeb7ee` | 04/12 12:54 | docs | Adiciona checklist de progresso |
| `5781457` | 05/12 | feat | Layout Bootstrap 5 com CSS customizado |
| `0970144` | 05/12 | feat | Navegação lateral e flash messages |
| `563bea3` | 05/12 | feat | Views de prestadores com Bootstrap 5 |
| `33177da` | 05/12 | feat | Catálogo de serviços estilizado |
| `d60c7aa` | 05/12 | feat | Formulários de serviços com Bootstrap 5 |
| `54c74f6` | 05/12 | feat | Modal de importação CSV |
| `b0212e4` | 05/12 | style | Ajustes de font-size e uppercase |
| `33556ce` | 05/12 | fix | Concatenação de nome no edit |
| `ef10fea` | 05/12 | merge | Integra fix de edição de prestadores |
| `abf664e` | 05/12 | fix | Responsividade mobile e limpeza do layout |

