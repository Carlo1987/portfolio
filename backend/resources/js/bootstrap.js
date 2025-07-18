import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { showToast } from './toast';
window.showToast = showToast;

import { addItem, editItem, deleteItem, changeStyleBtnImage } from './modal';
window.addItem = addItem;
window.editItem = editItem;
window.deleteItem = deleteItem;
window.changeStyleBtnImage = changeStyleBtnImage;

import { handleSave, handleDelete } from './http';
window.handleSave = handleSave;
window.handleDelete = handleDelete;
 


