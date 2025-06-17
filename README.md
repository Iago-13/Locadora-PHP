🚗 Sistema de Locadora de Veículos - PHP

Este projeto é um sistema simples de locação de veículos, desenvolvido em PHP, com conexão a banco de dados e gerenciamento de usuários. Ideal para fins didáticos e aprendizado de desenvolvimento web com PHP procedural.

🗂️ Estrutura do Projeto:
- ⚙️ config.php         → Configuração de conexão com o banco
- 🗃️ db.php             → Lógica de conexão ao banco de dados
- 🔒 logout.php         → Encerramento de sessão
- 🏠 index.php          → Página principal do sistema
- 🔐 login.php          → Tela de login
- 📊 dashboard.php      → Área logada do usuário
- 🖼️ views/             → Páginas visuais (HTML + PHP)
- 📁 .git/              → Controle de versão

✅ Funcionalidades:
- 🔐 Autenticação de usuários (login/logout)
- 🚙 Cadastro de veículos
- ✏️ Edição e exclusão de registros
- 📋 Listagem de veículos disponíveis para locação
- 🧑‍💼 Painel administrativo

🛠️ Tecnologias Utilizadas:
- 🐘 PHP 7+
- 🗄️ MySQL
- 🎨 HTML/CSS
- 💠 Bootstrap (se aplicável)
- 🧾 Git (controle de versão)

🚀 Como Executar:
1. 📥 Clone o repositório:
   git clone https://github.com/seu-usuario/locadora-php.git

2. 🛠️ Importe o banco de dados (.sql) via phpMyAdmin ou outro gerenciador.

3. ⚙️ Atualize o arquivo config.php com as credenciais do seu banco:
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'locadora');

4. ▶️ Inicie o servidor local:
   php -S localhost:8000

5. 🌐 Acesse no navegador:
   http://localhost:8000

👨‍💻 Autores:
Projeto desenvolvido por Ademir José Wilsek Scarpim, Carlos Eduardo Stroparo Magaton e Iago Mayer Bach.

