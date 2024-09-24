/Projeto_Livraria_Web
│
├── /src                    # Código-fonte principal do projeto
|   ├── /assets             # Arquivos estáticos gerais (imagens, vídeos, fontes, etc.)
│   |    ├── /images
│   |    ├── /static        # Imagens fixas (estáticas)
│   |    └── /dynamic       # Imagens dinâmicas
│   ├── /icons              # Ícones
|   |   └── /placeIcon.svg  # Exemplo de ícone
|   ├── /scss
|   |    ├── /main.css      # Arquivo css que contém a estilização do bootstrap
|   |    ├── /main.css.map  # Arquivo css.map que tem a estilização do bootstrap
|   |    └── /main.scss     # Arquivo scss que importa a estilização do bootstrap
|   |
│   ├── /components        # Componentes reutilizáveis
│   │   ├── /header        # Exemplo de componente de cabeçalho
│   │   ├── /footer        # Exemplo de componente de rodapé
│   │   └── /button        # Exemplo de componente de botão
│   ├── /controllers       # Controladores (Controllers)
│   │   └── /homepageController.php  # Exemplo de controlador
│   ├── /models            # Modelos (Models)
│   │   └── /livros.php    # Exemplo de modelo
│   ├── /views             # Páginas e templates (caso a aplicação siga o padrão MVC)
│   │   └── /index.php     # Homepage
│   ├── /js                # Scripts JavaScript
|   |    └── /bootstrap
|   |           └── / bootstrap.bundle.min.js   # Arquivo JS para o funcionamento do bootstrap
│   ├── /validacao.js        # Exemplo de arquivo JS
|   |
├── /docs                    # Documentação do projeto
    └── /estruturaProjeto.md # Estrutura de Pastas e Arquivos do Projeto