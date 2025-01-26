import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import OutdoorApp from './components/OutdoorApp';

const el = document.getElementById('app');
const root = createRoot(el);

root.render(<OutdoorApp />);
