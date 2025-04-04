import './bootstrap';
import '../css/app.css';
import React from 'react';
import { createRoot } from 'react-dom/client';
import YourComponent from './components/YourComponent';

// Example of how you might export your component for use in the main application
window.YourPackage = {
    YourComponent
};

// Or if you want to auto-mount to elements with a specific class/id
document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('.your-package-mount-point');
    elements.forEach(element => {
        const root = createRoot(element);
        root.render(<YourComponent />);
    });
});
