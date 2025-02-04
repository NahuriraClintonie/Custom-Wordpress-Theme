# Custom WordPress Theme

A fully custom WordPress theme built with React, Vite, Docker, and modern front-end tools. This theme integrates dynamic content using the Pods framework and provides a seamless development experience.

## Features
- **React-based UI** for dynamic content rendering
- **Vite for fast development and HMR (Hot Module Replacement)**
- **Pods Integration** for managing custom post types and fields
- **Docker Support** for an isolated development environment
- **SCSS & Webpack** for optimized styling and asset management
- **ESLint with TypeScript support** for cleaner and more maintainable code
- **Fast Refresh with Vite plugins**

## Installation

### Prerequisites
Ensure you have the following installed on your system:
- [Node.js](https://nodejs.org/)
- [Docker](https://www.docker.com/)
- [WordPress](https://wordpress.org/) (Locally or via Docker)
- [Git](https://git-scm.com/)

### Cloning the Repository
```sh
git clone https://github.com/NahuriraClintonie/Custom-Wordpress-Theme.git
cd Custom-Wordpress-Theme
```

### Installing Dependencies
```sh
npm install
```

## Running the Project
The project requires three terminals to be running simultaneously:

### 1st Terminal: Start the Development Server
```sh
npm run dev
```

### 2nd Terminal: Watch for File Changes
```sh
npm run watch
```

### 3rd Terminal: Start the Docker Environment
```sh
docker-compose up
```

This will start the WordPress environment along with the theme.

## ESLint Configuration

If you are developing a production application, we recommend updating the configuration to enable type-aware lint rules:

### Expanding the ESLint configuration

Currently, two official plugins are available for Vite:

- [@vitejs/plugin-react](https://github.com/vitejs/vite-plugin-react/blob/main/packages/plugin-react/README.md) uses [Babel](https://babeljs.io/) for Fast Refresh
- [@vitejs/plugin-react-swc](https://github.com/vitejs/vite-plugin-react-swc) uses [SWC](https://swc.rs/) for Fast Refresh

To enhance the ESLint configuration, modify the top-level `parserOptions` property like this:

```js
export default {
  // other rules...
  parserOptions: {
    ecmaVersion: 'latest',
    sourceType: 'module',
    project: ['./tsconfig.json', './tsconfig.node.json'],
    tsconfigRootDir: __dirname,
  },
}
```

## Development Workflow
- Modify React components in `src/`
- Custom WordPress templates are inside the theme folder
- WordPress Pods are used for structured data management
- Styles are managed using SCSS

## Deploying the Theme
1. Build the project:
   ```sh
   npm run build
   ```
2. Copy the built files to your WordPress theme directory.
3. Activate the theme in the WordPress admin panel.

## Contributing
Feel free to fork this repository and submit pull requests for improvements.

## License
This project is open-source under the [MIT License](LICENSE).

