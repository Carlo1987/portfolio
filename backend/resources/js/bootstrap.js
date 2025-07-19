import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { setModalAddItem, setModalEditItem, setModalDeleteItem, getFile, closeModal } from './modal';
window.setModalAddItem = setModalAddItem;
window.setModalEditItem = setModalEditItem;
window.setModalDeleteItem = setModalDeleteItem;
window.getFile = getFile;
window.closeModal = closeModal;

import { handleSave, handleDelete } from './http';
window.handleSave = handleSave;
window.handleDelete = handleDelete;
 


