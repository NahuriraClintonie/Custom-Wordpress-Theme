import ReactDOM from 'react-dom/client';
import View from './view';
import "../index.css";

const rootElement = document.getElementById('single-restaurants');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<View />);
}
