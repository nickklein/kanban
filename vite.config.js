import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import path from 'path'

export default defineConfig({
    plugins: [react()],
    build: {
        lib: {
            entry: path.resolve(__dirname, 'resources/js/index.jsx'), // entry point for your component exports
            name: 'MyPackage',
            fileName: 'index',
            formats: ['es'], // or 'umd' or 'cjs' if needed
        },
        rollupOptions: {
            // prevent bundling react & react-dom
            external: ['react', 'react-dom'],
        },
        outDir: 'dist',
    },
});
